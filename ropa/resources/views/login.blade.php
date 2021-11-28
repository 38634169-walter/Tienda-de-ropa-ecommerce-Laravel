@extends('layout')

@section('cdns')
    <link rel="stylesheet" href="{{ asset('css/section/log.css') }}">
    <!--SWEET-ALERT-2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    @php
        error_reporting(0);
    @endphp
    @if($errorDatos)
        <script>
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Contraseña o usuario incorrectos!'
            })
        </script>
    @endif
    @if($registrado)
        <script>
            Swal.fire(
              'Registrado!',
              'Ya podes iniciar sesion!',
              'success'
            )
        </script>
    @endif
    @if($errorRegistrar)
        <script>
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'No se pudo registrar'
            })
        </script>
    @endif
    <section>
        <h2 id="titulo-login">Bienvenido!</h2>
        <h2>Si no tenes cuenta podes registrarte debajo</h2>
        <form class="form-container-login" action="{{ route('ingresar') }}" method="POST">
            @csrf
            <li><label>Usuario: </label><input type="text" name="usuario" placeholder="Usuario" value="{{ old('usuario') }}" require></li>
            @error('usuario')
                <small style="color:red;">*{{ $message }}</small>
            @enderror
            <li><label>Contraseña: </label><input type="password" name="clave" placeholder="Constraseña" value="{{ old('clave') }}" require></li>
            @error('clave')
                <small style="color:red;">*{{ $message }}</small>
            @enderror
            <br>
            <button id="btn-login" name="btnForm"> Ingresar</button>
        </form>
        <br>       
        <div>
            <p style="text-align: center;">No tengo cuenta <a href="{{ route('registrarme') }} ">Registrarme</a></p>
        </div>
    </section>
@endsection