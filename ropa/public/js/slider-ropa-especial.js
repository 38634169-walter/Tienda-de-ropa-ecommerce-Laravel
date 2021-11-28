$(document).ready(slider);
var index=0;
var b=3;

function slider(){
    $('.flecha-derecha-especiales').click(flecha_derecha);     
    $('.flecha-izquierda-especiales').click(flecha_izquierda);
}


function flecha_derecha(){
    if(index <= 2){
        $('.vestidos-especiales').eq(index).css({'display':'none'});

        index ++;
    }
    /* flechas */
    if(index == 3){
        $('.flecha-derecha-especiales').css({'display':'none'});
    }
    if(index == 1){
        b=0;
        $('.flecha-izquierda-especiales').css({'display':'block'});
    }
}    
function flecha_izquierda(){
    if(b==3){
        b=0;
        $('.flecha-izquierda-especiales').css({'display':'none'});
    }
    else{
        if(index >=  0){
            index --;
            $('.vestidos-especiales').eq(index).css({'display':'block'});
        }
        if(index == 0){
            $('.flecha-izquierda-especiales').css({'display':'none'});
        }
        if(index == 2){
            $('.flecha-derecha-especiales').css({'display':'block'});
        }
    }
}