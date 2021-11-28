@extends('layout')

@section('cdns')
    <link rel="stylesheet" href="{{ asset('css/section/trabaja.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/trabaja-responsive.css') }}">
@endsection

@section('content')
    <section>
        <div class="portada-trabaja">
            <h1>Gracias por eleguirnos</h1>
            <p>Recursos Humanos evaluara tu curriculum y se comunicara con vos</p>
        </div>
        <div class="cuerpo-trabaja">
            <li></li>
            <h1>Dejanos tu Curriculum</h1>
            <div>
                <img src="/imagenes/trabaja/1.webp" style="float:left">
                <p>
                    A menudo pedimos personal para nuestras sucursales en toda la provincia, 
                    no siempre esto sucede pero en el caso de que hayas visto algun anuncio 
                    podes dejarnos tu curriculum vitae y recursos humanos lo evaluara. Cuando 
                    buscamos personal por lo general sale publicado en nuestras redes sociales. Ofrecemos 
                    capacitaciones en ventas y marketing a nuestros empleados. Recorda que tambien 
                    tomamos personal masculino para tareas de transporte y carga.                        
                </p>
            </div>
            <form onsubmit="return false">
                <h1>Enviar curriculum</h1>
                <div>
                    <ul>
                        <label>*Nombre: <input type="text" id="nombre" placeholder="Nombre" required></label>
                        <label>*Apellido: <input type="text" id="apellido" placeholder="Apellido" required></label>
                        <label>*Dni: <input type="number" id="dni" placeholder="DNI" required></label>
                        <label>*Email: <input type="email" id="email" placeholder="Email" required></label>
                        <label>*Tel: <input type="number" id="telefono" placeholder="Telefono" required></label>
                    </ul>
                    <ul>
                        <label >Mensaje que quieras dejar: <textarea id="mensaje" placeholder="Mensaje" cols="30" rows="10"></textarea></label>
                        <label id="label-curriculum">*Curriculum: <input type="file" id="curriculum" required></label>
                    </ul>
                </div>
                <button id="enviarC">Enviar</button>
            </form>
        </div>
    </section>
    @section('scripts')
        <script src="js/formulario-trabaja.js"></script>
    @endsection
@endsection