<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'cin',
        'age',
        'mutuelle',
        'telephone',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medecins()
    {
        return $this->belongsToMany(User::class);
    }

    public function rendezVous()
    {
        return $this->hasMany(rendezvous::class);
    }

    public function consultations()
    {
        return $this->hasMany(consultation::class);
    }

}
