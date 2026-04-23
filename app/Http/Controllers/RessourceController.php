<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RessourceController extends Controller
{
    public function create()
    {
        return view('ressources.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre'       => 'required|string',
            'matiere'     => 'required|string',
            'type'        => 'required|string',
            'fichier_url' => 'required|string',
        ]);

        Ressource::create([
            'titre'       => $request->titre,
            'matiere'     => $request->matiere,
            'type'        => $request->type,
            'fichier_url' => $request->fichier_url,
            'user_id'     => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Ressource ajoutée !');
    }
}
