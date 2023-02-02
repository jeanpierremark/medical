@extends('medecin.accueil')
@section('content')
<h1 style="color:darkblue" class="text-primary"><span class="fa fa-user  text-primary">&nbsp;</span>Patient <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">@foreach($rdvs as $r) {{$r->patient->prenom}} {{$r->patient->nom}} @endforeach</span></h1>
<div class="card col-xl-12 col-md-4 mb-4" style="border-top: 4px solid #0c0476; ">
	<br>
	<center> <caption ><div class="bi bi-pencil-square" style="font-size:25px"> &nbsp; Modifier Rendez-vous de <span class="text-primary"> @foreach($rdvs as $r) {{$r->patient->prenom}} {{$r->patient->nom}} @endforeach</span> </div> </caption>
    @if(isset($var))
				
                <div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>
            
@endif</center>
	<br>
	<table>


		<form method="POST" action="{{route('medecin.updateRv',$rendezvous->id)}}"  style=" margin-top:200px">
        @csrf
        <tbody>
    <div class="card-body">
            
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Date</td>
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
                    <input type="text" class="form-control" name="date" value="{{$rendezvous->date}}">
                </div>
            </div><br>
            </td>
            </tr>
			<tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Libellé</td>
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
                    <input type="text" class=" form-control" name="libelle" value="{{$rendezvous->libelle}}" >
                </div>
            </div> <br>
            </td>
            </tr> 
           
          
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td>
						<div class=" form-group">
                        <button class="bi bi-pencil-square btn btn-primary"  style="font-family:times new roman"  type="submit" name="modifier" >&nbsp;Modifier</button>

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
							<a class="bi bi-arrow-90deg-left btn btn-danger" style="font-family:times new roman" href="{{route('medecin.listeRv')}}"> &nbsp;Retour</a>

						</div>
					</td>
            </tr>
        </div>
    
    </tbody>
</form>
	</table><br>

</div>

@endsection