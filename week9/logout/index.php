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
        <h3>You have successfully logged out.</h3>
        <?php
        require_once '../includes/session-start.req-inc.php';
        session_destroy();
        ?>
        <p><a href="../index.php">Return to Home Page</a></p>
        </div>
    </body>
</html>
