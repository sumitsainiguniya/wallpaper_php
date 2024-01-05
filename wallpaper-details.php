<?php
include 'header.php';
if(isset($_SESSION['email'])){
	?>
	<div class="container">
		<div class="row mt-3">
			<div class="col-sm">
				<?php 
				if(isset($_SESSION['delete']))
				{
					echo "<div class='alert alert-success' role='alert'>File Succesfully Deleted</div>";
				}
				if(isset($_SESSION['fail']))
				{
					echo "<div class='alert alert-danger' role='alert'>Faild to Delete File</div>";
					
				}
				?>
				<ul class="flex-column flex-sm-row nav nav-pills mb-3" id="pills-tab" role="tablist">
					<li class="flex-sm-fill text-sm-center nav-item">
						<a class="nav-link" href="users.php">Users</a>
					</li>
					<li class="flex-sm-fill text-sm-center nav-item">
						<a class="nav-link active" id="pills-wallpapers-tab" data-toggle="pill" href="wallpapers-detail.php" role="tab" aria-controls="wallpapers" aria-selected="false">Wallpapers</a>
					</li>
					<li class="flex-sm-fill text-sm-center nav-item">
						<a class="nav-link" href="categories-detail.php">Categories</a>
					</li>
				</ul>

				<div >
					<div class="container">
						<a class="btn btn-primary mb-2" href="upload.php">Upload New Wallpaper</a>
						
						<?php
						$sql = "SELECT id, cat_id, user_id,url,create_time,update_time FROM wallpapers";
						$result = $conn->query($sql);
						echo "<table class='table table-hover'>
						<thead>
						<tr>
						<th scope='col'>#</th>
						<th scope='col'>Categories ID</th>
						<th scope='col'>User ID</th>
						<th scope='col'>URL</th>
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
								<td>".$row['cat_id']."</td>
								<td>".$row['user_id']."</td>
								<td>".$row['url']."</td>
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
	<?php
}
else
{
	header("Location: http://localhost/wallpaper/user-login.php");
}
?>