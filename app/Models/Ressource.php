<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'type',
        'matiere',
        'fichier_url',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}