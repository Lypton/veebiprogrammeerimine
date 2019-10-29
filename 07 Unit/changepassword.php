<?php

session_start();

$user = $_SESSION["userId"];

if ($user)	
{
	//kui kasutaja on sisse loginud
echo"
<form action='changepassword.php' method='POST'>
	Old password: <input type='text' name='oldpassword'><p>
	New password: <input type='password' name='newpassword'><p>
	Repeat password: <input type='password' name='repeatnewpassword'><p>
	<input type='submit' name='submit' value='Change password'><br>
</form>
";
}
else
	die("Te peate olema sisse logitud, et parooli vahetada!");

?>