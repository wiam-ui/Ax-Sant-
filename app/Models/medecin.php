<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'specialiste',
    ];

    public function rendezVous() {
        return $this->hasMany(rendezvous::class);
    }

    public function consultations()
    {
        return $this->hasMany(consultation::class);
    }

    public function patient()
    {
        return $this->hasMany(patient::class);
    }
}

