@extends('layouts.app')

@section('title', 'Şifre Sıfırlama - MyNotes')

@section('content')
  <section class="bg-white/10 backdrop-blur-md rounded-3xl p-10 shadow-lg border border-white/20 max-w-md mx-auto mt-20">
    <h2 class="text-3xl font-extrabold text-center mb-6 text-white">Şifreni Sıfırla</h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
      @csrf

      <!-- Email Address -->
      <div>
        <x-input-label for="email" :value="__('Email')" class="text-white font-semibold" />
        <x-text-input
          id="email"
          class="block w-full rounded border border-white/30 bg-white/10 placeholder-white/70 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition"
          type="email"
          name="email"
          :value="old('email')"
          required
          autofocus
          autocomplete="email"
          placeholder="Email adresinizi girin"
        />
        <x-input-error :messages="$errors->get('email')" class="mt-1 text-pink-400 text-sm" />
      </div>

      <!-- Submit Button -->
      <div>
        <button
          type="submit"
          class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-lg shadow transition"
        >
          Şifre Sıfırlama Linki Gönder
        </button>
      </div>
    </form>

    <div class="mt-6 text-center">
      <a href="{{ route('login') }}" class="text-sm text-pink-400 hover:text-pink-600 underline">
        Giriş sayfasına dön
      </a>
    </div>
  </section>
@endsection
