<?php
global $_REQUEST;
$response = array('error'=>'');
$contact_email = 'prasanna@wunderfit.in';

// type
$type = $_REQUEST['type'];
// parse
parse_str($_POST['data'], $post_data);


		$user_name = stripslashes(strip_tags(trim($post_data['username'])));
		$user_email = stripslashes(strip_tags(trim($post_data['email'])));
		$user_subject = stripslashes(strip_tags(trim($post_data['subject'])));
		$user_msg =stripslashes(strip_tags(trim($post_data['message'])));
		$mobile =stripslashes(strip_tags(trim($post_data['mobile'])));

		if (trim($contact_email)!='' || trim($mobile)!='') {
			$subj = 'Enquiry form via wunderfit website';
			$msg = $subj." \r\nName: $user_name \r\nE-mail: $user_email \r\nContact Number: $mobile \r\nMessage: $user_msg";

			$head = "Content-Type: text/plain; charset=\"utf-8\"\n"
				. "X-Mailer: PHP/" . phpversion() . "\n"
				. "Reply-To: $user_email\n"
				. "To: $contact_email\n"
				. "From: $user_email\n";

				/* Send the message using mail() function */

			if (!mail($contact_email, $subj, $msg)) {
				$response['error'] = 'Error send message!';
			}
		} else
				$response['error'] = 'Error send message!';



	echo json_encode($response);
	die();
?>
