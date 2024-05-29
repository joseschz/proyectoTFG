<?php include("adminheader.php")?> 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Clientes</h4>
<div class="card">
                <h5 class="card-header">Número de Clientes (<?php $consulta="SELECT COUNT(*) FROM usuarios AS total"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row) echo "<strong style='color:green;'>".$row[0]."</strong>";?>)</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
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
                      echo"<tr>";
                        echo"<td><strong>".$row[3]."</strong></td>
                        <td>".$row[2]."</td>
                        <td>".$row[5]."</td>
                        <td>".$row[6]."</td>
                        <td>
                          <div class='dropdown'>
                            <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                              <i class='bx bx-dots-vertical-rounded'></i>
                            </button>
                            <div class='dropdown-menu'>
                              <a class='dropdown-item' href='javascript:void(0);'
                                ><i class='bx bx-edit-alt me-1'></i> Editar</a
                              >
                              <a class='dropdown-item' href='javascript:void(0);'
                                ><i class='bx bx-trash me-1'></i> Borrar</a
                              >
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