<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class consultation extends Model
{
    use HasFactory;

    protected $fillable = ['prix','Etat','type','patient_id','medecin_id',];

    public function medicaments()
    {
        return $this->belongsToMany(Medicament::class, 'traitement')
                ->withTimestamps();
    }

    public function medecin()
    {
        return $this->belongsTo(medecin::class);
    }

    public function contenu()
    {
        return $this->belongsTo(contenu::class);
    }

    public function patient()
    {
        return $this->belongsTo(patient::class);
    }

}
