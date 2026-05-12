@extends('layouts.landing')

@section('content')
<div class="min-h-[calc(100vh-200px)] py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Profile View / Form -->
        <div class="bg-surface rounded-2xl shadow-sm p-6 md:p-10">
            <div class="flex justify-between items-start mb-8">
                <div class="flex items-center gap-4">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 relative">
                        <i class='bx bx-user text-5xl'></i>
                        <button class="absolute bottom-0 right-0 bg-white rounded-full p-1.5 shadow border border-gray-100 hover:bg-gray-50">
                            <i class='bx bx-camera text-sm text-gray-600'></i>
                        </button>
                    </div>
                </div>
                <!-- Toggle Advanced Settings -->
                <button onclick="document.getElementById('advanced-settings').classList.toggle('hidden')" class="bg-primary text-white px-6 py-2.5 rounded-lg font-medium hover:bg-secondary transition-colors shadow-sm">
                    Edit Profile
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-primary mb-2">Nama Lengkap</label>
                    <input type="text" value="{{ Auth::user()->name }}" class="w-full border-none bg-white rounded-lg p-3.5 text-gray-700 shadow-sm focus:ring-0" readonly>
                </div>
                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-primary mb-2">Email</label>
                    <input type="email" value="{{ Auth::user()->email }}" class="w-full border-none bg-white rounded-lg p-3.5 text-gray-700 shadow-sm focus:ring-0" readonly>
                </div>
                <!-- Phone -->
                <div>
                    <label class="block text-sm font-medium text-primary mb-2">No. Telepon</label>
                    <input type="text" value="(+62) 8522-3321-122" class="w-full border-none bg-white rounded-lg p-3.5 text-gray-700 shadow-sm focus:ring-0" readonly>
                </div>
                <!-- Password -->
                <div class="relative">
                    <label class="block text-sm font-medium text-primary mb-2">Password</label>
                    <input type="password" value="********" class="w-full border-none bg-white rounded-lg p-3.5 text-gray-700 shadow-sm focus:ring-0 pr-10" readonly>
                    <button class="absolute right-3 top-[38px] text-gray-400 hover:text-gray-600">
                        <i class='bx bx-show text-lg'></i>
                    </button>
                </div>
                <!-- Country -->
                <div>
                    <label class="block text-sm font-medium text-primary mb-2">Negara</label>
                    <input type="text" value="Indonesia" class="w-full border-none bg-white rounded-lg p-3.5 text-gray-700 shadow-sm focus:ring-0" readonly>
                </div>
            </div>
        </div>

        <!-- Advanced Settings (Hidden by default) -->
        <div id="advanced-settings" class="hidden mt-8 space-y-6">
            <div class="p-6 sm:p-8 bg-white shadow rounded-2xl border border-gray-100">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-8 bg-white shadow rounded-2xl border border-gray-100">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-8 bg-white shadow rounded-2xl border border-gray-100">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
