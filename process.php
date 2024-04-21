<?php 
//start session
session_start();

require_once('database.php');

$action = $_GET['action'];

switch($action) {
	case 'add-cons':
		addCons();
	break;
	
	case 'delivered':
		markDelivered();
	break;
	
	case 'add-office':
		addNewOffice();
	break;
	
	case 'add-manager':
		addManager();
	break;
	
	case 'update-status':
		updateStatus();
	break;
	
	case 'change-pass':
		changePass();
	break;
			
	case 'logOut':
		logOut();
	break;		
	
}//switch

function addCons(){

	$patientname = $_POST['patientname'];
	$age = $_POST['age'];
	$sex = $_POST['sex'];
	$patientphone = $_POST['patientphone'];
	$patientaddress = $_POST['patientaddress'];

	$sql = "INSERT INTO tbl_courier (patient_name, age, sex, phone, p_add)
			VALUES('$patientname','$age','$sex','$patientphone','$patientaddress')". mysql_error();	
	//echo $sql;
	dbQuery($sql);
	header('Location: courier-add-success.php'); 
	
	//echo $Ship;
}//addCons

function markDelivered() {
	$cid = (int)$_GET['cid'];
	$sql = "UPDATE tbl_courier
			SET status = 'Delivered'
			WHERE cid= $cid";
	dbQuery($sql);
	header('Location: delivered-success.php'); 
			
}//markDelivered();

function addNewOffice() {
	
	$OfficeName = $_POST['OfficeName'];
	$OfficeAddress = $_POST['OfficeAddress'];
	$City = $_POST['City'];
	$PhoneNo = $_POST['PhoneNo'];
	$OfficeTiming = $_POST['OfficeTiming'];
	$ContactPerson = $_POST['ContactPerson'];
	
	$sql = "INSERT INTO tbl_offices (off_name, address, city, ph_no, office_time, contact_person)
			VALUES ('$OfficeName', '$OfficeAddress', '$City', '$PhoneNo', '$OfficeTiming', '$ContactPerson')";
	dbQuery($sql);
	header('Location: office-add-success.php');
}//addNewOffice

function addManager() {
	
	$ManagerName = $_POST['ManagerName'];
	$Password = $_POST['Password'];
	$Address = $_POST['Address'];
	$Email = $_POST['Email'];
	$PhoneNo = $_POST['PhoneNo'];
	$OfficeName = $_POST['OfficeName'];
	
	$sql = "INSERT INTO tbl_courier_officers (officer_name, off_pwd, address, email, ph_no, office, reg_date)
			VALUES ('$ManagerName', '$Password', '$Address', '$Email', '$PhoneNo', '$OfficeName', NOW())";
	dbQuery($sql);
	header('Location: manager-add-success.php');

}//addNewOffice

function updateStatus() {
	
	$OfficeName = $_POST['OfficeName'];
	$status = $_POST['status'];
	$comments = $_POST['comments'];
	$cid = (int)$_POST['cid'];
	$cons_no = $_POST['cons_no'];
	//$OfficeName = $_POST['OfficeName'];
	
	$sql = "INSERT INTO tbl_courier_track (cid, cons_no, current_city, status, comments, bk_time)
			VALUES ($cid, '$cons_no', '$OfficeName', '$status', '$comments', NOW())";
	dbQuery($sql);
	
	$sql_1 = "UPDATE tbl_courier 
				SET status = '$status' 
				WHERE cid = $cid
				AND cons_no = '$cons_no'";
	dbQuery($sql_1);	
	
	header('Location: update-success.php');

}//addNewOffice



function logOut(){
	if(isset($_SESSION['user_name'])){
		unset($_SESSION['user_name']);
	}
	if(isset($_SESSION['user_type'])){
		unset($_SESSION['user_type']);
	}
	session_destroy();
	header('Location: index.php');
}//logOut

?>