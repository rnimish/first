<?php
$name       = @trim(stripslashes($_POST['name'])); 
$email       = @trim(stripslashes($_POST['email'])); 
$msg   = @trim(stripslashes($_POST['message']));
if(filter_var($email) && $msg)
{
  	$admin_email  = 'send2nimish@gmail.com';
	$from="admin@nimish.webege.com";
	$to = $email;
	$subject = "Your Query Has Been Received!";
	$subject1 = "Freelance Query";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	 
	$headers .= 'From: '.$from."\r\n".
	    'Reply-To: '.$admin_email."\r\n" .
	    'X-Mailer: PHP/' . phpversion();
	 
	$message = '<html><body>';
	$message .= 'Hi&nbsp;'.ucwords($name).',';
	$message .= '<br><br><span>Your query has been successfully recieved. </span>';
	$message .= '<br><span>Thanks!</span><br><br><span>Admin</span>';
	$message .= '</body></html>';
	mail($to, $subject, $message, $headers);

	$message1 = '<html><body>';
	$message1 .= 'Hi,';
	$message1 .= '<br><br><span>New user query on nimish.webege.com, details are below:</span>';
	$message1 .= '<br><br><span>Name</span>:&nbsp;'.ucwords($name).'<br><span>Email</span>:&nbsp;'.$email.'<br><br><span>Messsage: </span> '.ucfirst($msg).'';
	$message1 .= '<br><br><span>Thanks!</span>';
	$message1 .= '</body></html>';
	mail($admin_email, $subject1, $message1, $headers);
	return true;
}
else
{
	return false;
}
?>