@extends('medecin.accueil')
@section('content')
        <div class="container ">
            <p>
            <h1 style="color:darkblue" class="text-primary"><span class="fa fa-calendar-alt">&nbsp;</span>Agenda <span class="breadcrumb-item text-secondary small" style="font-size: 15px; ">Rendez-vous</span></h1>
            </p>
            <div class="panel panel-primary ">
                <div class="panel-heading text-center bg-warning" style="color:white;margin-bottom:5px">
                 <h1> <span class="fa fa-calendar-alt"></span> Agenda des rendez-vous</h1>
                </div>
                <div class="panel-body"   style="background-color:white">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>  
  
@endsection
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>
  