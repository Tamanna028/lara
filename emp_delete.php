<?php
include_once("header.php");
?>

<?php
//including the database connection file

include("config.php");

//getting id of the data from url
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM employee WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
 $userpic = $res['image'];
}
//print_r($userpic);exit();
unlink('user_images/'.$userpic); 

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM employee WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:emp_add.php");
?>

<?php
include_once("footer.php");
?>