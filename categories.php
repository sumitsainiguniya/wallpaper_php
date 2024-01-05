<?php
include 'header.php';
?>
<div class="container">
	<div class="row mt-2">
		<div class="col-sm-6 offset-sm-5">
			<h3>Categories...</h3>
		</div>
	</div>
</div>
<?php
$sql = "SELECT id,name FROM categories";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
	echo "<div class='container'>
	<div class='row'>";
	while($row = $result->fetch_assoc()) 
	{
		echo "<div class='col-sm-3'>
		<div class='mb-3 list-group'>
		<a class='list-group-item list-group-item-action' href='cat-page.php?id=".$row['id']."'>".$row['name']."</a>
		</div>
		</div>";
	}
	echo "</div>
	
	</div>";
} 
else 
{
	echo "0 results";
}
?>
<?php
include 'footer.php';
?>