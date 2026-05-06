// app.js
document.addEventListener('DOMContentLoaded', () => {
    // CSRF Token for AJAX requests
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // 1. Favorit Toggle Logic
    const favButtons = document.querySelectorAll('.favorite-toggle-header, .main-favorite');
    favButtons.forEach(btn => {
        btn.addEventListener('click', async (e) => {
            e.preventDefault();
            const productId = btn.getAttribute('data-product-id');
            
            try {
                const response = await fetch(`/products/${productId}/favorit`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });
                
                if (response.ok) {
                    const data = await response.json();
                    const isFavorited = data.isFavorited;
                    
                    // Update all buttons for this product
                    favButtons.forEach(b => {
                        const svg = b.querySelector('svg');
                        if (b.classList.contains('main-favorite')) {
                            svg.setAttribute('fill', isFavorited ? '#333' : 'none');
                        } else {
                            svg.setAttribute('fill', isFavorited ? '#1B5E20' : 'none');
                            svg.setAttribute('stroke', isFavorited ? '#1B5E20' : 'currentColor');
                        }
                    });
                } else if (response.status === 401) {
                    alert('Silakan login untuk menambahkan ke favorit.');
                }
            } catch (error) {
                console.error('Error toggling favorite:', error);
            }
        });
    });

    // 2. Modal Logic
    const modal = document.getElementById('review-modal');
    const openBtn = document.getElementById('open-review-modal');
    const closeBtn = document.getElementById('close-review-modal');
    const reviewForm = document.getElementById('review-form');

    if(openBtn) {
        openBtn.addEventListener('click', () => modal.classList.add('active'));
    }
    if(closeBtn) {
        closeBtn.addEventListener('click', () => modal.classList.remove('active'));
    }
    modal.addEventListener('click', (e) => {
        if (e.target === modal) modal.classList.remove('active');
    });

    // 3. Interactive Star Rating in Form
    const stars = document.querySelectorAll('.star-interactive');
    const ratingInput = document.getElementById('rating-val');
    
    stars.forEach(star => {
        star.addEventListener('click', () => {
            const val = parseInt(star.getAttribute('data-rating'));
            ratingInput.value = val;
            
            // Update UI
            stars.forEach(s => {
                const sVal = parseInt(s.getAttribute('data-rating'));
                if (sVal <= val) {
                    s.setAttribute('fill', '#FFC107');
                } else {
                    s.setAttribute('fill', 'none');
                }
            });
        });
    });

    // 4. Submit Review Logic
    if(reviewForm) {
        reviewForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const productId = document.getElementById('reviews-container').getAttribute('data-product-id');
            const rating = ratingInput.value;
            const text = document.getElementById('review_text').value;

            try {
                const response = await fetch(`/products/${productId}/ulasan`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ rating, review_text: text })
                });

                if (response.ok) {
                    const data = await response.json();
                    
                    // Add new review to top of grid
                    const ulasan = data.ulasan;
                    const dateObj = new Date(ulasan.created_at);
                    const formattedDate = dateObj.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
                    
                    let starsHtml = '';
                    for(let i=1; i<=5; i++) {
                        const fill = i <= ulasan.rating ? '#FFC107' : 'none';
                        starsHtml += `<svg width="14" height="14" viewBox="0 0 24 24" fill="${fill}" stroke="#FFC107" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>`;
                    }

                    const cardHtml = `
                        <div class="review-card" style="animation: fadeIn 0.5s;">
                            <div class="review-header">
                                <div class="stars">${starsHtml}</div>
                                <button class="more-options"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg></button>
                            </div>
                            <div class="user-info">
                                <strong>${ulasan.user.name}</strong>
                                <svg class="verified-icon" width="14" height="14" viewBox="0 0 24 24" fill="#4CAF50"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                            </div>
                            <p class="review-text">"${ulasan.review_text}"</p>
                            <div class="review-date">Ditulis pada ${formattedDate}</div>
                        </div>
                    `;

                    document.getElementById('reviews-container').insertAdjacentHTML('afterbegin', cardHtml);
                    
                    // Update count
                    const countSpan = document.getElementById('total-ulasan');
                    const currentCount = parseInt(countSpan.textContent.replace(/\D/g,''));
                    countSpan.textContent = `(${currentCount + 1})`;

                    // Close modal & reset form
                    modal.classList.remove('active');
                    reviewForm.reset();
                    ratingInput.value = 5;
                    stars.forEach(s => s.setAttribute('fill', '#FFC107'));
                } else {
                    const data = await response.json();
                    alert('Error: ' + (data.message || 'Gagal mengirim ulasan'));
                }
            } catch (error) {
                console.error('Error submitting review:', error);
            }
        });
    }

    // 5. Load More Logic
    const loadMoreBtn = document.getElementById('load-more-btn');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', async () => {
            const productId = document.getElementById('reviews-container').getAttribute('data-product-id');
            const page = loadMoreBtn.getAttribute('data-next-page');
            
            const originalText = loadMoreBtn.textContent;
            loadMoreBtn.textContent = 'Memuat...';
            loadMoreBtn.disabled = true;

            try {
                const response = await fetch(`/products/${productId}/ulasan?page=${page}`, {
                    headers: { 'Accept': 'application/json' }
                });

                if (response.ok) {
                    const data = await response.json();
                    
                    let html = '';
                    data.ulasans.forEach(ulasan => {
                        const dateObj = new Date(ulasan.created_at);
                        const formattedDate = dateObj.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
                        
                        let starsHtml = '';
                        for(let i=1; i<=5; i++) {
                            const fill = i <= ulasan.rating ? '#FFC107' : 'none';
                            starsHtml += `<svg width="14" height="14" viewBox="0 0 24 24" fill="${fill}" stroke="#FFC107" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>`;
                        }

                        html += `
                            <div class="review-card">
                                <div class="review-header">
                                    <div class="stars">${starsHtml}</div>
                                    <button class="more-options"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg></button>
                                </div>
                                <div class="user-info">
                                    <strong>${ulasan.user.name}</strong>
                                    <svg class="verified-icon" width="14" height="14" viewBox="0 0 24 24" fill="#4CAF50"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                </div>
                                <p class="review-text">"${ulasan.review_text}"</p>
                                <div class="review-date">Ditulis pada ${formattedDate}</div>
                            </div>
                        `;
                    });

                    document.getElementById('reviews-container').insertAdjacentHTML('beforeend', html);

                    if (data.hasMore) {
                        loadMoreBtn.setAttribute('data-next-page', parseInt(page) + 1);
                        loadMoreBtn.textContent = originalText;
                        loadMoreBtn.disabled = false;
                    } else {
                        loadMoreBtn.parentElement.remove();
                    }
                }
            } catch (error) {
                console.error('Error loading more reviews:', error);
                loadMoreBtn.textContent = originalText;
                loadMoreBtn.disabled = false;
            }
        });
    }
});
