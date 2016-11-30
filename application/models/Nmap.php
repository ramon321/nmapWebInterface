<?php
    class Nmap extends CI_Model
    {
        private $commands = array(
            'network'   => ['tag'=>'Escanear red', 'command'=>'-sn'],
            'ip'   => ['tag'=>'Escanear ip', 'command'=>''],
            'fast'=>['tag'=>'Escaneo rapido','command'=>'-F'],
            'interface'=>['tag'=>'Mostrar interfaz','command'=>'--iflist']
        );
        /**/
        public function getAllCommands()
        {
            return $this->commands;
        }
        /**/
        public function executeCommand($command,$ip,$netMask)
        {
            $lastLine = exec($this->createCommand($command,$ip,$netMask),$output);
            return [
                'lastLine'=>$lastLine,
                'output'=>$output
            ];
        }
        /**/
        private function createCommand($command,$ip,$netMask)
        {
            if($command == 'network' || $command == 'networkWithPorts')
            {
                $netMask = $this->netmask2cidr($netMask);
                $ip .= "/$netMask";
            }
            $command = $this->commands[$command]['command'];
            return "nmap $command $ip";
        }
        /**/
        private function netmask2cidr($netMask) {
			$cidr = 0;
			foreach (explode('.', $netMask) as $number) {
				for (;$number> 0; $number = ($number <<1) % 256) {
					$cidr++;
				}
			}
			return $cidr;
		}
    }
?>