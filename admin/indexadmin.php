<?php include_once("adminheader.php");
?> 

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Enhorabuena <?php echo $nombre;?>! 🎉</h5>
                          <p class="mb-4">
                            Hoy tienes ganado <span class="fw-bold"><?php $consulta="SELECT SUM(total) as total_sum FROM compra WHERE DATE(fecha) = CURRENT_DATE"; $resultado = ejecuta_SQL($consulta); if($resultado ->rowCount() > 0){foreach($resultado as $row) {echo "<strong style='color:green;'>".$row[0]."</strong>";}}else{echo"0";} ?> €</span> en ventas en productos.
                          </p>

                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <!--  -->
                              <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />

                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                
                              </div>
                            </div>
                            
                          </div>
                          <span class="fw-semibold d-block mb-1">Beneficios</span>
                          <h3 class="card-title mb-2"><?php $consulta="SELECT	SUM(total) FROM	(SELECT	total.total	FROM compra AS total) AS total";$resultado = ejecuta_SQL($consulta); if($resultado ->rowCount() > 0){foreach($resultado as $row) {echo "<strong '>".$row[0]."€</strong>";}}else{echo"0";}?></h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +<?php $consulta="SELECT SUM(total) AS total FROM compra WHERE DATE(fecha) = CURRENT_DATE;"; $resultado = ejecuta_SQL($consulta);if($resultado ->rowCount() > 0){ foreach($resultado as $row){ echo "<strong>".$row[0]." € </strong>";}}else{echo"0 € Hoy";}?></small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                             
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Ventas</span>
                          <h3 class="card-title text-nowrap mb-1"><?php $consulta="SELECT COUNT(*) FROM compra AS total"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row) echo "<strong>".$row[0]."</strong>";?></h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +<?php $consulta="SELECT COUNT(*) AS total FROM compra WHERE DATE(fecha) = CURRENT_DATE;"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row) echo "<strong>".$row[0]."</strong>";?> Hoy</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Ventas -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">Venta de Productos </h5>
                        <!-- Gráfica de Ventas --> 
                        <div id="totalRevenueChart" class="px-2"></div>
                        <!-- --> 
                      </div>
                      <div class="col-md-4">
                        <div class="card-body">
                          <div class="text-center">
                            <div class="dropdown">
                              <button
                                class="btn btn-sm btn-outline-primary dropdown-toggle"
                                type="button"
                                id="growthReportId"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                2024  
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                <a class="dropdown-item" href="javascript:void(0);">2024</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="growthChart"></div>
                        <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                         <!-- <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                            </div>
                             <div class="d-flex flex-column">
                              <small>2023</small>
                              <h6 class="mb-0">$32.5k</h6>
                            </div> 
                          </div> -->
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                              <small>2024</small>
                              <h6 class="mb-0"><?php $consulta="SELECT	SUM(total) FROM	(SELECT	total.total	FROM compra AS total) AS total";$resultado = ejecuta_SQL($consulta); if($resultado ->rowCount() > 0){foreach($resultado as $row) {echo "<strong '>".$row[0]."€</strong>";}}else{echo"0";}?></h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            <img
                                src="../assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                           
                          </div>
                          <span class="fw-semibold d-block mb-1">Devoluciones</span>
                          <h3 class="card-title text-nowrap mb-2">0</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                              </button>
                              <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Productos</span>
                          <h3 class="card-title mb-2"><?php $consulta="SELECT COUNT(*) FROM productos AS total"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row) echo "<strong>".$row[0]."</strong>";?></h3>
                        </div>
                      </div>
                    </div>
                    <!-- </div>
    <div class="row"> -->
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h3 class="text-nowrap mb-2">Clientes</h3>
                                <span class="badge bg-label-warning rounded-pill">Año 2024</span>
                              </div>
                              <div class="mt-sm-auto">
                                
                                <h3 class="mb-0"><?php $consulta="SELECT COUNT(*) FROM usuarios AS total"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row) echo "<strong>".$row[0]."</strong>";?></h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Estadísticas de Pedidos</h5>
                      </div>
                      
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                          <h2 class="mb-2"><?php $consulta="SELECT COUNT(*) FROM compra AS total"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row) echo "<strong>".$row[0]."</strong>";?></h2>
                          <span>Total de pedidos</span>
                        </div>
                        <!-- Gráfica de total prodcutos --> 
                        <div id="orderStatisticsChart"></div>
                      </div>
                      <ul class="p-0 m-0">
                       
                          <?php 
                          //4 productos con mayor total_veces
                         
                          $consulta = "SELECT detalle_compra.nombre, 
                                              COUNT(*) AS total_veces, 
                                              productos.Orden, 
                                              detalle_compra.id_producto, 
                                              productos.ID_Producto
                                      FROM detalle_compra 
                                      INNER JOIN productos ON detalle_compra.id_producto = productos.ID_Producto
                                      GROUP BY detalle_compra.nombre 
                                      ORDER BY total_veces DESC 
                                      LIMIT 4";
                          
                          $resultado = ejecuta_SQL($consulta); 
                          
                          foreach($resultado as $row) {
                              echo '<li class="d-flex mb-4 pb-1">
                              <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                              </div>
                              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                  <h6 class="mb-0">'.$row[2].'</h6>
                                  <small class="text-muted">'.openssl_decrypt($row[0],COD,KEY).' </small><small class="fw-semibold" style="color: green">'.$row[1].'</small>
                                </div>
                                
                              </div>
                            </li>';
                          }
                          ?>
                           
                          
                       
                        
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                <div class="col-md-6 col-lg-4 order-1 mb-4">
                  <div class="card h-100">
                    <div class="card-header">
                      <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                          <button
                            type="button"
                            class="nav-link active"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-tabs-line-card-income"
                            aria-controls="navs-tabs-line-card-income"
                            aria-selected="true"
                          >
                            Income
                          </button>
                        </li>
                        <li class="nav-item">
                          <button type="button" class="nav-link" role="tab">Expenses</button>
                        </li>
                        <li class="nav-item">
                          <button type="button" class="nav-link" role="tab">Profit</button>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body px-0">
                      <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                          <div class="d-flex p-4 pt-3">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="../assets/img/icons/unicons/wallet.png" alt="User" />
                            </div>
                            <div>
                              <small class="text-muted d-block">Total Beneficios</small>
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1"><?php $consulta="SELECT	SUM(total) FROM	(SELECT	total.total	FROM compra AS total) AS total";$resultado = ejecuta_SQL($consulta); if($resultado ->rowCount() > 0){foreach($resultado as $row) {echo "<strong '>".$row[0]."€</strong>";}}else{echo"0";}?></h6>
                                
                              </div>
                            </div>
                          </div>
                          <div id="incomeChart"></div>
                          <!-- <div class="d-flex justify-content-center pt-4 gap-2">
                            <div class="flex-shrink-0">
                              <div id="expensesOfWeek"></div>
                            </div>
                            <div>
                              <p class="mb-n1 mt-1">Expenses This Week</p>
                              <small class="text-muted">$39 less than last week</small>
                            </div> 
                          </div>-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Expense Overview -->

                <!-- Transactions -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Ventas</h5>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="transactionID"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                       
                      </div>
                    </div>
                   
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <!-- Consulta que coge las ventas del dia de hoy y me hace la cuenta con los productos que compró el usuario -->
                      <?php $consulta ="SELECT compra.NombreCompra, EXTRACT(YEAR FROM compra.fecha) AS year, EXTRACT(MONTH FROM compra.fecha) AS month,	EXTRACT(DAY FROM compra.fecha) AS day,COUNT(DISTINCT detalle_compra.id_producto) AS productos, compra.total FROM compra INNER JOIN detalle_compra ON compra.id_cliente = detalle_compra.id_cliente WHERE EXTRACT(MONTH FROM compra.fecha) = EXTRACT(MONTH FROM CURRENT_DATE()) AND EXTRACT(YEAR FROM compra.fecha) = EXTRACT(YEAR FROM CURRENT_DATE()) AND EXTRACT(DAY FROM compra.fecha) = EXTRACT(DAY FROM CURRENT_DATE()) GROUP BY	compra.NombreCompra, EXTRACT(YEAR FROM compra.fecha),	EXTRACT(MONTH FROM compra.fecha),	EXTRACT(DAY FROM compra.fecha),	compra.total;";
                      $resultado = ejecuta_SQL($consulta);
                      foreach($resultado as $row){
                        echo '<li class="d-flex mb-4 pb-1 border border-black rounded-3  ">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/avatars/1.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">'.$row[0].'</small>
                              <h6 class="mb-0"><strong>'.$row[4].'</strong> Productos</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">+'.$row[5].'</h6>
                              <span class="text-muted">EUR</span>
                            </div>
                          </div>
                        </li>';}
                        ?>
                      </ul>
                    </div>


                  </div>
                </div>
                <!--/ Transactions -->
              </div>
            </div>
            <!-- / Content -->

          <?php include("adminfooter.php") ?> 