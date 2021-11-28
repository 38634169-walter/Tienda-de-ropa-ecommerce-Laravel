$(document).ready(slider);
var index=0;
var b=0;

function slider(){
    var tam = $('.mostrar-mas2').length;
    $('.flecha-derecha-mostrar-mas2').click(function(){
        if( $('.mostrar-mas2').eq(index+1).length){
            $('.mostrar-mas2').eq(index).css({'display':'none'});
            index ++;
        }
        else{
            index=0;
            $('.mostrar-mas2').css({'display':'block'});
        }
    });
    $('.flecha-izquierda-mostrar-mas2').click(function(){
        if((index >=  0) && (b==1 || index > 0) ){
            b=1;
            $('.mostrar-mas2').eq(index).css({'display':'block'});
            index --;
        }
        else{
            if(index == -1){
                $('.mostrar-mas2').css({'display':'none'});
                index=tam-1;
                $('.mostrar-mas2').eq(index).css({'display':'block'});
            }

        }
        if(index == 0 && b==0){
            b=1;
            $('.mostrar-mas2').css({'display':'none'});
            index=tam-1;
            $('.mostrar-mas2').eq(index).css({'display':'block'});
        } 
    });
}