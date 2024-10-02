<?php
    session_start();
    // get the data from the form
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $password = filter_input(INPUT_POST, 'password');

    // validate inputs
    require_once("model/database.php");
    $queryTechnicians = "SELECT * FROM technicians";
    $statement1 = $db->prepare($queryTechnicians);
    $statement1->execute();
    $products = $statement1->fetchAll();
    $statement1->closeCursor();

    foreach ($technicians as $technician)
    {
        if($email_address == $technician["email"])
        {
            $_SESSION["add_error"] = "Invalid data, Duplicate Email Address. Try Again.";

            $url = "error.php";
            header("Location: " . $url);
            die();
        }
    }
    
    if ($firstName == null || $lastName == null ||
        $email == null || $phone == null || $password == null)
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
            $query = 'INSERT INTO technicians
            (firstName, lastName, email, phone, password)
            VALUES
            (:firstName, :lastName, :email, :phone, :password)';

            $statement = $db->prepare($query);
            $statement->bindValue(':firstName', $firstName);
            $statement->bindValue(':lastName', $lastName);
            $statement->bindValue('email', $email);
            $statement->bindValue('phone', $phone);
            $statement->bindValue('password', $password);

            $statement->execute();
            $statement->closeCursor();            
        }
        
        // Redirect back to product page
        $url = "project_manager/index.php"
        header("Location: " . $url);
        die();
    ?>