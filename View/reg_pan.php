<?php
include_once 'C:\xampp\htdocs\schemecatalysts\Control\library.php';
include_once 'C:\xampp\htdocs\schemecatalysts\authenticate\authDB.php';
include_once 'C:\xampp\htdocs\schemecatalysts\vendor\autoload.php';
if(chkLogin()){
    echo '
    <!doctype html>
<html lang="en">

<head>
	<title>Panchayat register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="../css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="https://schemecatalysts.herokuapp.com">SchemeCatalysts</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="https://schemecatalysts.herokuapp.com/View/panchayat_dash.php">Panchayat Dash<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://schemecatalysts.herokuapp.com/View/reg_pan.php">Register Panchayat<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://schemecatalysts.herokuapp.com/View/recent_updates.php">See Updates<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://schemecatalysts.herokuapp.com/Control/clearall.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://schemecatalysts.herokuapp.com/Control/scraper.php"><span class="glyphicon glyphicon-upload"></span>Get Updates</a></li>
                </ul>
            </div>
        </nav>
</div>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Panchayat Register</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-9 col-lg-6">
					<div class="login-wrap">
						<h3 class="mb-4 text-center">Enter Details</h3>
						<form action="http://localhost/schemecatalysts/APIs/Write/Panchayat_register.php" method="post" class="signup-form">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group mb-4">
										<input type="text" class="form-control" name="uname" placeholder="User name">
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group mb-4">
										<input type="email" name="email" class="form-control" placeholder="email">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group mb-4">
										<input type="password" name="passwd" class="form-control" placeholder="Password">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group mb-4">
										<input type="password" class="form-control" placeholder="Confirm Password">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group d-flex">
										<button type="submit" class="btn btn-primary rounded submit p-3">Sign
											Up</button>
									</div>
								</div>
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

    
    
    
    
    
    ';
}

else{
    header("Location: https://schemecatalysts.herokuapp.com/index.php");
}
?>