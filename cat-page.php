<?php
include 'header.php';
?>
<?php
$id=$_GET['id'];

$name = "SELECT * FROM categories WHERE id=$id";
$name = $conn->query($name);
if ($name->num_rows > 0) 
{
	$namerow = $name->fetch_assoc();

	echo "<div class='container'>
	<div class='row'>
	<div class='col-sm-12 text-center'>
	<h1>".$namerow['name']."</h1>
	</div>
	</div>
	</div>";
	$sql = "SELECT url FROM wallpapers WHERE cat_id=$id";
	$result = $conn->query($sql);
	echo "<div class='container'>
	<div class='row mt-3'>
	<div class='col-sm-9 span-class'>
	<div class='row mt-3'>";
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$imagename = strstr($row['url'], '.', true);
			echo"
			<div class='col-sm-4'>
			<a href='#'><img src='uploads/".$row['url']."' class='img-thumbnail'></a>
			<span>".$imagename."</span>
			</div>";
		}
	}
	echo"
	</div>
	</div>	
	<div class='col-sm-3'>
	<div class='list-group'>

	<a href='categories.php' class='list-group-item list-group-item-action active'>Categories</a>";
	$cat = "SELECT * FROM categories";
	$cat = $conn->query($cat);
	while($row1 = $cat->fetch_assoc()) 
	{
		echo "<a href='cat-page.php?id=".$row1['id']."' class='list-group-item list-group-item-action'>".$row1['name']."</a>";
	}
	echo "
	</div>";
	echo "
	</div>
	</div>
	</div>
	</div>";
}	

else
{
	header('Location: http://localhost/wallpaper/404.php');
}
?>
<?php
include 'footer.php';
?>
