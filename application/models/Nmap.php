<?php
    class Nmap extends CI_Model
    {
        private $commands = array(
            'network'   => ['tag'=>'Escanear red', 'command'=>'-sn'],
            'ip'   => ['tag'=>'Escanear ip', 'command'=>'']
        );
        /**/
        public function getAllCommands()
        {
            return $this->commands;
        }
        /**/
        public function executeCommand($command,$ip)
        {
            return shell_exec($this->createCommand($command,$ip));
        }
        /**/
        private function createCommand($command,$ip)
        {
            $command = $this->commands[$command]['command'];
            return "nmap $command $ip";
        }
    }
?>