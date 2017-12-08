<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{


	public function __construct()
	{
		parent::__construct();
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

		//die(var_dump($query['user_name']));
		
		if($query['user_name'] != NULL){
			$userdata = array(
					'username' => $query['user_name']
				);


			$this->session->set_userdata($userdata);
			redirect(base_url());
		}

		/*$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);*/
		
		/*$this->load->view('pages/home.php', $data);
		redirect(base_url());*/
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
		$this->load->view('pages/register_user.php', $data);
	}

	public function register1(){
		$query['data'] = $this->query->InsertData($_POST['email'], $_POST['username'], $_POST['first_name'], $_POST['last_name'], $_POST['password'], $_POST['salt'], $_POST['address'], $_POST['phone']);
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
		$this->load->view('pages/home.php', $data);
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

	public function build(){
		if($this->input->post('build') != NULL){
			echo "wow";
		}
		else if($this->input->post('cart') !== NULL){
			echo "yey";
			/*var_dump(explode(' ', $_POST['pc'])[0]);*/
			for ($i=0;$i<7;$i++){
				$data['qty'][$i] = $_POST[$i];
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
}