<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

<script type="text/javascript">
  function submitData(){
    $(document).ready(function(){
      var data = {
        name: $("#name").val(),
        email: $("#email").val(),
        username: $("#username").val(),
        password: $("#password").val(),
        action: $("#action").val(), /*Si el usuario le da a registrarse o a login  */ 
      };

      $.ajax({
        url: 'funciones.php',
        type: 'post',
        data: data,
        success:function(response){
          console.log(response);
          // ALERTAS REGISTRO
          if (response.includes("La contraseña debe tener al menos 6 caracteres.El usuario debe tener al menos 6 caracteres.El correo electrónico no es válido.")) {
              $('#error').show(); 
              $('#contrasenia1').hide();
              $('#contrasenia2').hide();  
              $('#correo').hide();
              $('#user').hide();
              $('#vacio').hide();
              $('#userchar').hide();
            }
          else if (response.includes("La contraseña debe tener al menos 6 caracteres.")) {
              $('#contrasenia1').show();
              $('#contrasenia2').hide();  
              $('#correo').hide();
              $('#user').hide();
              $('#vacio').hide();
              $('#userchar').hide();
              $('#error').hide();
              }
          else if (response.includes("La contraseña debe contener al menos un número y una letra mayúscula.")) {
              $('#contrasenia2').show();  
              $('#correo').hide();
              $('#contrasenia1').hide();
              $('#user').hide();
              $('#vacio').hide();
              $('#userchar').hide();
              $('#error').hide();
            }
          else if (response.includes("El correo electrónico no es válido.")) {
              $('#correo').show();
              $('#contrasenia1').hide();
              $('#contrasenia2').hide();  
              $('#user').hide();
              $('#vacio').hide();
              $('#userchar').hide();
              $('#error').hide();
            }
            else if (response.includes("Este usuario o correo ya existe!,Por favor elija otro.")) {
                $('#user').show();
                $('#contrasenia1').hide();
                $('#contrasenia2').hide();  
                $('#correo').hide();
                $('#vacio').hide();
                $('#userchar').hide();
                $('#error').hide();
            }
            else if (response.includes("Por favor, Rellena todo el formulario.")) {
                $('#vacio').show();
                $('#contrasenia1').hide();
                $('#contrasenia2').hide();  
                $('#correo').hide();
                $('#user').hide();
                $('#userchar').hide();
                $('#error').hide();
            }
            else if (response.includes("El usuario debe tener al menos 6 caracteres.")) {
                $('#userchar').show();
                $('#contrasenia1').hide();
                $('#contrasenia2').hide();  
                $('#correo').hide();
                $('#user').hide();
                $('#error').hide();
            }
            else if (response.includes("Usuario registrado correctamente")) {
                window.location.href = 'login.php';
            }


          //LOGIN
          if(response == "Login Successful"){
            window.location.href = 'contacto.php';
            $('#alerta').show();
          }
           if(response == "Wrong Password")
           {
            //coge el id de el div y lo cambia para que se muestre
            $('#contrasenia').show();
            $('#noregistrado').hide();
           }
           if(response == "User Not Registered")
           {
             //coge el id de el div y lo cambia para que se muestre
             //ocultamos el de contraseña para que no haya 2 mensajes si el usuario marca un username que no exista
             $('#contrasenia').hide();
             $('#noregistrado').show();
           }
           
          }
      });
    });
  }
/*MODIFICAR ESTO PARA LOS VALIDADORES DE REGISTRO */ 
  function validateForm(){ 
  if(response == "Usuario registrado correctamente"){
    return true;
  }
  else
  {
    return false;
  }

  
}

  function Contact() {
  $(document).ready(function() {
    $.ajax({
      url: 'login.php',
      type: 'post',
      success: function(response) {
       
        window.location.href = 'login.php';
      }
    });
  });
}

  function submitDataLogout(){
    $(document).ready(function(){
      /*var data = {
   
        username: $("#username").val(),
        password: $("#password").val(),
      
      };
*/
      $.ajax({
        url: 'logout.php',
        type: 'post',
      /*  data: data,*/
        success:function(response){
          
          //response devuelve el echo de logout
          if(response == "Logout Successful"){
           
            window.location.reload();
          }
        }
      });
    });
  }
  
</script>
