<?php

include 'mysqlconnection.php';
$errorMSG = (object) array();




if (empty($_POST["name"])) {
    $errorMSG->msgname = "Name is required";
	$errorMSG->success = false;
	$errorMSG->fieldtype = "name";
}
else if (!ctype_alpha(str_replace([' ','-'], '', $_POST["name"]))) {
		
   $errorMSG->msgname = "Only letters and white space allowed";
   $errorMSG->success = false;
   $errorMSG->fieldtype = "name";
      
    } 

	

else {
    $name = $_POST["name"];
	$errorMSG->msgname = "";
	$errorMSG->success = true;
	$errorMSG->fieldtype = "name";
}



/* EMAIL */
//function

if (empty($_POST["email"])) {
    $errorMSG->msgemail = "Email is required";
	$errorMSG->success = false;
} else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG->msgemail = "Invalid email format";
	$errorMSG->success = false;
	$errorMSG->fieldtype = "email";
}


else {
	$email = $_POST["email"];
	$sql = "SELECT * FROM users WHERE email= '$email'";
	$result = $conn->query($sql);
	 if ($result->num_rows == 1) {
		 $errorMSG->success = false;
	$errorMSG->msgemail = "Already exit email please login";
	$errorMSG->fieldtype = "email";
	$email = "";
	 }
	 else{
	$errorMSG->success = true;
	$errorMSG->msgemail = "thanks for submit";
	$errorMSG->fieldtype = "email";
	 }
}


/* MSG SUBJECT */
/*
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "<li>Subject is required</li>";
} else {
    $msg_subject = $_POST["msg_subject"];
}


/* MESSAGE 
if (empty($_POST["message"])) {
    $errorMSG .= "<li>Message is required</li>";
} else {
    $message = $_POST["message"];
}*/


if($errorMSG->success == true){
	
echo json_encode($errorMSG);

	exit;
}


echo json_encode($errorMSG);
$conn->close();

?>