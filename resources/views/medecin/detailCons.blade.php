@extends('medecin.accueil')
@section('content')
<h1 style="color:darkblue" class="text-primary"><span class="bi bi-file-text-fill">&nbsp;</span>Consultation <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">détail</span></h1>

<div class="card col-md-12" style="border-top:4px solid aqua">
   <div class="card-body">
    <br><br>
    <h3  style="font-weight:bold"><span class="bi bi-tags-fill">Détail de la consultation</span></h3> 
    
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
                <b>Maladie</b>
            </td>
            
            <td style="padding-left:200px;padding-bottom:25px;">
            @foreach($cons as $c) {{$c->maladie}} @endforeach
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
    <h3 style="font-weight:bold" ><span class="bi bi-tags-fill"></span>Liste des Examens complementaires <a  style="margin-left:200px;" class="btn btn-primary bi bi-plus" data-bs-toggle="modal" data-bs-target="#examcomp" href=""></a></h3>
    <br>
    <table>
     
    <thead>
                          <tr>
                            <th scope="col">Date </th>
                            <th scope="col" style="padding-left:200px;padding-bottom:25px;">Examens complementaires</th>
                            
                          </tr>
    </thead>

    <tbody>
    @foreach($exam as $comp)
    <tr>
        <td> {{$comp->dateExamen}}</td>
        <td style="padding-left:200px;padding-bottom:25px;"> {{$comp->contenu}}</td>

    </tr>

    
    @endforeach
    </tbody>
    </table>

    <br><br>
    <h3  style="font-weight:bold"><span class="bi bi-tags-fill"></span>Evolution <a  style="margin-left:200px;" class="btn btn-primary bi bi-plus" data-bs-toggle="modal" data-bs-target="#evolution" href=""></a></h3>

    <br>
    <table>
   
    <thead>
                          <tr>
                            <th scope="col">Date </th>
                            <th scope="col" style="padding-left:200px;padding-bottom:25px;">Description</th>
                            
                          </tr>
    </thead>
    <tbody>
    @foreach($evo as $ev)  
    <tr>
        <td> {{$ev->date}}</td>
        <td style="padding-left:200px;padding-bottom:25px;"> {{$ev->description}}</td>

    </tr>

    
    @endforeach
    </tbody>
    </table>



   </div>

</div>
<div class="modal fade" id="examcomp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title bi bi-plus" id="exampleModalLabel">Ajouter Examen Complémentaire</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if(isset($var))
				
        <div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>

      @endif
		<form method="POST" action="{{route('medecin.exam')}}" >
        @csrf
        <tr>
                <input type="hidden" name="id" value="{{$id}}">
            </tr>
            <tr>
          
                <td   ;font-size:16px; font-family:times new roman">Examen Complémentaire</td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-lock text-light"></i></div>
                    <input type="text" class="form-control" name="contenu" value="">
                </div>
            </div><br>
            </td>
            </tr>
			<tr>
           
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Date Examen</td>
                
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-lock text-light"></i></div>
                    <input type="date" class=" form-control" name="dateExamen" value="" >
                </div>
            </div> <br>
            </td>
            </tr> 
     
    
    
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
</form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="evolution" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title bi bi-plus" id="exampleModalLabel">Ajouter Evolution</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if(isset($var))
				
        <div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>

      @endif
		<form method="POST" action="{{route('medecin.evolution')}}" >
        @csrf
            <tr>
                <input type="hidden" name="id" value="{{$id}}">
            </tr>
            <tr>
                <input type="hidden" name="patient" value="{{$p}}">
            </tr>
       
    
            <tr>
          
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Date</td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-lock text-light"></i></div>
                    <input type="text" class="form-control" name="date" disabled="disabled" value="{{$d}}">
                </div>
            </div><br>
            </td>
            </tr>
			<tr>
           
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Description</td>
                
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-lock text-light"></i></div>
                    <input type="text" class=" form-control" name="description" value="" >
                </div>
            </div> <br>
            </td>
            </tr> 
     
         
    
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
</form>
      </div>
      
    </div>
  </div>
</div>
@endsection
