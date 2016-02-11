<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	$res=mysql_query("SELECT * FROM users WHERE email='$email'");
	$row=mysql_fetch_array($res);
	
	if($row['password']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		$_SESSION['json'] = $_POST['json'];
		header("Location: home.php");
		
	}
	else
	{
		?>
        <script>alert('wrong details');</script>
        <?php
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CS 166 - Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />

 <script>
  function signin_with_passfile(json_obj)
  {
  e=document.getElementById("femail");
  e.value=json_obj.username;  //"1@1.1";                                             
  p=document.getElementById("fpass")
  p.value=json_obj.password;  // "1";
  //alert(p.value);
  //document.forms["myform"].submit();
  //document.getElementById('myformid').submit();
  j = document.getElementById("json");
  j.value = JSON.stringify(json_obj);
  document.getElementById('btn-login-id').click();
  }
  </script>

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" id= "femail" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" id = "fpass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login" id = "btn-login-id" >Sign In</button></td>
</tr>
<tr>
<td><a href="register.php">Sign Up Here</a></td>
</tr>
</table>
<input type = "hidden" name = "json" id = "json" />

</form>
</div>
<br/> Or upload a passfile
<div id="login-upload-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td>
<iframe id = "uploadfrm" name = "ifr0ne" src = "../fileupload/basicbasic.html" width = "100%" height = "300px"></iframe>
</td>
</tr>
</table>
</form>
</div>

</center>
</body>
</html>
