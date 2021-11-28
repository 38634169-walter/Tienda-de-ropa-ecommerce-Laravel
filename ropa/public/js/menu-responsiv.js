$(document).ready(menu);


function menu(){
    
    /* ICONOS MENU RESPONSIVE */ 
    
    $('.menu-icon-responsive').click(mostrar);

    $('.x-icono-responsive').click(ocultar);
    
    if ($(window).width() <= 800){
        
        $('.top-container').click(ocultar);
        $('section').click(ocultar);
        $('footer').click(ocultar);
    }

    /* FLECHAS MENU Y SUBMENU */ 
    $('.dropbtn1').click(flechas_menu);

}

function mostrar(){
    $('.menu-icon-responsive').css({
        'transition': 'all 1s',
        'transform':'rotate(180deg) scale(0.0)'
    });
    $('.x-icono-responsive').css({
        'transition':'all 1s',
        'transform':'rotate(360deg) scale(1.0)',
        'display':'block'
    });
    $('.nav').css({'left':'0','transition':'all 0.5s'});

    if($('.sub-menu1').is(':visible')){
        flechas_menu();
    }
}

function ocultar(){
    $('.menu-icon-responsive').css({
        'transition':'all 1s',
        'transform':'rotate(360deg) scale(1.0)',
        'display':'block'
    });
    $('.x-icono-responsive').css({
        'transition':'all 1s',
        'transform':'rotate(180deg) scale(0.0)'
    });

    $('.nav').css({'left':'-100%'});
    
}

function flechas_menu(){
    
    $('.sub-menu1').toggleClass('show');
    $('.arrow-down-sub-menu1').toggleClass('remove');
    $('.arrow-side-sub-menu1').toggleClass('show');

    $('.sub-menu1-1').removeClass('show');
    $('.sub-menu1-2').removeClass('show');
    $('.sub-menu1-3').removeClass('show');
    $('.sub-menu1-4').removeClass('show');
    $('.sub-menu1-5').removeClass('show');

    $('.down1').removeClass('remove');
    $('.side1').removeClass('show');
    $('.down2').removeClass('remove');
    $('.side2').removeClass('show');
    $('.down3').removeClass('remove');
    $('.side3').removeClass('show');
    $('.down4').removeClass('remove');
    $('.side4').removeClass('show');
    $('.down5').removeClass('remove');
    $('.side5').removeClass('show');
    flechas_submenu();
}

function flechas_submenu(){
    
    $('.dropbtn1-1').click(function(){
        $('.sub-menu1-1').toggleClass('show');
        $('.down1').toggleClass('remove');
        $('.side1').toggleClass('show');
    });
    $('.dropbtn1-2').click(function(){
        $('.sub-menu1-2').toggleClass('show');
        $('.down2').toggleClass('remove');
        $('.side2').toggleClass('show');
    });
    $('.dropbtn1-3').click(function(){
        $('.sub-menu1-3').toggleClass('show');
        $('.down3').toggleClass('remove');
        $('.side3').toggleClass('show');
    });
    $('.dropbtn1-4').click(function(){
        $('.sub-menu1-4').toggleClass('show');
        $('.down4').toggleClass('remove');
        $('.side4').toggleClass('show');
    });
    $('.dropbtn1-5').click(function(){
        $('.sub-menu1-5').toggleClass('show');
        $('.down5').toggleClass('remove');
        $('.side5').toggleClass('show');
    });
}
