<?php include_once('perfilheader.php'); ?>
    <div class="container-xxl flex-grow-1 container-p-y" style="padding-left: 10%; padding-right: 10%;">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Mi Cuenta /</span> Pedidos</h4>
<div class="card">
    <!-- Declaro aqui la cookie del cliente para encriptarlo y hacer la consulta siguiente -->
    <?php  $encriptado = openssl_encrypt($_COOKIE['email'],COD,KEY); ?> 
                <h5 class="card-header">Número de Pedidos (<?php $consulta="SELECT COUNT(*) FROM compra AS total WHERE id_cliente = '$encriptado'"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row) echo "<strong style='color:green;'>".$row[0]."</strong>";?>)</h5>
                <div class="table-responsive text-nowrap" >
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        
                        <th style="color:black;font-size:14px;">Pedido</th>
                        <th style="color:black;font-size:14px;">Fecha</th>
                        <th style="color:black;font-size:14px;">Email</th>
                        <th style="color:black;font-size:14px;">Total</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php 
                      $consulta ="SELECT * FROM compra WHERE id_cliente = '$encriptado' ORDER BY fecha DESC";
                      $resultado = ejecuta_SQL($consulta);
                      foreach($resultado as $row){
                      echo"<tr>";
                        echo"
                                <td style='color:red;'>".$row[1]."</td>
                                <td style='color:blue;'>".$row[2]."</td>
                                <td>". $row[4] ."</td>
                                <td style='color:green;'>".$row[6]."€</td>
                            </td>";
                      echo"</tr>";}
                       ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
                      </div>
                      <br>

<?php include_once('perfilfooter.php'); ?>