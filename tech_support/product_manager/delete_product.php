<!-- see comment on line 35 in product_manager/index.php -->

<?php
    require_once('model/database.php');
    // get the data from the form
    $contact_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    
    if ($contact_id != false)
        {
            // Add the contact to the database
            $query = 'DELETE FROM products 
                WHERE productID = :product_id';

            $statement = $db->prepare($query);
            $statement->bindValue(':product_id', $product_id);            

            $statement->execute();
            $statement->closeCursor();
        }

        // reload index page

        $url = "product_manager/view_add_product.php";
        header("Location: " . $url);
        die();
?>