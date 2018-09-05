<?php
include_once("config.php");
?>
<?php
// define variables and set to empty values
$nameErr = "";
$name = "";
$errorMSG = (object) array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	
 if (empty($_POST["name"])) {
    $errorMSG->pre_name = "Name is required";
	$errorMSG->success = false;
	$errorMSG->fieldtype = "name";
}
else if (!ctype_alpha(str_replace([' ','-'], '', $_POST["name"]))) {
		
   $errorMSG->pre_name = "Only letters and white space allowed";
   $errorMSG->success = false;
   $errorMSG->fieldtype = "name";
      
    }
	else {
    $name = $_POST["name"];
	$errorMSG->msgname = "";
	$errorMSG->success = true;
	$errorMSG->fieldtype = "name";
}
   
 




//echo json_encode($errorMSG);
//$mysqli->close();


  

	
	//$sql = mysqli_query($mysqli, "INSERT INTO employee(name,email,phone_num,address,image,dept_id,desig_id) VALUES('$name','$email','$phone_num','$address','$userpic','$dept_id','$desig_id')");
$res = "INSERT INTO department (dept_name)VALUES ('".$name."')";
		
		
}











}




?>


</head>
 
<body>
<div class="container">
    <h1 class="h2" style=><a class="btn btn-default" href=""> <span class="glyphicon glyphicon-plus"></span> &nbsp; Add Department </a> </h1>
	<td> <a class="btn btn-danger" href="index.php" >Go Back</a></td>
	<br/>
	<br/>
    <form action="add.php" method="post" name="form1">
	

		<center>
        <div class="testing"></div>
    <div class="alert alert-danger display-error" style="display: none">
    </div>
  
           <!--- <tr> 
                <td>ID</td>
                <td><input type="text" name="name"></td>
            </tr>-->
		
           <div class="form-group">
      <div class="controls">
        <input type="text" id="name" name="name" onkeyup="ajaxnew('name')" class="form-control" placeholder="Name">
      <div class="alert alert-danger name-display-error" style="display: none">
	  </div>
    </div>
            <!--<tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>--->
            <!---<tr> --->
</br>

                
                <input type="submit" id="submit" value="submit" class="btn btn-success"><i class="fa fa-check"></i> </button>
  </form>
    </div>     
        
		</center>
    </form>
</body>


