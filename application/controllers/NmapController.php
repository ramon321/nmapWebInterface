<?php
    class NmapController extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('nmap');            
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
            $ip = $this->input->post('ip');
            $command = $this->input->post('command');

            echo $this->nmap->executeCommand($command,$ip);
        }
    }
?>