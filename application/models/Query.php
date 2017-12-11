<?php 

	defined('BASEPATH') OR exit('No direct script access allowed !');

	class Query extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function InsertData($email, $username, $first_name, $last_name, $password, $address, $phone)
		{	
			$salt = random_string('alpha', 6);
			$data = array(
						'email' => $email,
						'user_name' => $username,
						'first_name' => $first_name,
						'last_name' => $last_name,
						'password' => md5($password.$salt),
						'salt' => $salt,
						'address' => $address,
						'phone' => $phone,
					);
			$this->db->trans_begin();
			$this->db->insert('User', $data);
			$this->db->trans_complete();
		}

		public function ShowData($c_type_id){
			$this->db->trans_begin();
			$this->db->select('component.c_name, component.c_price, component.component_id, component_type.c_type_name, component.c_score');
			$this->db->from('component');
			$this->db->join('component_type', 'component_type.c_type_id = component.c_type_id');
			$this->db->where('component.c_type_id', $c_type_id);
			$data=$this->db->get();
			$this->db->trans_complete();

			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return FALSE;
			}else
			{
				return $data->result_array();
			}
		}

		public function InsertTransaction($orderid, $shipid, $date, $total){
			$datadetail = array (
				'order_id' => $orderid,
				'ship_id' => $shipid,
				't_date' => $date,
				'total_price' => $total
			);
			$this->db->trans_begin();
			$this->db->insert('cart', $datadetail);
			$this->db->insert('transaction',$datakey);
			$this->db->trans_complete();
		}

		public function InsertCart($orderid, $componetid, $qty, $price, $subprice){
			$datadetail = array (
				'order_id' => $orderid,
				'user_name' => $username,
				'component_id' => $componentid,
				'order_qty' => $qty,
				'c_price' => $price,
				'c_sub_price' => $subprice
			);
			$this->db->trans_begin();
			$this->db->insert('cart', $datadetail);
			$this->db->insert('transaction',$datakey);
			$this->db->trans_complete();
		}

		public function UserDetail($user){
			$this->db->trans_begin();
			$this->db->select('email');
			$this->db->from('user');
			$this->db->where('user_name', $user);
			$data=$this->db->get();
			$this->db->trans_complete();
			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return FALSE;
			}else
			{
				return $data->row_array()['email'];
			}
		}

		public function ShowPrice($component_id){
			$this->db->trans_begin();
			$this->db->select('c_price');
			$this->db->from('component');
			$this->db->where('component_id', $component_id);
			$data=$this->db->get();
			$this->db->trans_complete();

			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return FALSE;
			}else
			{
				return $data->row_array()['c_price'];
			}
		}

		public function ShowScore($component_id){
			$this->db->trans_begin();
			$this->db->select('c_score');
			$this->db->from('component');
			$this->db->where('component_id', $component_id);
			$data=$this->db->get();
			$this->db->trans_complete();

			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return FALSE;
			}else
			{
				return $data->row_array()['c_score'];
			}
		}

		public function ShowName($component_id){
			$this->db->trans_begin();
			$this->db->select('c_name');
			$this->db->from('component');
			$this->db->where('component_id', $component_id);
			$data=$this->db->get();
			$this->db->trans_complete();

			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return FALSE;
			}else
			{
				return $data->row_array()['c_name'];
			}
		}

		public function ShipName($ship_id){
			$this->db->trans_begin();
			$this->db->select('*');
			$this->db->from('shipment');
			$this->db->where('ship_id', $ship_id);
			$data=$this->db->get();
			$this->db->trans_complete();

			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return FALSE;
			}else
			{
				return $data->row_array()['s_name'];
			}
		}

		public function ShowProgram(){
			$this->db->trans_begin();
			$this->db->select('p_name', 'l_score', 'm_score', 'h_score', 'vh_score');
			$this->db->from('program');
			$data=$this->db->get();
			$this->db->trans_complete();

			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return FALSE;
			}else
			{
				return $data->result_array();
			}
		}

		public function CheckLogin($email, $password)
		{	
			$data = array(
						'email' => $email,
						'password' => $password,
					);
			$this->db->trans_begin();
			$this->db->select('salt');
			$this->db->from('User');
			$this->db->where('email', $data['email']);
			$hasil = $this->db->get();
			$this->db->trans_complete();

			if($hasil->num_rows()>0){
				$this->db->trans_begin();
				$salt = $hasil->row_array();
				$salt = $salt["salt"];
				$this->db->select('user_name');
				$this->db->from('User');
				$this->db->where('password', md5($data['password'].$salt));
				$hasil = $this->db->get();
				$this->db->trans_complete();

				if($hasil->num_rows()>0){
					return $hasil->row_array();
				}				
				else{
					redirect(base_url());
				}
			}
			else
			{
				redirect(base_url());
			}
		}
	}
;?>