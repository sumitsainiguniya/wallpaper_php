<?php
if(isset($_SESSION["up"]))
{
	
	if($_SESSION["up"] == 1)
	{
		echo "<div class='alert alert-success' role='alert'>File Succesfully Uploaded</div>";
	}
	else
	{
		echo "<div class='alert alert-danger' role='alert'>File Cannot Upload</div>";
	}

}
if (isset($_SESSION["notimage"]))
{
	echo "<div class='alert alert-danger' role='alert'>File is not an image.</div>";
}
if (isset($_SESSION["alreadyexist"]))
{
	echo "<div class='alert alert-danger' role='alert'>Sorry, file already exists.</div>";
}
if (isset($_SESSION["toolarge"]))
{
	echo "<div class='alert alert-danger' role='alert'>Sorry, your file is too large.</div>";
}
if (isset($_SESSION["fileformat"]))
{
	echo "<div class='alert alert-danger' role='alert'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
}
if (isset($_SESSION["notupload"]))
{
	echo "<div class='alert alert-danger' role='alert'>Sorry, your file was not uploaded.</div>";
}

session_unset();
session_destroy();

?>