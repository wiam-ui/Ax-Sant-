<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\patient;
use App\Models\medecin;
use App\Models\RendezVous;
use App\Mail\RendezvousMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class rendezvousController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'heure' => 'required|date_format:H:i',
            'date' => 'required|date',
            // 'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
        ]);

        $patient = Patient::where('user_id', Auth::id())->first();
        if (!$patient) {

            flash()->error('Vous devez créer votre profil.');
            return back();
        }

        $validated['patient_id'] = $patient->id;
        $validated['etat'] = 'en attente';

        $medecin = Medecin::findOrFail($request->medecin_id);

        $totalRdv = RendezVous::whereDate('date', $validated['date'])
        ->whereHas('medecin', function ($q) use ($medecin) {
            $q->where('specialiste', $medecin->specialiste);
        })->count();

        if ($totalRdv >= 30) {

            flash()->error('Ce jour-là, la spécialité du médecin a déjà atteint 30 rendez-vous.');
            return back();
        }

        $rdvExistant = RendezVous::where('heure', $validated['heure'])
            ->whereDate('date', $validated['date'])
            ->whereHas('medecin', function ($q) use ($medecin) {
             $q->where('specialiste', $medecin->specialiste);
        })->exists();

        if ($rdvExistant) {
            flash()->error('Il existe déjà un rendez-vous à cette heure pour cette spécialité.');
            return back();
        }


        RendezVous::create($validated);

        flash()->success('Rendez-vous est ajouté avec succès');
        return redirect()->back();
    }

}
