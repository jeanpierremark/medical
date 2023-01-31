@extends('medecin.accueil')
@section('content')
<h1 style="color:darkblue"  class="text-primary"><span class="bi bi-file-text-fill">&nbsp;</span> Consultation <span class="breadcrumb-item text-secondary small" style="font-size: 15px; "> Ajouter</span>  <span style="margin-left:400px"><a href="" data-bs-toggle="modal" data-bs-target="#traitement" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text"> Traitement </span>
                                    </a></span> <span style=""><a href="" data-bs-toggle="modal" data-bs-target="#traitementcours" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text"> Traitements En cours </span>
                                    </a></span></h1>

<div class="card col-xl-12 col-md-4 mb-4" style="border-top: 4px solid darkblue; ">
	<br>
	<center> <caption ><span class="bi bi-file-text-fill" style="font-size:25px"> &nbsp; Ajouter Consultation</span>  </caption>
     
    
        
		@if(isset($var))
				
						<div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>
					
		@endif
          


</center>
	
	<table>
		<form method="POST" action="{{route('medecin.addcons',$id)}}"  style=" margin-top:200px">
    @csrf
    
  
    <div class="card-body">
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Motif Consultation</td>
               
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="motifConsultation"  placeholder="Motif Consultation" value=" <?php
                    if(isset($_POST['motifConsultation']))
                    echo $_POST['motifConsultation']
                    ?> ">

                 
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
                    <input type="text" class="form-control" name="histoireMaladie"  placeholder="histoireMaladie" value=" <?php
                    if(isset($_POST['histoireMaladie']))
                    echo $_POST['histoireMaladie']
                    ?>">
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
                    <input type="text" class=" form-control" name="maladie"  placeholder="Maladie" value=" <?php
                    if(isset($_POST['maladie']))
                    echo $_POST['maladie']
                    ?>">
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
                    <input type="text" class="form-control" name="modeDevie" placeholder="Mode de vie" 
                    value=" <?php
                    if(isset($_POST['modeDevie']))
                    echo $_POST['modeDevie']
                    ?>">
                  
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
                    <input type="text" class=" form-control" name="decision"  placeholder="Décision"   value=" <?php
                    if(isset($_POST['decision']))
                    echo $_POST['decision']
                    ?>">
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
                    <input type="text" class="form-control" name="handicap"  placeholder="Handicap"  value=" <?php
                    if(isset($_POST['handicap']))
                    echo $_POST['handicap']
                    ?>" >
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
                    <input type="text" class=" form-control" name="operation"  placeholder="Opération"  value=" <?php
                    if(isset($_POST['operation']))
                    echo $_POST['operation']
                    ?>">
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
                    <input type="date" class=" form-control" name="dateConsultation" placeholder="Date de Consultation"   value=" <?php
                    if(isset($_POST['dateConsultation']))
                    echo $_POST['dateConsultation']
                    ?>">
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
                    <input type="text" class=" form-control" name="alergie"  placeholder="Opération"  value=" <?php
                    if(isset($_POST['alergie']))
                    echo $_POST['alergie']
                    ?>">
                </div>
            </div> <br>
            </td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Mode d'Admission</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                
                
                
               
                <td>
            <div class="col-3">
            <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="modeAdmission" placeholder="Mode d'Admission"   value=" <?php
                    if(isset($_POST['modeAdmission']))
                    echo $_POST['modeAdmission']
                    ?>">
                </div>
            </div><br>
            </td>

			</tr>
            <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td>
						<div class=" form-group">
                        <button type="submit" class="btn btn-primary  ">&nbsp;Ajouter</button>

						</div>
					</td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td>
               
                
               
                
                
                    <td>
						<div class=" form-group">
							<a class="bi bi-arrow-90deg-left btn btn-danger" style="font-family:times new roman;" href="{{route('medecin.lister')}}"> &nbsp;Retour</a>

						</div>
					</td>
            </tr>
        </div>
    
    </tbody>
</form>
	</table><br>

</div>
<!--
<div class="modal fade" id="traitement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title bi bi-plus" id="exampleModalLabel">Traitement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if(isset($var))
				
        <div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>

      @endif
		<form method="POST" action="" >
        @csrf
            
       
    
            <tr>
          
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Libellé</td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <input type="text" class="form-control" name="libelle"  value="">
                </div>
            </div><br>
            </td>
            </tr>
			<tr>
           
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Type</td>
                
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="type" value="" >
                </div>
            </div> <br><br>
            </td>
            </tr> 
            <tr><b> Ordonnance </b></tr> <br>
            <tr>
          
          <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Date</td>
          
          
          
         
          <td>
      <div class="col-3">
          <div class="input-group " style="width:400px">
              <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
              <input type="Date" class="form-control" name="dateOrdonnance"  value="">
          </div>
      </div><br>
      </td>
      </tr>
      <tr><b> Médicaments </b> <p id="add_button" style="margin-left:50px">ajout</p></tr> <br><br>
      
      <div class="col-3">
          <div class="input-group " style="width:400px">
              <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
              <input type="text" class="form-control" name="libelle"  value="" placeholder="libelle">
          </div>
      </div><br>
 
      <div class="col-3">
          <div class="input-group " style="width:400px">
              <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
              <input type="text" class="form-control" name="quantite"  value="" placeholder="Quantité">
          </div>
      </div><br>
 
    <div id="more_answers"></div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
</form>
      </div>
      
    </div>
  </div>
</div>


-->
       




<!--

<div class="modal fade" id="traitementcours" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title bi bi-plus" id="exampleModalLabel">Traitement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if(isset($var))
				
        <div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>

      @endif
		<form method="POST" action="" >
        @csrf
            
       
    
            <tr>
          
                <td  style="font-weight:bold;font-size:16px; font-family:times new roman" >Date</td>
                
                
                
               
                <td>
            <div class="col-3">
                <div class="input-group " style="width:400px">
                    <div class="input-group-text bg-primary" ><i class="fas fa-user text-light"></i></div>
                    <input type="text" class="form-control" name="date" disabled="disabled" value="">
                </div>
            </div><br>
            </td>
            </tr>
			<tr>
           
                <td style="font-weight:bold;font-size:16px ; font-family:times new roman" >Description</td>
                
                <td>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="description" value="" >
                </div>
            </div> <br>
            </td>
            </tr> 
     
         
    
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
</form>
      </div>
      
    </div>
  </div>
</div>
-->
<!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="myForm" method="" action="">
        <label for="question"> Question </label> <br>
        <input class="champ" type="textarea" name="question" id="question" value=""><br><br>
       
        <div id="more_answers"></div>
        <br>
        <h1 id="add_button">Add proposition</h1> <br><br><br>
        <input type="submit" value="submit">
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
     console.log( $(wrapper).append(`<input type="text" name="ans1" id="ans1" value=""><br><input type="checkbox" name="ans2" id="ans2"`) />) 
    var addButton = $('#add_button');
var wrapper = $('#more_answers');
$(addButton).click(function(e) {
    e.preventDefault();
  console.log( $(wrapper).append(`<input type="text" name="ans1" id="ans1" value=""><br><input type="checkbox" name="ans2" id="ans2"`) />) 
        
});

$(wrapper).on("click", ".delete", function(e) {
    e.preventDefault();
    $(this).parent('div').remove();
})
</script>
@endsection

			