<?php

namespace App\Http\Controllers;
use App\Models\Consultation;
use App\Models\Medicament;

use Illuminate\Http\Request;

class TraitementController extends Controller
{

public function ajouterTraitementAuto()
{
    // Supposons que tu veux ajouter pour :
    $consultationId = 1; // ID de la consultation existante
    $medicamentId = 5;   // ID du médicament existant

    // Vérifie que les deux existent
    $consultation = Consultation::find($consultationId);
    $medicament = Medicament::find($medicamentId);

    if ($consultation && $medicament) {
        // Ajouter automatiquement dans traitement
        $consultation->medicaments()->attach($medicament->id, [
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return "Traitement ajouté automatiquement.";
    } else {
        return "Consultation ou Médicament introuvable.";
    }
}

}
