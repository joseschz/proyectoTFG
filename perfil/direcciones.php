<?php include_once('perfilheader.php');
$email = $_COOKIE['email'];

$consulta ="SELECT * FROM usuarios WHERE email = '$email'";
$resultado = ejecuta_SQL($consulta);
foreach($resultado as $row){
    $direccion = $row['direccion'];
    $cp = $row['cp'];
    $telefono = $row['telefono'];
}
?>

<div style="padding-left: 20%; padding-right: 20%;">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Mi Cuenta /</span> Dirección</h4>

<div class="col-md-15">
                  <div class="card mb-5">
                    <h3 class="card-header">Mi Dirección de Facturación</h3>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <label class="form-label" for="basic-default-direccion12">Dirección de facturación</label>
                      <div class="input-group">
                        <input type="text" class="form-control" aria-describedby="basic-addon11" id="basic-default-direccion12" placeholder="Dirección" value="<?php echo $direccion;?>"/>                     
                      </div>
                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-cp">Código Postal</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="basic-default-cp" placeholder="CP" aria-describedby="basic-default-cp" value="<?php echo $cp;?>" />
                          
                        </div>
                      </div>

                      <div class="input-group">
                        <label class="form-label" for="basic-default-telefono">Teléfono</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="basic-default-telefono" placeholder="Teléfono" aria-describedby="basic-default-telefono" value="<?php echo $telefono;?>" />
                          
                        </div>
                      </div>
                     
                      <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2" onclick="AplicarDireccion()">Aplicar cambios</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                        </div>
                    </div>
                  </div>
                </div>
                </div>

<?php include_once('perfilfooter.php'); ?>

<script>

function AplicarDireccion(){
  var direccion = $('#basic-default-direccion12').val();
  var cp = $('#basic-default-cp').val();
  var telefono = $('#basic-default-telefono').val();

  $.ajax({
    url: 'editardireccion.php',
    type: 'POST',
    data: {
      direccion: direccion,
      cp: cp,
      telefono: telefono
    },
    success: function (response) {
      if(response.includes("¡Los datos se han editado correctamente!")){
        Swal.fire({
          icon: 'success',
          title: '¡Los datos se han editado correctamente!',
          showConfirmButton: false,
          timer: 1500
        })
      }
      else if(response.includes("Error")){
        Swal.fire({
          icon: 'error',
          title: 'Error al editar los datos',
          showConfirmButton: false,
          timer:1500
        })
      }
    }
  });

}
</script>