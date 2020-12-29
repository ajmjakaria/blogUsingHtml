 <?php

// Create connection
$link = mysqli_connect("localhost", "root", "", "scitech");

if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);

// Check connection

if (!empty($username) ||
!empty($password)){
$sql = "Select * from tbl_register where username = '$username' && password = '$password'";
$result = mysqli_query($link, $sql);

	$row = mysqli_fetch_array($result);
	if($row['username'] == $username && $row['password'] == $password){
		include "home.html";
}

else 
{	
	echo "Wrong username or password";
}
}
else 
{	
	echo "Please fill up the form";
}

mysqli_close($link);

?> 