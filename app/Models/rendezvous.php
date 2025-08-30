<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RendezVous extends Model
{
    use HasFactory;

    protected $table = 'rendezvous';  // ← C'est important vu le nom exact de ta table
    protected $fillable = ['heure', 'date', 'etat', 'patient_id', 'medecin_id'];

    public function medecin() {
        return $this->belongsTo(Medecin::class);
    }

    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}

