<!-- TODO: REGISTER --><?php include("adminheader.php")?> 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Registro</h4>

<div class="col-md-15">
                  <div class="card mb-5">
                    <h5 class="card-header">Registro de Usuario </h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <label class="form-label" for="basic-default-password12">Email</label>

                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">@</span>
                        <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon11"/>
                      </div>

                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Contraseña</label>
                        <div class="input-group">
                          <input
                            type="password"
                            class="form-control"
                            id="basic-default-password12"
                            placeholder="Contraseña"
                            aria-describedby="basic-default-password2"
                          />
                          <span id="basic-default-password2" class="input-group-text cursor-pointer"
                            ><i class="bx bx-hide"></i
                          ></span>
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
                            aria-describedby="basic-default-secondname"/>
                          
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="form-label" for="basic-default-secondname">Rol</label>
                        <div class="input-group">
                          <select class="form-select" id="basicDefaultSelect">
                            <option>Administrador</option>
                            <option>Usuario</option>
                          </select>
                          
                        </div>
                      </div>
                      <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Aplicar cambios</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                        </div>
                    </div>
                  </div>
                </div>
                </div>
                      
<?php include("adminfooter.php")?> 