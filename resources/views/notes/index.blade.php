@extends('layouts.app')

@section('content')
<main class="max-w-7xl mx-auto mt-12 px-4 sm:px-6 lg:px-8">

    <!-- Sayfa Başlığı ve Yeni Not Butonu -->
    <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-12 gap-4">
      <h1 class="text-4xl font-extrabold drop-shadow-lg text-white">Notlarım</h1>
      <a href="{{ route('notes.create') }}"
         class="inline-block px-6 py-3 bg-pink-500 hover:bg-pink-600 rounded-lg font-semibold shadow-lg transition duration-300 text-white text-center">
        Yeni Not Oluştur
      </a>
    </header>

    <!-- Notlar Listesi -->
    <section aria-label="Notlar Listesi" class="space-y-8">

      <!-- Eğer not yoksa -->
      @if($notes->isEmpty())
        <div class="bg-white/10 backdrop-blur-md rounded-3xl p-12 shadow-lg border border-white/20 text-center text-purple-200 max-w-3xl mx-auto">
          Henüz hiç notunuz yok. Hemen yeni bir not oluşturabilirsiniz!
        </div>
      @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

          <!-- Not Kartları Döngüsü -->
          @foreach($notes as $note)
            <article class="bg-white/10 backdrop-blur-md rounded-3xl p-6 shadow-lg border border-white/20 hover:scale-[1.02] transform transition-transform duration-300 flex flex-col justify-between"
                     tabindex="0" aria-label="Not: {{ $note->title }}">
              <header>
                <h2 class="text-2xl font-bold mb-2 text-pink-400 truncate">{{ $note->title }}</h2>
                <time datetime="{{ $note->created_at->toDateString() }}" class="text-purple-300 text-sm italic">{{ $note->created_at->format('d M Y') }}</time>
              </header>
              <p class="text-purple-200 mt-4 flex-grow leading-relaxed">
                {{ Str::limit($note->content, 120, '...') }}
              </p>
              <footer class="mt-6 flex justify-between items-center">
                @can('view', $note)
                <a href="{{ route('notes.show', $note->id) }}"
                   class="text-pink-500 hover:text-pink-600 font-semibold transition duration-200">
                  Detayları Gör
                </a>
                @endcan

                <div class="space-x-3">
                  <a href="{{ route('notes.edit', $note->id) }}"
                     class="text-purple-300 hover:text-pink-500 transition duration-200">
                    ✏️
                  </a>

                  <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Bu notu silmek istediğinize emin misiniz?')"
                            class="text-purple-300 hover:text-red-500 transition duration-200">
                      ❌
                    </button>
                  </form>
                </div>
              </footer>
            </article>
          @endforeach
        </div>

        <!-- Sayfalama -->
        <nav aria-label="Sayfalama" class="mt-12 flex justify-center text-white">
          {{ $notes->links('pagination::tailwind') }}
        </nav>
      @endif

    </section>
</main>
@endsection
