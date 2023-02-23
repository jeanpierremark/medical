@extends('secretaire.accueil')
@section('content')
<h1 style="color:darkblue" class="text-primary"><span class="fa fa-calendar-alt  ">&nbsp;</span>Agenda <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">Rendez-vous</span></h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between" style="border-top:4px solid #a10909">
                    <h3>Liste des rendez-vous<span style="padding-left: 600px;"><a href="{{route('getevent')}}" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                        <span class="text">Voir le calendrier </span>
                                    </a></span></h3>
                </div>
                    <div class="card-body">
                   
                    <table id="example" class=" table  table-striped  " style=" background: white; border: 0px; width:100%"> 
                        <thead>
                          <tr>
                            <th scope="col">Patient</th>
                            <th scope="col">Date</th>
                            <th scope="col">Libellé</th>
                            <th scope="col">Service Santé</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($rdvs as $r)
                        @foreach ($service as $se)
                            @if($r->medecin_id == $se->id)
                                <tr>
                                    <td>{{$r->patient->prenom}} {{$r->patient->nom}}</td>
                                    <td>{{$r->date}}</td>
                                    <td>{{$r->libelle}}</td>
                                    <td>{{$se->specialite}}</td>
                                    <td>
                                       
                                        <a href="{{route('secretaire.editRV',$r->id)}}" class="btn btn-primary"><span class="bi bi-pencil-square"></span></a>
                                        <a href="{{route('secretaire.supprimerRv',$r->id)}}" onclick="return confirm('Voulez-vous supprimer?')" class="btn btn-danger " ><span class="fa fa-trash"></span></a>

                                        
                                    </td>
                                </tr>
                                @endif
                            @endforeach
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
