<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Query_model');
    }
	public function index()
	{
		$data['posts'] = $this->Query_model->ledgerReport();
		$data['name'] = $this->Query_model->CustomerBillerName();
		$this->load->view('welcome_message',$data);
	}
	
	public function bankledger()
	{
	    $data['name'] = $this->Query_model->BankName();
	    $data['bankledgerreport'] = $this->Query_model->listbankledger();
	    $this->load->view('bankledger',$data);
	}

	public function supplier()
	{
		$data['posts'] = $this->Query_model->supplierReport();
		$data['name'] = $this->Query_model->SupplierBillerName();
		$this->load->view('supplierreport',$data);
	}
	public function bank()
	{
// 		$data['posts'] = $this->Query_model->supplierReport();
// 		$data['name'] = $this->Query_model->SupplierBillerName();
		$this->load->view('add_bank');
		if($this->input->post('submit')){
		    $bank_name = $this->input->post('bank_name');
		    $account_title = $this->input->post('account_title');
		    $description = $this->input->post('description');
		    $current_amount = $this->input->post('current_amount');
		    $account_number = $this->input->post('account_number');
		    $contact_person = $this->input->post('contact_person');
		    $phone_number = $this->input->post('phone_number');
		$this->Query_model->addbank($bank_name, $account_title, $description, $current_amount, $account_number, $contact_person, $phone_number);
		}
	}
	public function listbank(){
	    $data['bank'] = $this->Query_model->listbank();
	    $this->load->view('viewbank',$data);
	    if($this->input->post('submit')){
	        $id = $this->input->post('id');
	        $bank_name = $this->input->post('bank_name');
		    $account_title = $this->input->post('account_title');
		    $description = $this->input->post('description');
		    $current_amount = $this->input->post('current_amount');
		    $account_number = $this->input->post('account_number');
		    $contact_person = $this->input->post('contact_person');
		    $phone_number = $this->input->post('phone_number');
		    $this->Query_model->updatebank($id,$bank_name, $account_title, $description, $current_amount, $account_number, $contact_person, $phone_number);
	    }
	}
	public function deletebank(){
	    $id = $this->input->get('id');
	    $this->db->where("id",$id);
        $this->db->delete("sma_bank");
        header('Location: http://imdady.com/inas/querytest/index.php/welcome/listbank');
        echo '<div class="alert alert-danger text-center mt-2 col-md-6">
          <strong>Success! </strong>Bank Account Deleted Successfully.
        </div>';
	}
	

	
	public function Addbankpayment($id)
	{   
	    $data['purchase'] = $this->Query_model->getpurchaseById($id);
	    $data['bank'] = $this->Query_model->listbank();
	     $data['listusers'] = $this->Query_model->listusers();
	    $this->load->view('Addbankpayment',$data);
	    if($this->input->post('submit')){
	        $date = $this->input->post('date');
	      
	        $Reference_No = $this->input->post('Reference_No');
	        $amount = $this->input->post('amount');
	         $created = $this->input->post('user_name');
	        $account_number = $this->input->post('account_number');
	        $paid_by = $this->input->post('paid_by');
	        $cheque_no = $this->input->post('cheque_no');
        $query="UPDATE sma_purchases SET paid = paid+$amount WHERE id='$id'";
        $query1 = "UPDATE sma_bank SET current_amount = current_amount-$amount WHERE id='$account_number'";
        $query2 = "INSERT INTO sma_payments (id,date,purchase_id,,reference_no,paid_by,bank_id,cheque_no,amount,created_by,type) VALUES('',NOW(),'$id','$Reference_No','$paid_by','$account_number','$cheque_no','$amount','$created','sent')";
        if(empty($cheque_no)){
	            $query2 = "INSERT INTO sma_payments (id,date,purchase_id,reference_no,paid_by,bank_id,amount,created_by,type) VALUES('',NOW(),'$id','$Reference_No','$paid_by','$account_number','$amount','$created','sent')";
	        }
        $query3 = "Select current_amount from sma_bank WHERE id = $account_number";
        foreach($this->db->query($query3)->result_array() as $data):
        endforeach;
        if(($data['current_amount']-$amount)>=0){
        $this->db->query($query);
        $this->db->query($query1);
        $this->db->query($query2);
         echo '<div class="alert alert-success text-center mt-2 col-md-6">
          <strong>Success! </strong>Payment Added Successfully.
        </div>';
        }else {
            echo '<div class="alert alert-danger text-center mt-2 col-md-6">
          <strong>Error! </strong>You have insufficient balance .
        </div>';
        }
	    }
	}
	
		public function Addsalepayment($id)
	{  
	    
	     $data['sale'] = $this->Query_model->getsaleById($id);
	     $data['bank'] = $this->Query_model->listbank();
	     $data['listusers'] = $this->Query_model->listusers();
	     $this->load->view('Addsalebankpayment',$data);
	    
	    if($this->input->post('submit')){
	        $date = $this->input->post('date');
	        $Reference_No = $this->input->post('Reference_No');
	        $amount = $this->input->post('amount');
	        $created = $this->input->post('user_name');
	        $account_number = $this->input->post('account_number');
	        $paid_by = $this->input->post('paid_by');
	        $cheque_no = $this->input->post('cheque_no');
	        
	        
        $querysalpay="UPDATE sma_sales SET paid = paid+$amount WHERE id='$id'";
        $querysalpay1 = "UPDATE sma_bank SET current_amount = current_amount+$amount WHERE id='$account_number'";
         $querysalpay2 = "INSERT INTO sma_payments (id,date,sale_id,reference_no,paid_by,bank_id,cheque_no,amount,created_by,type) VALUES('',NOW(),'$id','$Reference_No','$paid_by','$account_number','$cheque_no','$amount','$created','received')";
         if(empty($cheque_no)){
	            $querysalpay2 = "INSERT INTO sma_payments (id,date,sale_id,reference_no,paid_by,bank_id,amount,created_by,type) VALUES('',NOW(),'$id','$Reference_No','$paid_by','$account_number','$amount','$created','received')";
	        }
        $this->db->query($querysalpay);
         $this->db->query($querysalpay1);
         $this->db->query($querysalpay2);
          echo '<div class="alert alert-success text-center mt-2 col-md-6">
  <strong>Success! </strong>Payment Added Successfully.
</div>';
	    }
	}
	
	
}
