@extends("layouts.app")

@section("content")

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h4 class="border-bottom pb-2 mb-4">Liste des etudiants inscrits</h4>
    <div class="mt-4">
    <div class="d-flex justify-content-end mb-4">
        <a href="" class="btn btn-primary">Ajouter un nouvel étudiant</a>
    </div>
        <table class="table table-bordered table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <tbody>
                @foreach($etudiants as $etudiant)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>@if(isset($etudiant->classe->libelle) && !empty($etudiant->classe->libelle) ) 
                        {{ $etudiant->classe->libelle }}  
                        @else Pas encore de classe désigner...
                        @endif 
                        </td>
                        <td>
                            <a href="" class="btn btn-info">Detail</a>
                            <a href="" class="btn btn-warning">Editer</a>
                            <a href="" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{ $etudiants->links() }}
        </table>
    </div>
</div>

@endsection