@extends('layout')

@section('cdns')
    <link rel="stylesheet" href="{{ asset('css/section/sucursales.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/sucursales-responsive.css') }}">
@endsection

@section('content')
    <section>
        <div class="portada-sucursales">
            <h1>Nuestras tiendas</h1>
            <p>En caso de no eleguir envio a domicilio podes pasar a retirar tu producto cualquier dia habil con tu dni</p>
        </div>
        <div class="sucursales-cuerpo-container">
            <h1>Con dedicacion</h1>
            <p>
                Con dedicacion y esfuerzo es que logramos con orgullo construir cada uno de nuestras tiendas 
                con el mismo lema de siempre, la satisfaccion del cliente no es una tarea mas, es un deber 
                que dia a dia cumplimos por eso es que nos enorgullesemos de mostrarte nuestras tiendas y te 
                invitamos a disfrutar de los beneficios que ofrecemos dia a dia
            </p>
            <div class="super-container-beneficios">
                <div class="beneficios-container">
                    <ul>
                        <img src="/imagenes/sucursales/1.webp" alt="">
                        <p>
                            No olvides que en veronica´s 
                            los Miercoles son de descuento, 
                            pensado especialmente para nuestros 
                            clientes que dia a dia nos eliguen
                        </p>
                    </ul>
                    <ul>
                        <img src="/imagenes/sucursales/2.webp" alt="">
                        <p>
                            Multiples medios de pagos para 
                            que puedas llevarte lo que deseas, 
                            cheques, tarjetas y mas. Por que 
                            sabemos que eso que te gusta debe ser 
                            tuyo por eso tambien tenemos cuotas 
                            sin interes.
                        </p>
                    </ul>
                    <ul>
                        <img src="/imagenes/sucursales/3.webp" alt="">
                        <p>
                            No solamente los Miercoles, tambien 
                            podes encontrar multiples ofertas 
                            diferentes dias solamente tenes que 
                            suscribirte a nuestro Newsletter, es 
                            sin argo.
                        </p>
                    </ul>
                </div>
            </div>
            <div class="nuestras-sucursales">
                <ul> 
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52639.90161180773!2d-58.69309449800721!3d-34.45230398041936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bca39ca574d823%3A0xd4fb0a11188d493e!2sGral.%20Pacheco%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1611961643683!5m2!1ses-419!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <div>
                        <h1>General Pacheco</h1>
                        <p>Av.Falsa 1234</p>
                        <p>Horarios de atencion 9hs a 18hs</p>
                        <p>Tel: 1155555555</p>
                    </div>
                </ul>
                <ul>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52627.49588795444!2d-58.563609447823744!3d-34.47198109577823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb03cd891437f%3A0xab3b49e671350275!2sSan%20Isidro%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1611961680546!5m2!1ses-419!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <div>
                        <h1>San Isidro</h1>
                        <p>Av.Falsa 1234</p>
                        <p>Horarios de atencion 9hs a 18hs</p>
                        <p>Tel: 1155555555</p>
                    </div>
                </ul>
                <ul>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52563.48321189731!2d-58.45603504687705!3d-34.57335767507687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb59c771eb933%3A0x6b3113b596d78c69!2sPalermo%2C%20CABA!5e0!3m2!1ses-419!2sar!4v1611961709349!5m2!1ses-419!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <div>
                        <h1>Palermo</h1>
                        <p>Av.Falsa 1234</p>
                        <p>Horarios de atencion 9hs a 18hs</p>
                        <p>Tel: 1155555555</p>
                    </div>
                </ul>
                <ul>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26291.429194184566!2d-58.478604229502466!3d-34.54270080052465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb420f6902f33%3A0x319825d17bcaba0d!2zTsO6w7FleiwgQ0FCQQ!5e0!3m2!1ses-419!2sar!4v1611961736464!5m2!1ses-419!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <div>
                        <h1>Nuñez</h1>
                        <p>Av.Falsa 1234</p>
                        <p>Horarios de atencion 9hs a 18hs</p>
                        <p>Tel: 1155555555</p>
                    </div>
                </ul>
                <ul>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52641.0576629726!2d-58.60161889802433!3d-34.450469828988275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bca568119a2861%3A0x27933dc457c12b90!2sSan%20Fernando%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1611961768196!5m2!1ses-419!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <div>
                        <h1>San Fernando</h1>
                        <p>Av.Falsa 1234</p>
                        <p>Horarios de atencion 9hs a 18hs</p>
                        <p>Tel: 1155555555</p>
                    </div>
                </ul>
                <ul>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26327.99294970239!2d-58.59335477977135!3d-34.42677750330523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bca5a2d0ddb9b1%3A0x2c1a974c67cba1e4!2sTigre%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1611961830419!5m2!1ses-419!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <div>
                        <h1>Tigre</h1>
                        <p>Av.Falsa 1234</p>
                        <p>Horarios de atencion 9hs a 18hs</p>
                        <p>Tel: 1155555555</p>
                    </div>
                </ul>
            </div>
        </div>
    </section>
@endsection

