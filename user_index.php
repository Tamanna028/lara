<?php
include_once("header.php");
//including the database connection file
include_once("config.php");
//$type = $_POST['type'];

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM db_project ORDER BY id DESC"); // using mysqli_query instead

		
		//$tmp_dir = $_FILES['image']['tmp_name'];
		//$imgSize = $_FILES['image']['size'];
			//$upload_dir = 'user_images/';*/ // upload directory


?>

 
 
 

	
 
</br>
</br>
</br>
</br>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
  
</head>

<body>
<div>
<td class="image">



  <input type="hidden" name="id" value="">

	
	</td>
<form method="post" enctype="multipart/form-data" class="form-horizontal">

<?php if (isset($_SESSION['success'])) : 
 ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<?php
		
		$sql = "SELECT * FROM all_user";
$result = $mysqli->query($sql);
while($row = mysqli_fetch_array($result))
{
			if (isset($_SESSION['luser']))  {
				if (($_SESSION['luser']['user_type']) == 'Admin') {
				


$id = $_SESSION['luser']['user_id'];
$type = $_SESSION['luser']['user_type'];

$resu = mysqli_query($mysqli, "SELECT * FROM all_user WHERE user_type=$type");


		
	
	 $imgFile = $_SESSION['luser']['user_image'];
	 
	

}
elseif (($_SESSION['luser']['user_type']) == 'Client'){
	
	$id = $_SESSION['luser']['user_id'];
$type = $_SESSION['luser']['user_type'];

$resu = mysqli_query($mysqli, "SELECT * FROM all_user WHERE user_type=$type");


		
	
	 $imgFile = $_SESSION['luser']['user_image'];
}
else {
	echo "Error";
}



			}
			
			}
			

				?>
				
			
			
			
				
				
				
				
				
				
				
				
			
				
			<div>
				<?php  if (isset($_SESSION['luser'])) : ?>
				<strong> <img src="user_images/<?php echo $imgFile; ?>" class="img-rounded" width="150px" height="150px" /></strong>
				</br>
				
				
					<strong><?php echo $_SESSION['luser']['user_name']; ?></strong>

					<small>
					
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['luser']['user_type']); ?>)</i> 
						</br>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['luser']['user_email']); ?>)</i> 
						
						
						
						<br>
						
					</small>

				<?php endif ?>
 <input type="hidden" name="type" value="Admin"> 
  <input type="hidden" name="type" value="Client">
  <input type="hidden"  name="id" value="<?php echo $id;?>">

 
<a href="add.php" class="btn btn-success" style="float:left;">Department</a>
</br>
</br>
<a href="des_add.php" class="btn btn-primary" style="float:left;">Designation</a>
</br>
</br>
<a href="employee.html" class="btn btn-warning"style="float:left;">Employee</a>
</br>
</br>
<a href="user.html" class="btn btn-info" style="float:left;">User </a>

</form>
</br>
</br>
</br>


<a href="logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span>Log Out </a>
    
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include_once("footer.php");
?>
<!---<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Id</td>
	</tr>
</table>
 
	//while($res = mysql_fetch_array($result)) { //mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	//while($res = mysqli_fetch_array($result)) { 		
	//	echo "<tr>";
		//echo "<td>".$res['name']."</td>";
		//echo "<td>".$res['age']."</td>";
		//echo "<td>".$res['email']."</td>";	
		//echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	
