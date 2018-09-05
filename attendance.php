<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
include_once("header.php");
include_once("config.php");
$emp_id=$nameErr=$inErr=$outErr= "";
?>


<?php
if(isset($_POST["submit"])) { 	

	 // $name =  $_POST['name'];
	   $in =  $_POST['in'];
	  $a=strtotime("$in");
	  
	  $out =  $_POST['out'];
	   $b=strtotime("$out");
	  $emp_id =  $_POST['name'];
	
		if(empty($emp_id)||empty($in)||empty($out)){
	  
	  
	  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }
	  
	  if (empty($_POST["in"])) {
    $inErr = "Filed is required";
  }
  
  
  
  
  if (empty($_POST["out"])) {
    $outErr = "Field is required";
  }
  }
  else{
	  
	/*   // $date = date("d-m-Y",  $a);
	    $date = date("yyyy-mm-dd hh:ii",  $a);

     $sql = "SELECT * from attendance where employee_id ='".$_POST['name']."'";
     $result=$mysqli->query($sql);
     while ($row= mysqli_fetch_array($result)) {
       $dbdate=$row['sign_in'];
     }
   
     $date1 = date("d-m-Y",  $dbdate);
     if ($date==$date1) {
       $inErr="Duplicate entry occur";
       $outErr="Duplicate signout occur";
     }*/
	  
	  
	  
	  
	 $sql = "INSERT INTO attendance ( sign_in,sign_out,employee_id)
        VALUES ('".$a."','".$b."','".$emp_id."')";
		
			if($mysqli->query($sql)=== TRUE){
			echo "insert";
		}
		else{
			echo $mysqli->error;
		}
		

		}
		}
		
		

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


<div class="container">


	<div class="page-header">
    	<!----<h1 class="h2">add new user. <a class="btn btn-default" href="emp_view.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>--->
    	<!---<h1 class="h2"><a class="btn btn-default" href="emp_add.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; add new user. </a> <a class="btn btn-default" href="view_all.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>-->
    	<h1 class="h2"><a class="btn btn-default" href="attendance.html">&nbsp; Back</a></h1>
    	
		
    </div>

</table>
    
</form>







<form method="post" enctype="multipart/form-data" class="form-horizontal" action="attendance.php" >


<table class="table table-bordered table-responsive">
	<input type="hidden"  name="id" value="<?php echo $id;?>">
   

	
   
   
   
   
   

   

<tr>


    	<td><label class="control-label">Employee Name </label></span><span class="error">* <?php echo $nameErr;?></span>
	   
		
		
		
		 
       <select name="name" class="form-control selectpicker" value="">
      <option value="" select>Select </option>
      <!--<option value="Male" select>Male</option>
      <option value="Female">Female</option>
      <option value="Female">Other</option>--->
     

	<?php
  	$query = mysqli_query($mysqli,"select name,id from employee");
  	while($res = mysqli_fetch_array($query)){
	?>

	 	<option value="<?php echo $res['id'];?>"><?php echo $res['name'];?>
	   
	 	
	 <?php 
	} 
	 ?>
	 
	
	 
	 
	</tr> 	
	


    
<tr>
<td><label class="control-label">Sign In </label>
<input size="16" type="text" class="form-control" name="in" id="datetime" readonly> <span class="error">* <?php echo $inErr;?></span></td>
 
<script type="text/javascript">
$("#datetime").datetimepicker({
	format: 'yyyy-mm-dd hh:ii',
	autoclose: true
});
</script>
</tr>
 <tr>
<td><label class="control-label">Sign Out </label>
<input size="16" type="text" class="form-control" name="out"  id="datetime1" readonly> <span class="error">* <?php echo $outErr;?></span>
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
	
	
	
	
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	
	</table>
	</body>
</html>