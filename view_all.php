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

<a href="user.html" class="btn btn-default" ">Go Back</a>
<div class="navbar navbar-default navbar-static-top" role="navigation">
<div class="container">


<div class="row">
		<?php
	
	//$stmt = "SELECT id, name, email, phone_num,address, dept_id, desig_id, image FROM employee ORDER BY id DESC";
	$stmt = "SELECT *, e.id emp_id FROM employee e, department d ,designation des WHERE e.dept_id = d.id AND e.desig_id = des.id ORDER BY 'emp_id' DESC";
	//$stmt = $DB_con->prepare( 'SELECT *, e.id emp_id FROM employee e, department d ,designation des WHERE e.dept_id = d.id AND e.desig_id = des.id ORDER BY `emp_id` ASC');

	
	//$stmt->execute();
	$result = $mysqli->query($stmt);
	/*if($stmt->rowCount() > 0)
	{*/
		while($res= mysqli_fetch_array($result)){
			//extract($stmt);
			?>
			<div class="col-xs-3">
				<p class="page-header"><?php echo $res ['name']; ?></p>
				<p class="page-header"><?php echo $res ['email']; ?></p>
				<p class="page-header"><?php echo $res ['phone_num']; ?></p>
				<p class="page-header"><?php echo $res ['address']; ?></p>
				<p class="page-header"><?php echo $res ['dept_name'];?></p>
				<p class="page-header"><?php echo $res ['designation_name']; ?></p>
				<img src="user_images/<?php echo $res['image']; ?>" class="img-rounded" width="250px" height="250px" />
				
			</div>       
		
      <?php
		}
	
	/*else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}*/
	
?>
</div>	

</div>	
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>