<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->model('query');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('string');
	}

	public function index(){
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
		
		$this->load->view('pages/home.php', $data);
	}

	public function index1(){
		$data['email'] = $this->input->post('email', true);
		$data['password'] = $this->input->post('password', true);
		$query = $this->query->CheckLogin($_POST['email'], $_POST['password']);

		if($query['user_name'] != NULL){
			$userdata = array(
					'username' => $query['user_name'],
					'name0' => null,
					'qty0' => null,
					'name1' => null,
					'qty1' => null,
					'name2' => null,
					'qty2' => null,
					'name3' => null,
					'qty3' => null,
					'name4' => null,
					'qty4' => null,
					'name5' => null,
					'qty5' => null,
					'name6' => null,
					'qty6' => null,
					'name7' => null,
					'qty7' => null,
				);


			$this->session->set_userdata($userdata);
			redirect(base_url());
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function register(){
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

		$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email|is_unique[user.email]|max_length[50]');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.user_name]|max_length[20]|min_length[4]');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[20]|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[20]|min_length[2]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[20]|min_length[6]');
		$this->form_validation->set_rules('salt', 'Salt', 'required|min_length[3]');
		$this->form_validation->set_rules('address', 'Address', 'required|min_length[4]');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required|min_length[10]|numeric');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('pages/register_user.php', $data);
		}
		else{
			$this->query->InsertData($_POST['email'], $_POST['username'], $_POST['first_name'], $_POST['last_name'], $_POST['password'], $_POST['salt'], $_POST['address'], $_POST['phone']);
			redirect(base_url());
		}
	}

	public function simulation(){
		$data['pc'] = $this->query->ShowData('PC1151');
		$data['mb'] = $this->query->ShowData('MB1151');
		$data['rm'] = $this->query->ShowData('RM4418');
		$data['gc'] = $this->query->ShowData('GC1000');
		$data['ps'] = $this->query->ShowData('PS0001');
		$data['ssd'] = $this->query->ShowData('SSD001');
		$data['hdd'] = $this->query->ShowData('HDD001');
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
		$this->load->view('pages/start_simulation.php', $data);
	}

	public function cart(){
		if($this->input->post('build') == 'build'){
			$data['user'] = $this->session->userdata('username');
			$data['email'] = $this->query->UserDetail($data['user']);
			$data['id'][0] = explode(' ', $_POST['pc'])[0];
			$data['id'][1] = explode(' ', $_POST['mb'])[0];
			$data['id'][2] = explode(' ', $_POST['rm'])[0];
			$data['id'][3] = explode(' ', $_POST['gc'])[0];
			$data['id'][4] = explode(' ', $_POST['ps'])[0];
			$data['id'][5] = explode(' ', $_POST['ssd'])[0];
			$data['id'][6] = explode(' ', $_POST['hdd'])[0];
			$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
			$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
			$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
	
			for ($i=0;$i<7;$i++){
				$data['name'][$i] = $this->query->ShowName($data['id'][$i]);
				$data['scr'][$i] = $this->query->ShowScore($data['id'][$i]);
			}
				$data['prgm'] = $this->query->ShowProgram($data);
			$this->load->view('pages/build.php', $data);
		}
		else{
			$data['user'] = $this->session->userdata('username');
			$data['orderid'] = date("ymd").random_string('numeric',4);
			$data['email'] = $this->query->UserDetail($data['user']);
			$this->session->set_userdata('name0', explode(' ', $_POST['pc'])[0]);
			$this->session->set_userdata('name1', explode(' ', $_POST['mb'])[0]);
			$this->session->set_userdata('name2', explode(' ', $_POST['rm'])[0]);
			$this->session->set_userdata('name3', explode(' ', $_POST['gc'])[0]);
			$this->session->set_userdata('name4', explode(' ', $_POST['ps'])[0]);
			$this->session->set_userdata('name5', explode(' ', $_POST['ssd'])[0]);
			$this->session->set_userdata('name6', explode(' ', $_POST['hdd'])[0]);
			$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
			$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
			$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

			for ($i=0;$i<7;$i++){
				$this->session->set_userdata('qty'.$i, $_POST[$i]);
				$data['name'][$i] = $this->query->ShowName($this->session->userdata('name'.$i));
				$data['prc'][$i] = $this->query->ShowPrice($this->session->userdata('name'.$i));
				$data['scr'][$i] = $this->query->ShowScore($this->session->userdata('name'.$i));
			}

			$this->load->view('pages/cart.php', $data);
		}
	}

	public function deletecom(){
		$index = $_POST['deletecom'];
		$this->session->set_userdata('qty'.$index, 0);
		$data['user'] = $this->session->userdata('username');
		$data['orderid'] = date("ymd").random_string('numeric',4);
		$data['email'] = $this->query->UserDetail($data['user']);
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
		for ($i=0;$i<7;$i++){
			$data['name'][$i] = $this->query->ShowName($this->session->userdata('name'.$i));
			$data['prc'][$i] = $this->query->ShowPrice($this->session->userdata('name'.$i));
		}
		
		$this->load->view('pages/cart.php', $data); /* gue mau redirect lagi ke halaman cart, caranya pakai routes 'process', itu nanti bakal masuk ke function process.
		Tapi dikasih name biar bisa bedain if-ifnya yang mau mengarah ke view*/

	}

	public function usercrud(){
		
		$crud = new grocery_CRUD();
		$crud->set_table('user');
		$crud->set_subject('User');
		$crud->required_fields('email', 'username', 'password', 'salt');
		$crud->unset_edit();
		$output = $crud->render();
		$data['crud'] = get_object_vars($output);

		$data['js'] = $this->load->view('include/javacrud.php', $data, TRUE);
		$data['css'] = $this->load->view('include/csscrud.php', $data, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
		$this->load->view('pages/crud.php', $data);
	}

	public function programcrud(){
		
		$crud = new grocery_CRUD();
		$crud->set_table('program');
		$crud->set_subject('Program');
		$crud->display_as('program_id', 'Program ID');
		$crud->display_as('p_name', 'Program Name');
		$crud->display_as('l_score', 'Low Score');
		$crud->display_as('m_score', 'Medium Score');
		$crud->display_as('h_score', 'High Score');
		$crud->display_as('vh_score', 'Very High Score');
		$crud->required_fields('program_id', 'p_name', 'l_score', 'm_score', 'h_score', 'vh_score');
		$output = $crud->render();
		$data['crud'] = get_object_vars($output);

		$data['js'] = $this->load->view('include/javacrud.php', $data, TRUE);
		$data['css'] = $this->load->view('include/csscrud.php', $data, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
		$this->load->view('pages/crud.php', $data);
	}

	public function componenttypecrud(){
		
		$crud = new grocery_CRUD();
		$crud->set_table('component_type');
		$crud->set_subject('Component Type');
		$crud->display_as('c_type_id', 'Component Type ID');
		$crud->display_as('c_type_name', 'Component Type Name');
		$crud->required_fields('c_type_id', 'c_type_name');
		$output = $crud->render();
		$data['crud'] = get_object_vars($output);

		$data['js'] = $this->load->view('include/javacrud.php', $data, TRUE);
		$data['css'] = $this->load->view('include/csscrud.php', $data, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
		$this->load->view('pages/crud.php', $data);
	}

	public function componentcrud(){
		
		$crud = new grocery_CRUD();
		$crud->set_table('component');
		$crud->set_subject('Component');
		$crud->display_as('component_id', 'Component ID');
		$crud->display_as('c_type_id', 'Component Type ID');
		$crud->display_as('c_name', 'Component Name');
		$crud->display_as('c_powercon', 'Component Power Consumption');
		$crud->display_as('c_price', 'Component Price');
		$crud->display_as('c_stock', 'Component Stock');
		$crud->display_as('c_score', 'Component Score');
		$crud->required_fields('component_id', 'c_type_id', 'c_name', 'c_powercon', 'c_price', 'c_stock', 'c_score');
		$output = $crud->render();
		$data['crud'] = get_object_vars($output);

		$data['js'] = $this->load->view('include/javacrud.php', $data, TRUE);
		$data['css'] = $this->load->view('include/csscrud.php', $data, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
		$this->load->view('pages/crud.php', $data);
	}

	public function cartcrud(){
		
		$crud = new grocery_CRUD();
		$crud->set_table('cart');
		$crud->set_subject('Cart');
		$crud->display_as('order_id', 'Order ID');
		$crud->display_as('component_id', 'Component ID');
		$crud->display_as('order_qty', 'Order Quantity');
		$crud->required_fields('order_id', 'email', 'component_id', 'order_qty', 'c_sub_price', 'c_total_price', 'order_date');
		$output = $crud->render();
		$data['crud'] = get_object_vars($output);

		$data['js'] = $this->load->view('include/javacrud.php', $data, TRUE);
		$data['css'] = $this->load->view('include/csscrud.php', $data, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
		$this->load->view('pages/crud.php', $data);
	}

	public function shipmentcrud(){
		
		$crud = new grocery_CRUD();
		$crud->set_table('shipment');
		$crud->set_subject('Shipement');
		$crud->display_as('ship_id', 'Shipment ID');
		$crud->display_as('s_name', 'Shipment Name');
		$crud->display_as('s_price', 'Shipment Price');
		$crud->required_fields('ship_id', 's_name', 's_price');
		$output = $crud->render();
		$data['crud'] = get_object_vars($output);

		$data['js'] = $this->load->view('include/javacrud.php', $data, TRUE);
		$data['css'] = $this->load->view('include/csscrud.php', $data, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
		$this->load->view('pages/crud.php', $data);
	}
}