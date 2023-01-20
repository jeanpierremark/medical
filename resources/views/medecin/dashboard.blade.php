@extends('medecin.accueil')

@section('content')

<div class="pagetitle">
      <div class="pagetitle">
       <h1 style="font-size: 40px;" ><span class="fas fa-fw fa-home"></span> Bienvenu sur SJD-Medical <span class="text-secondary" style="font-size:15px">votre logiciel d'assistance de suivi des patients</span> </h1>

       <br><br><br>
    <section class="section dashboard">
      <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div id="c1" style="border-left:5px solid darkblue;" class="card  bg-white shadow h-70 py-2">
                                <div class="card-body ">
                                    <div class="row no-gutters align-items-center justify-content-between">
                                        <div class="col mr-2">
                                        
                                            <a  style="color: darkblue;text-decoration: none;font-weight: bold;" class="h3  mb-0 font-weight-bold " href="{{route('medecin.agenda')}}">Agenda RD-Vous</a>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{route('medecin.agenda')}}"><i class="fas fa-calendar-alt fa-3x" style=" color: darkblue;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width:100px;"></div>
                       

                       

                       
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div id="c3" style="border-left:5px solid darkblue;" class="card  bg-white shadow h-60 py-2">
                                <div class="card-body ">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a style="color: darkblue;text-decoration: none;font-weight: bold;" class="h3  mb-0 font-weight-bold" href="{{route('medecin.listeconsult')}}">Consul- tations</a>
                                           
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{route('medecin.listeconsult')}}"><i class="fas fa-list  fa-3x " style=" color: darkblue;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="width:100px;"></div>
                       

                       

                       
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div id="c3" style="border-left:5px solid darkblue;" class="card  bg-white shadow h-60 py-2">
                                <div class="card-body ">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a style="color: darkblue;text-decoration: none;font-weight: bold;" class="h3  mb-0 font-weight-bold" href="{{route('medecin.lister')}}">Liste Patient</a>
                                           
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{route('medecin.lister')}}"><i class="fas fa-list  fa-3x " style=" color: darkblue;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>



           <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        </div><!-- End Right side columns -->

      </div>
    </section>

    @endsection