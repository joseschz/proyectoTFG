<?php include("adminheader.php")?> 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Clientes</h4>
<div class="card">
                <h5 class="card-header">Número de Clientes (<?php $consulta="SELECT COUNT(*) FROM usuarios AS total"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row) echo "<strong style='color:green;'>".$row[0]."</strong>";?>)</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="color:black;font-size:14px;">Rol</th>
                        <th style="color:black;font-size:14px;">Email</th>
                        <th style="color:black;font-size:14px;">Nombre</th>
                        <th style="color:black;font-size:14px;">Primer Apellido</th>
                        <th style="color:black;font-size:14px;">Segundo Apellido</th>
                        <th style="color:black;font-size:14px;">Acción</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php 
                      $consulta ="SELECT * FROM usuarios";
                      $resultado = ejecuta_SQL($consulta);
                      foreach($resultado as $row){
                      echo"<tr data-id='".$row[0]."'>";
                        echo"
                            <td>
                            <select id='rol' style='border:none;'data-rol='".$row[1]."'>
                              <option value='".$row[1]."'>". $row[1]. "</option>";
                        echo "<option value='[ROLE_ADMIN]'>Administrador</option>
                              <option value='[ROLE_USER]'>Usuario</option>
                            </select>
                            </td>
                            <td>
                              <input type='text' id='email' data-email='".$row[3]."' value='".$row[3]."' style='color:blue;border:none;' />
                            </td>
                            <td>
                                <input type='text' id='nombre' data-nombre='".$row[2]."' value='".$row[2]."' style='color:purple;border:none;' />
                            </td>
                            <td>
                                <input type='text' id='primerap' data-primerap='".$row[5]."' value='".$row[5]."' style='color:purple;border:none;' />
                            </td>
                            <td>
                                <input type='text' id='segundoap' data-segundoap='".$row[6]."' value='".$row[6]."' style='color:purple;border:none;' />
                          </td>
                        <td>
                          <div class='dropdown'>
                            <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                              <i class='bx bx-dots-vertical-rounded'></i>
                            </button>
                            <div class='dropdown-menu'>
                              <a class='dropdown-item' href='javascript:void(0);' data-id='".$row[0]."' id='editarcliente'><i class='bx bx-edit-alt me-1'></i> Editar</a>
                              <a class='dropdown-item' href='javascript:void(0);' data-id='".$row[0]."' id='borrarcliente'><i class='bx bx-trash me-1'></i> Borrar</a>
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
          </div>
        </div>
        </div>
        </div>
<?php include_once("adminfooter.php")?> 
<script>
function EditarUsuario() {
        var a = $(this);
        var id = a.data('id');
        //se utiliza para encontrar el elemento antecesor más cercano que es una fila de tabla (tr)
        // Esto es necesario porque los campos de entrada se encuentran dentro de la misma fila de la tabla que el botón de edición.
        var nombre = $(this).closest('tr').find('input#nombre').val();
        var email = $(this).closest('tr').find('input#email').val();
        var primerap = $(this).closest('tr').find('input#primerap').val();
        var segundoap = $(this).closest('tr').find('input#segundoap').val();
        var rol = $(this).closest('tr').find('select#rol').val();

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
                    url: 'editarcliente.php',
                    type: 'POST',
                    data: { id: id, rol:rol,email:email,nombre:nombre,primerap:primerap,segundoap:segundoap },
                    success: function(response) {
                        if(response.includes("ok")){
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario editado.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    else if(response.includes("No se actualizaron los datos")){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al editar el usuario.',
                            text: 'Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al editar el usuario.',
                            text: 'Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                });
            }
        });
    }

    $(document).on('click', '#editarcliente', EditarUsuario);
    function EliminarUsuario() {
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
                    url: 'eliminarcliente.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        if(response.includes("ok")){
                        $('tr[data-id="' + id + '"]').hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario eliminado.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    else if(response.includes("No se ha borrado, hubo un error")){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al eliminar el usuario.',
                            text: 'Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al eliminar el usuario.',
                            text: 'Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                });
            }
        });
    }

    $(document).on('click', '#borrarcliente', EliminarUsuario);
</script>