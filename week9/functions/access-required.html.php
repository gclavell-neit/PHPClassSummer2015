

<?php if ( !isset($_SESSION['isValidUser']) || $_SESSION['isValidUser'] !== true ) : ?>
    <p><a href="../index.php">Log In</a></p>
<?php die('Access Denied '); endif;  ?>


