<?php
	class User extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		/*  */
		public function access($username,$password){
			$user = $this->get_user($username);
			if($user->password == md5($password)){
				# Update skey.
				$skey = $this->update_skey($username);
				# Create Session.
				$this->session->set_userdata([
					'id'		=> $user->id,
					'username'	=> $user->username,
				]);
				return true;
			}
			throw new Exception('The password is incorrect.');
		}
		/*  */
		public function logout(){
			$this->session->sess_destroy();
		}
		/*  */
		public function update_skey($username){
			$this->load->helper('string');
			$skey = random_string('alnum',8);

			$this->db->where(['username'=>$username]);
			$this->db->update(
				'users',
				['skey'=>$skey]
			);
			return $skey;
		}
		/*  */
		public function get_user($username){
			$this->db->where([
				'username'	=> $username
			]);
			$query = $this->db->get('users');
			if($query->num_rows() < 1)
				throw new Exception('User '. $username .' not found.');

			$username = $query->row(0);
			return $username;
		}
	}
?>