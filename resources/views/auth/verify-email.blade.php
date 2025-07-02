@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-20 bg-white/10 backdrop-blur-md rounded-3xl shadow-lg border border-white/20 p-8 text-white text-center">
    <h1 class="text-2xl font-bold mb-4">Email Doğrulama</h1>
    <p class="mb-6">Devam etmeden önce, email adresinize gönderilen bağlantıya tıklayarak doğrulamanızı rica ediyoruz.</p>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 p-4 bg-green-600 bg-opacity-70 text-green-100 rounded shadow-inner">
            Yeni bir doğrulama bağlantısı e-mail adresinize gönderildi.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="inline-block">
        @csrf
        <button type="submit" class="bg-pink-500 hover:bg-pink-600 px-6 py-2 rounded-lg text-white font-semibold shadow transition">
            Doğrulama Linkini Tekrar Gönder
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="mt-6">
        @csrf
        <button type="submit" class="text-sm underline text-white hover:text-pink-400">
            Çıkış Yap
        </button>
    </form>
</div>
@endsection

