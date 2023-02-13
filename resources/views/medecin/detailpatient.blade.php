@extends('medecin.accueil')
@section('content')
<h1 style="color:darkblue" class="text-primary"><span class="fa fa-user">&nbsp;</span>Patient <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">détail</span></h1>
<div class="row">

<div class="col-xl-9 col-md-9 " >
   <div class="card-body bg-white" style="border-top:4px solid aqua">
   <div class="card-head">&nbsp; <h2 style="font-weight:bold"><span class="fa fa-user">&nbsp; {{$patient->prenom}}  {{$patient->nom}}</span></h2></div>
   
    <br><br>
    <h3  style="font-weight:bold"><span class="bi bi-tags-fill">&nbsp;Etat Civil</span></h3> 
    <br>
    <table >
        <tr >
            <td style="padding-bottom:25px;">
                <b> Numéro de dossier</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;" >
            {{$patient->id}}/{{$patient->idAn}}
            </td> 
        </tr>
      
        <tr>
            <td  style="padding-bottom:25px;">
                <b>Age</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
            {{$patient->age}}
            </td>
        </tr>
        <tr>
            <td  style="padding-bottom:25px;">
                <b>Sexe</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
            {{$patient->sexe}}
            </td>
        </tr>
        <tr>
            <td style="padding-bottom:25px;" >
                <b>Téléphone</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
            {{$patient->telephone}}
            </td>
        </tr>
        <tr>
            <td  style="padding-bottom:25px;">
                <b>Adresse</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;" >
            {{$patient->adresse}}
            </td>
        </tr>
        <tr>
            <td  style="padding-bottom:25px;">
                <b>Profession</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
            {{$patient->profession}}
            </td>
        </tr>
    </table>
    <br>

    <h3  style="font-weight:bold"><span class="bi bi-tags-fill">&nbsp;Traitements</span></h3>     
    <br>
                                <table>
                                        <thead>
                                            <th  style="padding-bottom:25px;">Description </th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Type</th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Medecin</th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Action</th>
                                        </thead>
                                        <tbody>
                                        @foreach($medecin as $med)
                                        @foreach($traitement as $trait)
                                        @foreach($orienter as $or)
                                        
                                        
                                            @if($or->domaine == $trait->medecin->specialite && $trait->medecin_id == $med->id && $trait->patient_id == $patient->id)

                                            <tr>
                                            <td style="padding-bottom:25px;">{{$trait->description}} </td>
                                            <td style="padding-left:100px;padding-bottom:25px;">{{$trait->type}}</td>
                                            <td style="padding-left:100px;padding-bottom:25px;">Doc {{$med->user->prenom}} {{$med->user->nom}}</td>
                                            <td style="padding-left:100px;padding-bottom:25px;"><a href="{{route('medecin.ordonnnace', $trait->id)}}" class="btn btn-success bi bi-plus"></a></td>
                                            </tr>

                                            @endif
                                            @endforeach
                                            @endforeach
                                            @endforeach
                                       
                                        </tbody>
                                       
                                    </table>   
                                    <br>
         <h3  style="font-weight:bold"><span class="bi bi-tags-fill">&nbsp;Ordonnances</span></h3>  
         <br>
                                <table>
                                        <thead>
                                            <th  style="padding-bottom:25px;">Traitement </th>
                                            <th  style="padding-left:100px;padding-bottom:25px;">Date </th>
                                            <th style="padding-left:100px;padding-bottom:25px;">Médicaments</th>
                                           
                                        </thead>
                                        <tbody>
                                        @foreach($traitement as $trait)
                                        @foreach($ordonnance as $ord)
                                        @foreach($orienter as $or)
                                            @if($trait->patient_id == $patient->id && $ord->traitement_id == $trait->id && $or->domaine == $trait->medecin->specialite)

                                            <tr>
                                            <td style="padding-bottom:25px;"> {{$trait->description}}  </td> 
                                            <td style="padding-left:100px;padding-bottom:25px;"> <?php echo substr($ord->dateOrdonnance,0,10) ?> </td>
                                           
                                            @foreach($medicament as $medi)
                                            @if($medi->ordonnance_id == $ord->id)
                                            <td style="padding-bottom:25px;padding-left:100px;"> <p style="display:block">{{$medi->libelle}} - {{$medi->quantite}}</p> </td> 
                                            @endif
                                            @endforeach
                                           
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endforeach
                                            @endforeach
                                        </tbody>
                                       
                                    </table> 
    </div >
    </div >
    <div class="col-xl-3 col-md-3 ">
                            <div id="c1" style="border-top:5px solid red;" class="card  bg-white shadow h-70 py-2">
                            
                                <div class="card-body ">
                                
                                    
                                    <a href="{{route('medecin.dossier',$patient->id)}}" class="btn btn-info btn-icon-split col-md-12">
                                        <span class="icon text-gray-600">
                                            <i  class="bi bi-folder"></i>
                                        </span>
                                        <span > Ouvrir le Dossier  </span>
                                    </a></span>
                                   
                                </div>
                            </div>
                        </div>
    </div >
    @endsection