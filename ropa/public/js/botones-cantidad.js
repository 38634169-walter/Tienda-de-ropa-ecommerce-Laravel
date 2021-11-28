$(document).ready(function(){
    $('#decrementar').click(function(){
        var cant = parseInt($('#cantidad-articulo').val());
        if(cant>1){
            $('#cantidad-articulo').val(parseInt($('#cantidad-articulo').val()) - 1);
        }
    });
    $('#aumentar').click(function(){
        $('#cantidad-articulo').val(parseInt($('#cantidad-articulo').val()) + 1);
    });
})