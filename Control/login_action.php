<?php
    include_once '/app/authenticate/authDB.php';
    include_once '/app/vendor/autoload.php';
    include_once '/app/Control/library.php';
    if(chkLogin()){
        header("Location: https://schemecatalysts.herokuapp.com/View/panchayat_dash.php");
    }
?>
<?php

    if(isset($_POST['login'])){
//        print_r($_POST);
        $db = new dbManager();
        $conn = $db->dbConnect();
        $dbname = $conn->FP;
        $collection = $dbname->Panchayat_admin;
        
        $email = $_POST['email'];
        $upass = $_POST['pass'];
        $criteria = array("email"=> $email);
        $query = $collection->findOne($criteria);
        
        //var_dump($query);
        if(empty($query)){
            echo "Email ID is not registered.";
            echo "<a href='https://schemecatalysts.herokuapp.com'>Login</a> with an already registered ID";
        }
        else{
            
                $pass = $query["passwd"];
                var_dump($pass, $upass) ;
                if($upass === $pass){
                    $var = setsession($email);;
                  
                    
                    if($var){
                        
                    header("Location:  https://schemecatalysts.herokuapp.com/View/panchayat_dash.php");
                    }
                    else{
                        echo "Some error";
                    }
                }
                else{
                    echo "You have entered a wrong password";
                    echo "<br>";
                    echo "<a href='https://schemecatalysts.herokuapp.com'>Login</a> with an already registered ID";
                }
                
            
        
        }
    }
    

?>


<?php
// var_dump($_SESSION);
?>