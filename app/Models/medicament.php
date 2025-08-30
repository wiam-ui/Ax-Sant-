<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class medicament extends Model
{
    use HasFactory;

    protected $fillable = ['nom','prexcription', 'quantite'];

    public function consultations()
    {
        return $this->belongsToMany(Consultation::class, 'traitement')
                ->withTimestamps();
    }
}
