@extends('medecin.accueil')
@section('content')

              
                    <div class="card-body">
                   
                    <table  class=" table  table-striped  " style=" background: white; border: 0px; width:100%"> 
                        
                        <tbody>
                            @foreach ($medicament as $med)
                                <tr>
                                    <td>{{$med->libelle}} {{$med->quantite}} </td>
                                   
                                </tr>
                            @endforeach
                           
                        </tbody>
                      </table>
                    
            
        </div>
  

@endsection
