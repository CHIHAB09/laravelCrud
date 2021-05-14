@extends("layouts.app")

@section("content")
<h4 class="border-bottom pb-2 mb-4">Fiche de l'étudiant:</h4>
<div class="container">
    <div class="row">
        <div class="col">
        {{ $etudiant->nom }}
        </div>
        <div class="col">
        {{ $etudiant->prenom }}
        </div>
        <div class="col">
        {{ $etudiant->classe->libelle}}
        </div>
    </div>
</div>

@endsection