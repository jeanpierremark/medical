@extends('secretaire.accueil')

@section('content')
<div class="card card-info">
  
    <div class="card-body">
        <div id="calendar" ></div>
    
    </div>

</div>
<script>
    $(document).ready(function () {
   var calendar = $('#calendar').fullCalendar({
    header:{
        left:'prev,next  today',
        center:'title',
        right:'month,basicWeek,basicDay'
    },
    navLinks:true,
    editable:true,
   });
});
</script>
@endsection