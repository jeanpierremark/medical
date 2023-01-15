@extends('secretaire.accueil')
@section('content')
<h1 style="color:darkblue"><span class="fa fa-calendar-alt">&nbsp;</span>Agenda <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">Rendez-vous</span></h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between" style="border-top:4px solid #a10909">
                    <h2>Liste des rendez-vous</h2>
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
                           
                           
                        </tbody>
                      </table>
                    
            </div>
        </div>
    </div>
</div>


@endsection
