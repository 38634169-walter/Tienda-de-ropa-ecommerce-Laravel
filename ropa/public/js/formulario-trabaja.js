document.addEventListener('DOMContentLoaded',function(){
  document.querySelector('#enviarC').onclick = send_curriculum;
});

function send_curriculum(){
  var validacion=true;
  var nombre = document.querySelector('#nombre').value;
  var apellido = document.querySelector('#apellido').value;
  var dni = document.querySelector('#dni').value;
  var email = document.querySelector('#email').value;
  var telefono = document.querySelector('#telefono').value;
  var mensaje = document.querySelector('#mensaje').value;
  //var curriculum = document.getElementById("curriculum").files.name;

  if(nombre == "" || apellido == "" || dni == "" || email == "" || telefono == ""){
    validacion=false;
  }
  if( document.getElementById("curriculum").files.length == 0 ){
    validacion=false;
  }
  
  if(validacion==true){
    Email.send({
      Host : "smtp.gmail.com",
      Username : "walterdiaz9418@gmail.com",
      Password : "cstkyahnvmwbdnkc",
      To : 'walterdiaz9414@gmail.com',
      From : email,
      Subject : "Curriculum",
      Body : `Nombre: ${nombre} <br> Apellido: ${apellido} <br> Dni: ${dni} <br> Email: ${email} <br> Tel: ${telefono} <br> ${mensaje} <br>`,
      Attachments : [
        {
          name : "curriculum",
          path : "https://networkprogramming.files.wordpress.com/2017/11/smtpjs.png"
        }]
    })
      .then(function(response){
          if (response == 'OK'){
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Tu curriculum se envio con exito',
                  showConfirmButton: true,
                })

          }
          else{
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Error al enviar curriculum',
              text:'Verifica que tus datos esten completos y sean correctos',
              showConfirmButton: true,
            })
          }
      });
  }
}


