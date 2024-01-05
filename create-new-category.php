<?php
include 'header.php';
?>
<div class="container">
	<div class="row mt-3">
		<div class="col-sm-6 offset-sm-3">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div class="form-group">
					<?php
					if (isset($_SESSION["name"]))
					{
						echo "<div class='alert alert-success' role='alert'>New Category Created</div>";
					}
					?>
					<label for="Category">Category Name</label>
					<input type="text" class="form-control" id="category" name="name" placeholder="Enter New Category Name">
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
<?php
if(isset($_POST['submit']))
{
	$name=$_POST["name"];
	$sql= "INSERT INTO categories(name) VALUES('$name')";
	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['name']=1;
		header('Location: http://localhost/wallpaper/create-new-category.php');
	}
}


?>