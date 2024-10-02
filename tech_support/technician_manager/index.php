<?php
    require("model/database.php");
    $queryTechnicians = 'SELECT * FROM technicians';
    $statement1 = $db->prepare($queryTechnicians);
    $statement1->execute();
    $products = $statement1->fetchAll();
    $statement1->closeCursor();
?>
<!DOCTYPE html>
<head>
    <title>SportsPro Technical Support - Technicians</title> <!--Taken from screenshot in Word Doc-->
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <?php include("view/header.php"); ?>
    <main>
    <h2>Product List</h2>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>&nbsp;</th> <!-- for delete column -->
        </tr>
        <?php foreach ($technicians as $technician): ?>
            <tr>
                <td><?php echo $technician['firstName']; ?></td>
                <td><?php echo $technician['lastName']; ?></td>
                <td><?php echo $technician['email']; ?></td>
                <td><?php echo $technician['phone']; ?></td>
                <td><?php echo $technician['password']; ?></td>
                <td>
                    <form action="delete_technician.php" method="post">
                        <input type="hidden" name="tech_id"
                        value="<?php echo $product['techID']; ?>" />

                        <imput type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        <p><a href="product_manager/add_technician.php">Add Technician</a></p>
        </main>
        <?php include("view/footer.php"); ?>    
</body>
</html>