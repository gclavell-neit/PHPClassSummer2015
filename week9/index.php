<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="includes/styles.css">
    </head>
    <body>
        <div class="wrapper">
        <?php
          
        include 'functions/dbconnect.php';
        require_once 'includes/session-start.req-inc.php';
        include_once 'functions/login-function.php';
        include_once 'functions/until.php';
        
            if ( isPostRequest() ) {
                
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'pass');
                
                if ( isValidUser($email, $password) ) {
                    $_SESSION['isValidUser'] = true;
                    $_SESSION['userId'] = getUserID($email);
                    
                    
                } else {
                    $results = 'Sorry please try again';
                    include 'includes/results.html.php';
                }
               
            }
            if ( isset($_SESSION['isValidUser']) &&  $_SESSION['isValidUser'] === true ) {
                               
                header('Location: addressBook/index.php');
                
            }
            else{
                echo '<h2>Log In</h2><br>';
                    include 'includes/loginform.html.php'; 
                    echo '<br><p><a href="signup/index.php">Sign Up!</a></p>';
            }
        ?>
        </div>
    </body>
</html>
