<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'matiere'     => 'required|string',
            'note'        => 'required|numeric|min:0|max:20',
            'coefficient' => 'required|numeric|min:1',
            'absences'    => 'nullable|integer|min:0',
        ]);

        Note::create([
            'user_id'     => Auth::id(),
            'matiere'     => $request->matiere,
            'note'        => $request->note,
            'coefficient' => $request->coefficient,
            'absences'    => $request->absences ?? 0,
        ]);

        return redirect()->route('dashboard')->with('success', 'Note ajoutée !');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('dashboard')->with('success', 'Note supprimée !');
    }
}