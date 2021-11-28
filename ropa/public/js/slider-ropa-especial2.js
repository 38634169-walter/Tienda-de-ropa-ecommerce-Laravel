/*
$(document).ready(slider);
var index=0;

function slider(){

    $('.flecha-derecha-especiales2').click(function(){
        if(index <= 4){
        $('.vestidos-especiales2').eq(index).css({'display':'none'});
        index ++;
        }

    });
    $('.flecha-izquierda-especiales2').click(function(){
        if(index >=  0){
            $('.vestidos-especiales2').eq(index).css({'display':'block'});
            index --;
            if(index < 0){
                index++;
            }
        }

    });
}
*/



$(document).ready(slider2);
var index=0;
var b=3;

function slider2(){
    $('.flecha-derecha-especiales2').click(flecha_derecha2);    
    $('.flecha-izquierda-especiales2').click(flecha_izquierda2);
}


function flecha_derecha2(){
    if(index <= 4){
        $('.vestidos-especiales2').eq(index).css({'display':'none'});

        index ++;
    }
    /* flechas */
    if(index == 5){
        $('.flecha-derecha-especiales2').css({'display':'none'});
    }
    if(index == 1){
        b=0;
        $('.flecha-izquierda-especiales2').css({'display':'block'});
    }
}    
function flecha_izquierda2(){
    if(b==3){
        b=0;
        $('.flecha-izquierda-especiales2').css({'display':'none'});
    }
    else{
        if(index >=  0){
            index --;
            $('.vestidos-especiales2').eq(index).css({'display':'block'});
        }
        if(index == 0){
            $('.flecha-izquierda-especiales2').css({'display':'none'});
        }
        if(index == 4){
            $('.flecha-derecha-especiales2').css({'display':'block'});
        }
    }
}