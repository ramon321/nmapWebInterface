<?php
	class Auth extends CI_Controller{
		# Fields of form login.
		private $fields = [
			'username' => [
				'rule'=>'required|min_length[3]|alpha_dash',
				'name'=>'username'
			],
			'password' => [
				'rule'=>'required|min_length[3]|alpha_dash',
				'name'=>'password'
			],
		];
		# Reirect on success login.
		private $redirect_to = 'home';
		# Redirect on logout.
		private $home = '';

		/*  */
		public function index(){
			# If there is an existing session.
			if($this->session->userdata('id'))
				redirect($this->redirect_to);
			$this->load->helper('form');
			$this->load->view('auth/login');
		}

		/*  */
		public function login(){
			try{
				# Validate data entry.
				$this->load->helper('validate');
				validate(
					['username','password'],
					$this->fields
				);
				# Validate credentials and create session.
				$this->load->model('user');
				$this->user->access(
					$this->input->post('username'),
					$this->input->post('password')
				);

				redirect($this->redirect_to);
			}catch(Exception $e){
				# An error ocurred, create error msj en send back to login.
				$this->session->set_flashdata(
					'error',
					'Clave o usuario incorrectos.'
				);
				redirect('auth');
			}
		}
		
		/*  */
		public function logout(){
			$this->load->model('user');
			$this->user->logout();
			redirect($this->home);
		}
	}
?>