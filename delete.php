<?php 

	$connection = mysqli_connect('localhost', 'root', '', 'login');
	if (!$connection) {
		die('ERROR! Connection cannot be established');
	}

	$query  = "SELECT * FROM login_create";

	$result = mysqli_query($connection, $query);
	if (!$result) {
		die('Select query failed!' . mysqli_error($connection));
	}

	if (isset($_POST['delete'])) {
		$id = $_POST['id'];

		$query  = "DELETE FROM login_create ";
		$query .= "WHERE id = $id ";

		$result = mysqli_query($connection, $query);
		if (!$result) {
			die('Update query failed!' . mysqli_error($connection));
		}

	}

?>


<!DOCTYPE html>
<html>
<head>

	<title>Delete</title>

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

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

	<!-- Custom CSS -->
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
						<li><a href="create.php">Create</a></li>
						<li><a href="update.php">Update</a></li>
						<li class="active"><a href="delete.php">Delete</a></li>
		    		</ul>
		    	</div>
	    	</div>
		</div>
	</nav>

	<div class="container" style="margin-top: 50px;">
		<h2 align="center">Delete</h2>
		<hr>
		<div align="center">

			<?php 

				if (isset($_POST['delete'])) {
					echo "<h3 style='background-color: #4caf50; color: white; width: 40%; padding: 6px; border-radius: 40px;'>Record Deleted Successfully</h3>";
				}

			?>

			<form class="form" method="post" action="delete.php">
				<div class="form-group" style="margin-top: 17px;">
					<h3>Select ID</h3>
					<select class="selectpicker btn-simple" name="id" id="">
						
					<?php 

						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							echo "<option name='$id'>$id</option>";
						}

					?>

					</select>
				</div>


				<div class="form-group">
					<table>
					<tr>
						<td><input type="submit" class="btn btn-danger" name="delete" value="DELETE"></td>
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

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>

</html>