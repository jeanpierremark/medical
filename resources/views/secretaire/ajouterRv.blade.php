@extends('secretaire.accueil')
@section('content')

<h1 style="color:darkblue" class="text-primary"><span class="fa fa-user">&nbsp;</span>Patients <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">Ajouter rendez-vous</span></h1>
<div class="card  " style="border-top:4px solid #1ca8e3">
    <br>
   <center> <caption><span class="fa fa-calendar-alt" style="font-size:25px"> &nbsp; Ajouter Rendez-vous</span> </caption>
   @if(isset($var))
				
                <div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>

              @endif
</center>
<table >
<form method="POST" action="{{route('secretaire.rv',$id)}}"  style=" margin-top:200px">
    @csrf
    <div class="card-body">
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Date</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-calendar-alt text-light"></i></div>
                    <input type="text" class=" form-control" name="date" placeholder="aaaa-mm-jj --:--"  >
                </div>
            </div> <br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Libellé</td>
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
                    <input type="text" class="form-control" name="libelle">
                </div>
            </div><br>
            </td>
            </tr>
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Service santé</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="bi bi-hospital text-light"></i></div>
                    <select name="domaine">
								<option value="Cardiologie">Cardiologie</option>
								<option value="Dermatologie">Dermatologie</option>
								<option value="Pediatrie">Pédiatrie</option>
								<option value="Neurologie">Neurologie</option>
								<option value="Nephrologie">Néphrologie</option>
								<option value="Gastro-enterologie">Gastro-Enterologie</option>
								<option value="Ophtalmologie">Ophtalmologie</option>
								<option value="Gynecologie">Gynécologie</option>
							</select>
                </div>
            </div> <br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Médecin</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fa fa-user text-light"></i></div>
                    <select name="medecin">
                            @foreach($medecin as $med)
                                @foreach($mede as $cin)
                                    @if($med->id == $cin->user_id)
								        <option value="{{$med->email}}">Doc {{$med->prenom}} {{$med->nom}} / {{$cin->specialite}}  </option>
                                    @endif
							    @endforeach	
                            @endforeach	
							</select>
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