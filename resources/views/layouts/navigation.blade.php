@auth
    @if (Auth::user()->role === 'admin')
        {{-- Jika role adalah admin, muat navigasi admin --}}
        @include('layouts.navigation.admin')
    @else
        {{-- Jika role adalah user (atau lainnya), muat navigasi user --}}
        @include('layouts.navigation.user')
    @endif
@endauth