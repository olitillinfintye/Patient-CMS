<?php 
//www.freestudentprojects.com
session_start();
include("database.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Access Denied</title>
<style type="text/css">
<!--
.heading {
	color: #F90;
	font-family: "Comic Sans MS", cursive;
}
.options {
	font-family: "Comic Sans MS", cursive;
	font-size: 16px;
	font-style: oblique;
	color: #F93;
}
-->
</style>
</head>

<body background="images/1019286_abstract_orange_tiles_background_.jpg">

<br />
<br />
<br />
<table align="center" cellpadding="0" bgcolor="#FFFFFF" width="800" border="0">
  <tr>
     <td width="160" height="287"> 
	   <form  method="POST" action="dir_login_ckeck.php">
		<p align="center"><a href="#"><img border="0" src="images/access.PNG" width="495" height="150" alt="logout" /></a></p>
      
        <p align="center"><a href="directorlogin.php"><img border="0" src="images/login.png"  onmouseover="this.src='images/login1.png';" onmouseout="this.src='images/login.png';" /></a>
      </form></td>
  </tr>
</table>
<h1 align="center" class="heading">&nbsp;</h1>
</body>
</html>