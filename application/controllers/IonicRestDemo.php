<?php

require("application/libraries/REST_Controller.php");
class IonicRestDemo extends REST_Controller {
 
	 public function index()
	 {
	 $this->load->database();
	 } 
     public function customer_get()
     {
	 		 $this->load->database();
			$cId=$this->get('id');

		if(!$cId)
        {
        	$this->response($this->db->get('customer')->result());
          
        }
 		else
 		{
        	$customer = $this->db->get_where('customer',array('customer_id'=>$cId))->row();
        	if($customer)
	        {
	            $this->response($customer, 200); 
	        }
	 
	        else
	        {
	            $this->response(['error' => 'Record Not Found'], 404);
	        }
        }
        
     }
      public function customer_post()
     {
     	
	 		 $this->load->database();
     		$this->load->model('customerModel');
		

		        $data = array(		            
		            'customer_name' => $this->input->get('name'),
		            'customer_address' => $this->input->get('address'),
		            'customer_contact'=>$this->input->get('contact')
		        );
		     
		        $result = $this->customerModel->insert_customer($data);
		        if ($result) {
		        	 $message="insert Record Successfully";
		            $this->response($message, 200); // 200 being the HTTP response code
		        } else {
		            $this->response(['error' => 'Record Not Inserted'], 404);
		        }
  	 }
	
   public function customer_delete($id)
	{
		$this->load->database();
		$this->load->model('customerModel');
		if($this->customerModel->delete_customer($id))
		{
		
			 $message="Delete Record Successfully";
			 $this->response($message, 200);
		}
	}
	public function customer_put($id,$name,$address,$contact)
	{
		$this->load->database();
		$this->load->model('customerModel');
	
		
		if($this->customerModel->update_customer($id,$name,$address,$contact))
		{
			$message="Update Record Successfully";
			$this->response($message, 200); 
		}
		else
        {
            $this->response(['error' => 'Record Not Updated'], 404); 
        }
		
	}
}
?>
