<!DOCTYPE html>
<html>
<head>

	<title>Create</title>

	<meta charset="utf-8" />

	<!-- Logo of your website -->
	<!-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png"> -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!-- Canonical SEO -->
	<link rel="canonical" href="https://www.creative-tim.com/product/material-kit"/>
	
	<!-- Fonts and icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
    <link href="assets/css/custom.css" rel="stylesheet"/>

</head>
<body>

	<nav class="navbar navbar-danger" role="navigation">
		<div class="container-fluid">
			<div class="container">
		    	<div class="navbar-header">
		    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		    		</button>
		    		<a class="navbar-brand" href="">CRUD System</a>
		    	</div>

		    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    		<ul class="nav navbar-nav navbar-right">
		    			<li class="active"><a href="">Create</a></li>
						<li><a href="update.php">Update</a></li>
						<li><a href="delete.php">Delete</a></li>
		    		</ul>
		    	</div>
	    	</div>
		</div>
	</nav>

	<div class="container" style="margin-top: 70px;">
		<h2 align="center">Create</h2>
		<hr>
		<div align="center">
			<?php 

				if (isset($_POST['submit'])) {
					
					$username = $_POST['username'];
					$password = md5($_POST['password']);	// Password encryption using md5

					// METHOD 1: Using BLOWFISH's $2y$ format and salt for encryption (More Secure)

					// CRYPT_BLOWFISH : Blowfish hashing with a salt as follows: "$2a$", "$2x$" or "$2y$", a two digit cost parameter, "$", and 22 characters from the alphabet "./0-9A-Za-z". Using characters outside of this range in the salt will cause crypt() to return a zero-length string. The two digit cost parameter is the base-2 logarithm of the iteration count for the underlying Blowfish-based hashing algorithmeter and must be in range 04-31, values outside this range will cause crypt() to fail. Versions of PHP before 5.3.7 only support "$2a$" as the salt prefix: PHP 5.3.7 introduced the new prefixes to fix a security weakness in the Blowfish implementation.

					$hashFormat = "$2y$10$";	// $10$ => Makes it 10 times secure.
					$salt = "iusesomecrazystrings22";
					$hashFormat_and_salt = $hashFormat . $salt;
					$password = crypt($password, $hashFormat_and_salt);

					// METHOD 2: Only using 'salt' for encryption (Less secure than METHOD 1)
					// $salt = "iusesomecrazystrings22";
					// $password = crypt($password, $salt);

					$connection = mysqli_connect('localhost', 'root', '', 'login');
					
					if (!$connection) {
						echo "<h3 style='background-color: #f44336; color: white; width: 40%; padding: 6px; border-radius: 40px;'>ERROR! Please check your connection</h3>";
					} else {

						if ($username && $password) {
							echo "<h3 style='background-color: #4caf50; color: white; width: 40%; padding: 6px; border-radius: 40px;'>Registration Successful</h3>";
						}

						$query  = "INSERT INTO login_create(username, password)";
						$query .= "VALUES ('$username', '$password')";

						$result = mysqli_query($connection, $query);
						if (!$result) {
							die("<h3 style='background-color: ##f44336; color: white; width: 40%; padding: 6px; border-radius: 40px;'>ERROR! Try again later</h3>" . mysqli_error());
						}

					}

				}

			?>
			<form class="form" method="post" action="create.php">
				<div class="form-group label-floating has-success">
					<h3>Username</h3>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
				</div>
				<div class="form-group has-success">
					<h3>Password</h3>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
				</div>
				<div class="form-group">
					<table>
					<tr>
						<td style="padding-right: 250px;"><input type="reset" class="btn btn-danger" value="CLEAR"></td>
						<td><input type="submit" class="btn btn-success" name="submit" value="SUBMIT"></td>
					</tr>
					</table>
				</div>
			</form>
		</div>
		<hr>
	</div>

	 <footer class="footer">
        <div class="container">
            <nav class="pull-left">
				<ul>
					<li>
						<a href="">
							Demo Connection
						</a>
					</li>
					<li>
						<a href="">
						   About Us
						</a>
					</li>
				</ul>
            </nav>
            <div class="copyright pull-right">
                &copy; 2017 &nbsp;|&nbsp; BRIJESH
            </div>
        </div>
    </footer>

</body>

	<!-- Core JS Files -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!-- Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!-- Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>

</html>