@extends('layout')

@section('cdns')
    <link rel="stylesheet" href="{{ asset('css/section/contacto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/contacto-responsive.css') }}">
    <!--SWEET-ALERT-2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--SMTPJS-->
    <script src="https://smtpjs.com/v3/smtp.js"></script>

@endsection

@section('content')
    <section>
        <div class="portada-contacto">
            <h1>Contactanos</h1>
            <p>
                Nuestro equipo administrativo respondera a la brevedad
            </p>
        </div>
        <div class="cuerpo-container-contacto">
            <h1>Dejanos tu consulta</h1>
            <p>Recorda que tambien podes contactarte por redes sociales y whats app. Estamos a tu disposicion</p>
            <form onsubmit="return false">
                <label>Nombre: <input type="text" id="nombre" placeholder="Nombre"></label>
                <label>Tu email: <input type="email" id="email" placeholder="Email"></label>
                <label>Mensaje: <textarea id="mensaje" cols="30" rows="10" placeholder="Mensaje"></textarea></label>
                <button id="enviar">Enviar</button>
            </form>
        </div>
    </section>

    @section('scripts')
        <script src="{{ asset('js/send-mail.js')}}"></script>
    @endsection

@endsection