<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    
    public function index()
    {
        $etudiants = Etudiant::orderBy('nom', 'asc')->paginate(5);
        return view('etudiant', compact('etudiants'));
    }

    public function create()
    {
        $classes = Classe::all();
        return view('createEtudiant', compact('classes'));
    }
    /* la page create renvoie vers le store pour valider le formulaire */
    public function store(Request $request)
    {
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required"

            //Etudiant::create($request->all());
        ]);

        Etudiant::create([
            "nom" => $request->input('nom'),
            "prenom" => $request->input('prenom'),
            "classe_id" => $request->classe_id
        ]);
        return redirect('etudiant')
                ->with('message',"L'étudiant ajouter avec succés!!");
    }

    public function delete($etudiant)
    {
        Etudiant::find($etudiant)
                ->delete();

        return redirect('etudiant')
            ->with('message',"Etudiant supprimer avec succés!!");
    }
}
