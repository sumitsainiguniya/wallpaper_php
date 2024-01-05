<?php
include 'header.php';
if(isset($_SESSION['email'])){
?>
<div class="container">
	<div class="row mt-3">
		<div class="col-sm">
			<ul class="flex-column flex-sm-row nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="flex-sm-fill text-sm-center nav-item">
					<a class="nav-link" href="users.php">Users</a>
				</li>
				<li class="flex-sm-fill text-sm-center nav-item">
					<a class="nav-link" href="wallpaper-details.php">Wallpapers</a>
				</li>
				<li class="flex-sm-fill text-sm-center nav-item">
					<a class="nav-link active" id="pills-Categories-tab" data-toggle="pill" href="categories-detail.php" role="tab" aria-controls="Categories" aria-selected="false">Categories</a>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				
				<div>
					<div class="container">
						<a class="btn btn-primary mb-2" href="create-new-category.php">Create New Category</a>
						<?php
						$sql = "SELECT id,name,create_time,update_time FROM categories";
						$result = $conn->query($sql);
						echo "<table class='table table-hover'>
						<thead>
						<tr>
						<th scope='col'>#</th>
						<th scope='col'>Category Name</th>
						<th scope='col'>Create Time</th>
						<th scope='col'>Delete</th>
						</tr>
						</thead>";
						if ($result->num_rows > 0) 
						{
							while($row = $result->fetch_assoc()) 
							{
								echo "
								<tbody>
								<tr>
								<th scope='row'>".$row['id']."</th>
								<td>".$row['name']."</td>
								<td>".$row['create_time']."</td>
								<td><a href='delete.php?id=".$row['id']."'>Delete</a></td>
								</tr>
								</tbody>";

							}
							echo "</table>";
						} 
						
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
else
{
	header("Location: http://localhost/wallpaper/admin-login.php");
}
?>