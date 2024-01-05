<?php
include 'header.php';
?>
<div class="container text-center mt-5">
	<div class="row">
		<div class="col-sm-6 offset-md-3">
			<form class="form-signin" action="server-user.php" method="POST">
				<img class="mb-4" src="login.png"width="72" height="72">
				<?php 
					if(isset($_SESSION['invalid']))
					{
						echo "<div class='alert alert-danger' role='alert'>Invalid User ID/Password</div>";
						session_unset();
						session_destroy();
					}
				?>
				<h1 class="h3 mb-3 font-weight-normal">Login</h1>
				<div class="mb-2">
					<input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="" autofocus="" ></input>
				</div>
				<input type="password" id="password" name="password" class="form-control" placeholder="Password" required=""></input>
				<div class="checkbox mb-3">
					<label>
						<input type="checkbox" value="remember-me"> Remember me
					</label>
				</div>
				<button onclick="return validation();" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>
		</div>
	</div>
</div>

