document.addEventListener('DOMContentLoaded',function(){
    document.querySelector('#suscribirse').onclick = suscribirse;
  });
  
  function suscribirse(){
    
    var nombre = document.querySelector('#nombre2').value;
    var email = document.querySelector('#email2').value;
  
        
    Email.send({
      Host : "smtp.gmail.com",
      Username : "walterdiaz9418@gmail.com",
      Password : "cstkyahnvmwbdnkc",
      To : email,
      From : "veronicasales@secretaria.com",
      Subject : "Suscripcion Veronica´s Sales",
      Body : `Estimado ${nombre} quisieramos comentarle que su suscripcion a Veronica´s Sales fue completada con exito. Gracias por elegirnos` 
    })
      .then(function(response){
          if (response == 'OK'){
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Gracias por suscribirte! Te hemos enviado un email a tu cuenta',
                  showConfirmButton: true,
              })
          }
          else{
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Error al suscribirse',
              text:'Verifica que tus datos esten completos y sean correctos',
              showConfirmButton: true,
            })
          }
      });
  }