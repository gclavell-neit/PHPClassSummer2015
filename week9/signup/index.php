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
    </head>
    <body>
        
        
        <?php
        include '../functions/dbconnect.php';
        require_once '../includes/session-start.req-inc.php';
        include_once 'functions/signup-function.php';
        include_once '../functions/until.php';
        
            if ( isPostRequest() ) {
                
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'pass');
                
                if ( newUser($email, $password) ) {
                    $_SESSION['newUser'] = true;
                    
                } else {
                    $results = 'Sorry please try again';
                    include 'includes/results.html.php';
                }
               
            }
            if ( isset($_SESSION['newUser']) &&  $_SESSION['newUser'] === true ) {
                echo '<h2>Your Account Has Been Created!</h2>';
                echo '<p><a href="../index.php">Please Log In</a></p>';
            }
            else{
                echo '<h2>Sign Up!</h2>';
                    include 'includes/signupform.html.php'; 
                    echo '<p><a href="../index.php">Return to Log In page</a></p>';
                    
            }
        
        ?>
        
        
    </body>
</html>
