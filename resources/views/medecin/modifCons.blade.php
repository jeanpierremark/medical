@extends('medecin.dashboard')
@section('content')
<h1 style="color:darkblue"  class="text-primary"><span class="bi bi-file-text-fill">&nbsp;</span> Consultation <span class="breadcrumb-item text-secondary small" style="font-size: 15px; "> @foreach($cons as $c) {{$c->patient->prenom}} {{$c->patient->nom}} @endforeach</span></h1>

<div class="card col-xl-12 col-md-4 mb-4" style="border-top: 4px solid darkblue; ">
	<br>
	<center> <caption ><div class="bi bi-pencil-square" style="font-size:25px"> &nbsp; Modifier la Consultation de <span class="text-primary"> @foreach($cons as $c) {{$c->patient->prenom}} {{$c->patient->nom}} @endforeach</span></div> </caption>

        
		@if(isset($var))
				
						<div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>
					
		@endif
          


</center>
	
	<table>
		<form method="POST" action="{{route('medecin.updateCons',$consult->id)}}"  style=" margin-top:200px">
    @csrf
    
  
    <div class="card-body">
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Motif Consultation</td>
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="motifConsultation"  placeholder="Motif Consultation" value="{{$consult->motifConsultation}}"> 
                   
                    

                 
                </div>
            </div> <br>
            </td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Histoire de la maladie</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <input type="text" class="form-control" name="histoireMaladie"  placeholder="histoireMaladie" value="{{$consult->histoireMaladie}}">
                  
                </div>
            </div><br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Maladie</td>
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="maladie"  placeholder="Maladie" value="{{$consult->maladie}}">
                  
                </div>
            </div> <br>
            </td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Mode de vie</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <input type="text" class="form-control" name="modeDevie" placeholder="Mode de vie" value="{{$consult->modeDevie}}">
                
                </div>
            </div><br>
            </td>
            </tr> 
           
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Décision</td>
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="decision"  placeholder="Décision"value="{{$consult->decision}}">
                  
                </div>
            </div> <br>
            </td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Handicap</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <input type="text" class="form-control" name="handicap"  placeholder="Handicap" value="{{$consult->handicap}}">
                   
                </div>
            </div><br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Opération</td>
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="operation"  placeholder="Opération"  value="{{$consult->operation}}">
                  
                </div>
            </div> <br>
            </td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Date de Consultation</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
                
               
                <td>
            <div class="col-3">
            <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="date" class=" form-control" name="dateConsultation" placeholder="Date de Consultation" value="{{$consult->dateConsultation}}">
                  
                </div>
            </div><br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Allergie</td>
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="alergie"  placeholder="Opération"  value="{{$consult->alergie}}">
                  
                </div>
            </div> <br>
            </td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Mode d'Admission</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <input type="text" class="form-control" name="handicap"  placeholder="modeAdmission" value="{{$consult->modeAdmission}}">
                   
                </div>
            </div><br>
            </td>
			</tr>
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td>
						<div class=" form-group">
                        <button type="submit" class="btn btn-primary  ">&nbsp;Modifier</button>

						</div>
					</td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td>
               
                
               
                
                
                    <td>
						<div class=" form-group">
							<a class="bi bi-arrow-90deg-left btn btn-danger" style="font-family:times new roman;" href="{{route('medecin.listeconsult')}}"> &nbsp;Retour</a>

						</div>
					</td>
            </tr>
        </div>
    
    </tbody>
</form>
	</table><br>

</div>

@endsection
 