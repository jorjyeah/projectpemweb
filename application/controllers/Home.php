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
					'username' => $query['user_name']
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

		$this->form_validation->set_rules('email', 'required|valid_email|is_unique[user.email]|max_length[50]');
		$this->form_validation->set_rules('username', 'required|is_unique[user.user_name]|max_length[10]|min_length[6]');
		$this->form_validation->set_rules('first_name', 'required|max_length[10]|min_length[2]');
		$this->form_validation->set_rules('last_name', 'required|max_length[10]|min_length[2]');
		$this->form_validation->set_rules('password', 'required|max_length[20]|min_length[6]');
		$this->form_validation->set_rules('salt', 'required|min_length[3]');
		$this->form_validation->set_rules('address', 'required|min_length[3]');
		$this->form_validation->set_rules('phone', 'required|min_length[10]|numeric');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('pages/register_user.php', $data);
			// var_dump($this->form_validation->run());
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

	public function process(){
		if($this->input->post('build') != NULL){
			echo "wow";
		}
		else if($this->input->post('cart') !== NULL){
			$data['user'] = $this->session->userdata('username');
			$data['comp'][0] = explode(' ', $_POST['pc'])[0];
			$data['comp'][1] = explode(' ', $_POST['mb'])[0];
			$data['comp'][2] = explode(' ', $_POST['gc'])[0];
			$data['comp'][3] = explode(' ', $_POST['rm'])[0];
			$data['comp'][4] = explode(' ', $_POST['ps'])[0];
			$data['comp'][5] = explode(' ', $_POST['ssd'])[0];
			$data['comp'][6] = explode(' ', $_POST['hdd'])[0];

			for ($i=0;$i<7;$i++){
				$data['qty'][$i] = $_POST[$i];
				if($data['qty'][$i] != 0){
					$this->query->InsertCart($data['comp'][$i], $data['qty'][$i], $data['user']);
				}
			}
			// var_dump($data['qty'.'0']);
			$data['pc'] = $this->query->ShowCart(explode(' ', $_POST['pc'])[0]);
			$data['mb'] = $this->query->ShowCart(explode(' ', $_POST['mb'])[0]);
			$data['rm'] = $this->query->ShowCart(explode(' ', $_POST['gc'])[0]);
			$data['gc'] = $this->query->ShowCart(explode(' ', $_POST['rm'])[0]);
			$data['ps'] = $this->query->ShowCart(explode(' ', $_POST['ps'])[0]);
			$data['ssd'] = $this->query->ShowCart(explode(' ', $_POST['ssd'])[0]);
			$data['hdd'] = $this->query->ShowCart(explode(' ', $_POST['hdd'])[0]);
			$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
			$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
			$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
			$this->load->view('pages/cart.php', $data);
		}
	}

	public function cart(){
		
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