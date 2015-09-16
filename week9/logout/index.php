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
        <h3>You have successfully logged out.</h3>
        <?php
        require_once '../includes/session-start.req-inc.php';
        session_destroy();
        ?>
        <p><a href="../index.php">Return to Home Page</a></p>
    </body>
</html>
