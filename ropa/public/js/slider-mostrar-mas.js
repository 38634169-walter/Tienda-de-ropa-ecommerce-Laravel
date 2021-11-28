$(document).ready(slider);
var index=0;
var b=0;

function slider(){
    var tam = $('.mostrar-mas').length;
    $('.flecha-derecha-mostrar-mas').click(function(){
        if( $('.mostrar-mas').eq(index+1).length){
            $('.mostrar-mas').eq(index).css({'display':'none'});
            index ++;
        }
        else{
            index=0;
            $('.mostrar-mas').css({'display':'block'});
        }
    });
    
    $('.flecha-izquierda-mostrar-mas').click(function(){
        if((index >=  0) && (b==1 || index > 0) ){
            b=1;
            $('.mostrar-mas').eq(index).css({'display':'block'});
            index --;
        }
        else{
            if(index == -1){
                $('.mostrar-mas').css({'display':'none'});
                index=tam-1;
                $('.mostrar-mas').eq(index).css({'display':'block'});
            }
        }
        if(index == 0 && b==0){
            b=1;
            $('.mostrar-mas').css({'display':'none'});
            index=tam-1;
            $('.mostrar-mas').eq(index).css({'display':'block'});
        } 
    });
}