@extends('medecin.accueil')
@section('content')
<h1 style="color:darkblue" class="text-primary"><span class="bi bi-file-text-fill">&nbsp;</span>Consultation <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">détail</span></h1>

<div class="card col-md-12" style="border-top:4px solid aqua">
   <div class="card-body">
    <br><br>
    <h3><span class="bi bi-tags-fill">Détail de la consultation</span></h3>
    
    <table >
        <tr >
            <td >
                <b> Patient</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;" >
            @foreach($cons as $c) {{$c->patient->prenom}} {{$c->patient->nom}} @endforeach
            </td> 
        </tr>
      
        <tr>
            <td >
                <b>Mode d'admission</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
            @foreach($cons as $c) {{$c->modeAdmission}} @endforeach
            </td>
        </tr>
        <tr>
            <td >
                <b>Plaintes</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
            @foreach($cons as $c) {{$c->motifConsultation}} @endforeach
            </td>
        </tr>
        <tr>
            <td >
                <b>Décision</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;" >
            @foreach($cons as $c) {{$c->decision}} @endforeach
            </td>
        </tr>
        <tr>
            <td >
                <b>Les Alergies</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
            @foreach($cons as $c) {{$c->alergie}} @endforeach
            </td>
        </tr>
    </table>
    <br>
    <h3><span class="bi bi-tags-fill"></span>Liste des Examens complementaires <span style="margin-left:200px;" class="btn btn-primary bi bi-plus"></span></h3>
    <br>
    <table>
    @foreach($exam as $comp)  
    <thead>
                          <tr>
                            <th scope="col">Date </th>
                            <th scope="col" style="padding-left:200px;padding-bottom:25px;">Examens complementaires</th>
                            
                          </tr>
    </thead>
    <tbody>
    <tr>
        <td> {{$comp->dateExamen}}</td>
        <td style="padding-left:200px;padding-bottom:25px;"> {{$comp->contenu}}</td>

    </tr>

    
    @endforeach
    </tbody>
    </table>

    <br><br>
    <h3><span class="bi bi-tags-fill"></span>Evolution <span style="margin-left:200px;" class="btn btn-primary bi bi-plus"></span></h3>
   </div>

</div>
@endsection
