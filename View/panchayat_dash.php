<?php 
    include_once 'C:\xampp\htdocs\schemecatalysts\Control\library.php';
    include_once 'C:\xampp\htdocs\schemecatalysts\authenticate\authDB.php';
    include_once 'C:\xampp\htdocs\schemecatalysts\vendor\autoload.php';
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
            <a class="navbar-brand" href="#http://localhost/schemecatalysts/">SchemeCatalysts</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Panchayat Dash<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://localhost/schemecatalysts/Control/clearall.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Welcome to Panchayt Dashboard '.$name.'</h1>
            <p class="lead">Please Fill The Info To Send The Messages To The Subscribers</p>
        </div>
    </div>

    <div class="container-fluid">
        <form method="POST" action="http://localhost/schemecatalysts/APIs/message_sender.php">
            <div class="form-group">
                <label for="name">Title of message</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Title">
                <small id="name" class="form-text text-muted">Please mention the department from which message is intended</small>
            </div>
            <div class="form-group">
                <label for="info">Text message</label>
                <input  name="info" type="text" class="form-control" id="info" placeholder="Type the Message">
            </div>
            <div class="form-group">
                <label for="cat">Select Category</label>
                <select name="cat" id="cat">
                    <option value="1">agri and farm</option>
                    <option value="2">finance</option>
                    <option value="3">rural dev</option>
                    <option value="4">skill and dev</option>
                    <option value="5">women and children</option>
                </select>
            </div>
            <input name="dnt" type="date" disabled>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
        <br/>
    </div>
    <script>
        function send_message(name ,info, cat){
            if (confirm("Do send the message", name ,"\n", info)) {
                window.location.reload("./index.php")
            }
        }
    </script>

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
        $collection = "Panchayat_messages";
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
                  <P calss="card-text">' . "Category: $rec->cat".'</p>
                </div>
              </div>
              <br/>';
        }
    echo '    
    </div>

</body>

</html>
    ';
    
    //////////////

}
else{
    header("Location: http://localhost/schemecatalysts/index.php");
}
?>
