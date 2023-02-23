@extends('secretaire.accueil')
@section('content')
<h1 style="color:darkblue" class="text-primary"><span class="fa fa-user">&nbsp;</span>Patients <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">Liste</span></h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between  text-primary" style="border-top:4px solid #074b99">
                    <h3>Liste des patients <span style="padding-left: 660px;"><a href="{{route('secretaire.ajouterPatient')}}" class="btn btn-success btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-user-plus"></i>
                                        </span>
                                        <span class="text">Ajouter un patient </span>
                                    </a></span></h3>
                    
                </div> 
                    <div class="card-body">
                   
                    <table id="example" class=" table  table-striped  " style=" background: white; border: 0px; width:100%"> 
                        <thead>
                          <tr>
                            <th scope="col">N° dossier</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Niveau</th>
                            <th scope="col">Age</th>
                            <th scope="col">Profession</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{$patient->id}} /{{$patient->idAn}}</td>
                                    <td>{{$patient->nom}}</td>
                                    <td>{{$patient->prenom}}</td>
                                    <td>{{$patient->adresse}}</td>
                                    <td>{{$patient->telephone}}</td>
                                    <td>{{$patient->niveauEtude}}</td>
                                    <td>{{$patient->age}}</td>
                                    <td>{{$patient->profession}}</td>
                                    <td>
                                        <a href="{{route('editer',$patient->id)}}" class="btn btn-warning"><span class="bi bi-pencil-square"></span></a>
                                        <a href="{{route('secretaire.getrendezVous',$patient->id)}}" class="btn btn-info"><span class="fa fa-calendar-alt"></span></a>
                                        <a href="{{route('secretaire.supprimer', $patient->id)}}" onclick="return confirm('Voulez-vous supprimer?')" class="btn btn-danger"><span class="fa fa-trash"></span></a>                          
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
