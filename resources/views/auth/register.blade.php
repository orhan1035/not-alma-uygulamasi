@extends('layouts.app')

@section('title', 'Kayıt Ol - MyNotes')

@section('content')
  <section class="bg-white/10 backdrop-blur-md rounded-3xl p-10 shadow-lg border border-white/20 max-w-md mx-auto mt-20">
    <h2 class="text-3xl font-extrabold text-center mb-6 text-white">Kayıt Ol</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
      @csrf

      <!-- Name -->
      <div>
        <x-input-label for="name" :value="__('Name')" class="text-white font-semibold" />
        <x-text-input
          id="name"
          class="block w-full rounded border border-white/30 bg-white/10 placeholder-white/70 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition"
          type="text"
          name="name"
          :value="old('name')"
          required
          autofocus
          autocomplete="name"
          placeholder="Adınızı girin"
        />
        <x-input-error :messages="$errors->get('name')" class="mt-1 text-pink-400 text-sm" />
      </div>

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
          autocomplete="username"
          placeholder="Email adresinizi girin"
        />
        <x-input-error :messages="$errors->get('email')" class="mt-1 text-pink-400 text-sm" />
      </div>

      <!-- Password -->
      <div>
        <x-input-label for="password" :value="__('Password')" class="text-white font-semibold" />
        <x-text-input
          id="password"
          class="block w-full rounded border border-white/30 bg-white/10 placeholder-white/70 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition"
          type="password"
          name="password"
          required
          autocomplete="new-password"
          placeholder="Şifrenizi girin"
        />
        <x-input-error :messages="$errors->get('password')" class="mt-1 text-pink-400 text-sm" />
      </div>

      <!-- Confirm Password -->
      <div>
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white font-semibold" />
        <x-text-input
          id="password_confirmation"
          class="block w-full rounded border border-white/30 bg-white/10 placeholder-white/70 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition"
          type="password"
          name="password_confirmation"
          required
          autocomplete="new-password"
          placeholder="Şifrenizi tekrar girin"
        />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-pink-400 text-sm" />
      </div>

      <div class="flex items-center justify-between mt-4 text-white">
        <a
          class="underline text-sm hover:text-pink-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
          href="{{ route('login') }}">
          {{ __('Zaten kayıtlı mısınız?') }}
        </a>

        <x-primary-button class="bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 px-6 rounded-lg shadow transition">
          {{ __('Kayıt Ol') }}
        </x-primary-button>
      </div>
    </form>
  </section>
@endsection
