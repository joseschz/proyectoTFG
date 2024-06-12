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
                        <th style="color:black;font-size:14px;">ID_Transacción</th>
                        <th style="color:black;font-size:14px;">Fecha</th>
                        <th style="color:black;font-size:14px;">Estado</th>
                        <th style="color:black;font-size:14px;">Email</th>
                        <th style="color:black;font-size:14px;">Cliente</th>
                        <th style="color:black;font-size:14px;">Total</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php 
                      $consulta ="SELECT * FROM compra ORDER BY fecha DESC";
                      $resultado = ejecuta_SQL($consulta);
                      foreach($resultado as $row){
                      echo"<tr>";
                        echo"<td style='color:purple;'><strong>".$row[0]."</strong></td>
                        <td style='color:red;'>".$row[1]."</td>
                        <td style='color:blue;'>".$row[2]."</td>
                        <td style='color:green;'>".$row[3]."</td>
                        <td>". $row[4] ."</td>
                        <td style='color:purple;'>".openssl_decrypt($row[5],COD,KEY)."</td>
                        <td style='color:green;'>".$row[6]."</td>
                        
                         
                        </td>";
                      echo"</tr>";}
                       ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
                      </div>
<?php include("adminfooter.php")?> 