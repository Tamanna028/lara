<?php
include_once("header.php");
include_once("config.php");
?>

<?php
if(isset($_POST['submit']))
{ 
//$id = $_GET['id'];
	
	$name = '';
	//$id = $_POST['id'];
	$email =  '';
	$phone_num =  '';
	$address = '';
	//$photo = mysqli_real_escape_string($mysqli, $_POST['photo']);
	$dept_id =  '';
	$desig_id =  '';
	
	//print_r($imgFile);
	
	
	$imgFile = '';
		//$tmp_dir = $_FILES['image']['tmp_name'];
		//$imgSize = $_FILES['image']['size'];
		//$upload_dir = 'user_images/'; // upload directory
}
		?>
		
		
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Upload, Insert, Update, Delete an Image using PHP MySQL - Coding Cage</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
</head>

<body>

<a href="index.php" class="btn btn-default" ">Go Back</a>
<div class="navbar navbar-default navbar-static-top" role="navigation">
<div class="container">


<div class="row">
		<?php
	
	//$stmt = "SELECT id, name, email, phone_num,address, dept_id, desig_id, image FROM employee ORDER BY id DESC";
	$stmt = "SELECT  * FROM salary ";
		
	//$stmt ="select basic,transport,  food,  mobile, ( basic +  transport + food + mobile ) as total 
//from salary";	

	//$stmt = $DB_con->prepare( 'SELECT *, e.id emp_id FROM employee e, department d ,designation des WHERE e.dept_id = d.id AND e.desig_id = des.id ORDER BY `emp_id` ASC');

	
	//$stmt->execute();
	$result = $mysqli->query($stmt);
	/*if($stmt->rowCount() > 0)
	{*/
		while($res= mysqli_fetch_array($result)){
			//extract($stmt);
			?>
			<div class="col-xs-3">
			
			<p class="page-header"><?php echo $res ['grade']; ?></p>
				<p class="page-header"><?php echo $res ['basic']; ?></p>
				<p class="page-header"><?php echo $res ['transport']; ?></p>
				<p class="page-header"><?php echo $res ['food']; ?></p>
				<p class="page-header"><?php echo $res ['mobile'];?></p>
				
	
	
	<p class="page-header">
	
				
				<a class="btn btn-info" href="salary_details.php?edit_id=<?php echo $res['emp_id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
				<a class="btn btn-danger" href="?delete_id=<?php echo $row['emp_id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
				
				</p>	
		
			
				<?php
				
				




	
 
		
		}
?>

				

				
				

		
	
</div>	

</div>	
<input type="hidden" name="id">
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>