



<?php
include_once("header.php");
include_once("config.php");
?>


<?php
  if(isset($_POST['submit']))
 {

   $grade=$_POST['grade'];
   $basic_salary=$_POST['basic_salary'];
   $trasport_cost=$_POST['transport_cost'];
   $food_cost=$_POST['food_cost'];
   $mobile_cost=$_POST['mobile_cost'];
 
   
   
   if (empty($_POST['grade'])||empty($_POST['basic_salary'])||empty($_POST['transport_cost'])||empty($_POST['food_cost'])||empty($_POST['mobile_cost']))
   {
     if (empty($_POST['grade'])) {
       $errin="SignIn is required";
     }
     if (empty($_POST['basic_salary'])) {
       $errout="SignOut is required";
     }
     if (empty($_POST['transport_cost'])) {
       $errid="Employee name is required";
     }
	 if (empty($_POST['food_cost'])) {
       $errid="Employee name is required";
     }
	 if (empty($_POST['mobile_cost'])) {
       $errid="Employee name is required";
     }
   }
 
     else{
      echo  $sql="INSERT into salary (grade,basic,transport,food,mobile)   VALUES ('".$_POST["grade"]."','".$_POST["basic_salary"]."','".$_POST["transport_cost"]."','".$_POST["food_cost"]."','".$_POST["mobile_cost"]."')";
       
      	if($mysqli->query($res)=== TRUE){
			echo "Data added sucessfully";
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
<center>

<body> 


<div class="container">


	<div class="page-header">
    	
    	<h1 class="h2"><a class="btn btn-default" style="float: center;" href="index.php">&nbsp; Back</a></h1>
    	
		
    </div>


    


<div  id="add-post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<button type="button" class="btn btn-info btn-lg" style="float: center;" data-toggle="modal" data-target="#myModal" >Add New Salary Grade</button> 
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
      <input type="text" class="form-control" name="grade" id="usr">
    </div>
    <div class="form-group">
      <label for="basic_salary" style="float: left;">Basic Salary:</label>
      <input type="text" class="form-control" name="basic_salary" id="pwd">
	  </div>
	   <div class="form-group">
      <label for="transport_cost" style="float: left;" >Transpotation Cost:</label>
      <input type="text"  class="form-control" name="transport_cost" id="pwd">
	  </div>
    
	 <div class="form-group">
      <label for="food_cost" style="float: left;" >Food Cost:</label>
      <input type="text"  class="form-control" name="food_cost" id="pwd">
	  </div>
    
	 <div class="form-group">
      <label for="mobile_cost" style="float: left;" >Mobile Cost:</label>
      <input type="text" class="form-control" name="mobile_cost" >
	  </div>
     <div class="modal-footer">
	 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary submitBtn" name="submit" style="float: right;" data-dismiss="modal">Submit</button>
		       </div> 
		       </div> 
        
		 
   
   
    
        </div> 
    
	
    </div>
    </div>
    </div>
	 
 </form>
 </center>
 </br>

 <center>
    
    <a type="button" href="salary_view.php" class="btn btn-info btn-lg">View all</a> 


</div>

</div>

 </center>  

<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>