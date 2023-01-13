@extends('secretaire.accueil')
@section('content')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between" style="border-top:2px solid red">
                    <h2>Liste des patient</h2>
                </div>
                    <div class="card-body">
                   
                    <table id="example" class=" table  table-striped  " style=" background: white; border: 0px; width:100%"> 
                        <thead>
                          <tr>
                            <th scope="col">N° Dossier</th>
                            <th scope="col">nom</th>
                            <th scope="col">prenom</th>
                            <th scope="col">adresse</th>
                            <th scope="col">telephone</th>
                            <th scope="col">niveau</th>
                            <th scope="col">âge</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{$patient->id}}{{$patient->idAn}} </td>
                                    <td>{{$patient->nom}}</td>
                                    <td>{{$patient->prenom}}</td>
                                    <td>{{$patient->adresse}}</td>
                                    <td>{{$patient->telephone}}</td>
                                    <td>{{$patient->niveauEtude}}</td>
                                    <td>{{$patient->age}}</td>
                                    <td>
                                        <a href="{{route('editer',$patient->id)}}" class="btn btn-warning"><span class="bi bi-pencil-square"></span></a>
                                        <a href="{{route('secretaire.getrendezVous')}}" class="btn btn-info"><span class="fa fa-calendar-alt"></span></a>
                                        <a href="" onclick="return confirm('Voulez-vous supprimmer ?')" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                                        <a href=""  class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="fa fa-share-square"></span></a>
                                        

                                        
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                      </table>
                    
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Orienter le Patient vers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
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
      </div>
    
      <div class=" form-group modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Retour</button>
        <input type="submit" class="btn btn-primary"  value="Orienter">
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
