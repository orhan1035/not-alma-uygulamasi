@extends('layouts.app')

@section('content')

@push('styles')
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
    }
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }
    ::-webkit-scrollbar-thumb {
      background: #d53f8c;
      border-radius: 4px;
    }
    ::-webkit-scrollbar-track {
      background: transparent;
    }
  </style>
@endpush

<main class="bg-gradient-to-br from-purple-900 via-indigo-800 to-blue-900 min-h-screen p-4 text-white">


  <!-- Main container -->
  <section class="max-w-7xl mx-auto mt-12 space-y-32 px-4 sm:px-6 lg:px-8">

    <!-- Hero -->
    <section aria-label="Giriş" class="text-center max-w-4xl mx-auto space-y-6">
      <h1 class="text-5xl font-extrabold tracking-tight drop-shadow-lg">
        Notlarınızı Düzenlemenin Yeni Yolu
      </h1>
      <p class="text-purple-200 text-lg max-w-3xl mx-auto leading-relaxed">
        MyNotes ile fikirlerinizi kolayca kaydedin, düzenleyin ve her zaman yanınızda taşıyın. Modern, hızlı ve güvenli not uygulaması!
      </p>
      <a href="{{ route('notes.index') }}" class="inline-block mt-4 px-8 py-3 bg-pink-500 hover:bg-pink-600 rounded-lg font-semibold shadow-lg transition duration-300">
        Hemen Başla
      </a>
    </section>

    <!-- Özellikler -->
    <section aria-label="Özellikler" class="max-w-6xl mx-auto space-y-20">
      <h2 class="text-4xl font-extrabold text-center drop-shadow-lg mb-12">MyNotes Özellikleri</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
        @foreach([
          ['icon' => 'M12 4v16m8-8H4', 'title' => 'Kolay Not Oluşturma', 'desc' => 'Basit ve hızlı not ekleme arayüzü ile her an fikirlerinizi kaydedin.'],
          ['icon' => 'M5 13l4 4L19 7', 'title' => 'Güvenli ve Erişilebilir', 'desc' => 'Notlarınız güvende, istediğiniz cihazdan kolayca erişin.'],
          ['icon' => 'M9 12h6m-3 -3v6', 'title' => 'Modern Tasarım', 'desc' => 'Şık ve kullanımı kolay arayüz, her cihazda mükemmel uyum.'],
        ] as $feature)
        <article class="bg-white/10 backdrop-blur-md rounded-2xl p-10 shadow-lg border border-white/20 hover:scale-[1.03] transform transition-transform duration-300" tabindex="0">
          <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6 h-20 w-20 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['icon'] }}" />
          </svg>
          <h3 class="text-3xl font-bold mb-3">{{ $feature['title'] }}</h3>
          <p class="text-purple-200 leading-relaxed text-center">{{ $feature['desc'] }}</p>
        </article>
        @endforeach
      </div>
    </section>

    <!-- Nasıl Çalışır -->
    <section aria-label="Nasıl Çalışır?" class="max-w-6xl mx-auto space-y-16 text-white">
      <h2 class="text-4xl font-extrabold text-center mb-12 drop-shadow-lg">MyNotes Nasıl Çalışır?</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        @foreach([
          'Hesap Oluştur' => 'Ücretsiz kaydolun ve notlarınızı hemen oluşturmaya başlayın.',
          'Notlarınızı Ekleyin' => 'Her türlü notunuzu hızlıca ve kolayca oluşturun.',
          'Notlarınızı Düzenleyin' => 'Notlarınızı kolayca düzenleyin, silebilir veya güncelleyebilirsiniz.',
        ] as $title => $desc)
        <div class="flex flex-col items-center bg-white/10 backdrop-blur-md rounded-2xl p-10 shadow-lg border border-white/20 hover:scale-[1.02] transition">
          <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-pink-500 text-white font-bold text-2xl mb-6">{{ $loop->iteration }}</div>
          <h3 class="text-2xl font-semibold mb-3">{{ $title }}</h3>
          <p class="text-purple-200 text-center max-w-xs">{{ $desc }}</p>
        </div>
        @endforeach
      </div>
    </section>

    <!-- Kullanıcı Yorumları -->
    <section class="max-w-6xl mx-auto mt-24 px-6 text-white">
      <h2 class="text-4xl font-extrabold text-center mb-16 drop-shadow-lg">Kullanıcı Yorumları</h2>
      <div class="space-y-16">
        @foreach([
          ['name' => 'Ayşe K.', 'desc' => 'Uzun süredir kullanıyorum, tavsiye ederim!', 'text' => 'Bu uygulama sayesinde notlarımı düzenlemek hiç bu kadar kolay olmamıştı.'],
          ['name' => 'Mehmet T.', 'desc' => 'Öğrenciler için ideal bir not uygulaması.', 'text' => 'Not alma alışkanlığımı bu uygulama sayesinde kazandım.'],
          ['name' => 'Selin A.', 'desc' => 'İş hayatımı kolaylaştırdı.', 'text' => 'Mobil ve masaüstü sürümünde harika çalışıyor.'],
        ] as $review)
        <div class="bg-white/10 backdrop-blur-md rounded-3xl p-10 shadow-lg border border-white/20 max-w-4xl mx-auto">
          <p class="text-purple-100 italic mb-8 text-center leading-relaxed text-lg">"{{ $review['text'] }}"</p>
          <div class="text-center text-purple-300 font-semibold text-xl">{{ $review['name'] }}</div>
          <div class="text-center text-purple-400 text-sm mt-1">{{ $review['desc'] }}</div>
        </div>
        @endforeach
      </div>
    </section>

    <!-- SSS -->
    <section class="max-w-5xl mx-auto mt-32 text-white">
      <h2 class="text-4xl font-extrabold text-center mb-16 drop-shadow-lg">Sıkça Sorulan Sorular</h2>
      <div class="space-y-6 max-w-3xl mx-auto">
        @foreach([
          'MyNotes uygulaması ücretsiz mi?' => 'Evet, MyNotes temel özellikler ile tamamen ücretsizdir.',
          'Notlarımı başka cihazlarda da görebilir miyim?' => 'Evet, notlarınız bulutta güvenle saklanır.',
          'Notlarımı silebilir veya düzenleyebilir miyim?' => 'Evet, istediğiniz zaman düzenleyebilir ya da silebilirsiniz.',
          'Hesabımı nasıl silebilirim?' => 'Ayarlar bölümünden silebilir veya destek ekibine ulaşabilirsiniz.',
        ] as $q => $a)
        <details class="bg-white/10 backdrop-blur-md rounded-xl p-6 border border-white/20 shadow-lg cursor-pointer">
          <summary class="text-xl font-semibold cursor-pointer select-none">{{ $q }}</summary>
          <p class="mt-3 text-purple-200 leading-relaxed">{{ $a }}</p>
        </details>
        @endforeach
      </div>
    </section>

    <!-- İletişim -->
    <section class="max-w-5xl mx-auto mt-32 text-white">
      <h2 class="text-4xl font-extrabold text-center mb-16 drop-shadow-lg">Bizimle İletişime Geçin</h2>
      <form action="#" method="POST" class="max-w-3xl mx-auto space-y-6 bg-white/10 backdrop-blur-md rounded-3xl p-10 border border-white/20 shadow-lg">
        <div>
          <label for="name" class="block text-purple-200 font-semibold mb-2">Adınız</label>
          <input type="text" id="name" name="name" required class="w-full p-3 rounded-lg bg-transparent border border-purple-400 focus:border-pink-500 text-white placeholder-purple-400 outline-none transition" placeholder="Adınızı girin" />
        </div>
        <div>
          <label for="email" class="block text-purple-200 font-semibold mb-2">E-posta Adresiniz</label>
          <input type="email" id="email" name="email" required class="w-full p-3 rounded-lg bg-transparent border border-purple-400 focus:border-pink-500 text-white placeholder-purple-400 outline-none transition" placeholder="E-posta adresinizi girin" />
        </div>
        <div>
          <label for="message" class="block text-purple-200 font-semibold mb-2">Mesajınız</label>
          <textarea id="message" name="message" rows="5" required class="w-full p-3 rounded-lg bg-transparent border border-purple-400 focus:border-pink-500 text-white placeholder-purple-400 outline-none transition" placeholder="Mesajınızı yazın"></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="inline-block px-10 py-3 bg-pink-500 hover:bg-pink-600 rounded-lg font-semibold shadow-lg transition duration-300">Gönder</button>
        </div>
      </form>
    </section>

    <!-- Footer -->
    <footer class="mt-32 text-center text-purple-300 text-sm">
      &copy; 2025 MyNotes. Tüm hakları saklıdır.
    </footer>

  </section>
</main>

@endsection
