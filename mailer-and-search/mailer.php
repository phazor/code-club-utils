<?php

	header('Access-Control-Allow-Origin: *');

		$id = $_POST["id"];
		$post_email = $_POST["email"];
		$post_name = $_POST["name"];
		$message = $_POST['message'];

		if ($_POST['form'] == 'volunteers') {
			$query = urlencode("QUERY-GOES-HERE");
		} elseif ($_POST['form'] == 'venues') {
			$query = urlencode("QUERY-GOES-HERE");
		}

		function jsonp_decode($jsonp, $assoc = false) { // PHP 5.3 adds depth as third parameter to json_decode
	    if($jsonp[0] !== '[' && $jsonp[0] !== '{') { // we have JSONP
	       $jsonp = substr($jsonp, strpos($jsonp, '('));
	    }
	    return json_decode(trim($jsonp,'();'), $assoc);
		}

		if ($_POST['form'] == 'volunteers') {
			$json = file_get_contents('https://docs.google.com/spreadsheets/d/SHEET-TOKEN-GOES-HERE/gviz/tq?tq='.$query.'&tqx=responseHandler:a');
		} elseif ($_POST['form'] == 'venues') {
			$json = file_get_contents('https://docs.google.com/spreadsheets/d/SHEET-TOKEN-GOES-HERE/gviz/tq?tq='.$query.'&tqx=responseHandler:a');
		}

		$array = jsonp_decode($json, true);

		$api_email_address = $array['table']['rows']['0']['c']['3']['v'];
		$api_name = $array['table']['rows']['0']['c']['1']['v']." ".$array['table']['rows']['0']['c']['2']['v'];

		require 'phpmailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'SMTP-SERVER-GOES-HERE';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'EMAIL-GOES-HERE';                 // SMTP username
		$mail->Password = 'PASSWORD-GOES-HERE';                           // SMTP password
		$mail->SMTPSecure = 'SMTPSECURE-TYPE-GOES-HERE';                            // `tls` or `ssl` accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->From = 'EMAIL-GOES-HERE';
		$mail->FromName = 'CLUB-NAME-GOES-HERE';
		$mail->AddReplyTo($post_email, $post_name);
		$mail->addAddress($api_email_address, $api_name);     // Add a recipient

		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

		$mail->isHTML(true);                                  // Set email format to HTML

		if ($_POST['form'] == 'volunteers') {
			$mail->Subject = 'Volunteer Enquiry from '.$post_name;
		} elseif ($_POST['form'] == 'venues') {
			$mail->Subject = 'Venue Enquiry from '.$post_name;
		}

		$mail->Body    = $message;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {

	    	echo json_encode(array('response' => $mail->ErrorInfo), true);

		} else {

		    echo json_encode(array('response' => 'success'), true);

		}

?>