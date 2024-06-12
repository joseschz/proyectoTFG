<?php include_once('perfilheader.php');
$email = $_COOKIE['email'];

$consulta ="SELECT * FROM usuarios WHERE email = '$email'";
$resultado = ejecuta_SQL($consulta);
foreach($resultado as $row){
    $nombre = $row['nombre'];
    $apellido1 = $row['Primer_Apellido'];
    $apellido2 = $row['Segundo_Apellido'];
    $email = $row['email']; 
    $contraseña = $row['contraseña'];
}
?>

<div style="padding-left: 25%; padding-right: 25%;">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Mi Cuenta /</span> Perfil</h4>

<div class="col-md-15">
                  <div class="card mb-5">
                    <h5 class="card-header">Editar Mi Perfil</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <label class="form-label" for="basic-default-email11">Email</label>

                      <div class="input-group">
                        <span class="input-group-text" id="basic-email11">@</span>
                        <p class="form-control" aria-describedby="basic-email11" > <?php echo $email;?></p>                     </div>

                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Contraseña</label>
                        <div class="input-group">
                          <input type="password" class="form-control" id="password" placeholder="Contraseña" aria-describedby="basic-default-password12"
                            value="<?php echo $contraseña;?>"
                          />
                          
                        </div>
                      </div>

                      <div class="input-group">
                        <label class="form-label" for="basic-default-name">Nombre</label>
                        <div class="input-group">
                          <input
                            type="text"
                            class="form-control"
                            id="basic-default-name"
                            placeholder="Nombre"
                            aria-describedby="basic-default-name"
                            value="<?php echo $nombre;?>"
                          />
                          
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="form-label" for="basic-default-firstname">Primer Apellido</label>
                        <div class="input-group">
                          <input
                            type="text"
                            class="form-control"
                            id="basic-default-firstname"
                            placeholder="Primer Apellido"
                            aria-describedby="basic-default-firstname"
                            value="<?php echo $apellido1;?>"
                          />
                          
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="form-label" for="basic-default-secondname">Segundo Apellido</label>
                        <div class="input-group">
                          <input
                            type="text"
                            class="form-control"
                            id="basic-default-secondname"
                            placeholder="Segundo Apellido"
                            aria-describedby="basic-default-secondname"
                            value="<?php echo $apellido2;?>"/>                          
                        </div>
                      </div>
                     
                      <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2" onclick="AplicarPerfil()">Aplicar cambios</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                        </div>
                    </div>
                  </div>
                </div>
                </div>

<?php include_once('perfilfooter.php'); ?>


<script>
function AplicarPerfil(){
  var contresenia = $('#password').val();
  var nombre = $('#basic-default-name').val();
  var apellido1 = $('#basic-default-firstname').val();
  var apellido2 = $('#basic-default-secondname').val();
  
  // Validar que todos los campos estén llenos
  if (contresenia !== "" && nombre !== "" && apellido1 !== "" && apellido2 !== "") {
    $.ajax({
      url: 'editarperfil.php',
      type: 'POST',
      data: {
        contresenia: contresenia, 
        nombre: nombre,
        apellido1: apellido1,
        apellido2: apellido2
      },
      success: function (response) {
        if (response.includes("¡Los datos se han editado correctamente!")) {
          Swal.fire({
            icon: 'success',
            title: '¡Los datos se han editado correctamente!',
            showConfirmButton: false,
            timer: 1500
          });
        } else if (response.includes("Error")) {
          Swal.fire({
            icon: 'error',
            title: 'Error al editar los datos',
            showConfirmButton: false,
            timer: 1500
          });
        }
      },
      error: function () {
        Swal.fire({
          icon: 'error',
          title: 'Error en la solicitud',
          showConfirmButton: false,
          timer: 1500
        });
      }
    });
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Rellena los datos vacíos',
      showConfirmButton: false,
      timer: 1500
    });
  }
}

</script>