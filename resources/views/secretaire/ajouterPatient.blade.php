@extends('secretaire.dashboard')
@section('content')
<h1 style="color:darkblue;"> <i class="fas fa-user"></i> Formulaire D'ajout des patients</h1>
<div class="card col-xl-12 col-md-4 mb-4" style="border-top: 5px solid darkblue; ">
	<br>
	<table>
		@if(isset($confirm))
			@if($confirm==1)

				<tr>
					<td>
						<div style="margin-left: 50px;width: 183%; font-size: 20px;" class="alert alert-success ">Patient Ajouté avec succès!</div>
					</td>
				</tr>

			@endif
		@endif


		<form method="POST" action="{{ route('patient')}}">
			@csrf
			<tbody>
				<tr>
					<td>
						<div class=" form-group">
							<label style="margin-left: 50px; color: darkblue ;" class="control-label" for="prenom"> <strong> Prenom</strong></label>
							<input placeholder="Prenom" style="width:400px;margin-left: 50px; " class="form-control" type="text" name="prenom">
						</div>
					</td>
					<td>
						<div class=" form-group">
							<label style="margin-left: 50px; color: darkblue ;" class="control-label" for="nom"> <strong> Nom</strong></label>
							<input placeholder="Nom" style="width:400px;margin-left: 50px; " class="form-control" type="text" name="nom">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class=" form-group">
							<label style="margin-left: 50px; color: darkblue ;" class="control-label" for="adresse"> <strong>Adresse</strong></label>
							<input placeholder="Adresse" style="width:400px;margin-left: 50px; " class="form-control" type="text" name="adresse">
						</div>
					</td>
					<td>
						<div class=" form-group">
							<label style="margin-left: 50px; color: darkblue ;" class="control-label" for="telephone"><strong>Téléphone</strong></label>
							<input placeholder="7********" style="width:400px;margin-left: 50px; " class="form-control" type="text" name="telephone">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class=" form-group">
							<label style="margin-left: 50px; color: darkblue ;" class="control-label" for="age"><strong>Age</strong></label>
							<input placeholder="Age" style="width:400px;margin-left: 50px; " class="form-control" type="number" name="age">
						</div>
					</td>
					<td>
						<div class=" form-group">
							<label style="margin-left: 50px; color: darkblue ;" class="control-label" for="prenom"><strong>Sexe</strong></label>
							<select name="sexe">
								<option value="Masculin">Masculin</option>
								<option value="Feminin">Feminin</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class=" form-group">
							<label style="margin-left: 50px; color: darkblue ;" class="control-label" for="niveau"><strong>Niveau D'étude</strong></label>
							<input placeholder="Niveau D'étude" style="width:400px;margin-left: 50px; " class="form-control" type="text" name="niveauEtude">
						</div>
					</td>
					<td>
						<div class=" form-group">
							<label style="margin-left: 50px; color: darkblue ;" class="control-label" for="prenom"><strong>Profession</strong></label>
							<input placeholder="Profession" style="width:400px;margin-left: 50px; " class="form-control" type="text" name="profession">
						</div>
					</td>
				</tr>
					<td>
						<div class=" form-group">
							<label style="margin-left: 50px; color: darkblue ;" class="control-label" for="idAn"><strong>Indice Année</strong></label>
							<input placeholder="/22" style="width:400px;margin-left: 50px; " class="form-control" type="text" name="idAn">
						</div>
					</td>
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
				<tr>

				</tr>
				<tr>
					<td><input type="hidden" name=""></td><td><input type="hidden" name=""></td>
				</tr>
				<tr>
					<td><input type="hidden" name=""></td><td><input type="hidden" name=""></td>
				</tr>
				<tr>
					<td><input type="hidden" name=""></td><td><input type="hidden" name=""></td>
				</tr>
				<tr>
					<td>
						<div class=" form-group">
							<input class="btn btn-success"  style=" margin-left: 50px; "  type="submit" name="enregistrer" value="Enregistrer">

						</div>
					</td>
					<td>
						<div class=" form-group">
							<input class="btn btn-danger"  style="margin-left: 50px; "  type="reset" name="annuler" value="Annuler">

						</div>
					</td>

				</tr>
			</tbody>
		</form>
	</table><br>

</div>

@endsection
