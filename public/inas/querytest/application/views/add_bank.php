<!DOCTYPE html>
<html>
<head>
	
	<title>Add bank</title>
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
	<div class="container mt-5">
	<div class="card ">
  <div class="card-header card text-white bg-primary">
   Add Bank
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
    <label for="bank name">Bank Name:</label>
    <input type="text" class="form-control" id="bank name" placeholder="" name="bank_name" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Account Titel">Account Title:</label>
    <input type="text" class="form-control" id="Account Titel" placeholder="" name="account_title" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Description">Description</label>
    <input type="text" class="form-control" id="Description" placeholder="" name="description" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
</div>
<div class="row">
		<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Current Amount">Current Amount</label>
    <input type="number" class="form-control" id="Current Amount" placeholder="" name="current_amount" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Account Number">Account Number/IBAN</label>
    <input type="text" class="form-control" id="Account Number" placeholder="" name="account_number" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Contact Person">Contact Person</label>
    <input type="text" class="form-control" id="Contact Person" placeholder="" name="contact_person" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
</div>
<div class="row">
		<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Phone Number">Phone Number</label>
    <input type="number" class="form-control" id="Phone Number" placeholder="" name="phone_number" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
</div>
  <input type="submit" name="submit" value="Submit" class="btn btn-success
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
</body>
</html>