<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\patient;
use App\Models\medecin;
use App\Models\consultation;
use App\Models\feedback;
use App\Models\RendezVous;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->get()->count();
        $patient = patient::all()->count();
        $consultation = consultation::all()->count();
        $medecin = medecin::all()->count();
        $feedback = feedback::all()->count();
        $rendezvous = RendezVous::all()->count();
        $todayConsultationCount = Consultation::whereDate('created_at', now())->count();

        return view('admin.index', compact('user', 'patient', 'consultation', 'medecin', 'feedback', 'todayConsultationCount', 'rendezvous'));
    }

    public function indexx()
    {
        $medecins = medecin::all();
        $patientC = patient::all()->count();
        $med = medecin::all()->count();
        $consultation = consultation::all()->count();
        $rendezvous = RendezVous::all()->count();
        return view('index', compact('patientC', 'medecins', 'med', 'consultation', 'rendezvous'));
    }

    public function create()
    {
        return view('user.profil');
    }

    //crud patient
    public function add(request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        patient::create($data);
        flash()->success('patient est ajouté avec succès');

        return redirect()->route('home');
    }

    public function info()
{
    $user = Auth::user();
    $data = $user->patient;

    if (!$data) {
        return redirect()->back()->with('error', 'Aucun patient associé à cet utilisateur.');
    }

    return view("user.information", compact('data'));
}


    public function edit($id)
    {
        $data = patient::find($id);
        return view('user.edit_patient', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = patient::find($id);
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->cin = $request->cin;
        $data->age = $request->age;
        $data->mutuelle = $request->mutuelle;
        $data->telephone = $request->telephone;
        $data->save();
        return redirect('/informations');
    }


    // feedback
    public function show()
    {
        $user = Auth::user();
        $feedbacks = Feedback::where('user_id', $user->id)->latest()->get();
        return view('user.feed', compact('feedbacks'));
    }

    public function destroyFeedback($id)
    {
        $feedbacks = feedback::find($id);
        $feedbacks->delete();
        return redirect()->back();
    }

    // Rendez-vous
    public function affiche_rendez()
    {
        $user = Auth::user();
        $patient = $user->patient;

        if (!$patient) {
            flash()->error('error', 'Aucun patient associé à cet utilisateur.');
            return redirect()->back();
        }

        $data = $patient->rendezVous;
        return view("user.reser", compact('data'));
    }

    public function destroy($id)
    {
        $data = RendezVous::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
}
