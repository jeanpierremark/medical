@extends('secretaire.dashboard')
@section('content')
<br><br>
<div class="card col-xl-12 col-md-4 mb-4" style="border-top: 2px solid aqua; ">
	<br>
	<center> <caption ><span class="bi bi-pencil-square" style="font-size:25px"> &nbsp; Modifier Patient</span> </caption></center>
	<br>
	<table>
	
		@if(isset($confirm))
			@if($confirm==1)

				<tr>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					<td>
						<div style="width: 183%; font-size: 20px;" class="alert alert-success ">Patient Ajouté avec succès!</div>
					</td>
				</tr>

			@endif
		@endif

		<form method="POST" action="{{route('patient')}}"  style=" margin-top:200px">
    @csrf
    
  
    <div class="card-body">
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Prénom</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="prenom" value="{{$patient->prenom}}" >
                </div>
            </div> <br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Nom</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <input type="text" class="form-control" name="nom" value="{{$patient->nom}}">
                </div>
            </div><br>
            </td>
            </tr>
			<tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Téléphone</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="telephone" value="{{$patient->telephone}}" >
                </div>
            </div> <br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Adresse</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <input type="text" class="form-control" name="adresse" value="{{$patient->adresse}}">
                </div>
            </div><br>
            </td>
            </tr>
			<tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Profession</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="profession" value="{{$patient->profession}}" >
                </div>
            </div> <br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Niveau d'Etude</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <input type="text" class="form-control" name="niveau" value="{{$patient->niveauEtude}}">
                </div>
            </div><br>
            </td>
            </tr>
			<tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Age</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="number" class=" form-control" name="age" value="{{$patient->age}}" >
                </div>
            </div> <br>
            </td>
            </tr> 
           
           
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td>
						<div class=" form-group">
							<input class="bi bi-plus btn btn-primary"  style="font-family:times new roman"  type="submit" name="modifier" value="Modifier">

						</div>
					</td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                    <td>
						<div class=" form-group">
							<a class="bi bi-arrow-90deg-left btn btn-danger" style="font-family:times new roman" href="{{route('secretaire.listerPatient')}}"> &nbsp;Retour</a>

						</div>
					</td>
            </tr>
        </div>
    
    </tbody>
</form>
	</table><br>

</div>

@endsection
 <!--
					<td>
						<div class=" form-group">
							<label style="margin-left: 50px; color: darkblue ;" class="control-label" for="service"><strong>Service Santé</strong></label>
							<select name="domaine">
								<option value="cardiologie">Cardiologie</option>
								<option value="dermatologie">Dermatologie</option>
								<option value="pediatrie">Pédiatrie</option>
								<option value="neurologie">Neurologie</option>
								<option value="nephrologie">Néphrologie</option>
								<option value="gastro-enterologie">Gastro-Enterologie</option>
								<option value="ophtalmologie">Ophtalmologie</option>
								<option value="gynecologie">Gynécologie</option>
							</select>
						</div>
					</td>
                -->