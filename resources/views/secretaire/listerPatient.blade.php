@extends('secretaire.dashboard')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h2>Liste des patient</h2>
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
                            <th scope="col">nom</th>
                            <th scope="col">prenom</th>
                            <th scope="col">adresse</th>
                            <th scope="col">telephone</th>
                            <th scope="col">niveau d'étude</th>
                            <th scope="col">âge</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{$patient->id}}</td>
                                    <td>{{$patient->nom}}</td>
                                    <td>{{$patient->prenom}}</td>
                                    <td>{{$patient->adresse}}</td>
                                    <td>{{$patient->telephone}}</td>
                                    <td>{{$patient->niveauEtude}}</td>
                                    <td>{{$patient->age}}</td>
                                    <td>
                                        <a href="{{route('editer',$patient->id)}}" class="btn btn-primary">update</a>
                                        <a href="" onclick="return confirm('Voulez-vous supprimmer ?')" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>

            </div>
        </div>
    </div>
</div>
@endsection
