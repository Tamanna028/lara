<!DOCTYPE HTML>  
<?php include 'mysqlconnection.php';?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $passErr =  "";
$name = $email = $gender = $comment = $website =$password= "";

if(isset($_POST['submit'])) {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }  else {
    
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]/",$_POST["name"])) {
		
      $nameErr = "Only letters and white space allowed";	  
    }
	else{
		$name = test_input($_POST["name"]);
	}
  }
  if(empty($_POST['pass'])){
	  $passErr = "please type password";
  }
  else{
	  if(strlen($_POST['pass'])<=8){
		  $passErr = "password must be 9 char";
		  
	  }
	  else{
		  if(!preg_match("@[a-z]@",$_POST["pass"])||!preg_match("@[A-Z]@",$_POST["pass"])||!preg_match("@[0-9]@",$_POST["pass"])){
		   $passErr = "password number and char";
		  }
		  else{
		 
		  $password = sha1(md5($_POST['pass']));
		}
	  }
	  
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } 
  else {
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
	else{
    $email = test_input($_POST["email"]);
	}
  }


  if (empty($_POST["website"])) {
    $website = "";
  } else {
	  if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST["website"])) {
      $websiteErr = "Invalid URL"; 
    }
	else{
    $website = test_input($_POST["website"]);
	}
  }


  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(!empty($name)&&!empty($email)&&!empty($password)){
$sql = "INSERT INTO users ( uname, email, website, password, comment, gender)
        VALUES ('".$name."','".$email."','".$website."','".$password."','".$comment."','".$gender."')";
		if($conn->query($sql)=== TRUE){
			echo "insert";
		}
		else{
			echo $conn->error;
		}
		
}
$conn->close();
?>
<body> 
<form method="post" enctype="multipart/form-data" class="form-horizontal">

Name: <input type="text" name="name">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
Password: <input type="text" name="pass">
<span class="error">* <?php echo $passErr; ?></span>
<br><br>
E-mail:
<input type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Website:
<input type="text" name="website">
<span class="error"><?php echo $websiteErr;?></span>
<br><br>
Comment: <textarea name="comment" rows="5" cols="40"></textarea>
<br><br>
Gender:
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<span class="error">* <?php echo $genderErr;?></span>
<br><br>
<input type="file" name="file">
<input type="submit" name="submit" value="Submit"> 

</form>
<?php
echo "<h2>Your Input:</h2>";
if(!empty($name)&&!empty($email)&&!empty($website)){
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
}
else{
	echo "no data found";
	
}
?>
</body>
</html>