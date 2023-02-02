@extends('medecin.accueil')
@section('content')
<h1 style="color:darkblue" class="text-primary"><span class="bi bi-file-text-fill">&nbsp;</span>Traitement <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">ajouter</span></h1>

<div class="card  " style="border-top:4px solid #1ca8e3">
    <br>
   <center> <caption> <h2><span class="bi bi-file-text-fill"> &nbsp; Ajouter un Traitement</span> </h2></caption>
   @if(isset($var))
				
                <div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>
            
@endif
</center>
<style>
    input{
        display:block;
      
        
    }
</style>
<table >
<form method="POST"  action="{{route('medecin.addtraitement')}}"  style=" margin-top:200px">
    @csrf
    <div class="card-body">
        <tr>
            <h3><b> &nbsp;Traitement </b></h3>
        </tr>
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            
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
                    <input type="text" class=" form-control" name="description" placeholder="Description"  >
                </div>
            </div> <br>
            </td>
            </tr> 
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
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
                    <input type="text" class="form-control" name="type" placeholder="type">
                </div>
            </div><br>
            </td>
            </tr>

            <tr style="font-size:23px">
            <td><b> &nbsp;Ordonnance </b></td>
        </tr>
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
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
                    <input type="date" class=" form-control" name="dateOrdonnance"  >
                </div>
            </div> <br>
            </td>
            </tr> 


            <tr style="font-size:23px">
            <td><b> &nbsp;Médicament </b>  <span class="btn btn-primary fa fa-plus" id="add_button"></span>  <span class="btn btn-danger fa fa-minus" id="rmb"></span> </td>
        </tr>
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
               
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td>
           
                    <input type="text" style="width:400px" class="form-control" name="libelle" placeholder="Libellé"  >
        <br>
            </td>
            </tr> 
            <br>
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
               
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td>
           
                    <input type="text" style="width:400px" class="form-control" name="quantite" placeholder="Quantité"  >
        <br>
            </td>
            </tr> 
            <br>
           
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                <td id="nv">
           
                </td>
               
                
            </tr><br>

               
            <td>
						<div class=" form-group">
							&nbsp;<button class="bi bi-plus btn btn-primary"  style="font-family:times new roman"  type="submit" name="ajouter" >Ajouter</button>

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
							<a class="bi bi-arrow-90deg-left btn btn-danger" style="font-family:times new roman" href="{{route('medecin.addconsultation',$id)}}"> &nbsp;Retour</a>

						</div>
					</td>
            </tr>
        </div>
    
    </tbody>
</form>
</table><br>
</div>


  

@endsection