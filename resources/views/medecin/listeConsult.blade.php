@extends('medecin.accueil')
@section('content')
<h1 style="color:darkblue" class="text-primary"><span class="bi bi-file-text-fill">&nbsp;</span>Consultation <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">Liste</span></h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between" style="border-top:4px solid #a10909">
                    <h3>Liste des Consultations</h3>
                </div>
                    <div class="card-body">
                   
                    <table id="example" class=" table  table-striped  " style=" background: white; border: 0px; width:100%"> 
                        <thead>
                          <tr>
                            <th scope="col">Patient</th>
                            <th scope="col">Date consultation</th>
                            <th scope="col">Décision</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($consult as $cons)
                                <tr>
                                    <td>{{$cons->patient->prenom}} {{$cons->patient->nom}}</td>
                                    <td>{{$cons->dateConsultation}}</td>
                                    <td>{{$cons->decision}}</td>
                                    
                                    <td>
                                       
                                        <a href="{{route('medecin.modifCons',$cons->id)}}" class="btn btn-primary"><span class="bi bi-pencil-square"></span></a>
                                        <a href="{{route('medecin.detailCons',$cons->id)}}" class="btn btn-success " ><span class="bi bi-eye"></span></a>
                                        <a href="{{route('medecin.supcons',$cons->id)}}" class="btn btn-danger " ><span class="fa fa-trash"></span></a>

                                        
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
