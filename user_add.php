<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
include_once("header.php");
include_once("config.php");

?>


<?php

$nameErr = $emailErr = $passErr = $typeErr = $imageErr =  "";
$name = $email = $password = $type = "";





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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if(empty($_POST["name"])||empty($_POST["email"])||empty($_POST["password"])||empty($_POST["type"])){

	
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }  else {
    
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]/",$_POST["name"])) {
		
      $nameErr = "Only letters and white space allowed";	  
    }
	/*else{
		$name = ($_POST["name"]);
		//echo $name;
  }*/
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
		   $passErr = "Password number and char";
		  }
		  else{
		 
		  $password = sha1(md5($_POST['password']));
		}
	  }
	  
  }
	  
	  
  

  if (empty($_POST["type"])) {
    $typeErr ="Please select User Type";
  }/* else {
	 
    $dept_id = ($_POST["dept_id"]);
	//echo $dept_id;
	}*/
  		
	
		
		
		if (empty($_FILES["image"]['name'])) {
			
		
    $imageErr = "Please Select Image File";
	}
	}
	else{
		
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
		
		
		$sql = "INSERT INTO all_user ( user_name, user_email, user_password,user_type,user_image,user_role)
        VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["password"]."','".$_POST["type"]."','".$userpic."','".$_POST["view"].".".$_POST["edit"].".".$_POST["delete"]."')";
		
		
		
		
		
		
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
    	<td><label class="control-label">User Name. </label></td>
     <td><input class="form-control" type="text" name="name" placeholder="Enter Name" value="" /><span class="error">* <?php echo $nameErr;?></span></td>
    </tr>
    <tr>
     
    	<td><label class="control-label">Email </label></td>
        <td><input class="form-control" type="email" name="email" placeholder="example@email.com" value="" /><span class="error">* <?php echo $emailErr;?></span></td>
    </tr> 
	<tr>
    	<td><label class="control-label">Password</label></td>
        <td><input class="form-control" type="password" name="password" placeholder="Enter Password" value="" /><span class="error" >* <?php echo $passErr;?></span></td>
    </tr> 
   
    <tr>
	<td><label class="control-label">User Type</label></td>
	<form action="">
	    

  <td><input type="radio" name="type" value="Admin" onclick="check()"> Admin<br>
 
 
 
 
 
	<fieldset>
  
  <div>
    <input type="checkbox" id="view" name="view" value="view">
    <label for="view">View</label>
  </div>
  <div>
    <input type="checkbox" id="edit" name="edit" value="edit">
    <label for="edit">Edit</label>
	</div>
	<div>
	 <input type="checkbox" id="delete" name="delete" value="delete">
    <label for="delete">Delete</label>
  </div>

<div> <input type="radio" name="type" value="Client" onclick="uncheck()"> Client<br>
 <span class="error" >* <?php echo $typeErr;?></td>
 </div>
 </fieldset>
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
	
	
	
	
	
	
	
	
    <tr>
    	<td><label class="control-label">User Img.</label></td>
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

$sql = "SELECT * FROM all_user";
$result = $mysqli->query($sql);
echo "<table border='1'>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>User Type</th>
<th>User Role</th>
<th>Photo</th>
<th>Actions</th>
 </tr>";

while($row = mysqli_fetch_array($result))
{

echo "<tr>";
echo "<thead>";
echo "<tbody id=\"myTable\">";
echo "<td>" . $row['user_id'] . "</td>";
echo "<td>" . $row['user_name'] . "</td>";
echo "<td>" . $row['user_email'] . "</td>";
echo "<td>" . $row['user_type'] . "</td>";
echo "<td>" . $row['user_role'] . "</td>";
echo "<td><img style='height: 69px;' src='user_images/" . $row['user_image'] . "'</td>";


						//echo $_SESSION['success']; 
						//unset($_SESSION['success']);
					 if (isset($_SESSION['luser']))  {


//$email = $_POST['email'];


if (($_SESSION['luser']['user_type']) == 'Admin') {
 if($_SESSION['luser']['user_email'] == 'tamannafarabi@yahoo.com'){	
	
	echo "<td><a href=\"user_view.php?id=$row[user_id]\">View</a> | <a href=\"user_edit.php?id=$row[user_id]\">Edit</a> | <a href=\"user_delete.php?id=$row[user_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
echo "<tbody>";
echo "<thead>";
echo "</tr>";
}
	  elseif($_SESSION['luser']['user_email'] != 'tamannafarabi@yahoo.com'){
		 
	if (($_SESSION['luser']['user_role'])=='view.edit.') {
	
echo "<td><a href=\"user_view.php?id=$row[user_id]\">View</a> | <a href=\"user_edit.php?id=$row[user_id]\">Edit</a> </td>";
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}

elseif(($_SESSION['luser']['user_role']) == '.edit.delete'){
	
	echo "<td><a href=\"user_edit.php?id=$row[user_id]\">Edit</a> | <a href=\"user_delete.php?id=$row[user_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}
	elseif(($_SESSION['luser']['user_role']) == 'view..delete'){
	echo "<td><a href=\"user_view.php?id=$row[user_id]\">View</a> | <a href=\"user_delete.php?id=$row[user_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}  elseif(($_SESSION['luser']['user_role']) == 'view..'){
	echo "<td><a href=\"user_view.php?id=$row[user_id]\">View</a></td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}elseif(($_SESSION['luser']['user_role']) == '.edit.'){
	echo "<td><a href=\"user_edit.php?id=$row[user_id]\">Edit</a> </td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

} elseif(($_SESSION['luser']['user_role']) == '..delete'){
	echo "<td><a href=\"user_delete.php?id=$row[user_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> </td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

} 
 


else{
	
	echo "<td><a href=\"user_view.php?id=$row[user_id]\">View</a> | <a href=\"user_edit.php?id=$row[user_id]\">Edit</a> | <a href=\"user_delete.php?id=$row[user_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
echo "<tbody>";
echo "<thead>";
echo "</tr>";

	
}
}
}





else  { 
echo "<td><a href=\"user_view.php?id=$row[user_id]\">View</a>";



			
					 }
					 }
					 
					 }
					 
					 
					 
					 
					 
					 
					 
					
					
					 
					 
			
echo "</table>";

?>

 <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> 

<!----<script>
function myFunction() {
	
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i]..style.display = "none";
      }
    }       
  }
}
</script>--->


</body>
</html>




<?php
include_once("footer.php");
?>
