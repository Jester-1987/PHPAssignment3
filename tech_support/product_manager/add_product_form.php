<!DOCTYPE html>
<html>
    <head>
        <title>Add Product</title>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
    </head>
    <body>
        <?php include("view/header.php"); ?>
        <main>
        <h2>Add Contact</h2>

            <form action="add_contact.php" method="post" id="add_contact_form">
            <div id="data">
                <label>Code:</label>
                <input type="text" name="productCode" /><br />
                
                <label>Name:</label>
                <input type="text" name="name" /><br />
                
                <label>Version:</label>
                <input type="text" name="version" /><br />

                <label>Release Date:</label>
                <input type="date" name="releaseDate" />Use 'yyyy-mm-dd' format<br />

            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Add Product" /><br />
            </div>
        </form>

   
        <p><a href="product_manager/index.php">View Product List</a></p>
    </main>
    <?php include("view/footer.php"); ?>
</body>
</html>