
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row justify-content-center">

      <div class="col-md-8">
        <label for="building_Table" class="form-label"></label>
        <select id="building_Table" class="form-select" >
          <option value="">select builing </option>
          <?php foreach ($buildingDetail as $details) { ?>
            <option value="<?php echo $details->building_Id; ?>">
              <?php echo $details->building_Name; ?>
            </option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div id="customer_DetailTableContainer" style="display: none;">
                <h5 class="card-title">Floor Details<span></span></h5>
                <table class="table table-border" id="customerDetails">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th>Building Name</th>
                            <th>Floor Name</th>
                            <th>Apartment Name</th>
                            <th>Payable Amount</th>
                            <th>Payment Status</th>
                            
                        </tr>
                    </thead>
                    <tbody id="mytable">
                        <!-- Table rows will be dynamically populated -->
                    </tbody>
                </table>
            </div>
  </section>
</main>
<script src="https:code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https:cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
    // $(document).ready(function() {
    //     $('#customerDetails').DataTable();
    //     searching: true;
    // });
</script>
<script>
  
  $(document).ready(function() {
    $('#building_Table').change(function() {
            var buildingId = $(this).val();
            console.log(buildingId);
            $('#customer_DetailTableContainer').show();
             console.log(buildingId);
            $.ajax({
                url: '<?php echo base_url('Customer/CustomerController/getCustomerByBuildingIdForReceivePayemt'); ?>/' + buildingId,
                method: 'get',
                dataType: 'json',
                success: function(res) {
                  console.log(res);
                 var customer_details=$('#mytable');
                 customer_details.empty();
                 var table_row="";
                 
                  if(res.length>0) {
                    $('#customer_DetailTableContainer').show();
                  $.each(res,(i,val)=>{
                  table_row+='<tr>';
                  table_row+='<td>'+val.customer_FirstName +' '+ val.customer_LastName +'</td>';
                  table_row+='<td>'+val.building_Name+'</td>';
                  table_row+='<td>'+val.floor_Name+'</td>';
                  table_row+='<td>'+val.appartment_Name+'</td>';
                  table_row+='<td>'+ val.customer_TotalAmonut + '</td>';
                  if(val.payment_Status==1)
                  {
                     table_row+='<td> <button class="btn btn-primary"> Paid  </button></td>';
                  }
                  else
                  {
                   table_row+='<td> <a href="<?php echo base_url('Billing/BillingInvoiceController/getPayment/');?>'+ val['user_Id']+'"><button class="btn btn-danger">UnPaid  </button></a></td>';
                  }    
                   table_row+='</tr>';
                  });
                  $('#mytable').append(table_row); 
                  
                  // Initialize DataTable plugin
                            $('#customerDetails').DataTable({
                      paging: true, // Enable pagination
                      searching: true, // Enable searching
                      ordering: true, // Enable sorting
                      responsive: true // Make the table responsive
                  }); // This line initializes DataTables on your table
                  }
                  else{
                  $('#customer_DetailTableContainer').hide();                 
                  }   
                },
                error: function(xhr, status, error) {
                  console.log('erroro',error);
                }
            });
        });
  });
</script>