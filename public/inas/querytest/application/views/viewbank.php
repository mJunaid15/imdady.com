        <?php
        defined('BASEPATH') OR exit('No direct script access allowed');
        ?><!DOCTYPE html>

        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>View Bank</title>
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

            <h4 class="text-center mt-5">View Bank</h4>
         
         <div class="container mt-5">
        <table class="table table-striped table-bordered table-hover" id="example1">
            <thead class="thead bg-primary text-white">
            <tr>
                <th><?php echo 'Id'; ?></th>
                <th><?php echo 'Bank Name'; ?></th>
                <th><?php echo 'Account Name'; ?></th>
                <th><?php echo 'Account Details'; ?></th>
                <th><?php echo 'Account No'; ?></th>
                <th><?php echo 'Contact Person'; ?></th>
                <th><?php echo 'Phone Number'; ?></th>
                <th><?php echo 'Current Amount'; ?></th>
                <th><?php echo 'Created'; ?></th>
                <th><?php echo 'Actions'; ?></th>
            </tr>
        </thead>
<?php foreach($bank->result_array() as $bank): ?>
         <tr>
             <td><?php echo $bank['id']; ?></td>
             <td><?php echo $bank['bank_name']; ?></td>
             <td><?php echo $bank['account_name']; ?></td>
             <td><?php echo $bank['account_details']; ?></td>
             <td><?php echo $bank['account_no']; ?></td>
             <td><?php echo $bank['contact_person']; ?></td>
             <td><?php echo $bank['phone_number']; ?></td>
             <td><?php echo $bank['current_amount']; ?></td>
             <td><?php echo $bank['created']; ?></td>
                <td style='white-space: nowrap'><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg_<?php echo $bank['id'] ?>" name="edit" value="<?php echo $bank['id'] ?>">Edit</button>
        <div class="modal fade bd-example-modal-lg_<?php echo $bank['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="container mt-5">
    <div class="card ">
  <div class="card-header card text-dark bg-light">
   Edit Bank Account Details
  </div>
 
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <form action="" class="needs-validation" method="post" novalidate>
    <div class="row">
        <input type="hidden" name="id" value="<?php echo $bank['id']; ; ?>" >
        <div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="bank name">Bank Name:</label>
    <input type="text" class="form-control" id="bank_name" placeholder="" name="bank name" value="<?php echo $bank['bank_name']; ?>" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Account Titel">Account Title:</label>
    <input type="text" class="form-control" id="Account Titel" placeholder="" name="account_title" value="<?php echo $bank['account_name']; ?>" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Description">Description</label>
    <input type="text" class="form-control" id="Description" value="<?php echo $bank['account_details']; ?>" placeholder="" name="description" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
</div>
<div class="row">
        <div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Current Amount">Current Amount</label>
    <input type="number" class="form-control" value="<?php echo $bank['current_amount']; ?>" id="Current Amount" placeholder="" name="" disabled required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Account Number">Account Number/IBAN</label>
    <input type="text" class="form-control" value="<?php echo $bank['account_no']; ?>" id="Account Number" placeholder="" name="account_number" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Contact Person">Contact Person</label>
    <input type="text" class="form-control" value="<?php echo $bank['contact_person']; ?>" id="Contact Person" placeholder="" name="contact_person" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
</div>
<div class="row">
        <div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Phone Number">Phone Number</label>
    <input type="number" class="form-control" value="<?php echo $bank['phone_number']; ?>" id="Phone Number" placeholder="" name="phone_number" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
<div class="col-md-4 col-sm-4">
  <div class="form-group">
    <label for="Current Amount">Add Amount</label>
    <input type="number" class="form-control" value="" id="Current Amount" placeholder="" name="current_amount">
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>
</div>
  <input type="submit" name="submit" value="Submit" class="btn btn-success">
  </form>
    </blockquote>
  </div>
</div>
</div>

<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
            

            </div>
          </div>
        </div>
        
        <a href="http://imdady.com/inas/querytest/index.php/welcome/bankledger?bankid=<?php echo $bank['id']; ?>" class="btn btn-primary btn-sm">Details</a>
       
        </td>

                


              
            </tr>
            <?php endforeach; ?>

            </table>

        </div>
        </div>
        </body>
        </html>
        <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example1').DataTable( {
                lengthChange: false,
                buttons: [ {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            }, {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            }, 'colvis' 
                ]
            } );
         
            table.buttons().container()
                .appendTo( '#example1_wrapper .col-md-6:eq(0)' );
        } );

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


                


               