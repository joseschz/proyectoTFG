<!-- TODO: REGISTER -->
<?php include("adminheader.php")?> 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Registrar Cupón</h4>

<div class="col-md-15">
                  <div class="card mb-5">
                    <h5 class="card-header">Registro de Cupón </h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    
                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Código de cupón</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="cupon" placeholder="Cupón" aria-describedby="basic-default-cupon" />
                          <span id="basic-default-cupon" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                      </div>

                      <div class="input-group">
                        <label class="form-label" for="basic-default-name">Porcentaje</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="porcentaje" placeholder="0" aria-describedby="basic-default-name" />
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="form-label" for="basic-default-firstname">Rebaja</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="rebaja" placeholder="0" aria-describedby="basic-default-rebaja" />
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="form-label" for="basic-default-relacionado">Producto Relacionado</label>
                        <div class="input-group">
                        <?php
                        $consulta = "SELECT ID_Producto,Nombre FROM productos";
                        $resultado = ejecuta_SQL($consulta);
                        echo'<select style="width: 100%" class="form-select" id="relacionado" >';
                        foreach ($resultado as $row) {
                        echo '
                        <option value ="'.$row[0].'">'.$row[1].'</option>
                        ';
                        }
                        echo'</select>';
                        
                        ?>  
                        
                        </div>
                      </div>
                      
                      <div class="mt-2">
                          <button type="submit" id="registrarcupon" class="btn btn-primary me-2">Aplicar cambios</button>
                        </div>
                    </div>
                  </div>
                </div>
                </div>
                      
<?php include("adminfooter.php")?> 
<script>

function Añadircupon(){
    var cupon = $("#cupon").val();
    var porcentaje = $("#porcentaje").val();
    var rebaja = $("#rebaja").val();
    var relacionado = $("#relacionado").val();
    

    if (cupon.trim() === '' || porcentaje.trim() === '' || rebaja.trim() === '' || relacionado.trim() === '') {
            // Mostrar un mensaje de error si hay campos obligatorios vacíos
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, complete los campos.',
                confirmButtonText: 'Aceptar'
            });
        } else {
    $.ajax({
        url: "registrarcupon.php",
        type: "POST", 
        data: {cupon:cupon, porcentaje:porcentaje, rebaja:rebaja, relacionado:relacionado},
        success: function(response){
            if(response.includes("ok")){
                Swal.fire({
                    icon: 'success',
                    title: 'Cupón registrado.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    })
  }
}
$(document).on('click', '#registrarcupon', Añadircupon);
</script>