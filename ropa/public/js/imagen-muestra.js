$(document).ready(mostrar_imagen);
var indice=0;
var atributo;

function mostrar_imagen(){
    $('.imagenes-min').click(function(){
        indice=$(this).index();
        atributo=$('.imagenes-min').eq(indice).attr('src');
        $('#mostrar-imagen').attr('src',atributo);
    });
}
