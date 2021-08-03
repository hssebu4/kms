<?php
       /* $config = array();
		$config['protocol'] = 'smtp';
        $config['SMTPAuth'] = true;
		$config['smtp_host'] = 'smtppro.zoho.com';
		$config['smtp_user'] = 'kms@nice.co.ug';
		$config['smtp_pass'] = 'Nice.co.ug2';
		$config['smtp_port'] = 587;//587
       */
      $config = array();
      $config['protocol'] = 'smtp';
      $config['smtp_auth'] = true;
      $config['smtp_secure'] ="ssl";
      $config['smtp_host'] = 'smtp.gmail.com';
      $config['smtp_user'] = 'nhopkms@gmail.com';
      $config['smtp_pass'] = 'Nice@2020.com';
      $config['smtp_port'] = 587;//587
		//$this->email->initialize($config);
		//$this->email->set_newline("\r\n"); $config['smtp_host']    = 'ssl://smtppro.zoho.com';

        ?>