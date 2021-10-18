<!DOCTYPE html>
<html>
<head>
	
	<title>Add Payment by Bank</title>
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
<body style="background-color: #f3f3f3; ">
    <?php
   foreach($purchase->result_array() as $purchase):
       ?>
       <div class="mt-3" align="center">
            <h2>Supplier Name - <?php echo $purchase['supplier']; ?></h2>
            <br>
            <h3>Reference Number - <?php echo $purchase['reference_no'];?></h3>
       </div>
       <?php
    endforeach;
   ?>
	<div class="container mt-5">
	<div class="card ">
  <div class="card-header card text-white bg-primary">
   Add Bank Payment
  </div>
  <div class="card-header card text-dark bg-light">
  Please fill in the information below. The field labels marked with * are required input fields.
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <form action="" method="post" class="needs-validation" novalidate>
	<div class="row">
		<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="date name">Date</label>
    <input type="date" class="form-control" id="date" placeholder="" value="" name="date" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="User Name">User Name</label>
    
         <select class="form-control" id="user" name="user_name" required>
         
      
        <?php foreach($listusers->result_array() as $listusers): ?>
        <option value="<?php echo $listusers['id'] ?>"><?php echo $listusers['first_name']." ".$listusers['last_name'] ;?></option>
        <?php endforeach; ?>
    </select>
    
    
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Account Title">Reference no</label>
    <input type="text" class="form-control" id="Reference_No" placeholder="" name="Reference_No" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>

</div>
<div class="row">
		<div class="col-md-6 col-sm-6">
  <div class="form-group">
    <label for="Current Amount">Amount</label>
    <input type="number" class="form-control" id="Amount" placeholder="" value="<?php echo $purchase['balance']; ?>" name="amount" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-6 col-sm-6">
  <div class="form-group">
    <label for="Account Number">Select Account Number</label>
     <select class="form-control" id="Account Number" name="account_number" required>
         <?php foreach($bank->result_array() as $bank): ?>
        <option value="<?php echo $bank['id']; ?>"><?php echo $bank['bank_name']."-".$bank['account_no']; ?></option>
        <?php endforeach; ?>
    </select>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>


</div>

 <div class="row">
      
      <div class="col-md-6 col-sm-6">
  <div class="form-group">
    <label for="Pay by">Pay by</label>
         <select class="form-control clk" id="Payby" name="paid_by" required>
        <option value="pay by bank">Pay By Bank</option>
        <option value="Cheque">Cheque</option>
        
    </select>
   
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
		<div class="col-md-6 col-sm-6 fieldhide">
  <div class="form-group">
    <label for="Cheque no">Cheque No</label>
    <input type="text" class="form-control" id="chequeno" placeholder="" value="" name="cheque_no">
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>


</div>

  <input type="submit" name="submit" value="Add Payment" class="btn btn-success
  ">
</form>
    </blockquote>
  </div>
</div>
</div>
<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script>
    $(document).ready(function() {
     $('.fieldhide').hide();
    
     
      $('.clk').change(function(){
           if ($(this).val() == 'Cheque') {
               $('.fieldhide').show();           
           }
           
            if ($(this).val() == 'cash') {
               $('.fieldhide').hide();           
           }
          
          
           
        });
   
});
</script>
