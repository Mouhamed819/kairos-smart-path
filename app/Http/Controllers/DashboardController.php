<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use App\Models\Groupe;
use App\Models\Ressource;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notes = Note::where('user_id', $user->id)->get();

        $totalCoeff = 0;
        $totalPoints = 0;
        foreach ($notes as $note) {
            $totalCoeff += $note->coefficient;
            $totalPoints += $note->note * $note->coefficient;
        }
        $moyenne = $totalCoeff > 0 ? round($totalPoints / $totalCoeff, 2) : 0;
        $score = round(($moyenne / 20) * 100);

        $groupes = Groupe::latest()->take(3)->get();
        $ressources = Ressource::latest()->take(3)->get();

        return view('dashboard', compact('notes', 'moyenne', 'score', 'groupes', 'ressources'));
    }
}