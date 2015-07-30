<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //allows the current file to access functions in the following separate files
        include './dbCon.php';
        include './functions.php';
        //sets up the database connection
        $db = getDatabase();

        $stmt = $db->prepare("SELECT * FROM actors");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <table>
            <thead>
                <!-- Sets number of table columns and names them  -->
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Height</th>
                </tr>
            </thead>
            <?php foreach ($results as $row): ?>
            <!-- fills table cells with database data row by row -->
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>            
                    <td><?php echo $row['dob']; ?></td>            
                    <td><?php echo $row['height']; ?></td>            
                </tr>
            <?php endforeach; ?>
        </table>

    </body>
</html>

