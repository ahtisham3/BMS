<!-- BEGIN CONTENT -->
<!DOCTYPE html>
<html lang="en">


<style>
  .page-content .card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    font-size: large;
  }

  .card-title {
    font-size: 15px;
  }

  h6 {
    font-size: large;
  }

  .bi {
    size: 20;
  }

  ul {
    font-size: large;
  }
</style>



<div class="page-content-wrapper">
  <div class="page-content">
    <div class="page-head">
      <div class="container">
        <div class="page-title">
          <h1>Dashboard</h1>
        </div>
      </div>
    </div>

    <div class="container">
      <ul class="page-breadcrumb breadcrumb">
        <li>
          <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
          <i class="fa fa-circle"></i>
        </li>
        <li>
          <span>Financial Dashboard</span>
        </li>
      </ul>

      <div class="row">
        <div class="col-lg-12 mt-4">
          <div class="row">
            <!-- Sales Card -->
            <div class="col-xl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center me-3">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="mb-0"><?php echo isset($monthly[0]->totalSales) ? ($monthly[0]->totalSales):'0'; ?></h6>
                      <div class="d-flex align-items-center">
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Revenue Card -->
            <div class="col-xl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Revenue pending  <span>| This Month</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center me-3">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo isset($monthly[1]->totalSales) ? $monthly[1]->totalSales : '0'; ?></h6>
                      <div class="d-flex align-items-center">
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Customers Card -->
            <div class="col-xl-4 col-md-12">
    <div class="card info-card customers-card">
        <div class="card-body">
            <h5 class="card-title">Customers <span>| This Month</span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center me-3">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                    <h6><?= isset($totalCustomer[0]->total_customers) ? $totalCustomer[0]->total_customers : '0'; ?></h6>
                    <?php
                    $change = ($totalCustomer[0]->total_customers ?? 0) - ($totalCustomer[1]->total_customers ?? 0);
                    $total_customers_1 = $totalCustomer[1]->total_customers ?? 0;
                    $percentage_change = $total_customers_1 != 0 ? ($change / $total_customers_1) * 100 : 0;
                    $change_type = $percentage_change < 0 ? 'decrease' : 'increase';
                    ?>
                    <span class="text-<?php echo $percentage_change < 0 ? 'danger' : 'success'; ?> small fw-bold">
                        <?php echo $percentage_change . '%'; ?>
                    </span>
                    <span class="text-muted small">
                        <?php echo $change_type; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

              </div>
            </div>
          </div>

          <div class="row">
            <!-- Recent Activity -->
            <div class="col-md-3">
              <div class="card mt-3">

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
              </div>
            </div>
            <!-- Budget Report -->
            <div class="col-md-5">
              <div class="card mt-5">
                <div class="card-body pb-0">
                  <h5 class="card-title">Service Report <span>| This Month</span></h5>

                  <div id="budgetChart" style="min-height: 300px; max-width: 100%; overflow: hidden;" class="echart"></div>

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
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mt-4">
                <div class="card-body pb-0">
                  <h5 class="card-title"> <span>Building Revenu| This Month</span></h5>

                 
                  <div id="trafficChart" style="min-height: 300px; max-width: 100%; overflow: hidden;" class="echart"></div>

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

              </div>
            </div>
          </div>
          
            <!-- Website Traffic -->


            <!-- Reports -->


            <div class="row">
              <!-- Recent Sales -->
              <div class="col-md-12 mt-4">
                <div class="card recent-sales overflow-auto">
                  <div class="card-body">
                    <h5 class="card-title"><span>Report|Defalter List </span></h5>
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
              </div>
            </div>



            <div class="row">
              <!-- Recent Sales -->
              <div class="col-md-12 mt-4">
                <div class="card recent-sales overflow-auto">
                  <div class="card-body">
                    <h5 class="card-title"> <span>Building Wise Revenu| This Month</span></h5>

                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">#Builing Name</th>
                          <th scope="col">Month</th>
                          <th scope="col">Total Earnig</th>
                          <th scope="col">Discount</th>
                          <th scope="col">Final Earning</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($buildingRevenu as $data) { ?>
                          <tr>
                            <td><?php echo $data->building_Name; ?></td>
                            <td><?php echo $data->invoice_month; ?></td>
                            <td><?php echo $data->total_amount; ?></td>
                            <td><?php echo $data->discount_amont;?></td>
                            <td><?php echo $data->total_amount - $data->discount_amont;?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            


          
        </div>
      </div>
    </div>
  </div>
</div>