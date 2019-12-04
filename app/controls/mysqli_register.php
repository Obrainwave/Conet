<?php
// include function files for this application
require_once('../app/control.php');
//create short variable names

$email=$_POST['email'];
$name=$_POST['name'];
$password=$_POST['password'];

// start session which may be needed later
// start it now because it must go before headers
session_start();
try
{
// check forms filled in
/*if (!filled_out($_POST))
{
throw new Exception("<div class='content'>You have not filled the form out correctly. Please go back and try again.</div>");
}
// email address not valid
if (!valid_email($email))
{
throw new Exception("<div class='content'>That is not a valid email address.  Please go back and try again.</div>");
}
// passwords not the same
if ($passwd != $passwd2)
{
throw new Exception("<div class='content'>The passwords you entered do not match. Please go back and try again.</div>");
}
// check password length is ok
if (strlen($passwd)<6)
{
throw new Exception("<div class='content'>Your password must be at least 6 characters long. Please go back and try again.</div>");
}
// check username length is ok
if (strlen($username)>16)
{
	throw new Exception("<div class='content'>Your username must be less than 17 characters long. Please go back and try again.</div>");
}*/
// attempt to register
// this function can also throw an exception
    mysqliRegister($name, $email, $password);
    // register session variable
    $_SESSION['valid_user'] = $email;
    // provide link to members page
    //do_html_header('Registration successful');
    //echo "<div class='content'>Your registration was successful.  Go to the members page to start setting up your profile!</div>";
    //do_html_url('member.php', 'Go to members page');
    //echo "<div class='content'><p> <a href='../templates/index.php'>Update profile</a></div>";
    // end page
    //do_html_footer();
}
catch (Exception $e)
{
	//do_html_header('Problem:');
    echo $e->getMessage();
   //do_html_footer();
exit;
}

