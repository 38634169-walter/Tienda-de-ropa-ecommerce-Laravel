    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Veronica's sale</title>
            <!--BOOTSTRAP 4-->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <!--GOOGLE FONT-->
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Ultra&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
            <!--FONT AWSOME-->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
            <!--SWEET-ALERT-2-->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <!--SMTPJS-->
            <script src="https://smtpjs.com/v3/smtp.js"></script>
            <!--JQUERY-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <!--CSS-->
            <link rel="stylesheet" href="{{ asset('css/heade.css') }}">
            <link rel="stylesheet" href="{{ asset('css/footer.css') }} ">
            <link rel="stylesheet" href="{{ asset('css/responsive/footer-y-hea.css') }}">
            @yield('cdns')

        </head>
        <body>
            <header>
                <div class="top-container">       
                    <ul>
                        <li><h2>summer</h2></li>
                        <li><h1>50%</h1></li>
                        <li><h2>sale</h2></li>
                    </ul>
                    <div>
                        <i class="fas fa-plus" id="menu2"></i>
                        <i class="fas fa-times-circle" id="menu2X"></i>
                    </div>
                    <div id='usu'>
                        <li>
                            <i class='fas fa-search' id='lupa-escritorio'> Buscar</i>
                            <form action='{{ route('buscador') }}' method='POST' id='buscador'>
                                @csrf
                                <input type='text' name='palabra' placeholder='Buscar..'>
                                <button type='submit' style='background:rgba(0, 128, 0, 0); border:0px;' ><i class='fas fa-search' id='lupa'> Buscar</i></button>
                            </form>
                        </li>
                        @php
                            //error_reporting(0);
                        @endphp
                        @if(session('logged')==true)
                            <li><a href='{{ route('perfil') }}'><i class='fas fa-user' id='user'></i>{{ session('nombreUsu') }}</a></li>
                            @else
                                <li><a href='{{ route('login') }}'><i class='fas fa-user' id='user'></i>Login</a></li>
                        @endif
                        <li><a href='{{ route('carrito') }}'><i class='fas fa-shopping-cart'></i>Carrito</a></li>
                    </div>
                </div>
                <div class="menu-responsive">                                   
                    <h5>Veronica's sales</h5><i class="fas fa-align-justify menu-icon-responsive"></i><i class="fas fa-times x-icono-responsive"></i>
                </div>
                <nav class="nav">
                    <div class="nom">                                         
                        <li><h1>Veronica's Sales</h1></li>
                    </div>
                    <div class="menu">                                               
                        <div>
                            <div>
                                <a href="{{ route('index') }}" style="display:block;">Inicio</a>
                            </div>
                        </div>
                        <div id="categorias-container">
                            <div class="dropbtn1">
                                <i class="fas fa-shopping-bag market-icon" style="font-size: 25px;"></i>
                                <a>Tienda</a>
                                <i class="fas fa-chevron-down arrow-down-sub-menu1"></i>
                                <i class="fas fa-chevron-right arrow-side-sub-menu1"></i>
                            </div>
                            <ul class="sub-menu1 sub-menu">
                                <li id="titulo-categoria">
                                    <p>CATEGORIAS</p>
                                </li>        
                                <li>
                                    <div class="dropbtn1-1">
                                        <img src="/image/iconfinder_shirt_sport_trickot_tshirt_clothes_4843037.svg" width="25px" height="25px"alt="">
                                        <a>Remeras</a>
                                        <i class="fas fa-chevron-down down1"></i>
                                        <i class="fas fa-chevron-right side1"></i>
                                    </div>
                                    <ul class="sub-menu1-1">
                                        <div><a href="{{ route('subCategoriaProducto',"Remeras mangas largas") }}"> Remeras mangas largas</a></div>
                                        <div><a href="{{ route('subCategoriaProducto',"Remeras mangas cortas") }}"> Remeras mangas cortas</a></div>
                                    </ul>
                                </li>
                                <li>
                                    <div class="dropbtn1-2">
                                        <img src="/image/iconfinder_clothing_accesories_clothes_fabric-18_498970.svg" width="25px" height="25px"alt="">
                                        <a>Jeans</a>
                                        <i class="fas fa-chevron-down down2"></i>
                                        <i class="fas fa-chevron-right side2"></i>
                                    </div>
                                    <ul class="sub-menu1-2">
                                        <div><a href="{{ route('subCategoriaProducto',"Jeans largos") }}"> Jeans largos</a></div>
                                        <div><a href="{{ route('subCategoriaProducto',"Jeans cortos") }}"> Jeans cortos</a></div>
                                    </ul>
                                </li>
                                <li>
                                    <div class="dropbtn1-3">
                                        <img src="/image/iconfinder_dress_1845787.svg" width="25px" height="25px"alt="">
                                        <a>Vestidos</a>
                                        <i class="fas fa-chevron-down down3"></i>
                                        <i class="fas fa-chevron-right side3"></i>
                                    </div>
                                    <ul class="sub-menu1-3">
                                        <div><a href="{{ route('subCategoriaProducto',"Vestidos largos") }}"> Vestidos largos</a></div>
                                        <div><a href="{{ route('subCategoriaProducto',"Vestidos cortos") }}"> Vestidos cortos</a></div>
                                    </ul>
                                </li>
                                <li>
                                    <div class="dropbtn1-4">
                                        <img src="/image/iconfinder_clothing_accesories_clothes_fabric-03_498955.svg" width="25px" height="25px"alt="">
                                        <a>Sweaters</a>
                                        <i class="fas fa-chevron-down down4"></i>
                                        <i class="fas fa-chevron-right side4"></i>
                                    </div>
                                    <ul class="sub-menu1-4">
                                        <div><a href="{{ route('subCategoriaProducto',"Sweaters finos") }}"> Sweaters finos</a></div>
                                        <div><a href="{{ route('subCategoriaProducto',"Sweaters gruesos") }}"> Sweaters gruesos</a></div>
                                    </ul>
                                </li>
                                <li>
                                    <div class="dropbtn1-5">
                                        <img src="/image/iconfinder_Shoes_2_753928.svg" width="25px" height="25px"alt="">
                                        <a>Zapatos</a>
                                        <i class="fas fa-chevron-down down5"></i>
                                        <i class="fas fa-chevron-right side5"></i>
                                    </div>
                                    <ul class="sub-menu1-5">
                                        <div><a href="{{ route('subCategoriaProducto',"Zapatos de cuero") }}"> Zapatos de cuero</a></div>
                                        <div><a href="{{ route('subCategoriaProducto',"Zapatos de taco") }}"> Zapatos de taco</a></div>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div>
                                <a href="{{ route('trabaja') }}" style="display:block;">Trabaja con nosotros</a>
                            </div>
                        </div>
                        <div>
                            <div>
                                <a href="{{ route('contacto') }}" style="display:block;">Contacto</a>
                            </div>
                        </div>
                        <div>
                            <div>
                                <a href="{{ route('sucursales') }}" style="display:block;">Sucursales</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            @yield('content')

            @yield('scripts')
            <script src="{{ asset('js/menu-responsiv.js') }}"></script>
            <script src="{{ asset('js/buscad.js') }}"></script>
            
            <footer>
                <div class="footer-container">
                    <div class="footer-preguntas">
                        <h2 style="color:rgb(82, 32, 95);font-size:20px;">Enlaces disponibles</h2>
                        <li><p>> </p><a href="{{ route('index') }}">Inicio</a></li>
                        <li><p>> </p><a href="{{ route('sucursales') }}">Sucursales</a></li>
                        <li><p>> </p><a href="{{ route('trabaja') }}">Trabaja con nosotros</a></li>
                        <li><p>> </p><a href="{{ route('contacto') }}">Contacto</a></li>
                    </div>
                    <div class="footer-redes">
                        <h1>Recibi nuestras ofertas</h1>
                        <form onsubmit="return false">
                            <input type="text" placeholder="Nombre" id="nombre2">
                            <input type="email" placeholder="Email" id="email2">
                            <button id="suscribirse">Suscribirse</button>
                        </form>
                        <script src="{{ asset('js/newsletter.js') }}"></script>
                        <h1>Seguinos en:</h1>
                        <div>
                            <a href="https://www.facebook.com" target="blank"><i class="fab fa-facebook-f" id="facebook"></i></a>
                            <a href="https://www.instagram.com" target="blank"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="bottom-text">
                    <p>© Copyright<strong style="color:green"> Walter Diaz 2021</strong>. Todos los derechos reservados</p>
                    <p>Creaciones de muestra como desarrollador web este contenido no refiere a ninguna marca, ni empresa en especial.</p>
                    <p>Para mas informacion visita mi pagina web o clickea en el siguiente link <a href="http://mighty-spire-20714.herokuapp.com/" target="blank" style="color:green; text-decoration:none;font-weight: bold;">http://mighty-spire-20714.herokuapp.com/</a></p>
                </div>
            </footer>
        </body>
    </html>
