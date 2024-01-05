<?php
include 'header.php';
?>
<div class="container">
	<div class="row mt-2">
		<div class="col-sm-9 span-class">
			<div class="row mt-2">
				<?php
				$offset=0;
				$page=0;
				if(isset($_GET['page']) && $_GET['page'] !=0)
				{
					$page=$_GET['page'];
					$offset =21*($page);
				}
				$sql = "SELECT id,url FROM wallpapers LIMIT 21 OFFSET $offset";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{
					
					while($row = $result->fetch_assoc()) 
					{
						$imagename = strstr($row['url'], '.', true);
						echo "<div class='col-sm-4'>
						<a href='view.php?url=".$row['url']."'><img src='uploads/".$row['url']."' class='img-thumbnail'></a>
						<em1>".$imagename."</em1>
						</div>";
					}
				}?>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="list-group">

				<a href="categories.php" class="list-group-item list-group-item-action active">Categories</a>
				<?php
				$sql = "SELECT id,name FROM categories";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc()) 
					{
						echo "<a href='cat-page.php?id=".$row['id']."' class='list-group-item list-group-item-action'>".$row['name']."</a>";
					}
				} 
				?>	

			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="offset-sm-4">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<?php if($page !=0){ ?>
								<li class="page-item">
									<a class="page-link" href="?page=<?php echo $page-1?>" aria-label="Previous">
										<span aria-hidden="true">Previous</span>		
									</a>
								</li>
							<?php } ?>
							<li class="page-item">
								<a class="page-link" href="?page=<?php echo $page+1?>" aria-label="Next">
									<span aria-hidden="true">Next</span>
								</a>
							</li>

						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include 'footer.php';
?>

