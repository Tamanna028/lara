<?php
include_once("header.php");
?>

<?php
//including the database connection file

include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM  all_user WHERE user_id=$id");

//redirecting to the display page (index.php in our case)
header("Location:user_add.php");
?>

<?php
include_once("footer.php");
?>