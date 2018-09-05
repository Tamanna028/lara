<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
include_once("header.php");
include_once("config.php");

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee Management System (EMS)</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
  border-top: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>

</head>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $phoneErr = $addressErr = $depErr = $desErr = $imageErr =  "";
$name = $email = $phone_num = $address = $dept_id = $desig_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($name)||empty($email)||empty($phone_num)||empty($address)||empty($dept_id)||empty($desig_id)||empty($imgFile)){
	
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }  else {
    
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]/",$_POST["name"])) {
		
      $nameErr = "Only letters and white space allowed";	  
    }
	else{
		$name = ($_POST["name"]);
		//echo $name;
  }
  }
  
 

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } 
  else {
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
	else{
    $email = ($_POST["email"]);
	//echo $email;
	}
  }

  if(empty($_POST['phone_num'])){
	  $phoneErr = "please type Phone Number";
  }
  else{
	  if(($_POST['phone_num'])<=11){
		   $phoneErr = "Phone number must be 11 digit";
		  
	  }
	  else{
		  if(!preg_match("@[0-9]@",$_POST["phone_num"])){
		    $phoneErr = "Phone number and char";
		  }
		  else{
		 
		   $phone_num= ($_POST["phone_num"]);
		   //echo $phone_num;
		}
	  }
	  
  }
	  
	  
if(empty($_POST['address'])){
	  $addressErr = "Please type address";
  }
  else{
		  if(!preg_match("@[a-z]@",$_POST["address"])||!preg_match("@[A-Z]@",$_POST["address"])||!preg_match("@[0-9]@",$_POST["address"])){
		   $addressErr = "Address belongs to number and char";
		  }
		  else{
		 
		  $address = ($_POST["address"]);
		  //echo $address;
		}
	  }
	  
  

  if (empty($_POST["dept_id"])) {
    $depErr ="Please type Depatment id";
  }/* else {
	 
    $dept_id = ($_POST["dept_id"]);
	//echo $dept_id;
	}*/
  


  if (empty($_POST["desig_id"])) {
    $desErr = "Please type Designation id";
  } /*else {
    $desig_id = ($_POST["desig_id"]);
	//echo $desig_id;
  }*/
 

	}
		
		
		if (empty($_FILES["image"]['name'])) {
			
		
    $imageErr = "Please Select Image File";
	}
	
	else{
			//print_r($_POST);
	  $imgFile = $_FILES['image']['name'];
		$tmp_dir = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			//$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			//$valid_extensions = array('pdf', 'docx', 'odt', 'txt'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
			move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				//print_r $userpic;
			// allow valid image file formats
			/*if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				//if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				//}
				/*else{
					$errMSG = "Sorry, your file is too large.";
				}*/
			//}
			/*else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";					
			}*/
			
			
			//$imgFile= ($_FILES["image"]);
			//echo $imgFile;
		
		
		
		
		
		

	
	//$sql = mysqli_query($mysqli, "INSERT INTO employee(name,email,phone_num,address,image,dept_id,desig_id) VALUES('$name','$email','$phone_num','$address','$userpic','$dept_id','$desig_id')");
 //$sql = "INSERT INTO employee ( name, email, phone_num, address, dept_id, desig_id, image)
       // VALUES ('".$name."','".$email."','".$phone_num."','".$address."','".$dept_id."','".$desig_id."','".$userpic."')";
		
	 $sql = "INSERT INTO employee ( name, email, phone_num, address, dept_id, desig_id,image)
        VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["phone_num"]."','".$_POST["address"]."','".$_POST["dept_id"]."','".$_POST["desig_id"]."','".$userpic."')";
		
			if($mysqli->query($sql)=== TRUE){
			echo "insert";
		}
		else{
			echo $mysqli->error;
		}
		

		}
		
		
}




?>

