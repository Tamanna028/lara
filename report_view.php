

<?php
include_once("header.php");
include_once("config.php");
?>
<?php
if(isset($_POST['submit']))
{ 		//print_r($_POST);
	$id = $_GET['id'];
	
	$name =  $_POST['name'];
	//$id = $_POST['id'];
	$email =  $_POST['email'];
	$phone_num =  $_POST['phone_num'];
	$address = $_POST['address'];
	//$photo = mysqli_real_escape_string($mysqli, $_POST['photo']);
	$dept_id =  $_POST['dept_id'];
	$desig_id =  $_POST['desig_id'];
	
	//print_r($imgFile);
	
	
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
		
	    //$result = mysqli_query($mysqli, "UPDATE employee SET name='$name', email='$email', phone_num='$phone_num', address='$address', image='$userpic', dept_id='$dept_id', desig_id='desig_id' WHERE id=$id");

if ($mysqli ->query($result) === TRUE) {
    echo  "New record created successfully";
} else {
    echo "Error: " . $result . "<br>" . $mysqli->error;
}
header('Location: emp_add.php');

}
//getting id from url
 $id = $_REQUEST['id'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT *, e.id emp_id FROM employee e, department d ,designation des,salary sal,attendance att WHERE e.dept_id = d.id AND e.desig_id = des.id AND e.id=sal.empl_id AND e.id=att.employee_id ORDER BY 'emp_id' DESC");

while($res = mysqli_fetch_array($result))
{		//$id = $_GET['id'];
	 $name = $res['name'];
	 $email = $res['email'];
	 $phone_num = $res['phone_num'];
	 $address = $res['address'];
	 $dept_id = $res['dept_id'];
	 $desig_id = $res['desig_id'];
	 $sign_in = $res['sign_in'];
	 $sign_out = $res['sign_out'];
	 $grade = $res['grade'];
	 $basic = $res['basic'];
	 $transport = $res['transport'];
	 $food = $res['food'];
	 $mobile = $res['mobile'];
	 $total = $res['total'];
	
	 $imgFile = $res['image'];
	 
	//$age = $res['age'];
	//$email = $res['email'];
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
.form name{
	float: right;
}
.image{
	float: left;
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


	<!---<div class="page-header">
    	<h1 class="h2">add new user. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
    	<h1 class="h2"><a class="btn btn-default" href="emp_add.php">&nbsp; Back</a></h1>
    	
		
    </div>-->
    

	
<!---<form method="post" enctype="multipart/form-data" class="form-horizontal">-->

	<div class="form"> 
	<div class="name"> 
	 
	<table class="table table-bordered table-responsive">
	<a class="btn btn-default" href="report.php" >Go Back</a>
	</br>
	</br>

	
    <tr>
    	<td><label class="control-label">Name </label></td>
     <td><input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php echo $name;?>" /></td>
    </tr>
    <tr>
     
    	<td><label class="control-label">Email </label></td>
        <td><input class="form-control" type="text" name="email" placeholder="example@email.com" value="<?php echo $email;?>" /></td>
    </tr> 
	<tr>
    	<td><label class="control-label">Mobile </label></td>
        <td><input class="form-control" type="text" name="phone_num" placeholder="01XXXXXXXXX" value="<?php echo $phone_num;?>" /></td>
    </tr> 
	<tr>
    	<td><label class="control-label">Address </label></td>
        <td><input class="form-control" type="text" name="address" placeholder="Enter Address" value="<?php echo $address;?>" /></td>
    </tr>
<tr>
    	<td><label class="control-label">Department ID </label></td>
       <td>
	   <select name="dept_id" class="form-control selectpicker" value="">
      <option value="" select>Select</option>
      <!--<option value="Male" select>Male</option>
      <option value="Female">Female</option>
      <option value="Female">Other</option>--->
     


	<?php
  	$query = mysqli_query($mysqli,"select dept_name,id from department");
  	while($res = mysqli_fetch_array($query)){
		$sel_dept= '';
   if($dept_id == $res['id']){
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
       <td><select name="desig_id" class="form-control selectpicker" value="">
      <option value="" select>Select</option>
      <option value="Male" select>Male</option>
      <option value="Female">Female</option>
      <option value="Female">Other</option>
     

	<?php
  	$query = mysqli_query($mysqli,"select designation_name,id from designation");
  	while($res = mysqli_fetch_array($query)){
	$sel_desig= '';
   if($desig_id == $res['id']){
       $sel_desig = ' selected="selected"';

   }

	 	/*echo <option .$sel_desig .value="<?php echo $res['id'];?>"><?php echo $res['designation_name'];?></option>*/
		echo "<option ".$sel_desig." value=". $res['id'].">".$res['designation_name'].'</option>';
	} 	
	

 echo '</select>';
 
	?>		
	  </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Sign In </label></td>
        <td><input class="form-control" type="text" name="sign_in" placeholder="" value="<?php echo $sign_in;?>" /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Sign Out</label></td>
        <td><input class="form-control" type="text" name="sign_out" placeholder="" value="<?php echo $sign_out;?>" /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Grade</label></td>
        <td><input class="form-control" type="text" name="grade" placeholder="" value="<?php echo $grade;?>" /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Basic</label></td>
        <td><input class="form-control" type="text" name="basic" placeholder="" value="<?php echo $basic;?>" /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Transport</label></td>
        <td><input class="form-control" type="text" name="transport" placeholder="" value="<?php echo $transport;?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Food</label></td>
        <td><input class="form-control" type="text" name="food" placeholder="" value="<?php echo $food;?>" /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Mobile</label></td>
        <td><input class="form-control" type="text" name="mobile" placeholder="" value="<?php echo $mobile;?>" /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Total</label></td>
        <td><input class="form-control" type="text" name="total" placeholder="" value="<?php echo $total;?>" /></td>
    </tr>
	</div>
	<div>
	<div class="image">
	
    
    <tr>
    	<!---<td><label class="control-label">Profile Img.</label></td>
       <!--- <td><input class="input-group" type="file" name="image" accept="image/*" value=""/></td>--->
	   <img src="user_images/<?php echo $imgFile; ?>" class="img-rounded" width="250px" height="250px" float="left" />
				<p class="page-header">
    </tr>
    
   <!---<tr>
        <td colspan="2"><button type="submit" name="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Update
        </button>
        </td>
    </tr>---->
    
    </table>
    
</form>
</div>
</div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
<?php
include_once("footer.php");
?>