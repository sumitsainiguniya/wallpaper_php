<?php
include 'db.php';
if(isset($_GET) & !empty($_GET))
{
	$id=$_GET['id'];
	$sql="SELECT * FROM wallpapers WHERE id=$id";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if($result->num_rows > 0)
	{
		$delsql="DELETE FROM wallpapers WHERE id=$id";
		if(unlink('uploads/'.$row['url']))
		{
			mysqli_query($conn,$delsql);
			$_SESSION['delete']=1;
			header('Location: http://localhost/wallpaper/wallpaper-details.php');
			
		}
		else
		{	
			$_SESSION['fail']=0;
			header('Location: http://localhost/wallpaper/wallpaper-details.php');
		}
	}
}
?>