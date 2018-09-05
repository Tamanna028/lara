<?php
include_once("header.php");
include_once("config.php");
?>
<?php
// define variables and set to empty values
$nameErr = "";
$name = "";
$errorMSG = (object) array();


if(isset($_POST['submit']))	
 if (empty($_POST['name'])) {
    $errorMSG->pre_name = "Name is required";
	$errorMSG->success = false;
	$errorMSG->fieldtype = "name";
}
else if (!ctype_alpha(str_replace([' ','-'], '', $_POST['name']))) {
		
   $errorMSG->pre_name = "Only letters and white space allowed";
   $errorMSG->success = false;
   $errorMSG->fieldtype = "name";
      
    }else{
		$sql = "SELECT * FROM department where dept_name='".$_POST['name']."'";
			$result = mysqli_query($mysqli,$sql);
			if ($result->num_rows > 0)
			{
			$errorMSG->pre_name =  "Unique Name is required";
			}else  {
    $name = $_POST['name'];
	$errorMSG->success = true;
	$errorMSG->pre_name = "thanks for submit";
	
	$errorMSG->fieldtype = "name";
}
	}


}


//echo json_encode($errorMSG);
//$mysqli->close();


  
/*if(!empty($name)){
	
	//$sql = mysqli_query($mysqli, "INSERT INTO employee(name,email,phone_num,address,image,dept_id,desig_id) VALUES('$name','$email','$phone_num','$address','$userpic','$dept_id','$desig_id')");
$res = "INSERT INTO department (dept_name)VALUES ('".$name."')";
		if($mysqli->query($res)=== TRUE){
			echo "Data added sucessfully";
		}
		else{
			echo $mysqli->error;
		}
		
}*/




?>
