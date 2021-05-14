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
    public function show($etudiant)
    {
        return view('showEtudiant')
            ->with('etudiant', Etudiant::where('id',$etudiant)->firstOrFail());
    }

    public function edit(Etudiant $etudiant)
    {
        $classes = Classe::all();
        return view('editEtudiant', compact('etudiant', 'classes'));
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

    public function update(Request $request ,Etudiant $etudiant)
    {
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required"

        ]);

        $etudiant->update([
            "nom" => $request->input('nom'),
            "prenom" => $request->input('prenom'),
            "classe_id" => $request->classe_id
        ]);
        return redirect('etudiant')
                ->with('message',"L'étudiant mis à jour avec succés!!");
    }

    public function delete($etudiant)
    {
        $nomComplet = $etudiant->nom ." " . $etudiant->prenom;
        Etudiant::find($etudiant)
                ->delete();

        return redirect('etudiant')
            ->with('message',"L'étudiant '$nomComplet' supprimer avec succés!!");
    }

    
}
