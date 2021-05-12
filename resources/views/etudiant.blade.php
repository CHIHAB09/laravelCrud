@extends("layouts.app")

@section("content")

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h4 class="border-bottom pb-2 mb-4">Liste des etudiants inscrits</h4>
    <div class="mt-4">


    <div class="d-flex justify-content-between mb-4">
    {{ $etudiants->links() }}
    <div><a href="{{ route('etudiant.create') }}" class="btn btn-primary">Ajouter un nouvel étudiant</a></div>
    </div>
    
    <!-- affichage des messages -->
    @if (session()->has('message'))
        <div>
            <p class="alert alert-success">
                {{ session()->get('message') }}
            </p>
        </div>
   <!--  @elseif (session()->has('messageDelete'))
    <div>
            <p class="alert alert-danger">
                {{ session()->get('messageDelete') }}
            </p>
        </div> -->
    @endif
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
                            <!-- ICI ON RECUPERE L ELEMENT A SUPPRIMER AVEC DU JS POUR ETRE SUR QUE L UTILISATEUR VEULENT SUPPRIMER -->
                            <a href="" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet étudiant?{{ $etudiant->nom }}'))
                            {document.getElementById('form-{{ $etudiant->id }}').submit() }">Supprimer</a>

                            <form id="form-{{ $etudiant->id }}" action="{{ route('etudiant.delete', 
                            ['etudiant' => $etudiant->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

@endsection