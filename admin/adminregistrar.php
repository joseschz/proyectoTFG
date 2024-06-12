<!-- TODO: REGISTER -->
<?php include("adminheader.php")?> 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Registro</h4>

<div class="col-md-15">
                  <div class="card mb-5">
                    <h5 class="card-header">Registro de Usuario </h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <label class="form-label" for="basic-default-password12">Email</label>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">@</span>
                        <input type="text" class="form-control" id="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon11"/>
                      </div>

                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Contraseña</label>
                        <div class="input-group">
                          <input type="password" class="form-control" id="contraseña" placeholder="Contraseña" aria-describedby="basic-default-password2" />
                          <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                      </div>

                      <div class="input-group">
                        <label class="form-label" for="basic-default-name">Nombre</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="nombre" placeholder="Nombre" aria-describedby="basic-default-name" />
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="form-label" for="basic-default-firstname">Primer Apellido</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="primerap" placeholder="Primer Apellido" aria-describedby="basic-default-firstname" />
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="form-label" for="basic-default-secondname">Segundo Apellido</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="segundoap" placeholder="Segundo Apellido" aria-describedby="basic-default-secondname"/>
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="form-label" for="basic-default-secondname">Rol</label>
                        <div class="input-group">
                          <select class="form-select" id="rol">
                            <option value="[ROLE_ADMIN]">Administrador</option>
                            <option value="[ROLE_USER]">Usuario</option>
                          </select>
                        </div>
                      </div>
                      <div class="mt-2">
                          <button type="submit" id="registrarcliente" class="btn btn-primary me-2">Aplicar cambios</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                        </div>
                    </div>
                  </div>
                </div>
                </div>
                      
<?php include("adminfooter.php")?> 
<script>

function Añadircliente(){
    var email = $("#email").val();
    var nombre = $("#nombre").val();
    var primerap = $("#primerap").val();
    var segundoap = $("#segundoap").val();
    var contraseña = $("#contraseña").val();
    var rol = $("#rol").val();

    if (email.trim() === '' || nombre.trim() === '' || primerap.trim() === '' || segundoap.trim() === '' || contraseña.trim() === '' || rol.trim() === '') {
            // Mostrar un mensaje de error si hay campos obligatorios vacíos
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, complete los campos.',
                confirmButtonText: 'Aceptar'
            });
        } else {
    $.ajax({
        url: "registrarcliente.php",
        type: "POST", 
        data: {email:email, nombre:nombre, contraseña:contraseña, primerap:primerap, segundoap:segundoap, rol:rol},
        success: function(response){
            if(response.includes("ok")){
                Swal.fire({
                    icon: 'success',
                    title: 'Registro exitoso',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    })
  }
}
$(document).on('click', '#registrarcliente', Añadircliente);
</script>