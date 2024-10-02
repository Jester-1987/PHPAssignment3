<?php
    session_start();
    // get the data from the form
    $productCode = filter_input(INPUT_POST, 'productCode');
    $name = filter_input(INPUT_POST, 'name');
    $version = filter_input(INPUT_POST, 'version');
    $releaseDate = filter_input(INPUT_POST, 'releaseDate');

    // validate inputs
    require_once("model/database.php");
    $queryProducts = "SELECT * FROM products";
    $statement1 = $db->prepare($queryProducts);
    $statement1->execute();
    $products = $statement1->fetchAll();
    $statement1->closeCursor();

    foreach ($products as $product)
    
    if ($procuctCode == null || $name == null ||
        $version == null || $releaseDate == null)
        {
            $_SESSION["add_error"] = "Invalid data. Please check 
            all fields and try again.";

            $url = "errors/error.php";
            header("Location: " . $url);
            die();
        }
        else{
            require_once('model/database.php');

            // Add product to the database
            $query = 'INSERT INTO products
            (productCode, name, version, releaseDate)
            VALUES
            (:productCode, :name, :version, :releaseDate)';

            $statement = $db->prepare($query);
            $statement->bindValue(':productCode', $productCode);
            $statement->bindValue(':name', $name);
            $statement->bindValue('version', $version);
            $statement->bindValue('releaseDate', $releaseDate);

            $statement->execute();
            $statement->closeCursor();            
        }
        
        // Redirect back to product page
        $url = "project_manager/view_add_product.php"
        header("Location: " . $url);
        die();
    ?>