<?php
include_once("header.php");
include_once("config.php");
?>



<?php




$nameErr = "";
$name = "";

if(isset($_POST['submit']))
{ 		//print_r($_POST);
	$id = $_GET['id'];
	
	$name =  $_POST['name'];





}
//getting id from url
 $id = $_REQUEST['id'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM designation WHERE id=$id");

while($res = mysqli_fetch_array($result))
{		//$id = $_GET['id'];
	 $name = $res['designation_name'];
	 
	//$age = $res['age'];
	//$email = $res['email'];
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
   
	<td> <a class="btn btn-danger" href="add.php" >Go Back</a></td>
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
		
		
		
           <tr>
    	<td><label class="control-label">Name </label></td>
     <td><input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php echo $name;?>" /></td>
    </tr>
    <tr>
            <!--<tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>--->
            
				
        </table>
		</center>
    </form>
</body>
</html>




<?php

include_once("footer.php");
?>










