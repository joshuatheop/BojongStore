<x-admin-panel>

<div class="flex gap-5 h-full">

    {{-- ======= LEFT PANEL: Section List ======= --}}
    <div class="w-64 flex-shrink-0">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-bold text-gray-800">Bagian Halaman</h2>
            </div>
            <div class="divide-y divide-gray-50">
                @foreach($sections as $key => $label)
                @php
                    $isActive = $activeSection === $key;
                    $item = $allKonten->get($key);
                @endphp
                <a href="{{ route('admin.konten.index', ['section' => $key]) }}"
                   class="flex items-center justify-between px-5 py-4 transition-colors
                          {{ $isActive ? 'bg-[#e8f5ec] border-l-[3px] border-[#1a5c2a]' : 'hover:bg-gray-50' }}">
                    <div>
                        <p class="text-sm font-{{ $isActive ? 'bold' : 'medium' }} {{ $isActive ? 'text-[#1a5c2a]' : 'text-gray-700' }}">
                            {{ $label }}
                        </p>
                        <p class="text-xs text-gray-400 mt-0.5">
                            Terakhir update: {{ $item && $item->updated_at ? $item->updated_at->diffForHumans() : 'Belum pernah' }}
                        </p>
                    </div>
                    <i class='bx bx-chevron-right text-gray-400'></i>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ======= RIGHT PANEL: Editor ======= --}}
    <div class="flex-1 min-w-0">
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm">

            {{-- Editor Header --}}
            <div class="px-7 py-5 border-b border-gray-100 flex items-start justify-between">
                <div>
                    <h2 class="font-bold text-gray-800 text-base">{{ $sections[$activeSection] }}</h2>
                    <p class="text-xs text-gray-400 mt-1">Edit teks dan visual utama yang tampil di halaman depan.</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ url('/') }}" target="_blank"
                       class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-colors">
                        Pratinjau
                    </a>
                </div>
            </div>

            {{-- Form --}}
            <form action="{{ route('admin.konten.update', $activeSection) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-7 py-6 space-y-6">

                    {{-- Headline --}}
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2">Headline Utama</label>
                        <input type="text" name="headline"
                               value="{{ old('headline', $konten->headline ?? '') }}"
                               placeholder="Contoh: Dukung UMKM Lokal, Belanja dari BojongStore"
                               class="w-full border-0 border-b-2 border-gray-100 py-2 text-gray-800 font-medium text-base focus:outline-none focus:border-[#1a5c2a] transition-colors bg-transparent">
                    </div>

                    {{-- Subheadline --}}
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2">Subheadline</label>
                        <textarea name="subheadline" rows="3"
                                  placeholder="Platform terpercaya untuk produk unggulan dari desa Bojong..."
                                  class="w-full border-0 border-b-2 border-gray-100 py-2 text-gray-700 text-sm focus:outline-none focus:border-[#1a5c2a] transition-colors bg-transparent resize-none leading-relaxed">{{ old('subheadline', $konten->subheadline ?? '') }}</textarea>
                    </div>

                    {{-- Banner Image Upload --}}
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2">Gambar Banner (Desktop)</label>
                        <label for="bannerImageInput"
                               class="block w-full h-48 border-2 border-dashed border-gray-200 rounded-xl bg-gray-50 hover:bg-gray-100 cursor-pointer transition-colors relative overflow-hidden">
                            {{-- Preview existing image --}}
                            @if($konten && $konten->image)
                                <img src="{{ asset('storage/' . $konten->image) }}" alt="Banner"
                                     class="absolute inset-0 w-full h-full object-cover" id="bannerPreviewImg">
                            @else
                                <img src="" alt="" class="hidden absolute inset-0 w-full h-full object-cover" id="bannerPreviewImg">
                            @endif
                            <div id="bannerPlaceholder" class="{{ $konten && $konten->image ? 'hidden' : 'flex' }} absolute inset-0 flex-col items-center justify-center text-gray-400 gap-1">
                                <i class='bx bx-image-add text-3xl'></i>
                                <span class="text-xs">Klik untuk unggah gambar banner</span>
                            </div>
                            <span class="absolute bottom-3 right-3 text-xs text-gray-400 bg-white/80 px-2 py-1 rounded">1920 × 600 px</span>
                            <input type="file" id="bannerImageInput" name="image" accept="image/*" class="hidden"
                                   onchange="previewBanner(event)">
                        </label>
                    </div>

                    {{-- Body / Deskripsi --}}
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2">Deskripsi / Konten Tambahan</label>
                        {{-- Simple toolbar --}}
                        <div class="flex items-center gap-3 mb-2 px-1">
                            <button type="button" onclick="formatText('bold')" class="w-7 h-7 flex items-center justify-center rounded hover:bg-gray-100 transition-colors">
                                <span class="font-bold text-sm text-gray-600">B</span>
                            </button>
                            <button type="button" onclick="formatText('italic')" class="w-7 h-7 flex items-center justify-center rounded hover:bg-gray-100 transition-colors">
                                <span class="italic text-sm text-gray-600">I</span>
                            </button>
                            <button type="button" class="w-7 h-7 flex items-center justify-center rounded hover:bg-gray-100 transition-colors text-gray-500">
                                <i class='bx bx-list-ul text-base'></i>
                            </button>
                            <button type="button" class="w-7 h-7 flex items-center justify-center rounded hover:bg-gray-100 transition-colors text-gray-500">
                                <i class='bx bx-link text-base'></i>
                            </button>
                            <button type="button" class="w-7 h-7 flex items-center justify-center rounded hover:bg-gray-100 transition-colors text-gray-500">
                                <i class='bx bx-image text-base'></i>
                            </button>
                        </div>
                        <textarea id="bodyEditor" name="body" rows="4"
                                  placeholder="Gunakan format markdown atau toolbar di atas untuk mempercantik teks deskripsi."
                                  class="w-full border border-gray-200 rounded-lg px-4 py-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 resize-none placeholder-gray-300">{{ old('body', $konten->body ?? '') }}</textarea>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="px-7 py-4 border-t border-gray-100 flex items-center justify-between">
                    <div class="flex items-center gap-2 text-xs text-gray-400">
                        <i class='bx bx-cloud text-base'></i>
                        <span>Perubahan tersimpan otomatis</span>
                    </div>
                    <button type="submit"
                            class="flex items-center gap-2 bg-[#1a5c2a] hover:bg-[#154a22] text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition-colors shadow-sm">
                        Update Live
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewBanner(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => {
            document.getElementById('bannerPreviewImg').src = e.target.result;
            document.getElementById('bannerPreviewImg').classList.remove('hidden');
            document.getElementById('bannerPlaceholder').classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }

    function formatText(type) {
        const textarea = document.getElementById('bodyEditor');
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const selected = textarea.value.substring(start, end);
        let wrap = type === 'bold' ? '**' : '_';
        const replacement = wrap + selected + wrap;
        textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
        textarea.focus();
        textarea.setSelectionRange(start + wrap.length, end + wrap.length);
    }
</script>

</x-admin-panel>
