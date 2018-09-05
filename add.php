<?php
include_once("config.php");
?>
<?php
// define variables and set to empty values
$nameErr = "";
$name = "";


       



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }  else {
    
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]/",$_POST["name"])) {
		
      $nameErr = "Only letters and white space allowed";	  
    }
	else{
		$sql = "SELECT * FROM department where dept_name='".$_POST['name']."'";
			$result = mysqli_query($mysqli,$sql);
			if ($result->num_rows > 0)
			{
			$nameErr = "Unique Name is required";
			}

		else{
		$name = ($_POST["name"]);
		//echo $name;
		}
  }
  
if(!empty($name)){
	
	//$sql = mysqli_query($mysqli, "INSERT INTO employee(name,email,phone_num,address,image,dept_id,desig_id) VALUES('$name','$email','$phone_num','$address','$userpic','$dept_id','$desig_id')");
$res = "INSERT INTO department (dept_name)VALUES ('".$name."')";
		if($mysqli->query($res)=== TRUE){
			echo "Data added sucessfully";
		}
		else{
			echo $mysqli->error;
		}
		
}
}
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
  
    <title>Add Data</title>
</head>
 
<body>
   
	<td> <a class="btn btn-danger" href="index.php" >Go Back</a></td>
	<br/>
	<br/>
    <!--<form action="add.php" method="post" name="form1">--->
	<form method="post" enctype="multipart/form-data" class="form-horizontal">
		<center>
        <table width="25%" border="0">
           <!--- <tr> 
                <td>ID</td>
                <td><input type="text" name="name"></td>
            </tr>-->
		
		<?php
		if (isset($_SESSION['luser']))  {



if (($_SESSION['luser']['user_type']) == 'Admin') {
		
		?>
		
		
            <tr>
    	<td><label class="control-label">Name </label></td>
     <td><input class="form-control" type="text" name="name" placeholder="Enter Name" value="" /><span class="error">* <?php echo $nameErr;?></span></td>
    </tr>
    <tr>
            <!--<tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>--->
            <tr> 

                <td></td>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
				
        </table>
		</center>
    </form>
</body>
</html>




<?php
	  
	  }
	  
	  elseif($_SESSION['luser']['user_email'] != 'tamannafarabi@yahoo.com'){ 
		  ?>
		 
		  <div class="page-header">
    	
    	<h1 class="h2"><a class="btn btn-default" href="employee.html">&nbsp; Back</a></h1>
    	
		
    </div>
    
		 <?php  
	  }
	  }
	  
	  
	  else { 
		  ?>
		 
		  <div class="page-header">
    	
    	<h1 class="h2"><a class="btn btn-default" href="employee.html">&nbsp; Back</a></h1>
    	
		
    </div>
    
		 <?php  
	  }
	  
	  

?>


<?Php




$sql = "SELECT * FROM department";
$result = $mysqli->query($sql);
echo "<table border='1'>
<tr>
<th>ID</th>
<th>NAME</th>
<th>Actions</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<thead>";
echo "<tbody id=\"myTable\">";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['dept_name'] . "</td>";


if (isset($_SESSION['luser']))  {
if (($_SESSION['luser']['user_type']) == 'Admin') {
 if($_SESSION['luser']['user_email'] == 'tamannafarabi@yahoo.com'){	
 
 
echo "<td><a href=\"view.php?id=$row[id]\">View</a> | <a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";
}


 elseif($_SESSION['luser']['user_email'] != 'tamannafarabi@yahoo.com') {
	
	
	

if (($_SESSION['luser']['user_role'])=='view.edit.') {
	
echo "<td><a href=\"view.php?id=$row[id]\">View</a> | <a href=\"edit.php?id=$row[id]\">Edit</a> </td>";
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}

elseif(($_SESSION['luser']['user_role']) == '.edit.delete'){
	
	echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}
	elseif(($_SESSION['luser']['user_role']) == 'view..delete'){
	echo "<td><a href=\"view.php?id=$row[id]\">View</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}  elseif(($_SESSION['luser']['user_role']) == 'view..'){
	echo "<td><a href=\"view.php?id=$row[id]\">View</a></td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

}elseif(($_SESSION['luser']['user_role']) == '.edit.'){
	echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> </td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

} elseif(($_SESSION['luser']['user_role']) == '..delete'){
	echo "<td><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> </td>"; 
echo "<tbody>";
echo "<thead>";
echo "</tr>";

} 
 


else{
	
	echo "<td><a href=\"view.php?id=$row[id]\">View</a> | <a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
echo "<tbody>";
echo "<thead>";
echo "</tr>";

	
}
}


}


else  { 
echo "<td><a href=\"view.php?id=$row[id]\">View</a>";
}
}
}



					 
					 			
echo "</table>";

?>



<?php
include_once("footer.php");
?>










