
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<style type="text/css">
</style>
</head>

<body background="images/back2.png">

<br />
<br />
<br />
<table align="center" cellpadding="0" bgcolor="#FFFFFF" width="800" border="0">
  <tr><td>
  <?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);
session_start();
 // Database name
//$tbl_name="admin-login"; // Table name

// This will connect you to your database
include("connection.php");

// Defining your login details into variables
     $username=$_POST['username'];
     $password=$_POST['password'];
     //$encrypted_password=md5($password); //MD5 Hash for security
// MySQL injection protections
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM admin WHERE username='$username' and password='$password'" or die(mysql_error());
$result=mysql_query($sql) or die(mysql_error());

// Checking table row
//$count=mysql_num_rows($result);
// If username and password is a match, the count will be 1

if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['firstname'] = $member['firstname'];
			//$_SESSION['SESS_FIRST_NAME'] = $member['FirstName'];
			//$_SESSION['SESS_LAST_NAME'] = $member['profImage'];
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			session_write_close();
			header("location: admin.php");
			exit();
		}else {
            header("location: index.php");
                 }

?> 
    </td>
  </tr>
</table>
<h1 align="center" class="heading">&nbsp;</h1>
</body>
</html>