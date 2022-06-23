<?php 
    include_once '/app/Control/library.php';
    include_once '/app/authenticate/authDB.php';
    include_once '/app/vendor/autoload.php';
    if(chkLogin()){
        $name = $_SESSION['uname'];
        echo '

    <!DOCTYPE html>

<head>
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
    <div class="container-fluid">
    <div class="card">
                <div class="card-header">
                  Recent Messages sent
                </div>';

        // // include database file
        

        //DB connection
        $db = new dbManager();
        $conn = $db->dbConnect();
        $dbname = $conn->FP;
        $collection = "scheme_updates";
        $filter = [];
        $records = $dbname->$collection->find($filter);
        foreach ($records as $rec) {
            echo '  
                <div class="card">
                <div class="card-header">
                  ' . $rec->name . '
                </div>
                <div class="card-body">
                  <p class="card-text">' . $rec->info . '</p>
                  <P calss="card-text">' . "Date: $rec->date".'</p>
                </div>
              </div>
              <br/>';
        }
    echo '    
    </div>

</body>

</html>
    
    
    
    
    ';
    }
    else{
        header("Location: https://schemecatalysts.herokuapp.com/index.php");
    }
?>        
