<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    use AuthorizesRequests;

    // Notları listeler (dashboard)
    public function index()
    {
        $notes = Auth::user()->notes()->latest()->paginate(9);
        return view('notes.index', compact('notes'));
    }

    // Not oluşturma formu göster
    public function create()
    {
        return view('notes.create');
    }

    // Yeni notu kaydet
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'color' => 'nullable|string|max:20',
        ]);

        Auth::user()->notes()->create($validated);

        return redirect()->route('notes.index')->with('success', 'Notunuz başarıyla kaydedildi!');
    }

    // Not detayını göster
    public function show(Note $note)
    {
        $this->authorize('view', $note); // Yetki kontrolü

        return view('notes.show', compact('note'));
    }

    // Not düzenleme formu göster
    public function edit(Note $note)
    {
        $this->authorize('update', $note); // Güvenlik kontrolü

        return view('notes.edit', compact('note'));
    }

    // Notu güncelle
    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'color' => 'nullable|string|max:20',
        ]);

        $note->update($validated);

        return redirect()->route('notes.index')->with('success', 'Notunuz başarıyla güncellendi!');
    }

    // Not sil
    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);

        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Notunuz silindi!');
    }
}
