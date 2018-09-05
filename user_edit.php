<?php





///https://www.youtube.com/watch?v=xIpB2W5tHNo
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
$nameErr = $emailErr = $passErr = $typeErr = $imageErr = $roleErr= "";
$name = $email = $password = $type =$role=$a=$b= "";










if(isset($_POST['submit'])) { 	
//if(empty ($_POST["name"]) ||empty($_POST["email"])||empty($_POST["password"])||empty($_POST["type"])||empty($_POST["image"])){	
//print_r($_POST);
	//$id = $_GET['id'];
	
	$name =  $_POST['name'];
	//$id = $_POST['id'];
	$email =  $_POST['email'];
	$password =  $_POST['password'];
	$type = $_POST['type'];
	$c = $_POST['role'];
$d=implode(",",$c);

	
		                                                                
		if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }  else {
	  
    
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]/",$_POST["name"])) {
		//echo "gtrh";
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

   if(empty($_POST["password"])){
	  $passErr = "please type password";
  }
  else{
	  if(strlen($_POST["password"])<=8){
		  $passErr = "password must be 9 char";
		  
	  }
	  else{
		  if(!preg_match("@[a-z]@",$_POST["password"])||!preg_match("@[A-Z]@",$_POST["password"])||!preg_match("@[0-9]@",$_POST["password"])){
		   $passErr = "Please enter number and char";
		  }
		  else{
		 
		  $password = sha1(md5($_POST['password']));
		}
	  }
	  
  }
	  
   if (empty($_POST["type"])) {
    $typeErr ="Please select User Type";
  }else {
	 
    $type = ($_POST["type"]);
	//echo $dept_id;
	}
  		
		
	if (empty($_POST["role"])) {
    $roleErr ="Please select User Role";
  }else {
	 
    $role =($_POST["role"]);
	//echo $dept_id;
	}	
		
		
		if (empty($_FILES['image']['name'])) {
			
		
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
			
			
			$imgFile= ($_FILES["image"]);
			//echo $imgFile;
		
}
  
  
  
		
		
$id = $_REQUEST['id'];		
 $query = "SELECT * FROM all_user WHERE user_id=$id";
 $resu = mysqli_query($mysqli,$query );

while($res = mysqli_fetch_array($resu))
{
 $userpic_pre = $res['user_image'];
}

if(file_exists('user_images/'.$userpic_pre))
{
	unlink('user_images/'.$userpic_pre);
}

	
//header('Location: user_add.php');



$id = $_REQUEST['id'];

echo $sql = "UPDATE all_user SET user_name='$name', user_email='$email', user_password='$password', user_type='$type', user_image='$userpic' user_role='$role' WHERE user_id='$id'";

$result = mysqli_query($mysqli, $sql );

/*if ($mysqli ->query($result) === TRUE) {
    echo  "New record created successfully";
} else {
    echo "Error: " . $result . "<br>" . $mysqli->error;
}*/
//header('Location: user_add.php');



}







if(isset($_REQUEST['id'])){
$id = $_REQUEST['id'];

	
//getting id from url
 $que="SELECT * FROM all_user where user_id=$id";
//selecting data associated with this particular id
$result = mysqli_query($mysqli, $que );
while($reslt = mysqli_fetch_array($result))
{
	 $name = $reslt['user_name'];
	 $email = $reslt['user_email'];
	 $password = $reslt['user_password'];
	 $type = $reslt['user_type'];
	 $role = $reslt['user_role'];
	 $imgFile = $reslt['user_image'];
	
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
    	<h1 class="h2"><a class="btn btn-default" href="user_add.php">&nbsp; Back</a></h1>
    	
		
    </div>
    

	

<form method="post" enctype="multipart/form-data" class="form-horizontal" action="user_edit.php" >
	    
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
    	<td><label class="control-label">Password </label></td>
        <td><input class="form-control" type="password" name="password" placeholder="01XXXXXXXXX" value="<?php echo $password;?>"><span class="error" >* <?php echo $passErr;?></span></td>
    </tr> 
	
    
	<tr>
	<td><label class="control-label">User Type</label></td>
	<form action="">
	    

  <td><!---<input type="radio" name="type" value="Admin" onclick="check()"> Admin<br>--->
 
 <input type="radio" name="type" onclick="check()" value="Admin"  <?php echo ($type == 'Admin') ? ' checked=""' : ''; ?>> Admin<br>

 
 
 
	<form name="form1" method="post" action="">
 
  
  <div>
    <input type="checkbox" id="role" name="role[]" value=<?php if (preg_match("/view/", "$role")) { echo "checked";} else {echo "";} ?> />
    <label for="view">View</label>
  </div>
  
 
  
  <div>
    <input type="checkbox" id="role" name="role[]" value="<?php if (preg_match("/edit/", "$role")) { echo "checked";} else {echo "";} ?> />
    <label for="edit">Edit</label>
	</div>
	
	
	
	<div>
	 <input type="checkbox" id="role" name="role[]" value=<?php if (preg_match("/delete/", "$role")) { echo "checked";} else {echo "";} ?> />
    <label for="delete">Delete</label>
  </div>
  
 
       
                  

 
  
  
<div> <!---<input type="radio" name="type" value="Client" onclick="uncheck()"> Client<br>--->
<input type="radio" name="type" onclick="uncheck()" value="Client"<?php echo ($type== 'Client') ? ' checked=""' : ''; ?>> Client<br>
<span class="error" >* <?php echo $roleErr;?></span>
 </div>
 </form>
</form>

    </tr>
	<script>
function check() {
    document.getElementById("view").checked=true;
    document.getElementById("edit").checked=true;
    document.getElementById("delete").checked=true;
    
}
function uncheck() {
    document.getElementById("view").checked=false;
    document.getElementById("edit").checked=false;
    document.getElementById("delete").checked=false;
    
}
</script>


    <tr><img src="user_images/<?php echo $imgFile; ?>" class="img-rounded" width="150px" height="150px" />


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