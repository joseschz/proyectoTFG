<?php include("adminheader.php")?> 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Pedidos</h4>
<div class="card">
                <h5 class="card-header">Número de Pedidos (<?php $consulta="SELECT COUNT(*) FROM compra AS total"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row) echo "<strong style='color:green;'>".$row[0]."</strong>";?>)</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="color:black;font-size:14px;">ID</th>
                        <th style="color:black;font-size:14px;">Email</th>
                        <th style="color:black;font-size:14px;">ID_Producto</th>
                        <th style="color:black;font-size:14px;">Nombre</th>
                        <th style="color:black;font-size:14px;">Precio</th>
                        <th style="color:black;font-size:14px;">Cantidad</th>
                        <th style="color:black;font-size:14px;">Fecha</th>

                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php 
                      $consulta ="SELECT * FROM detalle_compra ORDER BY fecha DESC";
                      $resultado = ejecuta_SQL($consulta);
                      foreach($resultado as $row){
                      echo"<tr>";
                        echo"<td style='color:purple;'><strong>".$row[0]."</strong></td>
                        <td style='color:red;'>".openssl_decrypt($row[1],COD,KEY)."</td>
                        <td style='color:blue;'>".$row[2]."</td>
                        <td style='color:green;'>".openssl_decrypt($row[3],COD,KEY)."</td>
                        <td style='color:blue;'> ". openssl_decrypt($row[4],COD,KEY) ."</td>
                        <td style='color:purple;'>".openssl_decrypt($row[5],COD,KEY)."</td>
                        <td style='color:#16B182;'>".$row[6]."</td>
                         
                        </td>";
                      echo"</tr>";}
                       ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
                      </div>
<?php include("adminfooter.php")?> 