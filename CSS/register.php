<?php

$link = mysqli_connect("localhost", "root", "", "scitech");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$fullname = mysqli_real_escape_string($link, $_REQUEST['fullname']);
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);

if (!empty($fullname) || !empty($username) || !empty($email) ||
!empty($password) || !empty($confirm_passwords)){
 

$sql = "INSERT INTO tbl_register (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', '$password')";
if(mysqli_query($link, $sql)){
	
    //echo "Records added successfully.";
	include "signin.html";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
else {
	echo "All the fields must be filled!!!";
}
// Close connection
mysqli_close($link);
?>