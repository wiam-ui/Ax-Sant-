<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class contenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'tension',
        'poids',
        'taille',
        'temperature',
        'sexe',
        'rapport',
        'consultation_id',
    ];

    public function consultations()
    {
        return $this->hasMany(consultation::class);
    }
}
