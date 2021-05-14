<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">EtudiantCrud</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="offcanvas" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Etudiant</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<!-- __________________________________________________________________________________________________________________ -->

  
<form method="POST" action="{{ route('etudiant.update', ['etudiant' => $etudiant->id])}}">
        @csrf
        <!-- on ecrase la methode du formulaire au dessus pour pouvoir editer les infos -->
        <input type="hidden" name="_method" value="put">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom étudiant</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prénom de l'étudiant</label>
                <input type="text" class="form-control"name="prenom">{{ $etudiant->prenom }}
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Classe</label>
                <select class="form-control"name="classe_id">{{ $etudiant->classe->libelle}}
                <option value=""></option>
                    @foreach ($classes as $classe)
                    @if($classe->id == $etudiant->classe_id)
                    <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                    @else
                    <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>
</div>