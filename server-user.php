<?php
include 'db.php';	
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
	$row = $result->fetch_assoc();
	$_SESSION["email"] = $row['email'];
	header("Location: http://localhost/wallpaper/index.php");

}
else
{
	$_SESSION['invalid']=0;
	header("Location: http://localhost/wallpaper/user-login.php");
}
?>