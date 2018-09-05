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


//$id = $_REQUEST['id'];
//selecting data associated with this particular id
$re = mysqli_query($mysqli, "SELECT * FROM salary, employee where salary.empl_id=employee.id");

while($resl = mysqli_fetch_array($re))
{	

	 $grade = $resl['grade'];
	 $transport = $resl['transport'];
	 $food = $resl['food'];
	 $basic = $resl['basic'];
	 $mobile = $resl['mobile'];
	 $total = $resl['total'];
	
	 
	//$age = $res['age'];
	//$email = $res['email'];
}

		?>
		
		<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<script>
$('#submitBtn').click(function() {
     /* when the button in the form, display the entered values in the modal */
     $('#lname').text($('#lastname').val());
     $('#fname').text($('#firstname').val());
});

$('#submit').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
    alert('submitting');
    $('#formfield').submit();
});
</script>
  
  
  
  
  </head>

<body>

<a href="salary.php" class="btn btn-default" ">Go Back</a>
<div class="navbar navbar-default navbar-static-top" role="navigation">
<div class="container">


<div class="row">
		<?php
	
	//$stmt = "SELECT id, name, email, phone_num,address, dept_id, desig_id, image FROM employee ORDER BY id DESC";
	$stmt = "SELECT  *, e.id emp_id FROM employee e, department d ,designation des,salary sal WHERE e.dept_id = d.id AND e.desig_id = des.id AND e.id= sal.empl_id ORDER BY 'emp_id' DESC ";
		
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
			
			<p class="page-header"><?php echo $res ['name']; ?></p>
				<p class="page-header"><?php echo $res ['email']; ?></p>
				<p class="page-header"><?php echo $res ['phone_num']; ?></p>
				<p class="page-header"><?php echo $res ['address']; ?></p>
				<p class="page-header"><?php echo $res ['dept_name'];?></p>
				<p class="page-header"><?php echo $res ['designation_name']; ?></p>
				<p class="page-header"><?php echo $res ['total']; ?></p>
				
				
	<img src="user_images/<?php echo $res['image']; ?>" class="img-rounded" width="250px" height="250px" />

	
 	<a href="#myModal?id=<?php echo $res['emp_id']; ?>" id="openBtn"  class="btn btn-info"" data-toggle="modal" data-target="#myModal" >Salary Details</a>"


<a class="btn btn-danger" href="?delete_id=<?php echo $res['emp_id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
	<!---<p class="page-header">-->
	</div>       
				
	<?php	
		}	
		?>
	

	
	


	


<body> 


<div class="container">


	
    


<div  id="add-post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Salary Management System</h4>
        </div>
        <div class="modal-body">
           <tr>
    
   
  <form>
    <div class="form-group">
      <label for="grade" style="float: left;">Grade:</label>
      <input type="text" class="form-control" name="grade" id="usr" value="<?php echo $grade;?>">
    </div>
    <div class="form-group">
      <label for="basic_salary" style="float: left;">Basic Salary:</label>
      <input type="text" class="form-control" name="basic" id="pwd" value="<?php echo $basic;?>">
	  </div>
	   <div class="form-group">
      <label for="transport_cost" style="float: left;" >Transpotation Cost:</label>
      <input type="text"  class="form-control" name="transport" id="pwd" value="<?php echo $transport;?>">
	  </div>
    
	 <div class="form-group">
      <label for="food_cost" style="float: left;" >Food Bill:</label>
      <input type="text"  class="form-control" name="food_cost" id="pwd" value="<?php echo $food;?>">
	  </div>
    
	 <div class="form-group">
      <label for="mobile_cost" style="float: left;" >Mobile Bill:</label>
      <input type="text" class="form-control" name="mobile_cost" value="<?php echo $mobile;?>" >
	  </div>
	  
	  <div class="form-group">
      <label for="mobile_cost" style="float: left;" >Total Salary:</label>
      <input type="text" class="form-control" name="mobile_cost" value="<?php echo $total;?>" >
	  </div>
    <div class="modal-footer">
	 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary submitBtn" id="submitBtn" name="submit" style="float: right;" data-dismiss="modal">Submit</button>
		       </div> 
		       </div> 
        
		 
   
   
    
        </div> 
    
	
    </div>
    </div>
    </div>
	 
 </form>
 </br>

 





<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

















