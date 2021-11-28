@extends('layout')

@section('cdns')
    <link rel="stylesheet" href="{{ asset('css/section/registrars.css')}} ">
@endsection

@section('content')
    @php
        error_reporting(0);
    @endphp
     <section>
        <br>
        <h2>Bienvenido! tomara unos poco segundos</h2>
        <form action="{{ route('registrarme.store') }}" method="POST" id="form-registrarse">
            @csrf
            <div>
                <h2 style="color:white;font-size:20px">Datos Personales</h2>
                <div>
                    <ul>
                        <li>
                            <label for="">*Nombre</label><input type="text" name="nombre" value="{{ old('nombre') }}" require>
                            @error('nombre')
                                <br>
                                <small style="color:red">*{{ $message }}</small>
                            @enderror
                        </li>
                        <li>
                            <label for="">*Apellido</label><input type="text" name="apellido" value="{{ old('apellido') }}" require>
                            @error('apellido')
                            <br>
                                <small style="color:red">*{{ $message }}</small>
                            @enderror
                        </li>
                        <li>
                            <label for="">*DNI</label><input class="inputN" type="number" name="DNI" value="{{ old('DNI') }}" require>
                            @error('DNI')
                                <br>
                                <small style="color:red">*{{ $message }}</small>
                            @enderror
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <label for="">Telefono</label><input class="inputN" type="number" name="telefono" value="{{ old('telefono') }}">
                            @error('telefono')
                                <br>
                                <small style="color:red">*{{ $message }}</small>
                            @enderror
                        </li>
                        <li>
                            <label for="">*Email</label><input type="email" name="email" value="{{ old('email') }}" require>
                            @error('email')
                                <br>
                                <small style="color:red">*{{ $message }}</small>
                            @enderror
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <h2 style="color:white;font-size:20px">Datos de usuario</h2>
                <div>
                    <li>
                        <label for="">*Usuario</label><input type="text" name="usuario" value="{{ old('usuario') }}" require>
                        @error('usuario')
                            <br>
                            <small style="color:red">*{{ $message }}</small>
                        @enderror
                        @if($usuarioEnUso)
                            <br>
                            <small style="color:red">*Usuario en uso</small>
                        @endif
                    </li>
                    <li>
                        <label for="">*Contraseña</label><input type="password" name="clave1" require>
                        @error('clave1')
                                <br>
                                <small style="color:red">*{{ $message }}</small>
                        @enderror    
                    </li>
                    <li>
                        <label for="">*Repetir contraseña</label><input type="password" name="clave2" require>
                        @error('clave2')
                                <br>
                                <small style="color:red">*{{ $message }}</small>
                        @enderror    
                        @if($diferentesClaves)
                            <br>
                            <small style="color:red">*Claves no coinciden</small>
                        @endif
                    </li>
                </div>
            </div>
            <br>
            <button name="btn-registro">Registrarme</button>
        </form>
    </section>
@endsection