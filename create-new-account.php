<?php
include 'header.php';
?> 

<div class="container text-center mt-5">
	<div class="row">
		<div class="col-sm-6 offset-md-3">
			<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<img class="mb-4" src="login.png"width="72" height="72">
				<h1 class="h3 mb-3 font-weight-normal">Create New Account</h1>
				<div class="mb-2">
					<input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" autofocus="" ></input>
				</div>
				<div class="mb-2">
					<input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" autofocus="" ></input>
				</div>
				<div class="mb-2">
					<input type="email" id="email" name="email" class="form-control" placeholder="Email address" autofocus="" ></input>
				</div>
				<div class="mb-2">
					<input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number" autofocus="" ></input>
				</div>
				<input type="password" id="password" name="password" class="form-control" placeholder="Password" ></input>
				<button  onclick="return validation();" class="btn btn-lg btn-primary btn-block mt-3 mb-3" type="submit" name="submit">Sign in</button>
			</form>
		</div>
	</div>
</div>
<?php
if(isset($_POST['submit']))
{
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$email = $_POST["email"];
	$phone_number = $_POST["phone_number"];
	$password = $_POST["password"];
	$status="";
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if (empty($_POST["first_name"])) 
	{
		echo "First Name is required<br>";
		$status="notok";
	} 
	else
	{
		if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) 
		{

			echo "Only letters and white space allowed<br>";
			$status="notok";
		}

		else 
		{
			$first_name = test_input($_POST["first_name"]);
		}
	}
	if (empty($_POST["last_name"])) 
	{
		echo "Last Name is required<br>";
		$status="notok";
	} 
	else
	{
		if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) 
		{

			echo "Only letters and white space allowed<br>";
			$status="notok";
		}

		else 
		{
			$last_name = test_input($_POST["last_name"]);
		}
	}

	if (empty($_POST["email"])) 
	{
		echo "Email is required<br>";
		$status="notok";
	} 
	else
	{
		$email=filter_var($email, FILTER_SANITIZE_EMAIL);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			echo "Invalid email format<br>"; 
			$status="notok";

		}
	}
	if (empty($_POST["password"])) 
	{
		echo "Password is required<br>";
		$status="notok";
	} 

	else 
	{
		$password = test_input($_POST["password"]);
	}
	if (empty($_POST["phone_number"])) 
	{
		echo "Phone Number is required<br>";
		$status="notok";
	} 
	else
	{
		if (!preg_match("/^[0-9]*$/",$phone_number)) 
		{

			echo "Please Enter Numbers only<br>";
			$status="notok";
		}

		else 
		{
			$phone_number = test_input($_POST["phone_number"]);
		}
	}

	
	if($status=="notok")
	{
		die("Please Fill The input Fields<br>");
	}
	else
	{
		$sql= "INSERT INTO users(f_name,l_name,email,phone_number,password) VALUES('$first_name','$last_name','$email','$phone_number','$password')";
		if ($conn->query($sql) === TRUE) 
		{
			header('Location: http://localhost/wallpaper/index.php');
		} 
		$conn->close();
	}
}
?>

<?php
include 'footer.php';
?>
