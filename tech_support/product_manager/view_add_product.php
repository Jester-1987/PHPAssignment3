<?php
    require("model/database.php");
    $queryProducts = 'SELECT * FROM products';
    $statement1 = $db->prepare($queryProducts);
    $statement1->execute();
    $products = $statement1->fetchAll();
    $statement1->closeCursor();
?>
<!DOCTYPE html>
<head>
    <title>SportsPro Technical Support - Products</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <?php include("view/header.php"); ?>
    <main>
    <h2>Product List</h2>
    <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Version</th>
            <th>Release Date</th>
            <th>&nbsp;</th> <!-- for delete column -->
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['version']; ?></td>
                <td><?php echo $product['releaseDate']; ?></td>
                <td>
                    <form action="delete_product.php" method="post">
                        <input type="hidden" name="product_id"
                        value="<?php echo $product['productID']; ?>" /> <!-- productID doesn't exist in the database. I'm not sure how to add it. Just using as placeholder for now. -->

                        <imput type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        <p><a href="product_manager/add_product.php">Add Product</a></p>
        </main>
        <?php include("view/footer.php"); ?>    
</body>
</html>