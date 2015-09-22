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
    	<link rel="stylesheet" type="text/css" href="../includes/styles.css">
    </head>
    <body>
        <div class="wrapper">
        
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
            } 
            else {
                $results = 'Sorry please try again';
                include 'includes/results.html.php';
            }              
        }
        /* The following code decides whether to display the sign up form or a success message,
         * based on whether or not the user has successfully signed up*/
        if ( isset($_SESSION['newUser']) &&  $_SESSION['newUser'] === true ) {
            echo '<h2>Your Account Has Been Created!</h2>';
            echo '<p><a href="../index.php">Please Log In</a></p>';
        }
        else{
            echo '<h2>Sign Up!</h2><br>';
            include 'includes/signupform.html.php'; 
            echo '<br><p><a href="../index.php">Return to Log In page</a></p>';          
        }
        
        ?>
        
        </div>
    </body>
</html>
