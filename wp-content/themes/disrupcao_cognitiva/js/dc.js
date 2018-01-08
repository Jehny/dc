$(document).ready(function(){


    if($('#enviado').length){
         $('#myModal').modal('toggle');
    }

     if($('#enviado_slider').length){
         $('#myModalSlider').modal('toggle');
    }

    $('#submit').addClass('btn');
    $('#submit').addClass('btn-warning');

    $('#author').val("");
    $('#email').val("");
    $('#url').val("");
    $("#comment").val("");
});