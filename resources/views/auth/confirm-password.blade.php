@extends('layouts.app')

@section('title', 'Şifreyi Doğrula')

@section('content')
  <section class="bg-white/10 backdrop-blur-md rounded-3xl p-10 shadow-lg border border-white/20 max-w-md mx-auto mt-20 text-white">
    <h2 class="text-3xl font-extrabold text-center mb-6">Şifreni Doğrula</h2>

    <p class="text-center mb-6 text-purple-200">
      Lütfen devam etmeden önce şifrenizi onaylayın.
    </p>

    @if (session('status'))
      <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
      @csrf

      <!-- Password -->
      <div>
        <x-input-label for="password" :value="__('Password')" class="text-white font-semibold" />
        <x-text-input
          id="password"
          type="password"
          name="password"
          required
          autocomplete="current-password"
          class="block w-full rounded border border-white/30 bg-white/10 placeholder-white/70 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition"
          placeholder="Şifrenizi girin"
        />
        <x-input-error :messages="$errors->get('password')" class="mt-1 text-pink-400 text-sm" />
      </div>

      <div>
        <button
          type="submit"
          class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-lg shadow transition"
        >
          Şifreyi Onayla
        </button>
      </div>

      <div class="text-center">
        @if (Route::has('password.request'))
          <a class="underline text-sm text-purple-200 hover:text-white" href="{{ route('password.request') }}">
            Şifreni mi unuttun?
          </a>
        @endif
      </div>
    </form>
  </section>
@endsection
