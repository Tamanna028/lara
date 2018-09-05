<?php
include_once("config.php");

    session_start();
	
	if($_SESSION['luser']== false){
		header('Location:login.php');
	}
?>

<html>
<head>
<style>
.header {
    //width: 1500px;
	//height: 200px;
	//text-align: center;
	//background-color: pink;
	//margin-top: -50px;
    //color: solid green;
    //padding: 25px;
    //margin: 25px;
}
footer {
    padding: 1em;
    color: white;
    background-color: black;
   // clear: left;
    text-align: center;
	margin: 200px;
}
</style>
</head>

<body>
<center>
	 <div class="header">
  <h1> Employee Management System (EMS) </h1>
  
</div> 
<center>
