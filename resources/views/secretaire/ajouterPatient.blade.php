@extends('secretaire.dashboard')
@section('content')
<h1 style="color:darkblue" class="text-primary"><span class="fa fa-user">&nbsp;</span> Patients <span class="breadcrumb-item text-secondary small" style="font-size: 15px; "> Ajouter</span></h1>

<div class="card col-xl-12 col-md-4 mb-4" style="border-top: 4px solid darkblue; ">
	<br>
	<center> <caption ><span class="fa fa-user-plus" style="font-size:25px"> &nbsp; Ajouter Patient</span> </caption>
    @if(isset($confirmation))
			@if($confirmation==1)

						<div style="width: 100%; font-size: 20px;" class="alert alert-success ">Patient Ajouté avec succès!</div>
				

			@endif
		@endif
        
		@if(isset($var))
				
						<div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>
					
		@endif
          


</center>
	
	<table>
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
                    <input type="text" class=" form-control" name="prenom"  placeholder="Prénom" value=" <?php
                    if(isset($_POST['prenom']))
                    echo $_POST['prenom']
                    ?> ">

                 
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
                    <input type="text" class="form-control" name="nom"  placeholder="Nom" value=" <?php
                    if(isset($_POST['nom']))
                    echo $_POST['nom']
                    ?>">
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
                    <input type="text" class=" form-control" name="adresse"  placeholder="Adresse" value=" <?php
                    if(isset($_POST['adresse']))
                    echo $_POST['adresse']
                    ?>">
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
                    <input type="number" class="form-control" name="telephone" placeholder="7********" >
                  
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
                    <input type="number" class=" form-control" name="age"  placeholder="23"   value=" <?php
                    if(isset($_POST['age']))
                    echo $_POST['age']
                    ?>">
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
                    <input type="text" class="form-control" name="profession"  placeholder="Profession"  value=" <?php
                    if(isset($_POST['profession']))
                    echo $_POST['profession']
                    ?>" >
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
                    <input type="text" class=" form-control" name="niveauEtude"  placeholder="Niveau d'Etude"  value=" <?php
                    if(isset($_POST['niveauEtude']))
                    echo $_POST['niveauEtude']
                    ?>">
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
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Email</td>
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="email" class=" form-control" name="email"  placeholder="Email"  value=" <?php
                    if(isset($_POST['email']))
                    echo $_POST['email']
                    ?>">
                </div>
            </div> <br>
            </td>
            </tr>
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td>
						<div class=" form-group">
                        <button class="bi bi-plus btn btn-primary"  style="font-family:times new roman"  type="submit" name="ajouter" >&nbsp;Ajouter</button>

						</div>
					</td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td>
               
                
               
                
                
                    <td>
						<div class=" form-group">
							<a class="bi bi-arrow-90deg-left btn btn-danger" style="font-family:times new roman;" href="{{route('secretaire.listerPatient')}}"> &nbsp;Retour</a>

						</div>
					</td>
            </tr>
        </div>
    
    </tbody>
</form>
	</table><br>

</div>

@endsection
 