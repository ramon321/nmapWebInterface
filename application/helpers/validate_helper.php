<?php
	function validate($data,$fields){
		# Get instance of codeigniter.
		$CI =& get_instance();
		$CI->load->library('form_validation');

		foreach ($data as $field) {
			# Validate that field exist.
			if(!isset($fields[$field]))
				exit('Validate error - Field '.$field.' not found.');
			
			# Add rules
			$CI->form_validation->set_rules(
				$field,
				$fields[$field]['name'],
				$fields[$field]['rule']
			);
		}
		# Throw exception if there is something wrong.
		if($CI->form_validation->run() == FALSE)
			throw new Exception(validation_errors());
	}
?>