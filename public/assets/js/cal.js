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