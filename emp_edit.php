<?php

/*echo"<pre>";
print_r($_REQUEST);
echo"</pre>";*/

include_once("header.php");
include_once("config.php");
$userpic="";
$userpic_pre="";
$imgFile="";
$tmp_dir = "";
$imgSize="";
$nameErr = $emailErr = $phoneErr = $addressErr = $depErr = $desErr = $imageErr =  "";
$name = $email = $phone_num = $address = $dept_id = $desig_id = "";

if(isset($_POST["submit"])) { 	


	
	$name =  $_POST['name'];
	//$id = $_POST['id'];
	$email =  $_POST['email'];
	$phone_num =  $_POST['phone_num'];
	$address = $_POST['address'];
	//$photo = mysqli_real_escape_string($mysqli, $_POST['photo']);
	$dept_id =  $_POST['dept_id'];
	$desig_id =  $_POST['desig_id'];
	
	//print_r($imgFile);
	
	
	   /* $imgFile = $_FILES['image']['name'];
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
		  /*else{
		 
		  $address = ($_POST["address"]);
		  //echo $address;
		}*/
	  }
	  
  

  if (empty($_POST["dept_id"])) {
    $depErr ="Please type Depatment id";
  } /*else {
	 
    $dept_id = ($_POST["dept_id"]);
	//echo $dept_id;
	}*/
  


  if (empty($_POST["desig_id"])) {
    $desErr = "Please type Designation id";
  } /*else {
    $desig_id = ($_POST["desig_id"]);
	//echo $desig_id;
  }*/
 
		
	
		
		
		if (empty($_FILES["image"]['name'])) {
			
		
    $imageErr = "Please Select Image File";
		
		}
		
else {
	$imgFile = $_FILES['image']['name'];
		$tmp_dir = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
		//$imgFile = $_FILES['image']['name'];
		//$tmp_dir = $_FILES['image']['tmp_name'];
		//$imgSize = $_FILES['image']['size'];
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
		
  }
  
  
  
  
		
		
$id = $_REQUEST['id'];		
 $query = "SELECT * FROM employee WHERE id=$id";
 $resu = mysqli_query($mysqli,$query );

while($res = mysqli_fetch_array($resu))
{
 $userpic_pre = $res['image'];
}

if(file_exists('user_images/'.$userpic_pre))
{
	unlink('user_images/'.$userpic_pre);
}

	
header('Location: emp_add.php');



$id = $_REQUEST['id'];
 $sql = "UPDATE employee SET name='$name', email='$email', phone_num='$phone_num', address='$address', image='$userpic', dept_id='$dept_id', desig_id='$desig_id' WHERE id=$id";


$result = mysqli_query($mysqli, $sql );

/*if ($mysqli ->query($result) === TRUE) {
    echo  "New record created successfully";
} else {
    echo "Error: " . $result . "<br>" . $mysqli->error;
}*/
//header('Location: emp_add.php');

}







if(isset($_REQUEST['id'])){
$id = $_REQUEST['id'];

//getting id from url
  $que="SELECT *, e.id emp_id FROM employee e, department d ,designation des WHERE e.dept_id = d.id AND e.desig_id = des.id AND e.id = $id ORDER BY 'emp_id' DESC";
//selecting data associated with this particular id
$result = mysqli_query($mysqli, $que );
while($reslt = mysqli_fetch_array($result))
{
	 $name = $reslt['name'];
	 $email = $reslt['email'];
	 $phone_num = $reslt['phone_num'];
	 $address = $reslt['address'];
	 $dept_id = $reslt['dept_name'];
	 $desig_id = $reslt['designation_name'];
	 $imgFile = $reslt['image'];
	 
	//$age = $res['age'];
	//$email = $res['email'];
}
}




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload, Insert, Update, Delete an Image using PHP MySQL - Coding Cage</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

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
<body>

<!---<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <a class="navbar-brand" href="http://www.codingcage.com" title='Programming Blog'>Coding Cage</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/CRUD">CRUD</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/PDO">PDO</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/jQuery">jQuery</a>
        </div>
 
    </div>
</div>--->

<div class="container">


	<div class="page-header">
    	<h1 class="h2">add new user. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
    	<h1 class="h2"><a class="btn btn-default" href="emp_add.php">&nbsp; Back</a></h1>
    	
		
    </div>
    

	

<form method="post" enctype="multipart/form-data" class="form-horizontal" action="emp_edit.php" >
	    
	<table class="table table-bordered table-responsive">
	<input type="hidden"  name="id" value="<?php echo $id;?>">
       <tr>
    	<td><label class="control-label">Name </label></td>
     <td><input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php echo $name;?>"> <span class="error">* <?php echo $nameErr;?></span></td>
    </tr>
    <tr>
     
    	<td><label class="control-label">Email </label></td>
        <td><input class="form-control" type="text" name="email" placeholder="example@email.com" value="<?php echo $email;?>"> <span class="error">* <?php echo $emailErr;?></span></td>
    </tr> 
	<tr>
    	<td><label class="control-label">Mobile </label></td>
        <td><input class="form-control" type="text" name="phone_num" placeholder="01XXXXXXXXX" value="<?php echo $phone_num;?>"><span class="error" >* <?php echo $phoneErr;?></span></td>
    </tr> 
	<tr>
    	<td><label class="control-label">Address </label></td>
        <td><input class="form-control" type="text" name="address" placeholder="Enter Address" value="<?php echo $address;?>"> <span class="error">* <?php echo $addressErr;?></span></td>
    </tr>
<tr>
    	<td><label class="control-label">Department ID </label></span></td>
       <td><select name="dept_id" class="form-control selectpicker" value=""><span class="error" style= "float: right">*
      <option value="" select>Select</option>
      <!--<option value="Male" select>Male</option>
      <option value="Female">Female</option>
      <option value="Female">Other</option>--->
     

	


	<?php
  	$query = mysqli_query($mysqli,"select dept_name,id from department");
  	while($res = mysqli_fetch_array($query)){
		$sel_dept= '';
   if($dept_id == $res['dept_name']){
       $sel_dept = ' selected="selected"';

   }
	 	/*<option ".$sel_dept." value="<?php echo $res['id'];?>"><?php echo $res['dept_name'];?></option>*/
		
		echo "<option ".$sel_dept." value=". $res['id'].">".$res['dept_name'].'</option>';
}

 echo '</select>';
		
		 ?> 

	 
	  </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Designation ID </label></td>
       <td><select name="desig_id" class="form-control selectpicker" value="<?php echo $desig_id;?>">
      <option value="" select>Select</option>
      <!--<option value="Male" select>Male</option>
      <option value="Female">Female</option>
      <option value="Female">Other</option>--->
     

	<?php
  	$query = mysqli_query($mysqli,"select designation_name,id from designation");
  	while($res = mysqli_fetch_array($query)){
	$sel_desig= '';
   if($desig_id == $res['designation_name']){
       $sel_desig = ' selected="selected"';

   }

	 	/*echo <option .$sel_desig .value="<?php echo $res['id'];?>"><?php echo $res['designation_name'];?></option>*/
		echo "<option ".$sel_desig." value=". $res['id'].">".$res['designation_name'].'</option>';
	} 	
	

 echo '</select>';
 
	?>		
	  </td>
    </tr>
	
    <tr><img src="user_images/<?php echo $imgFile; ?>" class="img-rounded" width="250px" height="150px" />


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


</body>
</html>

<?php
include_once("footer.php");
?>
