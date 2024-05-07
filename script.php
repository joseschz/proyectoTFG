<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script src = "js/sweetalert2.min.js">
</script>

<script type="text/javascript">

  function register(){
    var nombre = $('#nameregister').val();
    var email = $('#emailregister').val();
    var primerapellido = $('#Firstnameregister').val();
    var segundoapellido = $('#Lastnameregister').val();
    var contraseña = $('#passwordregister').val();
   
    
    $.ajax({
        url: 'register.php', 
        type: 'POST',
        data: {nombre: nombre, email: email, primerapellido: primerapellido, segundoapellido: segundoapellido,contraseña:contraseña}, 
        success: function(response) {
            console.log(response);
            //si el validador de register.php (echo) devuelve el mensaje siguiente el usuario ya existe
            if (response.includes("Este usuario o correo ya existe! Por favor elija otro.")) {
            Swal.fire({
               icon: 'error',
               title: 'Este correo ya existe!',
               showConfirmButton: false,
               timer: 1500
           });
          }
          else {
            Swal.fire({
               icon: 'success',
               title: 'Registro exitoso!',
               showConfirmButton: false,
               timer: 1500
           });
          }
        }
    });
  }


$(document).on('click', '#btnRegistrar', register);

function login(){
    
    var email = $('#emaillogin').val();
    var contraseña = $('#passwordlogin').val();
   
    
    $.ajax({
        url: 'login.php', 
        type: 'POST',
        data: {email: email,contraseña:contraseña}, 
        success: function(response) {
            console.log(response);
            //si el validador de login.php (echo) devuelve el mensaje siguiente el usuario ya existe
            if (response.includes("Hubo un error en email o contraseña")) {
            Swal.fire({
               icon: 'error',
               title: 'Email o contraseña incorrecta!',
               showConfirmButton: false,
               timer: 1500
           });
          }
          else if(response.includes("No existe este email o contraseña")) {
            Swal.fire({
               icon: 'error',
               title: 'No existe este email o contraseña',
               showConfirmButton: false,
               timer: 1500
           });
          }
          else {
            Swal.fire({
               icon: 'success',
               title: 'Login exitoso!',
               showConfirmButton: false,
               timer: 1500
           });
           window.location.href = "checkout.php";
          }
        }
    });
  }


$(document).on('click', '#btnLogin', login);

 
function agregarcarrito() {
    var btn = $(this);
    var id = btn.data('id');
    var nombre = btn.data('nombre');
    var precio = btn.data('precio');
    var imagen = btn.data('imagen');
    var cantidad = btn.data('cantidad');
    var numero_productos = $('#numeroProductos').val();
    
    $.ajax({
        url: 'php/anadirproductocarro.php', 
        type: 'POST',
        data: {id: id, nombre: nombre, precio: precio, imagen: imagen, cantidad: cantidad,numero_productos: numero_productos}, 
        success: function(response) {
            console.log(response);
            // Obtener el contador de la sesión PHP cada vez que se agregue un producto al carrito
            $('#contadorCarrito').text(response); 
            Swal.fire({
               icon: 'success',
               title: 'Producto añadido al carrito',
               showConfirmButton: false,
               timer: 1500
           });
        }
    });
}

$(document).on('click', '.btnAgregarCarrito', agregarcarrito);

function eliminarcarrito() {
  var btn = $(this);  
  var id = btn.data('id');
  var tr = $(this);  
  var ideliminar = tr.data('ideliminar');
  var totalEliminado = $('#totalEliminado').val();

  
    
    $.ajax({
        url: 'php/eliminarproducto.php', 
        type: 'POST',
        data: {id: id,totalEliminado:totalEliminado}, 
        success: function(response) {
            console.log(response);
            var totalEliminado = response.totalEliminado;
            $('#contadorCarrito').text(response); 
            $('tr[data-id="' + id + '"]').hide();
            $('#resultadoCarrito').text(totalEliminado);
          Swal.fire({
               icon: 'success',
               title: 'Producto eliminado del carrito',
               showConfirmButton: false,
               timer: 1500
           })
        }
    });
}
$(document).on('click', '.btnEliminarCarrito', eliminarcarrito);

</script>
