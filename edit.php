
<?php
include_once("header.php");
include_once("config.php");
$nameErr = "";
$name = "";


/*echo"<pre>";
print_r($_REQUEST);
echo"</pre>";*/

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//print_r($_POST);
	

$name = $_POST['name'];
	//$id = $_POST['id'];
	//print_r($name);
	
	
  if (empty($_POST['name'])) {
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
  }
 $id = $_REQUEST['id'];
 $sql="UPDATE department SET dept_name='$name' WHERE id=$id";
 
$resu = mysqli_query($mysqli, $sql);

/*if ($mysqli ->query($resu) === TRUE) {
    echo  "New record created successfully";
} else {
    echo "Error: " . $resu . "<br>" . $mysqli->error;
}*/
header('Location: add.php');

   }
  


if(isset($_REQUEST['id'])){
$id = $_REQUEST['id'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM department WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['dept_name'];
	//$age = $res['age'];
	//$email = $res['email'];
	//$name = ($_POST["dept_name"]);

}

}

?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<h3>Edit Department</h3>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
		<tr> 
		        <input type="hidden"  name="id" value="<?php echo $id;?>">
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>

				<td><span class="error">* <?php echo $nameErr;?></span></td>
			</tr>
			
			<!----<tr> 
				<td>Age</td>
				<td><input type="text" name="age" value="></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<"></td>
			</tr>--->
			<tr>
				
				<td><input type="submit" name="submit" value="Update"></td>
			</tr>
			 </tr>
			<tr> 
                <td><a href="add.php">Go Back</a></td>
                
            </tr>
		</table>
	</form>
</body>
</html>
<?php
include_once("footer.php");
?>
