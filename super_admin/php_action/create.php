<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$firstname = $_POST['firstname'];
	
	$lastname = $_POST['lastname'];
	$phone = $_POST['phone'];
	$active = $_POST['active'];

	$sql = "INSERT INTO `company`(`company_name`, `api_username`, `api_key`, `active`, `datecreated`) 
VALUES ('$firstname','$lastname','$phone',$active,now())";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the company information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}