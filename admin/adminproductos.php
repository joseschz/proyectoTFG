<?php include("adminheader.php")?> 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Productos</h4>
<div class="card">
                <h5 class="card-header">Número de Productos (<?php $consulta="SELECT COUNT(*) FROM productos AS total"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row) echo "<strong style='color:green;'>".$row[0]."</strong>";?>)</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="color:black;font-size:14px;">ID</th>
                        <th style="color:black;font-size:14px;">Nombre</th>
                        <th style="color:black;font-size:14px;">Precio</th>
                        <th style="color:black;font-size:14px;">Descripción</th>
                        <th style="color:black;font-size:14px;">Imagen</th>
                        <th style="color:black;font-size:14px;">Stock</th>
                        <th style="color:black;font-size:14px;">Valor</th>
                        <th style="color:black;font-size:14px;">Acción</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php 
                      $consulta ="SELECT * FROM productos";
                      $resultado = ejecuta_SQL($consulta);
                      foreach($resultado as $row){
                        $id=$row[0];
                      echo"<tr data-id='".$row[0]."'>";
                        echo"<td style='color:purple;'>
                          <strong>".$row[0]."</strong>
                        </td>
                        <td>
                          <input type='text' id='nombre' data-nombre='".$row[1]."' value='".$row[1]."' style='color:green;border:none;' />
                          </td>
                        <td>
                        <input type='text' id='precio' data-precio='".$row[2]."' value='".$row[2]."' style='color:blue;border:none;' />
                        </td>
                        <td>
                        <input type='text' id='descripcion' data-descripcion='".$row[3]."' value='".$row[3]."' style='color:purple;border:none;' />
                        </td>
                        <td><img class='d-block w-100' src='../images/" . $row[4] . "' alt='Producto' height='60' width='50' ></td>                        
                        <td style='color:green;'>
                        <input type='text' id='stock' data-stock='".$row[5]."' value='".$row[5]."' style='color:green;border:none;' />
                        </td>
                        <td>
                        ";
                        $consulta = "SELECT Orden FROM productos GROUP BY Orden";
                        $resultado = ejecuta_SQL($consulta);
                        echo"<select id='orden' style='border:none;'>";
                        echo"<option value='".$row[6]."'>".$row[6]."</option>";
                        foreach($resultado as $row){
                          echo"<option value='".$row[0]."'>".$row[0]."</option>";
                        }
                        echo"</select>
                        </td>
                        <td>
                          <div class='dropdown'>
                            <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                              <i class='bx bx-dots-vertical-rounded'></i>
                            </button>
                            <div class='dropdown-menu'>
                              <a class='dropdown-item' href='javascript:void(0);' data-id='".$id."' id='editarproducto'><i class='bx bx-edit-alt me-1'></i> Editar</a>
                              <a class='dropdown-item' href='javascript:void(0);' data-id='".$id."' id='borrarproducto'><i class='bx bx-trash me-1'></i> Borrar</a>
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
function EditarProducto() {
        var a = $(this);
        var id = a.data('id');
        //se utiliza para encontrar el elemento antecesor más cercano que es una fila de tabla (tr)
        // Esto es necesario porque los campos de entrada se encuentran dentro de la misma fila de la tabla que el botón de edición.
        var nombre = $(this).closest('tr').find('input#nombre').val();
        var precio = $(this).closest('tr').find('input#precio').val();
        var descripcion = $(this).closest('tr').find('input#descripcion').val();
        var stock = $(this).closest('tr').find('input#stock').val();
        var orden = $(this).closest('tr').find('select#orden').val();

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
                    url: 'editarproducto.php',
                    type: 'POST',
                    data: { id: id, nombre: nombre, precio: precio,descripcion:descripcion,stock:stock,orden:orden },
                    success: function(response) {
                        if(response.includes("ok")){
                        Swal.fire({
                            icon: 'success',
                            title: 'Producto editado.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    else if(response.includes("No se actualizaron los datos")){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al editar el producto.',
                            text: 'Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al editar el producto.',
                            text: 'Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                });
            }
        });
    }

    $(document).on('click', '#editarproducto', EditarProducto);

    function EliminarProducto() {
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
                    url: 'eliminarproducto.php',
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

    $(document).on('click', '#borrarproducto', EliminarProducto);
</script>