<?php 
if (($_SESSION['luser']['user_type']) == 'Admin') {
	  if($_SESSION['luser']['user_email'] == 'tamannafarabi@yahoo.com'){


?>







<body> 


<div class="container">


	<div class="page-header">
    	<!----<h1 class="h2">add new user. <a class="btn btn-default" href="emp_view.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>--->
    	<!---<h1 class="h2"><a class="btn btn-default" href="emp_add.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; add new user. </a> <a class="btn btn-default" href="view_all.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>-->
    	<h1 class="h2"><a class="btn btn-default" href="employee.html">&nbsp; Back</a></h1>
    	
		
    </div>
    

	

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table  class="table table-bordered table-responsive">
	
	
    <tr>
    	<td><label class="control-label">Name </label></td>
     <td><input class="form-control" type="text" name="name" placeholder="Enter Name" value="" /><span class="error">* <?php echo $nameErr;?></span></td>
    </tr>
    <tr>
     
    	<td><label class="control-label">Email </label></td>
        <td><input class="form-control" type="text" name="email" placeholder="example@email.com" value="" /><span class="error">* <?php echo $emailErr;?></span></td>
    </tr> 
	<tr>
    	<td><label class="control-label">Mobile </label></td>
        <td><input class="form-control" type="text" name="phone_num" placeholder="01XXXXXXXXX" value="" /><span class="error" >* <?php echo $phoneErr;?></span></td>
    </tr> 
	<tr>
    	<td><label class="control-label">Address </label></td>
        <td><input class="form-control" type="text" name="address" placeholder="Enter Address" value="" /><span class="error">* <?php echo $addressErr;?></span></td>
    </tr>
<tr>
    	<td><label class="control-label">Department ID </label><?php echo $dept_id;?></span></td>
       <td><select name="dept_id" class="form-control selectpicker" value=""><span class="error" style= "float: right">*
      <option value="" select>Select</option>
      <!--<option value="Male" select>Male</option>
      <option value="Female">Female</option>
      <option value="Female">Other</option>--->
     

	<?php
  	$query = mysqli_query($mysqli,"select dept_name,id from department");
  	while($res = mysqli_fetch_array($query)){
	?>

	 	<option value="<?php echo $res['id'];?>"><?php echo $res['dept_name'];?></option>
	 	
	 <?php 
	} 
	 ?>
	 	</select>
	  </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Designation ID </label></td><span class="error" style= "float: right">*
       <td><select name="desig_id" class="form-control selectpicker" value="">
      <option value="" select>Select</option>
      <!--<option value="Male" select>Male</option>
      <option value="Female">Female</option>
      <option value="Female">Other</option>--->
     

	<?php
  	$query = mysqli_query($mysqli,"select designation_name,id from designation");
  	while($res = mysqli_fetch_array($query)){
	?>

	 	<option value="<?php echo $res['id'];?>"><?php echo $res['designation_name'];?></option>
	 	
	 <?php 
	} 
	 ?>
	 	</select>
	  </td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Profile Img.</label></td>
        <td><input class="input-group" type="file" name="image"  value="<?php echo $imgFile; ?>"/></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
   
 
</form>


<script src="bootstrap/js/bootstrap.min.js"></script>


<!--<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">-->
<input id="myInput" type="text" placeholder="Search..">
</br>
</br>
</br>

<?php
	  }
	  
	  elseif($_SESSION['luser']['user_email'] != 'tamannafarabi@yahoo.com'){ 
		  ?>
		 
		  <div class="page-header">
    	<!----<h1 class="h2">add new user. <a class="btn btn-default" href="emp_view.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>--->
    	<!---<h1 class="h2"><a class="btn btn-default" href="emp_add.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; add new user. </a> <a class="btn btn-default" href="view_all.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>-->
    	<h1 class="h2"><a class="btn btn-default" href="employee.html">&nbsp; Back</a></h1>
    	
		
    </div>
    
		 <?php  
	  }
	  }
	  
	  
	  else { 
		  ?>
		 
		  <div class="page-header">
    	<!----<h1 class="h2">add new user. <a class="btn btn-default" href="emp_view.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>--->
    	<!---<h1 class="h2"><a class="btn btn-default" href="emp_add.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; add new user. </a> <a class="btn btn-default" href="view_all.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>-->
    	<h1 class="h2"><a class="btn btn-default" href="employee.html">&nbsp; Back</a></h1>
    	
		
    </div>
    
		 <?php  
	  }
	  
	  

