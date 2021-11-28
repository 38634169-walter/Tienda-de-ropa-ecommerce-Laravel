document.addEventListener('DOMContentLoaded',function(){
    document.querySelector('#enviar').onclick = send_mail;
});


function send_mail(){
    
    
    var nombre = document.querySelector('#nombre').value;
    var email = document.querySelector("#email").value;
    var mensaje = document.querySelector("#mensaje").value;
    
    Email.send({
        Host : "smtp.gmail.com",
        Username : "walterdiaz9418@gmail.com",
        Password : "cstkyahnvmwbdnkc",
        To : 'walterdiaz9414@gmail.com',
        From : email,
        Subject : "Tienda e-commerce ropa",
        Body : `NOMBRE: ${nombre} <br> EMAIL: ${email} <br> ${mensaje}` 
    })
    .then(function(response){
        if (response == 'OK'){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Tu mail fue enviado con exito',
                showConfirmButton: true,
              })
        }
        else{
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Error al enviar el mail',
                text:'Verifica que tus datos esten completos y sean correctos',
                showConfirmButton: true,
              })
        }
    });

}

/*
                    <script src="https://smtpjs.com/v3/smtp.js"></script>
                    <script type="text/javascript">
                        function sendEmail() {

                            let name = valueById('name')
                            let email = valueById('email')
                            let subject = valueById('subject')
                            let text = valueById('comments')

                            Email.send({
                                    Host: "smtp.gmail.com",
                                    Username: "Tu correo",
                                    Password: "La contraseña",
                                    To: 'A quien le va dirigido el correo',
                                    From: email,
                                    Subject: name + " ; ; " + subject,
                                    Body: text,
                                })
                                .then(function(message) {
                                    alert("El mensaje se envió correctamente. Muchas gracias! ")
                                });
                        }

                        function valueById(element) {
                            return document.getElementById(element).value
                        }
                    </script>
                    */