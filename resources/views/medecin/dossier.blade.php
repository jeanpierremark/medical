@extends('medecin.accueil')
@section('content')
<h1 class="text-primary"><span class="bi bi-folder">&nbsp;</span>Dossier <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">patient</span></h1>
<div class="card col-md-12" style="border-top:4px solid aqua; height:450px">
    <div class="card-body">
    <br>
    <h4  style="font-weight:bold;">Dossier N° {{$patient->id}}/{{$patient->idAn}}</h4> 
    <br>
    <h3 class="fa fa-user">&nbsp;Etat civil</h3>
    <br><br>
    <table >
        <tr >
            <td >
                <b> Prénom</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;" >
                {{$patient->prenom}}
            </td> 
        </tr>
      
        <tr>
            <td >
                <b>Nom</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
                {{$patient->nom}}
            </td>
        </tr>
        <tr>
            <td >
                <b>Sexe</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
                {{$patient->sexe}}
            </td>
        </tr>
        <tr>
            <td >
                <b>Age</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
                {{$patient->age}}
            </td>
        </tr>
        <tr>
            <td >
                <b>Adresse</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;" >
                {{$patient->adresse}}
            </td>
        </tr>
        <tr> 
            <td >
                <b>Téléphone</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
                {{$patient->telephone}}
            </td>
        </tr>
    </table>
    
   </div>
   <div class="row">

                        <div class="col-xl-6 col-md-6 ">
                            <div id="c1" style="border-top:5px solid aqua;" class="card  bg-white shadow h-70 py-2">
                            <div class="card-head">&nbsp;<b> Visite</b></div>
                            <br>
                                <div class="card-body ">
                                    <table>
                                        <thead>
                                            <th style="padding-bottom:25px;">Date</th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Motif de la visite</th>
                                            
                                        </thead>
                                        <tbody>
                                        @foreach($visite as $v)
                                         @foreach($cons as $c)
                                            @if($c->patient_id == $v->patient_id)
                                        <tr>
                                            <td style="padding-bottom:25px;"> <?php echo substr($v->date,0,10) ?></td>
                                            <td style="padding-left:100px;padding-bottom:25px;">{{$c->motifConsultation}}</td>
                                        </tr>
                                            @endif
                                            @endforeach
                                            @endforeach
                                            </tbody>
                                    </table>
                                    
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 ">
                            <div id="c1" style="border-top:5px solid aqua;" class="card  bg-white shadow h-70 py-2">
                            <div class="card-head">&nbsp;<b> Hospitalisations</b></div>
                                <div class="card-body ">
                                    <br>
                                <table>
                                        <thead>
                                            <th  style="padding-bottom:25px;">Date d'Entrée</th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Date de sortie</th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Médecin</th>
                                        </thead>
                                        <tbody>
                                        @foreach($hospi as $hosp)
                                        @foreach($medecin as $med)
                                            @if($hosp->medecin_id == $med->id)

                                            <tr>
                                            <td style="padding-bottom:25px;"> <?php echo substr($hosp->dateEntree,0,10) ?></td>
                                            <td style="padding-left:100px;padding-bottom:25px;"> <?php if(is_null($hosp->dateSortie)) {
                                            echo '-';
                                        }
                                            else{
                                                echo substr($hosp->dateEntree,0,10);
                                            }
                                            
                                            ?></td>
                                            <td style="padding-left:100px;padding-bottom:25px;">Doc {{$med->user->prenom}}  {{$med->user->nom}}</td>
                                            </tr>

                                            @endif
                                            @endforeach
                                            @endforeach
                                            </tbody>
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 ">
                            <div id="c1" style="border-top:5px solid aqua;" class="card  bg-white shadow h-70 py-2">
                            <div class="card-head">&nbsp;<b> Histoire de la maladie</b></div>
                                <div class="card-body ">
                                    <br>
                                <table>
                                        <thead>
                                            <th  style="padding-bottom:25px;">Date </th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Description</th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Maladie</th>
                                        </thead>
                                        <tbody>
                                        @foreach($examCons as $comp)
                                        

                                            <tr>
                                            <td style="padding-bottom:25px;"> <?php echo substr($comp->dateConsultation,0,10) ?></td>
                                            <td style="padding-left:100px;padding-bottom:25px;">{{$comp->histoireMaladie}}</td>
                                            <td style="padding-left:100px;padding-bottom:25px;">{{$comp->maladie}}</td>
                                            </tr>

                                            
                                            @endforeach
                                            </tbody>
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 ">
                            <div id="c1" style="border-top:5px solid aqua;" class="card  bg-white shadow h-70 py-2">
                            <div class="card-head">&nbsp;<b>Examens Complémentaires</b></div>
                                <div class="card-body ">
                                <br>
                                <table>
                                        <thead>
                                            <th  style="padding-bottom:25px;">Date </th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Description</th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Motif de l'Examen</th>
                                        </thead>
                                        <tbody>
                                        @foreach($examCons as $comp)
                                        @foreach($exam as $exa)
                                            @if($comp->id == $exa->consultation_id)

                                            <tr>
                                            <td style="padding-bottom:25px;"> <?php echo substr($exa->dateExamen,0,10) ?></td>
                                            <td style="padding-left:100px;padding-bottom:25px;">{{$exa->contenu}}</td>
                                            <td style="padding-left:100px;padding-bottom:25px;">{{$comp->motifConsultation}}</td>
                                            </tr>

                                            @endif
                                            @endforeach
                                            @endforeach
                                            </tbody>
                                       
                                    </table>
                                   
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 ">
                            <div id="c1" style="border-top:5px solid aqua;" class="card  bg-white shadow h-70 py-2">
                            <div class="card-head">&nbsp;<b> Evolution</b></div>
                                <div class="card-body ">
                                <br>
                                <table>
                                        <thead>
                                            <th  style="padding-bottom:25px;">Date </th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Description</th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Maladie</th>
                                        </thead>
                                        <tbody>
                                        @foreach($examCons as $comp)
                                        @foreach($evolu as $evo)
                                            @if($comp->id == $evo->consultation_id)

                                            <tr>
                                            <td style="padding-bottom:25px;"> <?php echo substr($evo->date,0,10) ?></td>
                                            <td style="padding-left:100px;padding-bottom:25px;">{{$evo->description}}</td>
                                            <td style="padding-left:100px;padding-bottom:25px;">{{$comp->maladie}}</td>
                                            </tr>

                                            @endif
                                            @endforeach
                                            @endforeach
                                            </tbody>
                                       
                                    </table>
                                   
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 ">
                            <div id="c1" style="border-top:5px solid aqua;" class="card  bg-white shadow h-70 py-2">
                            <div class="card-head">&nbsp;<b> Traitements</b></div>
                                <div class="card-body ">
                                    
                                   
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-xl-12 col-md-6 ">
                            <div id="c1" style="border-top:5px solid aqua;" class="card  bg-white shadow h-70 py-2">
                            <div class="card-head">&nbsp;<b> Ordonnances</b></div>
                                <div class="card-body ">
                                    
                                   
                                </div>
                            </div>
                        </div>
                        
                        
                        
    </div>                   

@endsection