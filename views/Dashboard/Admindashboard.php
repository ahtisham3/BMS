<style>
  .main {
    height:auto; /* Full viewport height */
    width: auto;   /* Full width of the viewport */
    overflow-y: auto; /* Enable vertical scroll if content overflows */
    /* Optionally, you can add other styles as needed */
  }
</style>
  <main id="main" class="main">
    <div class="continer">
      <section class="section dashboard">
        <div class="pagetitle">
          <h1>Dashboard</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
        <div class="row">
          <!-- Left side columns -->
          <div class="col-lg-8">
            <div class="row">
              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Sales <span>| monthly</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo $monthly[0]->totalSales; ?></h6>
                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End Sales Card -->
              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Revenue <span>| This Month</span></h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo $monthly[1]->totalSales; ?></h6>
                        <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Revenue Card -->

              <!-- Customers Card -->
              <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"> <span>| This Year</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?= $totalCustomer[0]->total_customers; ?></h6>
                        <?php
                        $change = $totalCustomer[0]->total_customers - $totalCustomer[1]->total_customers;
                        $percentage_change = ($change / $totalCustomer[1]->total_customers) * 100;
                        ?>
                        <span class="text-<?php echo $percentage_change < 0 ? 'danger' : 'success'; ?> small pt-1 fw-bold">
                          <?php echo $percentage_change . '%'; ?>
                        </span>
                        <span class="text-muted small pt-2 ps-1">
                          <?php echo $percentage_change < 0 ? 'decrease' : 'increase'; ?>
                        </span>
                      </div>
                    </div>

                  </div>
                </div>

              </div><!-- End Customers Card -->


              <!-- Reports -->
              <div class="col-12">
                <div class="card">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">Reports <span>Defalters</span></h5>
                    <!-- Line Chart -->

                    <table class="table ">
                      <thead>
                        <tr>
                          <th scope="col">#Builing Name</th>
                          <th scope="col">Month</th>
                          <th scope="col">Amout</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($Defalters as $data) { ?>
                          <tr>
                            <td><?php echo $data->building_Name; ?></td>
                            <td><?php echo $data->invoice_month; ?></td>
                            <td><?php echo $data->total_amount; ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>



                  </div>

                </div>
              </div><!-- End Reports -->

              <!-- Recent Sales -->
              <div class="col-12">
                <div class="card recent-sales overflow-auto">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">#Builing Name</th>
                          <th scope="col">Month</th>
                          <th scope="col">Amout</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($buildingRevenu as $data) { ?>
                          <tr>
                            <td><?php echo $data->building_Name; ?></td>
                            <td><?php echo $data->invoice_month; ?></td>
                            <td><?php echo $data->total_amount; ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- End Recent Sales -->

              <!-- Top Selling -->
              <div class="col-12">
                <div class="card top-selling overflow-auto">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>

                  <div class="card-body pb-0">
                    <h5 class="card-title">Top Selling <span>| Today</span></h5>

                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">Preview</th>
                          <th scope="col">Product</th>
                          <th scope="col">Price</th>
                          <th scope="col">Sold</th>
                          <th scope="col">Revenue</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>

                </div>
              </div><!-- End Top Selling -->

            </div>
          </div><!-- End Left side columns -->

          
          <!-- Right side columns -->
          <div class="col-lg-4">

            <!-- Recent Activity -->
            <div class="card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                <div class="activity">

                  <div class="activity-item d-flex">
                    <div class="activite-label">32 min</div>
                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                    <div class="activity-content">

                    </div>
                  </div><!-- End activity item-->


                </div>

              </div>
            </div><!-- End Recent Activity -->

            <!-- Budget Report -->
            <div class="card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">Budget Report <span>| This Month</span></h5>

                <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    var categories = <?php echo json_encode(array_column($serviceWiseData, 'service_Name')); ?>;
                    var seriesData = <?php echo json_encode(array_column($serviceWiseData, 'totalrevenu')); ?>;

                    var barChart = echarts.init(document.querySelector("#budgetChart"));

                    var option = {
                      tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                          type: 'shadow'
                        }
                      },
                      xAxis: {
                        type: 'category',
                        data: categories
                      },
                      yAxis: {
                        type: 'value',
                        name: 'Total Revenue'
                      },
                      series: [{
                        data: seriesData,
                        type: 'bar'
                      }]
                    };

                    barChart.setOption(option);
                  });
                </script>
              </div>
            </div><!-- End Budget Report -->
            <!-- Website Traffic -->
            <div class="card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    var chartData = [];

                    <?php foreach ($buildingRevenu as $data) : ?>
                      // Push data from PHP array into the chartData array
                      chartData.push({
                        value: <?php echo $data->total_amount; ?>,
                        name: '<?php echo $data->building_Name; ?>'
                      });
                    <?php endforeach; ?>
                    echarts.init(document.querySelector("#trafficChart")).setOption({
                      tooltip: {
                        trigger: 'item'
                      },
                      legend: {
                        top: '5%',
                        left: 'center'
                      },
                      series: [{
                        name: 'Access From',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                          show: false,
                          position: 'center'
                        },
                        emphasis: {
                          label: {
                            show: true,
                            fontSize: '18',
                            fontWeight: 'bold'
                          }
                        },
                        labelLine: {
                          show: false
                        },
                        data: chartData
                      }]
                    });
                  });
                </script>

              </div>
            </div><!-- End Website Traffic -->

            <!-- News & Updates Traffic -->

          </div><!-- End Right side columns -->

        </div>
      </section>
    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->