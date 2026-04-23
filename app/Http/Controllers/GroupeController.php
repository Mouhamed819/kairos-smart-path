<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupeController extends Controller
{
    public function create()
    {
        return view('groupes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'       => 'required|string',
            'matiere'   => 'required|string',
            'type'      => 'required|string',
            'jour'      => 'required|date',
            'heure'     => 'required',
            'taille_max'=> 'required|integer|min:2',
        ]);

        Groupe::create([
            'nom'        => $request->nom,
            'matiere'    => $request->matiere,
            'type'       => $request->type,
            'jour'       => $request->jour,
            'heure'      => $request->heure,
            'taille_max' => $request->taille_max,
            'createur_id'=> Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Groupe créé !');
    }
}