<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bank Ledger Report
	
		<?php
foreach($name->result_array() as $name):
echo " Bank - " . $name['bank_name']."\n" ;
echo " Amount - " . $name['current_amount'] ;
endforeach;?>

</title>
	<link rel="icon" href="<?=base_url(); ?>/images/favicon.png" sizes="44x44" type="image/png"> 
     <link rel="apple-touch-icon" href="<?=base_url(); ?>/images/favicon.png">
    <link rel="shortcut icon" href="<?=base_url(); ?>/images/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/css/jquery.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/css/popper.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/css/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/buttons.bootstrap4.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/jszip.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/pdfmake.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/vfs_fonts.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/buttons.colVis.min.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/buttons.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.bootstrap4.min.css">

</head>
<body style="background-color: #F3F3F3">
    
    <?php 
  
    $user_id = $this->input->get('bankid');
    $start_date = null;
    $end_date = null;

    if(isset($_POST['search'])){
    $start_date = $this->input->post('start_date');
    $end_date = $this->input->post('end_date');
    header("Location:http://imdady.com/inas/querytest/index.php/welcome/bankledger?bankid=". $user_id . "&startdate=".$start_date."&enddate=".$end_date);
}
?>

 <br>

  <div align="center">
     <h2>Bank Ledger Report</h2>
     <?php
echo "<h2> Bank - " . $name['bank_name']."<br><span style='color:green;'> Balance - " . $name['current_amount']."</span></h2>";?>
 </div>
   <form method="post" action="">
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" required>
                </div>
            </div>
        
        <div class="col-md-4">
                <div class="form-group">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" required>
                </div>
            </div>
    <div class="col-md-4">
                        <button type="submit" name="search" class="btn btn-success btn-sm" style="margin-top: 10%">Search</button>
                </div>
    </div>
    </div>  
</form>
    
    
<div class=" container mt-5 col-md-10">
<table class="table table-striped table-bordered table-hover" id="example">
    <thead>
      
    <tr class="thead bg-primary text-white">
        <th><?php echo 'Date'; ?></th>
         <th><?php echo 'Name'; ?></th>
          <th><?php echo 'Customer/Supplier'; ?></th>
       
              <th><?php echo 'Sale/Purchase Reference'; ?></th>
         <th><?php echo 'Reference'; ?></th>
  
     
         <th><?php echo 'Credit'; ?></th>
         <th><?php echo 'Debit'; ?></th>
         
        
      
     
      
    
    </tr>
</thead>

<?php 
$previousbalance =0;
foreach($bankledgerreport->result_array() as $blr):
   
    
?>

    <tr>
     
        <th><?php echo $blr['date']; ?></th>
        
                   <th><?php echo $blr['name']; ?></th>  
                  <th><?php echo $blr['cust']; ?></th>
                <th><?php echo $blr['sale_reference']; ?></th>
               <th><?php echo $blr['reference_no']; ?></th>
              <th><?php echo $blr['credit']; ?></th>
            <th><?php echo $blr['debit']; ?></th>
            
           
 
                
                 
        
    </tr>
<?php endforeach;?>


    </table>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );

</script>