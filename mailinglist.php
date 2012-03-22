<?php

if (isset($_POST['email'])) {
	$email = trim($_POST['email']);	
	$subscribeurl="http://lists.idrc.ocad.ca/cgi-bin/mailman/admin/idi-discuss/members/add?subscribe_or_invite=0&send_welcome_msg_to_this_batch=1&notification_to_list_owner=1&subscribees_upload=" . $email . "&adminpw=v0rl0n!";
	if (@file_get_contents("$subscribeurl"))
		echo $email;
}

?>