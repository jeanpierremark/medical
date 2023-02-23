@extends('medecin.accueil')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<h1 style="color:darkblue" class="text-primary"><span class="bi bi-file-text-fill">&nbsp;</span>Ordonnance <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">ajouter</span></h1>

<form method="POST" action="{{ route('medecin.addordonnnace',$id) }}">
    @csrf
    <div class="card" style="border-top:4px solid #1ca8e3">
    <br>
       <center> 
        <h1 class="bi bi-file-text-fill">Ajouter Ordonnance</h1>
        @if(isset($var))
				
                <div style="width: 100%; font-size: 20px;" class="alert alert-danger ">{{$var}}</div>
            
    @endif
    @if(isset($vr))
				
                <div style="width: 100%; font-size: 20px;" class="alert alert-success ">{{$vr}}</div>
            
    @endif
    
    </center>
        <div class="card-body ">
            <div style="margin-left :20%">
            <br>
           
            <div class="text-primary"><h3>Ordonnance</h3></div><br>
            <div style="margin-left :20%">
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="date" class=" form-control" name="dateOrdonnance"   value="<?php echo (date('Y-m-d')) ?>" >
                </div>
            </div> <br><br>
            </div>
            <div class="text-primary"><h3>Médicaments <span class="btn btn-success bi bi-plus" id="add_button"></span></h3></div><br>
            <div style="margin-left :20%">
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="libelle[]" placeholder="Libellé" >
                </div>
            </div> <br>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="quantite[]" placeholder="Quantité" >
                </div>
            </div> <br>
            </div>
                    
                <div id="more_answers"></div><br>
                </div>
           
                <button class="bi bi-plus btn btn-primary"  style="font-family:times new roman" id="submit" type="submit" name="ajouter" >&nbsp;Ajouter</button>
                <a class="bi bi-arrow-90deg-left btn btn-danger" style="font-family:times new roman; margin-left:80%" href="{{route('medecin.lister')}}"> &nbsp;Retour</a>
                
            </div>
        </div>
    </div>
</form>
<script>
    var addButton = $('#add_button');
    var wrapper = $('#more_answers');
    $(addButton).click(function(e) {
        e.preventDefault();

        $(wrapper).append(`
        <div style="margin-left :20%">
                <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="libelle[]" placeholder="Libellé"  >
                </div>
            </div> <br>
            <div class="col-3">
                <div class="input-group" style="width:400px">
                    <div class="input-group-text bg-primary"><i class="fas fa-user text-light"></i></div>
                    <input type="text" class=" form-control" name="quantite[]" placeholder="Quantité"  >
                </div> <br>
            </div>`);
    });
    document.getElementById("submit").addEventListener("click", function() {
  let libelle = document.querySelectorAll("input[name='libelle']");
  let v1 = [];
  for (let i = 0; i < libelle.length; i++) {
    v1.push(libelle[i].value);
  }

  let quantite = document.querySelectorAll("input[name='quantite']");
  let v2 = [];
  for (let i = 0; i < quantite.length; i++) {
    v2.push(quantite[i].value);
  }

  //window.location.href = "MedecinController.php?var1=" + values;
  
  //document.write(values);
});


    </script>

@endsection
