<?php 
//www.freestudentprojects.com
session_start();
	include("database.php");
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['firstname']) || (trim($_SESSION['firstname']) == '')) {
		header("location: index.php");
		exit();
	}
?>