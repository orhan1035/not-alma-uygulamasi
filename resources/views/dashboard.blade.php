<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 rounded-lg p-3 shadow-md">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-purple-900 via-indigo-800 to-blue-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <h3 class="text-white text-3xl font-bold text-center drop-shadow-lg">Notlarınız</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                @forelse($notes as $note)
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg border border-white/20 hover:scale-[1.03] transform transition-transform duration-300 cursor-pointer">
                    <h4 class="text-xl font-semibold mb-3 text-white">{{ $note->title }}</h4>
                    <p class="text-purple-200 leading-relaxed">{{ Str::limit($note->content, 120) }}</p>
                    <div class="mt-4 text-sm text-purple-300">
                        Oluşturulma: {{ $note->created_at->format('d.m.Y H:i') }}
                    </div>
                </div>
                @empty
                <p class="text-white col-span-full text-center">Henüz hiç notunuz yok.</p>
                @endforelse

            </div>

            <!-- Pagination -->
            <div class="mt-10 flex justify-center">
                {{ $notes->links('vendor.pagination.tailwind') }}
            </div>

        </div>
    </div>
</x-app-layout>

