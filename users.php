<?php
include 'header.php';
if(isset($_SESSION['email'])){
	?>
	<div class="container">
		<div class="row mt-3">
			<div class="col-sm">
				<ul class="flex-column flex-sm-row nav nav-pills mb-3" id="pills-tab" role="tablist">
					<li class="flex-sm-fill text-sm-center nav-item">
						<a class="nav-link active" id="pills-user-tab" data-toggle="pill" href="admin.php" role="tab" aria-controls="users" aria-selected="true">Users</a>
					</li>
					<li class="flex-sm-fill text-sm-center nav-item">
						<a class="nav-link" href="wallpaper-details.php">Wallpapers</a>
					</li>
					<li class="flex-sm-fill text-sm-center nav-item">
						<a class="nav-link" href="categories-detail.php" >Categories</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="pills-user-tab">
						<div class="container">
							<?php
							$sql = "SELECT id, f_name, l_name,email,phone_number,create_time FROM users";
							$result = $conn->query($sql);
							echo "<table class='table table-hover'>
							<thead>
							<tr>
							<th scope='col'>#</th>
							<th scope='col'>First Name</th>
							<th scope='col'>Last Name</th>
							<th scope='col'>Email</th>
							<th scope='col'>Phone Number</th>
							<th scope='col'>Create Time</th>
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
									<td>".$row['f_name']."</td>
									<td>".$row['l_name']."</td>
									<td>".$row['email']."</td>
									<td>".$row['phone_number']."</td>
									<td>".$row['create_time']."</td>
									</tr>
									</tbody>";

								}
								echo "</table>";
							}
							?>
						</div>
					</div>

					<div class="tab-pane fade" id="Categories" role="tabpanel" aria-labelledby="pills-Categories-tab">
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