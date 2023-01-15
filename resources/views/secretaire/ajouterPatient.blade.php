@extends('secretaire.dashboard')
@section('content')
<h1 style="color:darkblue"><span class="fa fa-user">&nbsp;</span> Patients <span class="breadcrumb-item text-secondary small" style="font-size: 15px; "> Ajouter</span></h1>

<div class="card col-xl-12 col-md-4 mb-4" style="border-top: 4px solid darkblue; ">
	<br>
	<center> <caption ><span class="fa fa-plus" style="font-size:25px"> &nbsp; Ajouter Patient</span> </caption></center>
	
	<table>
	
		@if(isset($confirmation))
			@if($confirmation==1)

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
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="prenom"  placeholder="Prénom">
                </div>
            </div> <br>
            </td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Nom</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <input type="text" class="form-control" name="nom"  placeholder="Nom">
                </div>
            </div><br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Adresse</td>
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-home text-light"></i></div>
                    <input type="text" class=" form-control" name="adresse"  placeholder="Adresse">
                </div>
            </div> <br>
            </td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Téléphone</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-phone text-light"></i></div>
                    <input type="text" class="form-control" name="telephone" placeholder="7********">
                </div>
            </div><br>
            </td>
            </tr> 
           
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Age</td>
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="number" class=" form-control" name="age"  placeholder="23" >
                </div>
            </div> <br>
            </td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Profession</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <input type="text" class="form-control" name="profession"  placeholder="Profession">
                </div>
            </div><br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Niveau d'Etude</td>
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="niveauEtude"  placeholder="Niveau d'Etude" >
                </div>
            </div> <br>
            </td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Sexe</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <select name="sexe" >
                        <option value="M">Masculin</option>
                        <option value="F">Féminin</option>
                    </select>
                </div>
            </div><br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Indice Année</td>
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="idAn" placeholder="/23" >
                </div>
            </div> <br>
            </td>
            
            </tr> 

			
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td>
						<div class=" form-group">
							<input  class="fa fa-plus btn btn-primary"  style="font-family:times new roman"  type="submit" name="ajouter" value=" Ajouter">

						</div>
					</td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td>
               
                
               
                
                
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