?>










<?php

$sql = "SELECT *, e.id emp_id FROM employee e, department d ,designation des WHERE e.dept_id = d.id AND e.desig_id = des.id ORDER BY 'emp_id' DESC";
$result = $mysqli->query($sql);
echo "<table border='1'>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Address</th>
<th>Department ID</th>
<th>Desingnation ID</th>
<th>Photo</th>
<th>Actions</th>
 </tr>";

while($row = mysqli_fetch_array($result))
{

echo "<tr>";
echo "<thead>";
echo "<tbody id=\"myTable\">";
echo "<td>" . $row['emp_id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['phone_num'] . "</td>";
echo "<td>" . $row['address'] . "</td>";

echo "<td>" . $row['dept_name'] . "</td>";
echo "<td>" . $row['designation_name'] . "</td>";
echo "<td><img style='height: 69px;' src='user_images/" . $row['image'] . "'</td>";


  if (isset($_SESSION['luser']))  {


//$email = $_POST['email'];


if (($_SESSION['luser']['user_type']) == 'Admin') {
 if($_SESSION['luser']['user_email'] == 'tamannafarabi@yahoo.com'){	
	
	echo "<td><a href=\"emp_view.php?id=$row[emp_id]\">View</a> | <a href=\"emp_edit.php?id=$row[emp_id]\">Edit</a> | <a href=\"emp_delete.php?id=$row[emp_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
echo "<tbody>";
echo "<thead>";
echo "</tr>";
}
	  elseif($_SESSION['luser']['user_email'] != 'tamannafarabi@yahoo.com'){
		 
	if (($_SESSION['luser']['user_role'])=='view.edit.') {
	
echo "<td><a href=\"emp_view.php?id=$row[emp_id]\">View</a> | <a href=\"emp_edit.php?id=$row[emp_id]\">Edit</a> </td>";
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}

elseif(($_SESSION['luser']['user_role']) == '.edit.delete'){
	
	echo "<td><a href=\"emp_edit.php?id=$row[emp_id]\">Edit</a> | <a href=\"emp_delete.php?id=$row[emp_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}
	elseif(($_SESSION['luser']['user_role']) == 'view..delete'){
	echo "<td><a href=\"emp_view.php?id=$row[emp_id]\">View</a> | <a href=\"emp_delete.php?id=$row[emp_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}  elseif(($_SESSION['luser']['user_role']) == 'view..'){
	echo "<td><a href=\"emp_view.php?id=$row[emp_id]\">View</a></td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}elseif(($_SESSION['luser']['user_role']) == '.edit.'){
	echo "<td><a href=\"emp_edit.php?id=$row[emp_id]\">Edit</a> </td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

} elseif(($_SESSION['luser']['user_role']) == '..delete'){
	echo "<td><a href=\"emp_delete.php?id=$row[emp_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> </td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

} 
 


else{
	
	echo "<td><a href=\"emp_view.php?id=$row[emp_id]\">View</a> | <a href=\"emp_edit.php?id=$row[emp_id]\">Edit</a> | <a href=\"user_delete.php?id=$row[emp_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
echo "<tbody>";
echo "<thead>";
echo "</tr>";

	
}
}
}





else  { 
echo "<td><a href=\"emp_view.php?id=$row[emp_id]\">View</a>";



			
					 }
					 }
					 
					 }
					 
					 
					 
					 
					 
					 
					 
					
					
					 
					 
			
echo "</table>";

?>




</body>
</html>
<?php
include_once("footer.php");
?>
