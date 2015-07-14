<?php 

class CustomerModel extends CI_Model
{
		//$this->load->helper('url');	

		public function delete_customer($id)
		{
			$this->db->where('customer_id',$id);
			$this->db->delete('customer');
			return true;
		}
		public function update_customer($id,$name,$address,$contact)
		{
			$this->db->where('customer_id',$id);
			$this->db->set('customer_name',$name);
			$this->db->set('customer_address',$address);
			$this->db->set('customer_contact',$contact);
			$this->db->update('customer');
			return true;
			
		}
		public function insert_customer($data)
		{
			// $data=array(
			// 			'customer_name'=>$cName,
			// 			'customer_address'=>$cAddress,
			// 			'customer_contact'=>$cContact
			// 	);
			if($this->db->insert('customer',$data))
				return true;
			else
				return false;
		}
}

?>