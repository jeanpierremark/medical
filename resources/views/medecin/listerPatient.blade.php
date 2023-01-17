
@extends('medecin.accueil')

@section('content')
<h1 style="color:darkblue"><span class="fa fa-user">&nbsp;</span> Patients <span class="breadcrumb-item text-secondary small" style="font-size: 15px; "> Liste</span></h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center justify-content-between" style="border-top:2px solid #37c7cd">
                    <h2>Liste des patient</h2>
                </div>
                    <div class="card-body">
                   
                    <table id="example" class=" table  table-striped  " style=" background: white; border: 0px; width:100%"> 
                        <thead>
                          <tr>
                            <th scope="col">N° Dossier</th>
                            <th scope="col">nom</th>
                            <th scope="col">prenom</th>
                            <th scope="col">adresse</th>
                            <th scope="col">telephone</th>
                            <th scope="col">niveau</th>
                            <th scope="col">âge</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{$patient->id}}{{$patient->idAn}} </td>
                                    <td>{{$patient->nom}}</td>
                                    <td>{{$patient->prenom}}</td>
                                    <td>{{$patient->adresse}}</td>
                                    <td>{{$patient->telephone}}</td>
                                    <td>{{$patient->niveauEtude}}</td>
                                    <td>{{$patient->age}}</td>
                                    <td>
                                        <a href="" class="btn btn-primary" ><span class="bi bi-eye text-light"></span></a>
                                        <a href="{{route('medecin.getrendezVous')}}" class="btn btn-warning"><span class="fa fa-calendar-alt"></span></a>
                                        <a href="" class="btn " style="background-color:#37c7cd"><span class="bi bi-file-text-fill text-light"></span></a>

                                        
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

