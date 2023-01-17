@extends('secretaire.accueil')
@section('content')
<h1 style="color:darkblue"><span class="fa fa-calendar-alt">&nbsp;</span>Agenda <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">Rendez-vous</span></h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between" style="border-top:4px solid #a10909">
                    <h3>Liste des rendez-vous<span style="padding-left: 660px;"><a class="btn btn-warning fa fa-calendar-alt"  href="{{route('getevent')}}">&nbsp;Voir Calendrier</a></span></h3>
                </div>
                    <div class="card-body">
                   
                    <table id="example" class=" table  table-striped  " style=" background: white; border: 0px; width:100%"> 
                        <thead>
                          <tr>
                            <th scope="col">Patient</th>
                            <th scope="col">Date</th>
                            <th scope="col">Libellé</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($rdvs as $r)
                                <tr>
                                    <td>{{$r->patient->prenom}} {{$r->patient->nom}}</td>
                                    <td>{{$r->date}}</td>
                                    <td>{{$r->libelle}}</td>
                                    
                                    <td>
                                       
                                        <a href="" class="btn btn-warning"><span class="bi bi-pencil-square"></span></a>
                                        <a href="" class="btn btn-danger " ><span class="fa fa-trash"></span></a>

                                        
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
