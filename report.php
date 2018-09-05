<?php
include_once("header.php");
include_once("config.php");
$nameErr= $inErr = $outErr =$id= "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Date time picker in Input Field using Bootstrap by Lisenme</title>
<!-- Minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Minified Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="js/bootstrap-datetimepicker.min.js"></script>

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


<body>
<div class="page-header">
    	<!----<h1 class="h2">add new user. <a class="btn btn-default" href="emp_view.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>--->
    	<!---<h1 class="h2"><a class="btn btn-default" href="emp_add.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; add new user. </a> <a class="btn btn-default" href="view_all.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>-->
    	<h1 class="h2"><a class="btn btn-danger" href="index.php">&nbsp; Back</a></h1>
    	
		
    </div>
    
			
<!--<div>
	<form method="POST">
		<label>Name: </label><input type="text" name="name">
		<label>From: </label><input type="date" name="from">
		<label>To: </label><input type="date" name="to">
		<input type="submit" value="Get Data" name="submit">
	</form>--->
	
	
	<form method="post" enctype="multipart/form-data" class="form-horizontal" action="report.php" >


<table class="table table-bordered table-responsive">
	<input type="hidden"  name="id" value="<?php echo $res['id'];?>">
	
   

	
   
   
   
   
   

   

<tr>


    	<td><label class="control-label">Employee Name </label></span><span class="error">* <?php echo $nameErr;?></span>
	   
		
		
		
		 
       <select name="select" class="form-control selectpicker" value="">
     
      <option value="all" select>Show </option>
      <!--<option value="" select>Select </option>-->
	  <?php
  	$query = mysqli_query($mysqli,"select id,name from employee");
  	while($res = mysqli_fetch_array($query)){
	?>

	 	<option value="<?php echo $res['id'];?>"><?php echo $res['name'];?>
	   
	 	
	 <?php 
	} 
	 ?>
	 
	
	 
	 
	</tr> 	
	 
<tr>
<td><label class="control-label">From </label>
<input size="16" type="text" class="form-control" name="form" id="datetime" readonly> <span class="error">* <?php echo $inErr;?></span></td>
 
<script type="text/javascript">
$("#datetime").datetimepicker({
	format: 'yyyy-mm-dd hh:ii',
	autoclose: true
});
</script>
</tr>
 <tr>
<td><label class="control-label">To</label>
<input size="16" type="text" class="form-control" name="to"  id="datetime1" readonly> <span class="error">* <?php echo $outErr;?></span>
 </td> 
<script type="text/javascript">
$("#datetime1").datetimepicker({
	format: 'yyyy-mm-dd hh:ii',
	autoclose: true
});
</script>
</tr>
 
 
 
 
 
</div>
</body>
</html>
	
	
	
	
	
	
	
	
	
<tr>
        <td colspan="2"><button type="submit" name="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>	
	
</div>

<div>
	<table border="1">
		<thead>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Address</th>
<th>Department Name</th>
<th>Designation Name</th>
<th>Sign In</th>
<th>Sign Out</th>
<th>Image</th>
<th>Action</th>



		</thead>
		<tbody>
		<?php
			if (isset($_POST['submit']))
			{
				//include('config.php');
				//$from=date('Y/m/d H:i:s',strtotime($_POST['from']));
				//$to=date('Y/m/d H:i:s',strtotime($_POST['to']));
				
				  //$name =  $_POST['name'];
				  //$id =  $_POST['name'];
				  $in =  $_POST['form'];
	  $a=strtotime("$in");
	  
	  $out =  $_POST['to'];
	   $b=strtotime("$out");
				//MySQLi Procedural
			//	$sql="select * from `attendance` where sign_in between '$from' and '$to' ";
			
		$imgFile = $_FILES['image']['name'];
		$tmp_dir = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
		$upload_dir = 'user_images/'; 	
			echo $_POST['select'];
			echo $_POST['id'];
			
		switch($_POST['select']) {
			
		
			case 'all':
			
			
			
			$sql= "SELECT *, e.id emp_id FROM employee e, department d ,designation des ,attendance attn WHERE e.dept_id = d.id AND e.desig_id = des.id AND attn.employee_id=e.id AND  sign_in between '$a' and '$b' ORDER BY 'emp_id' DESC ";
				
				$oquery=$mysqli->query( $sql);
			
				while($orow=mysqli_fetch_array($oquery)){
					
						
						echo "<tr>";
echo "<thead>";
echo "<tbody id=\"myTable\">";
echo "<td>" . $orow['emp_id'] . "</td>";
echo "<td>" . $orow['name'] . "</td>";
echo "<td>" . $orow['email'] . "</td>";
echo "<td>" . $orow['phone_num'] . "</td>";
echo "<td>" . $orow['address'] . "</td>";
echo "<td>" . $orow['dept_name'] . "</td>";
echo "<td>" . $orow['designation_name'] . "</td>";
echo "<td>" . date("Y/m/d H:i:s", $orow ['sign_in']). "</td>";
echo "<td>" . date("Y/m/d H:i:s", $orow ['sign_out']) . "</td>";
echo "<td><img style='height: 69px;' src='user_images/" . $orow['image'] . "'</td>";
echo "<td><a href=\"report_details.php?id=$orow[emp_id]\">Details</a> </td>";
echo "<tbody>";
echo "<thead>";
echo "</tr>";
}
						
		
break;

// Run this
		default:



	 
$sql= "SELECT *, e.id emp_id FROM employee e, department d ,designation des ,attendance attn WHERE e.dept_id = d.id AND e.desig_id = des.id AND attn.employee_id=e.id AND e.id='".$_POST['select']."' AND  sign_in between '$a' and '$b' ORDER BY 'emp_id' DESC ";
				
				$oquery=$mysqli->query( $sql);
			
				while($orow=mysqli_fetch_array($oquery)){
					
						
						echo "<tr>";
echo "<thead>";
echo "<tbody id=\"myTable\">";
echo "<td>" . $orow['emp_id'] . "</td>";
echo "<td>" . $orow['name'] . "</td>";
echo "<td>" . $orow['email'] . "</td>";
echo "<td>" . $orow['phone_num'] . "</td>";
echo "<td>" . $orow['address'] . "</td>";
echo "<td>" . $orow['dept_name'] . "</td>";
echo "<td>" . $orow['designation_name'] . "</td>";
echo "<td>" . date("Y/m/d H:i:s", $orow ['sign_in']). "</td>";
echo "<td>" . date("Y/m/d H:i:s", $orow ['sign_out']) . "</td>";
echo "<td><img style='height: 69px;' src='user_images/" . $orow['image'] . "'</td>";
echo "<td><a href=\"report_details.php?id=$orow[emp_id]\">Details</a> </td>";
echo "<tbody>";
echo "<thead>";
echo "</tr>";

				//}
 
				//MySQLi Object-oriented
				
			
			}
			}
			}
			
			
			
			
		?>
		
		
		
		

		</tbody>
	</table>
</div>
</body>
</html>














































