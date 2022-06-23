<?php
    include_once '/app/Control/library.php';
    if(chkLogin()){
        header("Location: https://schemecatalysts.herokuapp.com/View/panchayat_dash.php");
    }
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Scheme Catalysts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Scheme Catalysts</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      		<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      		</div>
		      		<h3 class="text-center mb-4">Panchyat Login</h3>
					<form action="https://schemecatalysts.herokuapp.com/Control/login_action.php" method="post" class="login-form">
						<div class="form-group">
							<input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email" required>
						</div>
						<div class="form-group d-flex">
							<input type="password" class="form-control" id="exampleInputPassword3" name="pass" placeholder="Password" required>
						</div>
						
						<div class="form-group">
							<button type="submit" name="login" class="btn btn-primary rounded submit p-3 px-5">Sign in</button>
						</div>
	          		</form>
	        	</div>
			</div>
		</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

