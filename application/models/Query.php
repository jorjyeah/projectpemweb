<?php 

	defined('BASEPATH') OR exit('No direct script access allowed !');

	class Query extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function InsertData($email, $username, $first_name, $last_name, $password, $salt, $address, $phone)
		{	
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
			$this->db->select('component.c_name, component.c_price, component.component_id, component_type.c_type_name');
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

		public function InsertCart($order_id, $component_id, $qty, $email, $user, $price, $subtotal){
			var_dump($order_id);
			echo "<br>";
			var_dump($component_id);
			echo "<br>";
			var_dump($qty);
			echo "<br>";
			var_dump($user);
			echo "<br>";
			var_dump($email);
			echo "<br>";
			var_dump($price);
			echo "<br>";
			var_dump($subtotal);
			echo "<br> <br>";
			$data = array(
				'order_id' => $order_id,
				'email' => $email,
				'component_id' => $component_id,
				'order_qty' => $qty,
				'c_price' => $price,
				'c_sub_price' => $subtotal
			);
			$this->db->trans_begin();
			$this->db->insert('cart', $data);
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

		public function ShowCart($component_id){
			$this->db->trans_begin();
			$this->db->select('*');
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
					echo "gagal";
				}
			}
			else
			{
				echo "kurang email";
			}
		}
	}
;?>