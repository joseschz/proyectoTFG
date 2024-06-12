<?php include_once("adminheader.php");
?> 

      <div class="content-wrapper">
            <!-- Contenido -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ajustes de Cuenta /</span> Cuenta</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Cuenta</a>
                    </li>
                    
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Detalles del Perfil</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="../assets/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Nombre</label>
                            <input class="form-control" type="text" id="firstName" name="firstName" value="<?php echo $nombre; ?>"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Primer Apellido</label>
                            <input class="form-control" type="text" name="lastName" id="lastName" value="<?php echo $apellido1; ?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="<?php echo $email; ?>"
                              placeholder="john.doe@example.com"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organizacion" class="form-label">Organización</label>
                            <p class="form-control" id="organization" name="organization">Dulces y Eventos</p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="contraseña">Contraseña </label>
                            <div class="input-group input-group-merge">
                              <input type="password" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="contraseña" value="<?php echo $contraseña; ?>"
                              />
                            </div>
                          </div>
                          
                         
                          
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Aplicar cambios</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

<?php include_once('adminfooter.php'); ?>