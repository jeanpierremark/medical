
@extends('medecin.accueil')

@section('content')
<h1 style="color:darkblue"><span class="fa fa-user">&nbsp;</span> Patients <span class="breadcrumb-item text-secondary small" style="font-size: 15px; "> Liste</span></h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center justify-content-between" style="border-top:4px solid #37c7cd">
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
                            @foreach ($oriente as $p)
                                <tr>
                                    <td>{{$p->patient->id}} /{{$p->patient->idAn}} </td>
                                    <td>{{$p->patient->nom}}</td>
                                    <td>{{$p->patient->prenom}}</td>
                                    <td>{{$p->patient->adresse}}</td>
                                    <td>{{$p->patient->telephone}}</td>
                                    <td>{{$p->patient->niveauEtude}}</td>
                                    <td>{{$p->patient->age}}</td>
                                    <td>
                                       
                                        <a href="{{route('medecin.getrendezVous',$p->patient->id)}}" class="btn btn-warning"><span class="fa fa-calendar-alt"></span></a>
                                        <a href="{{route('medecin.addconsultation',$p->patient->id)}}" class="btn btn-info " ><span class="bi bi-file-text-fill text-light"></span></a>

                                        
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>