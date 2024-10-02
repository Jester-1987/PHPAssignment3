<?php
    require("model/database.php");
    $queryTechnicians = 'SELECT * FROM customers';
    $statement1 = $db->prepare($queryCustomers);
    $statement1->execute();
    $products = $statement1->fetchAll();
    $statement1->closeCursor();
?>
<!DOCTYPE html>
<head>
    <title>SportsPro Technical Support - Customers</title> 
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <?php include("view/header.php"); ?>
    <main>
    <h2>Customer List</h2>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Postal Code</th>
            <th>Country Code</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Password</th>
            <th>&nbsp;</th> <!-- for update column -->
        </tr>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?php echo $customer['firstName']; ?></td>
                <td><?php echo $customer['lastName']; ?></td>
                <td><?php echo $customer['address']; ?></td>
                <td><?php echo $customer['city']; ?></td>
                <td><?php echo $customer['state']; ?></td>
                <td><?php echo $customer['postalCode']; ?></td>
                <td><?php echo $customer['countryCode']; ?></td>
                <td><?php echo $customer['phone']; ?></td>
                <td><?php echo $customer['email']; ?></td>                
                <td><?php echo $customer['password']; ?></td>
                <td>
                    <form action="update_customer.php" method="post">
                        <input type="hidden" name="customer_id"
                        value="<?php echo $product['customerID']; ?>" />

                        <imput type="submit" value="update" />
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