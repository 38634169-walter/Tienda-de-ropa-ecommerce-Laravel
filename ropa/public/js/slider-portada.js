$(document).ready(slider_portada);

var indice=0;

function slider_portada(){
    $('.paginacion li').eq(0).css({'background':'pink'});
    
    $('.flecha-derecha').click(function(){
        indice++;
        if(indice > 3){
            indice = 0;
        }
        $('.slider').hide();
        $('.slider').eq(indice).fadeIn();

        $('.paginacion li').css({'background':'red'});
        $('.paginacion li').eq(indice).css({'background':'pink'});
    });
    $('.flecha-izquierda').click(function(){
        indice--;
        if(indice < 0){
            indice = 3;
        }
        $('.slider').hide();
        $('.slider').eq(indice).fadeIn();

        $('.paginacion li').css({'background':'red'});
        $('.paginacion li').eq(indice).css({'background':'pink'});
    });

    $('.paginacion li').click(function(){
        indice = $(this).index();
        $('.paginacion li').css({'background':'red'});
        $('.paginacion li').eq(indice).css({'background':'pink'});
        $('.slider').hide();
        $('.slider').eq(indice).fadeIn();
    });

    setInterval( function(){
        
        indice++;
        if(indice > 3){
            indice = 0;
        }
        $('.slider').hide();
        $('.slider').eq(indice).fadeIn();

        $('.paginacion li').css({'background':'red'});
        $('.paginacion li').eq(indice).css({'background':'pink'});
    },3000);
}