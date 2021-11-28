$(document).ready(buscador);

function buscador(){
    /*intervalo menu scale*/
    var b=0;    
    setInterval(() => {
        if(b==0){
            b=1;
            $('#menu2').css({'transform':'scale(1.1)','box-shadow':'0px 0px 20px white'});
        }
        else{
            b=0;
            $('#menu2').css({'transform':'scale(1.0)','box-shadow':'0px 0px 0px white'});
        }

    }, 700);
    /* MENU 2*/

    $('#menu2').click(abrir_menu);

    $('#menu2X').click(cerrar_menu);
    
    /* BUSCADOR */ 

    $('#lupa-escritorio').click(ver_buscador);
}

function cerrar_menu(){
    $('#usu').css({'display':'none'});
    $('#menu2').css({'display':'block'});
    $('#menu2X').css({'display':'none'});
}

function abrir_menu(){
    $('#usu').css({'display':'flex','flex-direction':'column','justify-content':'center','align-items':'center'});
    $('#menu2').css({'display':'none', 'transition':'all 1s'});
    $('#menu2X').css({'display':'block'});
    if($('#menu2X').is(':visible')){
        $('footer').click(cerrar_menu);
        $('section').click(cerrar_menu);
    }
}

function ver_buscador(){
    $('#buscador').css({'display':'block'});
    $('#lupa-escritorio').css({'display':'none'});
    if($('#buscador').is(':visible')){
        $('footer').click(ocultar_buscador);
        $('section').click(ocultar_buscador);
    }
}

function ocultar_buscador(){
    $('#buscador').css({'display':'none'});
    $('#lupa-escritorio').css({'display':'block'});
}
