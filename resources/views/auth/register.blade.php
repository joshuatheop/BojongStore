@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<div class="text-center mb-8">
    <h2 class="text-2xl lg:text-3xl font-bold text-primary mb-2">Buat dan Daftar Akun Kamu</h2>
</div>

<form method="POST" action="{{ route('register') }}" class="space-y-5">
    @csrf

    <!-- Name -->
    <div class="text-left">
        <label for="name" class="block font-medium text-sm text-primary mb-1">Nama Lengkap</label>
        <input id="name" class="block w-full border-none bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-primary/50 text-sm transition-shadow" 
               type="text" name="name" :value="old('name')" placeholder="Masukkan nama anda" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="text-left">
        <label for="email" class="block font-medium text-sm text-primary mb-1">Email</label>
        <input id="email" class="block w-full border-none bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-primary/50 text-sm transition-shadow" 
               type="email" name="email" :value="old('email')" placeholder="Masukkan alamat email" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Phone Number (UI Only based on Mockup) -->
    <div class="text-left">
        <label for="phone" class="block font-medium text-sm text-primary mb-1">No. Telepon</label>
        <input id="phone" class="block w-full border-none bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-primary/50 text-sm transition-shadow" 
               type="text" name="phone" placeholder="Masukkan nomor telepon" autocomplete="tel" />
    </div>

    <!-- Password -->
    <div class="text-left">
        <label for="password" class="block font-medium text-sm text-primary mb-1">Password</label>
        <input id="password" class="block w-full border-none bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-primary/50 text-sm transition-shadow"
               type="password" name="password" placeholder="Buat password anda" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password (Required for Backend) -->
    <div class="text-left">
        <label for="password_confirmation" class="block font-medium text-sm text-primary mb-1">Konfirmasi Password</label>
        <input id="password_confirmation" class="block w-full border-none bg-gray-50 rounded-lg p-3 focus:ring-2 focus:ring-primary/50 text-sm transition-shadow"
               type="password" name="password_confirmation" placeholder="Ulangi password anda" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="pt-2">
        <button type="submit" class="w-full bg-primary hover:bg-secondary text-white font-semibold py-3 rounded-lg transition-colors">
            Buat Akun
        </button>
    </div>

    <p class="text-gray-600 text-sm mt-6 text-center">Sudah punya akun? 
        <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Masuk</a>
    </p>

    <div class="mt-6 text-center text-sm text-gray-500 relative">
        <span class="bg-white px-2 relative z-10">Atau lanjutkan dengan</span>
        <div class="absolute left-0 top-1/2 w-full h-px bg-gray-200 -z-0"></div>
    </div>

    <div class="flex justify-center gap-4 mt-4">
        <button type="button" class="w-10 h-10 rounded-full bg-green-50 text-primary flex items-center justify-center hover:bg-green-100 transition-colors">
            <i class='bx bxl-facebook text-xl'></i>
        </button>
        <button type="button" class="w-10 h-10 rounded-full bg-gray-100 text-gray-800 flex items-center justify-center hover:bg-gray-200 transition-colors">
            <i class='bx bxl-apple text-xl'></i>
        </button>
        <button type="button" class="w-10 h-10 rounded-full bg-red-100 text-red-500 flex items-center justify-center hover:bg-red-200 transition-colors">
            <i class='bx bxl-google text-xl'></i>
        </button>
    </div>
</form>
@endsection
