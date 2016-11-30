<?php
class NmapController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('nmap');
		$this->validateSession();
	}

	public function index()
	{
		$this->load->helper('form');
		$nmapCommands = $this->nmap->getAllCommands();

		$this->load->view('nmapInterface',compact('nmapCommands'));
	}
	/**/
	public function executeCommand()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('ip', 'Ip', 'required|valid_ip');
		$this->form_validation->set_rules('netMask', 'Marcara', 'required|valid_ip');
		$this->form_validation->set_rules('command', 'Comando', 'alpha');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata(
					'error',
					validation_errors()
				);
				redirect('/home');
		}

		$ip = $this->input->post('ip');
		$command = $this->input->post('command');
		$netMask = $this->input->post('netMask');

		$output = $this->nmap->executeCommand($command,$ip,$netMask);
		$this->load->view('printResults',compact('output'));
	}
	/**/
	public function validateSession()
	{
		$this->load->model('user');
		$username = $this->session->userdata('username');
		$skey = $this->session->userdata('skey');
		
		$user = $this->user->getUser($username);
		if(!$user || $user->skey != $skey )
			redirect('/');
	}
}
?>