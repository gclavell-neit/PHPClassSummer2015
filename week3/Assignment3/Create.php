<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include './dbconnect.php';
            include './functions.php';
            
            $db = getDatabase();
            
            $result = '';
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
                $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = CURDATE(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
                
                $binds = array(
                    ":id" => $id,
                    ":corp" => $corp, 
                    ":incorp_dt" => $incorp_dt,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record Created';
                
                 
                }
            } 
        
        ?>
        
        <h1><?php echo $result; ?></h1>
        
        <form method="post" action="#">            
            Corp <input type="text" value="" name="corp" />
            <br />
            Email <input type="text" value="" name="email" />
            <br />
            Zipcode <input type="text" value="" name="zipcode" />
            <br />  
             Owner <input type="text" value="" name="owner" />
            <br />
            Phone <input type="text" value="" name="phone" />
            <br />  
            <input type="hidden" value="" name="id" /> 
            <input type="submit" value="Create" />
        </form>
        
        <p> <a href="view-action.php">View page</a></p>
        
    </body>
</html>
