@extends('layouts.app')

@section('title', 'Şifre Sıfırla')

@section('content')
  <section class="bg-white/10 backdrop-blur-md rounded-3xl p-10 shadow-lg border border-white/20 max-w-md mx-auto mt-20 text-white">
    <h2 class="text-3xl font-extrabold text-center mb-6">Yeni Şifre Belirle</h2>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
      @csrf

      <!-- Gizli Token -->
      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <!-- Email -->
      <div>
        <x-input-label for="email" :value="__('Email')" class="text-white font-semibold" />
        <x-text-input
          id="email"
          type="email"
          name="email"
          :value="old('email', $request->email)"
          required
          autofocus
          autocomplete="username"
          class="block w-full rounded border border-white/30 bg-white/10 placeholder-white/70 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition"
          placeholder="Email adresinizi girin"
        />
        <x-input-error :messages="$errors->get('email')" class="mt-1 text-pink-400 text-sm" />
      </div>

      <!-- Yeni Şifre -->
      <div>
        <x-input-label for="password" :value="__('Yeni Şifre')" class="text-white font-semibold" />
        <x-text-input
          id="password"
          type="password"
          name="password"
          required
          autocomplete="new-password"
          class="block w-full rounded border border-white/30 bg-white/10 placeholder-white/70 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition"
          placeholder="Yeni şifre girin"
        />
        <x-input-error :messages="$errors->get('password')" class="mt-1 text-pink-400 text-sm" />
      </div>

      <!-- Şifre Onayı -->
      <div>
        <x-input-label for="password_confirmation" :value="__('Şifreyi Onayla')" class="text-white font-semibold" />
        <x-text-input
          id="password_confirmation"
          type="password"
          name="password_confirmation"
          required
          autocomplete="new-password"
          class="block w-full rounded border border-white/30 bg-white/10 placeholder-white/70 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition"
          placeholder="Şifreyi tekrar girin"
        />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-pink-400 text-sm" />
      </div>

      <!-- Submit Butonu -->
      <div>
        <button
          type="submit"
          class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-lg shadow transition"
        >
          Şifreyi Sıfırla
        </button>
      </div>
    </form>
  </section>
@endsection
