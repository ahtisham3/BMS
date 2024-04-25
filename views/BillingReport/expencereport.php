<div class="page-wrapper-row full-height">
    <div class="page-wrapper-middle">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Expenses Report
                                <small>You can view expenses here.</small>
                            </h1>
                        </div>
                       
                        <!-- END PAGE TITLE -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <!-- <li>
                                <a href="<?php echo base_url('reports'); ?>">Reports</a>
                                <i class="fa fa-circle"></i>
                            </li> -->
                            <li>
                                <span>Expenses Report</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption font-dark">
                                                <span class="caption-subject bold uppercase">Expenses</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>

                                        <div class="portlet-title content-centre">
                                    <label class="control-label col-md-1 text-sm ">Select Building</label>
                                    <div class="col-md-9">
                                        <select id="building_dropdown" class="form-control" name="building_dropdown" required data-parsley-trigger="change">
                                            <option value="">Choose Building...</option>
                                            <?php foreach ($buildingDetail as $building) : ?>
                                                <option value="<?php echo $building->building_Id; ?>"><?php echo $building->building_Name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <span class="caption-subject bold uppercase">Building Expence</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="customerhistory">
                                                <thead>
                                                    <tr>
                                                        <th class="all">S.No</th>
                                                        <th class="all">Type</th>
                                                        <th class="all">Name</th>
                                                        <th class="all">Cost</th>
                                                        <th class="all">Month</th>
                                                        <th class="all">Year</th>
                                                    </tr>
                                                </thead>
                                                 <tbody id="mytable">
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><h5>Total Expnece</h5></td>
                                                    <td><h5 id="totalexpence"></h5></td>
                                                </tr>
                                            </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var dataTable = $('#customerhistory').DataTable();
        $('#building_dropdown').change(function() {
            dataTable.clear();
            $('#mytable').html('');
            var building_id = $(this).val();
           
            if (building_id !== '') {
                // Make AJAX request to fetch floor details
                $.ajax({
                    url: '<?php echo base_url('expencehistory'); ?>/' + building_id,
                    method: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var table_rows = ''; 
                        var totalamount = 0;
                        var count=1;
                    $.each(response, function(i, val) {
                        
                           var totalexpense = parseFloat(val["expence_Price"]);
                            totalamount += totalexpense;
                           
                            table_rows += '<tr>';
                            table_rows += '<td>' + count + '</td>';
                            table_rows += '<td>' + val["typeexpence"] + '</td>';
                            table_rows += '<td>' + val["expence_Name"] + '</td>';
                            table_rows += '<td>' + totalexpense + '</td>';
                            table_rows += '<td>' + val["expence_Month"] + '</td>';
                            table_rows += '<td>' + val["expence_Year"] + '</td>';
                           
                            table_rows += '</tr>';
                            count++;
                           
                        });
                          $('#mytable').append(table_rows);
                          $('#totalexpence').text(totalamount.toFixed(2));
                        // $('#totalexpense').text(totalexpense.toFixed(2));
                        dataTable.rows.add($('#mytable').find('tr')).draw();
 
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                // Hide the table if no building is selected
                console.log("No building selected");
            }
        });
    });
</script>