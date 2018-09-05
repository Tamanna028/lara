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
if(isset($_POST['submit']))
{ 
$id = $_GET['id'];
	
	$name =  $_POST['name'];
	//$id = $_POST['id'];
	$email =  $_POST['email'];
	$phone_num =  $_POST['password'];
	$address = $_POST['type'];
	//$photo = mysqli_real_escape_string($mysqli, $_POST['photo']);
	//$dept_id =  $_POST['dept_id'];
	//$desig_id =  $_POST['desig_id'];
	
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
header('Location: user_add.php');

}
//getting id from url
 $id = $_REQUEST['id'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM all_user WHERE user_id=$id");

while($res = mysqli_fetch_array($result))
{		//$id = $_GET['id'];
	 $name = $res['user_name'];
	 $email = $res['user_email'];
	 $password = $res['user_password'];
	 $type = $res['user_type'];
	 $imgFile = $res['user_image'];
	 
	//$age = $res['age'];
	//$email = $res['email'];
}

?>
<body> 


<div class="container">


	<div class="page-header">
    	<!----<h1 class="h2">add new user. <a class="btn btn-default" href="emp_view.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>--->
    	<!---<h1 class="h2"><a class="btn btn-default" href="emp_add.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; add new user. </a> <a class="btn btn-default" href="view_all.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>-->
    	<h1 class="h2"><a class="btn btn-default" href="user.html">&nbsp; Back</a></h1>
    	
		
    </div>
    

	

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table  class="table table-bordered table-responsive">
	
	
    <tr>
    	<td><label class="control-label">User Name. </label></td>
     <td><input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php echo $name;?>" /></td>
    </tr>
    <tr>
     
    	<td><label class="control-label">Email </label></td>
        <td><input class="form-control" type="text" name="email" placeholder="example@email.com" value="<?php echo $email;?>" /></td>
    </tr> 
	<tr>
    	<td><label class="control-label">Password</label></td>
        <td><input class="form-control" type="text" name="password" placeholder="Enter Password" value="<?php echo $password;?>" /></td>
    </tr> 
   
 

  <tr>
<td><label class="control-label">User Type </label></td>
<td>


	<input type="radio" name="type" value="Admin" <?php echo ($type == 'Admin') ? ' checked=""' : ''; ?>> Admin<br>

 <input type="radio" name="type" value="Client"<?php echo ($type== 'Client') ? ' checked=""' : ''; ?>> Client<br>
	
	</td>
	
	
</tr>

    </tr>
    <tr>
        <img src="user_images/<?php echo $imgFile; ?>" class="img-rounded" width="250px" height="250px" float="left" />
				<p class="page-header">
    </tr>
    

    </table>
   
 
</form>


<script src="bootstrap/js/bootstrap.min.js"></script>

</br>
</br>
</br>


</body>
</html>
<?php
include_once("footer.php");
?>
