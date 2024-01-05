<?php
include 'header.php';
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
	<input class="btn btn-primary" type="file" name="fileToUpload" id="fileToUpload"><br>
	<select>
		<option>
			1
		</option>
	</select>
	<button class="btn btn-primary mt-2" type="submit" value="Upload Image" name="submit">Upload</button><br>
</form>