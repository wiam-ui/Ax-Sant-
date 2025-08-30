<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient;
use App\Models\medecin;
use App\Models\Consultation;
use App\Models\contenu;
use App\Models\User;
use App\Models\medicament;
use App\Models\feedback;
use App\Models\traitement;


use App\Models\rendezvous;


class AdminController extends Controller
{
    // crud patient
    public function create() {
        $data=patient::all();
        return view("admin.patient",compact('data'));
    }

    // crud medecin

    public function index() {
        $data=medecin::all();
        return view("admin.medecin",compact('data'));
    }

    public function ajouter(request $request) {
        $medecin = new medecin ;
        $medecin->nom = $request->nom;
        $medecin->prenom = $request->prenom;
        $medecin->specialiste = $request->specialiste;

        $medecin->save();
        flash()->success('medecin est ajouté avec succès');
        return redirect()->back();
    }

    public function edit_medecin($id) {
        $data = medecin::find($id);
       return view('admin.edit_medecin', compact('data'));
    }

    public function update_medecin(Request $request, $id) {
        $data=medecin::find($id);
        $data -> nom = $request->nom;
        $data -> prenom = $request->prenom;
        $data -> specialiste = $request->specialiste;

        $data  -> save();
        flash()->success('medecin est modifie avec succès');
        return redirect('/medecin');
    }

    public function supprimer($id) {
        $data = medecin::find($id);
        $data->delete();
        return redirect()->back();
    }

    // crud consultation
    public function affiche() {
        $data=consultation::all();
        return view("admin.consultation",compact('data'));
    }

    public function add_consultation(request $request) {
        $consultation = new consultation ;
        $consultation->prix = $request->prix;
        $consultation->Etat = $request->Etat;
        $consultation->type = $request->type;
        $consultation->patient_id = $request->patient_id;
        $consultation->medecin_id = $request->medecin_id;
        $consultation->save();

        $medicamentId = 5;
        $consultation->medicaments()->attach($medicamentId);

        flash()->success('consultation est ajouté avec succès');
        return redirect()->back();
    }

    public function edit_consultation($id) {
        $data = consultation::find($id);
       return view('admin.edit_consultation', compact('data'));
    }

    public function update_consultation(Request $request, $id) {
        $data=consultation::find($id);
        $data -> prix = $request->prix;
        $data -> type = $request->type;
        $data -> patient_id = $request->patient_id;
        $data -> medecin_id = $request->medecin_id;
        $data  -> save();
        flash()->success('consultation est modifie avec succès');
        return redirect('/consultation');
    }

    public function delete_consultation($id) {
        $data = consultation::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function changerEtat($id, Request $request) {
        $consultation = Consultation::find($id);

        if ($consultation) {
            $consultation->Etat = $request->etat;  // Assure-toi que le champ correspond bien à ta colonne.
            $consultation->save();

            flash()->success('consultation est modifie avec succès');
            return redirect()->back();
        }

        flash()->error('error, Consultation non trouvée');
        return redirect()->back();
    }


    // crud contenu
    public function affiche_contenu() {
        $data=contenu::all();
        return view("admin.contenu",compact('data'));
    }

    public function add_contenu(request $request) {
        $contenu = new contenu ;
        $contenu->tension = $request->tension;
        $contenu->poids = $request->poids;
        $contenu->taille = $request->taille;
        $contenu->temperature= $request->temperature;
        $contenu->sexe = $request->sexe;
        $contenu->rapport= $request->rapport;
        $contenu->consultation_id = $request->consultation_id;

        $contenu->save();
        flash()->success('contenu est ajouté avec succès');
        return redirect()->back();
    }

    public function edit_contenu($id) {
        $data = contenu::find($id);
       return view('admin.edit_contenu', compact('data'));
    }

    public function update_contenu(Request $request, $id) {
        $data=contenu::find($id);
        $data -> tension = $request->tension;
        $data -> poids = $request->poids;
        $data -> taille = $request->taille;
        $data -> temperature = $request->temperature;
        $data -> sexe = $request->sexe;
        $data -> rapport = $request->rapport;
        $data -> consultation_id = $request->consultation_id;

        $data  -> save();
        flash()->success('contenu est modifie avec succès');
        return redirect('/contenu');
    }

    public function delete_contenu($id) {
        $data = contenu::find($id);
        $data->delete();
        return redirect()->back();
    }


    // crud medicament
    public function affiche_medicament() {
        $data=medicament::all();
        return view("admin.medicament",compact('data'));
    }

    public function add_medicament(request $request) {
        $medicament = new medicament ;
        $medicament->nom = $request->nom;
        $medicament->prexcription = $request->prexcription;
        $medicament->quantite = $request->quantite;
        $medicament->save();
        flash()->success('medicamment est ajouté avec succès');
        return redirect()->back();
    }

    public function edit_medicament($id) {
        $data = medicament::find($id);
       return view('admin.edit_medicament', compact('data'));
    }

    public function update_medicament(Request $request, $id) {
        $data=medicament::find($id);
        $data -> nom = $request->nom;
        $data -> prexcription = $request->prexcription;
        $data -> quantite = $request->quantite;
        $data  -> save();
        flash()->success('medicament est modifie avec succès');
        return redirect('/medicament');
    }

    public function delete_medicament($id) {
        $data = medicament::find($id);
        $data->delete();
        return redirect()->back();
    }

    // crud contact
    public function create_feedback() {
        $feedbacks = Feedback::with('user')->latest()->get();
        return view("admin.feedback",compact('feedbacks'));
    }

    public function reply(Request $request, Feedback $feedback)
    {
        $request->validate([
            'reponse' => 'nullable|string|max:1000',
        ]);

        $feedback->update([
            'reponse' => $request->reponse,
        ]);

        flash()->success('reponse est envoye avec succès');
        return redirect()->back();
    }

    // crud rendezvous

    public function affiche_rendez() {
        $data=rendezvous::all();
        return view("admin.rendez",compact('data'));
    }

    public function changer($id, Request $request) {
        $rendez = rendezvous::find($id);

        if ($rendez) {
            $rendez->Etat = $request->etat;  // Assure-toi que le champ correspond bien à ta colonne.
            $rendez->save();

            flash()->success('consultation est modifie avec succès');
            return redirect()->back();
        }

        flash()->error('error, Consultation non trouvée');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $data= RendezVous::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }



}
