@extends('layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-xl mx-auto mt-16 bg-white/10 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white/20 text-white">

    <h2 class="text-3xl font-extrabold mb-6 text-center drop-shadow-lg">Profilini Güncelle</h2>

    @if (session('status') === 'profile-updated')
        <div class="mb-6 p-4 bg-green-600 bg-opacity-70 text-green-100 rounded-lg shadow-inner text-center">
            Profil başarıyla güncellendi.
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('PATCH')

        <div>
            <label for="name" class="block font-semibold mb-2">İsim</label>
            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full rounded-lg p-3 bg-white/20 border border-white/30 placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-pink-500"
                required>
        </div>

        <div>
            <label for="email" class="block font-semibold mb-2">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full rounded-lg p-3 bg-white/20 border border-white/30 placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-pink-500"
                required>
        </div>

        <button type="submit"
            class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold rounded-lg py-3 transition duration-300">
            Güncelle
        </button>
    </form>
</div>

{{-- Şifre Değiştir Formu --}}
<div class="max-w-xl mx-auto mt-12 bg-white/10 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white/20 text-white">

    <h2 class="text-3xl font-extrabold mb-6 text-center drop-shadow-lg">Şifreni Değiştir</h2>

    @if (session('status') === 'password-updated')
        <div class="mb-6 p-4 bg-green-600 bg-opacity-70 text-green-100 rounded-lg shadow-inner text-center">
            Şifren başarıyla değiştirildi.
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="current_password" class="block font-semibold mb-2">Mevcut Şifre</label>
            <input id="current_password" type="password" name="current_password"
                class="w-full rounded-lg p-3 bg-white/20 border border-white/30 placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-pink-500"
                required autocomplete="current-password" />
        </div>

        <div>
            <label for="password" class="block font-semibold mb-2">Yeni Şifre</label>
            <input id="password" type="password" name="password"
                class="w-full rounded-lg p-3 bg-white/20 border border-white/30 placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-pink-500"
                required autocomplete="new-password" />
        </div>

        <div>
            <label for="password_confirmation" class="block font-semibold mb-2">Yeni Şifre (Tekrar)</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="w-full rounded-lg p-3 bg-white/20 border border-white/30 placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-pink-500"
                required autocomplete="new-password" />
        </div>

        <button type="submit"
            class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold rounded-lg py-3 transition duration-300">
            Şifreyi Güncelle
        </button>
    </form>
</div>

@endsection
