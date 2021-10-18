<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Query_model extends CI_Model {

public function ledgerReport()
{    
    $customer = $this->input->get('customer');
    $start_date = $this->input->get('startdate');
    $end_date = $this->input->get('enddate');
    $this->db->dbprefix = '';
    $pi = " ((SELECT DATE_FORMAT(sma_sales.date, '%Y-%m-%d %T') as date, sma_sales.customer_id , sma_sales.reference_no as sale_reference, sma_sales.reference_no as reference_no, sma_sales.grand_total as debit,0 as credit from sma_sales)";
    $qi = "(SELECT DATE_FORMAT(sma_payments.date, '%Y-%m-%d %T') as date, sma_sales.customer_id as customer_id, sma_sales.reference_no as sale_reference, sma_payments.reference_no as reference_no, 0 as debit,sma_payments.amount as credit from sma_payments JOIN sma_sales ON sma_payments.sale_id=sma_sales.id WHERE sma_payments.sale_id IS NOT NULL ))";
    $this->db 
        ->select("date ,sale_reference, reference_no, debit, credit ", FALSE)
        ->from($pi . " UNION ALL " . $qi . " as L ")
        ->order_by('date ASC ,reference_no DESC');
        if($customer){
            $this->db->where('L.customer_id = '.$customer);
        }
        if($start_date) {
            $this->db->where("DATE(L.date) >= ('".$start_date." 00:00:00')");
        }
        if($end_date) {
            $this->db->where("DATE(L.date) <= ('".$end_date." 00:00:00')");
        }
    return $this->db->get();
}

public function CustomerBillerName()
{    
    $customer = $this->input->get('customer');
    $this->db->dbprefix = '';
    $this->db 
        ->select("company", FALSE)
        ->from("sma_companies");
        if($customer){
            $this->db->where('id = '.$customer);
        }
    return $this->db->get();
}

// supplier report 

    public function supplierReport()
{    
    $customer = $this->input->get('supplier');
    $start_date = $this->input->get('startdate');
    $end_date = $this->input->get('enddate');
    $this->db->dbprefix = '';
    $pi = " ((SELECT DATE_FORMAT(sma_purchases.date, '%Y-%m-%d %T') as date, sma_purchases.supplier_id as purchase_id, sma_purchases.reference_no as purchase_reference, sma_purchases.reference_no as reference_no, sma_purchases.grand_total as debit,0 as credit from sma_purchases)";
    $qi = "(SELECT DATE_FORMAT(sma_payments.date, '%Y-%m-%d %T') as date, sma_purchases.supplier_id as purchase_id, sma_purchases.reference_no as purchase_reference, sma_payments.reference_no as reference_no, 0 as debit,sma_payments.amount as credit from sma_payments JOIN sma_purchases ON sma_payments.purchase_id=sma_purchases.id WHERE sma_payments.purchase_id IS NOT NULL ))";
    // $customer = 5;
    $this->db 
        ->select("date ,purchase_reference, reference_no, debit, credit ", FALSE)
        ->from($pi . " UNION ALL " . $qi . " as L ")
        ->order_by('date ASC ,reference_no DESC');
        if($customer){
            $query = $this->db->where('L.purchase_id = '.$customer);
        }
        if($start_date) {
            $this->db->where("DATE(L.date) >= ('".$start_date." 00:00:00')");
        }
        if($end_date) {
            $this->db->where("DATE(L.date) <= ('".$end_date." 00:00:00')");
        }
    return $query->get();
}

public function SupplierBillerName()
{    
    $supplier = $this->input->get('supplier');
    $this->db->dbprefix = '';
    $this->db 
        ->select("company", FALSE)
        ->from("sma_companies");
        if($supplier){
            $this->db->where('id = '.$supplier);
        }
    return $this->db->get();
}

public function BankName()
{    
    $bankname = $this->input->get('bankid');
    $this->db->dbprefix = '';
    $this->db 
        ->select( '*', FALSE)
        ->from("sma_bank");
        if($bankname){
            $this->db->where('id = '.$bankname);
        }
    return $this->db->get();
}

public function listbankledger(){
   
      $bankid = $this->input->get('bankid');
      $start_date = $this->input->get('startdate');
      $end_date = $this->input->get('enddate');
      if($start_date != NULL &&  $end_date != NULL ){
          
     $querybankledger ="SELECT sma_payments.date, sma_payments.sale_id, sma_sales.customer as name, 'customer' as cust, sma_sales.reference_no as sale_reference, sma_payments.reference_no, sma_payments.bank_id,sma_payments.amount as credit,0 as debit FROM sma_payments JOIN sma_sales ON sma_sales.id = sma_payments.sale_id where bank_id is NOT null AND bank_id=$bankid AND DATE(sma_payments.date) BETWEEN '".$start_date." 00:00:00' AND '".$end_date." 00:00:00'
      UNION ALL
     SELECT sma_payments.date, sma_payments.purchase_id, sma_purchases. supplier as name,'supplier' as cust,sma_purchases.reference_no as purchase_reference, sma_payments.reference_no,sma_payments.bank_id, 0 as credit,sma_payments.amount as debit FROM sma_payments JOIN sma_purchases ON sma_purchases.id = sma_payments.purchase_id where bank_id is NOT null AND bank_id=$bankid AND DATE(sma_payments.date) BETWEEN '".$start_date." 00:00:00' AND '".$end_date." 00:00:00'";
      
      }else{
          
     $querybankledger ="SELECT sma_payments.date, sma_payments.sale_id, sma_sales.customer as name, 'customer' as cust, sma_sales.reference_no as sale_reference, sma_payments.reference_no, sma_payments.bank_id,sma_payments.amount as credit,0 as debit FROM sma_payments JOIN sma_sales ON sma_sales.id = sma_payments.sale_id where bank_id is NOT null AND bank_id=$bankid
      UNION ALL
     SELECT sma_payments.date, sma_payments.purchase_id, sma_purchases. supplier as name,'supplier' as cust,sma_purchases.reference_no as purchase_reference, sma_payments.reference_no,sma_payments.bank_id, 0 as credit,sma_payments.amount as debit FROM sma_payments JOIN sma_purchases ON sma_purchases.id = sma_payments.purchase_id where bank_id is NOT null AND bank_id=$bankid";
                 
      }
         
    return $this->db->query($querybankledger);
    
}

public function addbank($bank_name, $account_title, $description, $current_amount, $account_number, $contact_person, $phone_number){
	$query="insert into sma_bank values('','$bank_name','$account_title',	'$description',	'$account_number',	'$contact_person',	'$phone_number'	,'$current_amount',NOW())";
	$this->db->query($query); 
	echo '<div class="alert alert-success text-center mt-2 col-md-6">
  <strong>Success! </strong>Bank Account Added Successfully.
</div>';
	}
public function listbank(){
$query="SELECT * FROM sma_bank";
return $this->db->query($query);
}

public function listusers(){
$queryuser ="SELECT * FROM sma_users";
return $this->db->query($queryuser);
}
public function updatebank($id,$bank_name, $account_title, $description,$current_amount, $account_number, $contact_person, $phone_number){
    $query="UPDATE sma_bank SET bank_name='$bank_name',account_name='$account_title',account_details='$description',account_no='$account_number',contact_person=	'$contact_person',phone_number='$phone_number',current_amount=$current_amount+current_amount WHERE id='$id'";
$this->db->query($query);
 echo '<div class="alert alert-success text-center mt-2 col-md-6">
  <strong>Success! </strong>Bank Account Updated Successfully.
</div>';
}
public function getpurchaseById($id){
$query="SELECT reference_no, supplier, grand_total-paid as balance FROM sma_purchases WHERE id = $id";
return $this->db->query($query);
}

public function getsaleById($id){
$querysalpay="SELECT reference_no, customer, grand_total-paid as balance FROM sma_sales WHERE id = $id";
return $this->db->query($querysalpay);
}
}