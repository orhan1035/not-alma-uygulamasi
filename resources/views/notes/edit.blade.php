@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto p-6 bg-white/10 backdrop-blur-md rounded-3xl shadow-lg border border-white/20 mt-12 text-white">

    <h1 class="text-3xl font-extrabold mb-6 text-center drop-shadow-lg">Notu Düzenle</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-700 bg-opacity-70 text-red-200 rounded-lg shadow-inner">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="mb-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notes.update', $note) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block font-semibold mb-2">Başlık</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="w-full rounded-lg border border-white/30 bg-white/10 placeholder-white/70 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition" 
                value="{{ old('title', $note->title) }}" 
                required
                placeholder="Not başlığını girin"
            >
        </div>

        <div>
            <label for="content" class="block font-semibold mb-2">İçerik</label>
            <textarea 
                name="content" 
                id="content" 
                rows="6" 
                class="w-full rounded-lg border border-white/30 bg-white/10 placeholder-white/70 text-white px-3 py-2 resize-y focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition" 
                required
                placeholder="Not içeriğini girin"
            >{{ old('content', $note->content) }}</textarea>
        </div>

        <div>
            <label for="color" class="block font-semibold mb-2">Renk (İsteğe bağlı)</label>
            <input 
                type="color" 
                name="color" 
                id="color" 
                class="w-16 h-10 p-1 rounded-lg border border-white/30 bg-white/10 cursor-pointer"
                value="{{ old('color', $note->color ?? '#3b82f6') }}"
            >
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('notes.index') }}" class="text-white hover:underline">Geri</a>
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                Güncelle
            </button>
        </div>
    </form>
</div>

@endsection
