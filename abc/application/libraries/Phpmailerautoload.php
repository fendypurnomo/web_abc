<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	class Phpmailerautoload {

		public function load()
		{
			require_once APPPATH.'third_party/phpmailer/src/Exception.php';
			require_once APPPATH.'third_party/phpmailer/src/PHPMailer.php';
			require_once APPPATH.'third_party/phpmailer/src/SMTP.php';

			$mail = new PHPMailer;
			return $mail;
		}
	}
