@extends('medecin.accueil')
@section('content')
<h1 style="color:darkblue" class="text-primary"><span class="bi bi-file-text-fill">&nbsp;</span>Hospitalisations <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">Liste</span></h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between" style="border-top:4px solid #a10909">
                    <h3>Liste des Hospitalisations</h3>
                </div>
                    <div class="card-body">
                   
                    <table id="example" class=" table  table-striped  " style=" background: white; border: 0px; width:100%"> 
                        <thead>
                          <tr>
                            <th scope="col">Patient</th>
                            <th scope="col">Date d'Entrée</th>
                            <th scope="col">Date de Sortie</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($hosp as $h)
                                @foreach ($patient as $p)
                                    @if($medecin->specialite == $h->service && $p->id == $h->patient_id )
                                <tr>
                                    <td>{{$p->prenom}} {{$p->nom}}</td>
                                    <td><?php echo substr($h->dateEntree,0,10) ?></td>
                                    <td><?php if(is_null($h->dateSortie)) {
                                            echo '-';
                                        }
                                            else{
                                                echo substr($h->dateEntree,0,10);
                                            }
                                            
                                            ?></td>
                                    
                                    <td>
                                       
                                        <a href="" class="btn btn-primary"><span class="bi bi-pencil-square"></span></a>
                                        <a href="" class="btn btn-success " ><span class="bi bi-eye"></span></a>
                                        
                                        
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
