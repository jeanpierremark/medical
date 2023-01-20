@extends('admin.dashboard')
@section('content')

<span style="marging-left: 70%;"><a class="btn btn-success p-3 mb-2 fa fa-user-plus"  href="{{route('admin.medecin.ajouterMedecin')}}">&nbsp;Ajouter Médecin</a></span>
            <span style="marging-left: 30%;"><a class="btn btn-success p-3 mb-2 fa fa-user-plus"  href="{{route('ajouterSec')}}">&nbsp;Ajouter secreaitre</a></span>
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header justify-content-between">
                    <h2 class="text-center">Liste des utilisateurs</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">username</th>
                                <th scope="col">nom</th>
                                <th scope="col">prenom</th>
                                <th scope="col">adresse</th>
                                <th scope="col">telephone</th>
                                <th scope="col">email</th>
                                <th scope="col">role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $util)
                                <tr>
                                    <td>{{ $util->id }}</td>
                                    <td>{{ $util->name }}</td>
                                    <td>{{ $util->nom }}</td>
                                    <td>{{ $util->prenom }}</td>
                                    <td>{{ $util->adresse }}</td>
                                    <td>{{ $util->telephone }}</td>
                                    <td>{{ $util->email }}</td>
                                    <td>{{ $util->role }}</td>
                                    <td>
                                        <a href="{{ route('admin.medecin.editer',$util->id) }}" class="btn btn-primary"><span class="bi bi-pencil-square"></span></a>
                                        <a href="{{ route('admin.medecin.supprimer',$util->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Voulez-vous supprimmer ?')"
                                            class="btn btn-danger"><span class="fa fa-trash"></span></a>

                                        <a href="" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <span class="fa fa-share-square"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>



@endsection
