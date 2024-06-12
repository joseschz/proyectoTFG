<?php include("adminheader.php")?> 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Cupones</h4>
<div class="card">
                <h5 class="card-header">Número de Cupones (<?php $consulta="SELECT COUNT(*) FROM cupones AS total"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row) echo "<strong style='color:green;'>".$row[0]."</strong>";?>)</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="color:black;font-size:14px;">ID</th>
                        <th style="color:black;font-size:14px;">Código</th>
                        <th style="color:black;font-size:14px;">Porcentaje</th>
                        <th style="color:black;font-size:14px;">Rebaja</th>
                        <th style="color:black;font-size:14px;">Acción</th>
                        
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php 
                      $consulta ="SELECT * FROM cupones ";
                      $resultado = ejecuta_SQL($consulta);
                      foreach($resultado as $row){
                      echo"<tr data-id='".$row[3]."'>";
                        echo"<td style='color:purple;'><strong>".$row[3]."</strong></td>
                        <td style='color:red;'>
                            <input type='text' id='codigo' data-codigo='".$row[1]."' value='".$row[1]."' style='color:purple;border:none;' />
                        </td>
                        <td style='color:blue;'>
                            <input type='text' id='porcentaje' data-porcentaje='".$row[0]."' value='".$row[0]."' style='color:blue;border:none;' />
                        </td>
                        <td style='color:green;'>
                            <input type='text' id='rebaja' data-rebaja='".$row[2]."' value='".$row[2]."' style='color:green;border:none;' />
                        </td>                
                        </td>
                        <td>
                        <div class='dropdown'>
                        <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                          <i class='bx bx-dots-vertical-rounded'></i>
                        </button>
                        <div class='dropdown-menu'>
                          <a class='dropdown-item' href='javascript:void(0);' data-id='".$row[3]."' id='editarcupon'><i class='bx bx-edit-alt me-1'></i> Editar</a>
                          <a class='dropdown-item' href='javascript:void(0);' data-id='".$row[3]."' id='borrarcupon'><i class='bx bx-trash me-1'></i> Borrar</a>
                        </div>
                      </div>
                      </td>";
                      echo"</tr>";}
                       ?>                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
<?php include("adminfooter.php")?> 
<script>
function EditarCupon() {
        var a = $(this);
        var id = a.data('id');
        //se utiliza para encontrar el elemento antecesor más cercano que es una fila de tabla (tr)
        // Esto es necesario porque los campos de entrada se encuentran dentro de la misma fila de la tabla que el botón de edición.
        var codigo = $(this).closest('tr').find('input#codigo').val();
        var porcentaje = $(this).closest('tr').find('input#porcentaje').val();
        var rebaja = $(this).closest('tr').find('input#rebaja').val();
       
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción no se puede deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, editar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'editarcupon.php',
                    type: 'POST',
                    data: { id: id, codigo: codigo, porcentaje: porcentaje,rebaja:rebaja},
                    success: function(response) {
                        if(response.includes("ok")){
                        Swal.fire({
                            icon: 'success',
                            title: 'Cupón editado.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    else if(response.includes("No se actualizaron los datos")){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al editar el cupón.',
                            text: 'Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al editar el cupón.',
                            text: 'Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                });
            }
        });
    }

    $(document).on('click', '#editarcupon', EditarCupon);

    function EliminarCupon() {
        var a = $(this);
        var id = a.data('id');
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción no se puede deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'eliminarcupon.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        if(response.includes("ok")){
                        $('tr[data-id="' + id + '"]').hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Producto eliminado.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    else if(response.includes("No se ha borrado, hubo un error")){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al eliminar el producto.',
                            text: 'Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al eliminar el producto.',
                            text: 'Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                });
            }
        });
    }

    $(document).on('click', '#borrarcupon', EliminarCupon);
</script>