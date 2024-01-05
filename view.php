<?php
include 'header.php';
$url=$_GET['url'];
$sql = "SELECT * FROM wallpapers WHERE url='$url' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
	?>
	<div class="container">
		<div class="row mt-2">
			<div class="col-sm-9 span-class">
				<div class="row mt-2">

					<?php
					$row = $result->fetch_assoc();
					$id=$row['id'];

					$imagename = strstr($row['url'], '.', true);
					
					echo "<div class='col-sm-9'>

					<a href='images/".$row['url']."'><img style='outline: -webkit-focus-ring-color auto 5px;' class='img-thumbnail'style='height:300px;' alt='Responsive image' src='images/".$row['url']."'></a>
					<em>".$imagename."</em>
					</div>
					<div class='col-sm-3'>
					<div class='row'>";
					?>
					<?php
					$res="SELECT * FROM wallpapers WHERE id>$id ORDER BY id LIMIT 1";
					$next = $conn->query($res);
					if($next->num_rows > 0)
					{
						$nex = $next->fetch_assoc();

						echo "<div class='col-6 col-sm-12 align-self-end'><a href='view.php?url=".$nex['url']."'><img style='outline: -webkit-focus-ring-color auto 5px;' class='img-thumbnail' alt='Responsive image' src='uploads/".$nex['url']."'></a>";
						echo "<br> Next</div>";
					}
					$res="SELECT * FROM wallpapers WHERE id<$id ORDER BY id desc LIMIT 1";
					$previous = $conn->query($res);
					if($previous->num_rows > 0)
					{

						$pri = $previous->fetch_assoc();
						echo "<div class='col-6 col-sm-12'><a href='view.php?url=".$pri['url']."'><img style='outline: -webkit-focus-ring-color auto 5px;' class='img-thumbnail' alt='Responsive image' src='uploads/".$pri['url']."'></a>";
						echo "<br>Previous</div>";
					}
					echo "</div>
					</div>";
					
				}
				?>
				
					
					<?php
					$sql = "SELECT * FROM wallpapers WHERE id>$id ORDER BY id LIMIT 12 offset 1";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						echo "<div class='col-sm-12 text-center'><h3>More wallpapers</h3></div>";
						while($row = $result->fetch_assoc()) 
						{
							$imagename = strstr($row['url'], '.', true);

							echo "<div class='col-sm-4'>
							<a href='view.php?url=".$row['url']."'><img src='uploads/".$row['url']."' class='img-thumbnail'></a>
							<em1>".$imagename."</em1>
							</div>";
						}
					}
					?>
					
				
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

	</div>
</div>
