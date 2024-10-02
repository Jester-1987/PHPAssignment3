<?php
    require_once('model/database.php');

    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);

    $query = 'SELECT * FROM customers 
        WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $customers = $statement->fetch();
    $statement->closeCursor();

    $country_query = 'SELECT countryName FROM countries';
    $country_statement = $db->prepare($country_query);
    $country_statement->execute();
    $countries = $country_statement->fetchAll();
    $country_statement->closeCursor();
?>
<!DOCTYPE html>
<html>
   <head>
       <title>Update Customer</title>
       <link rel="stylesheet" type="text/css" href="main.css" />       
   </head>
   <body>
       <?php include("view/header.php"); ?>
       <main>
        <h2>Update Customer</h2>

        <form action="update_contact.php" method="post" id="update_contact_form">
        <div id="data">

            <input type="hidden" name="customer_id"
                value="<?php echo $customer['customerID']; ?>" />

            <label>First Name:</label>
            <input type="text" name="first_name"
            value="<?php echo $customer['firstName']; ?>" /><br />

            <label>Last Name:</label>
            <input type="text" name="last_name"
            value="<?php echo $customer['lastName']; ?>" /><br />

            <label>Address:</label>
            <input type="text" name="address"
            value="<?php echo $customer['address']; ?>" /><br />

            <label>City:</label>
            <input type="text" name="city"
            value="<?php echo $customer['city']; ?>" /><br />

            <label>State:</label>
            <input type="text" name="state"
            value="<?php echo $customer['state']; ?>" /><br />

            <label>Postal Code:</label>
            <input type="text" name="postal_code"
            value="<?php echo $customer['postalCode']; ?>" /><br />

            <label>Country:</label>
            <select name="country">
                <?php foreach ($countries as $country) : ?>
                    <option value="<?php echo $country['countryName']; ?>"
                        <?php
                            // If customer has a country, select it. Otherwise, default to 'United States'
                            if (($customer['country'] == $country['countryName']) || 
                                (empty($customer['country']) && $country['countryName'] == 'United States')) {
                                echo 'selected';
                            }
                        ?>>
                        <?php echo $country['countryName']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br />       

            <label>Phone Number:</label>
            <input type="text" name="phone_number"
                value="<?php echo $customer['phone']; ?>" /><br />
            
            <label>Email Address:</label>
            <input type="text" name="email_address"
            value="<?php echo $customer['emailAddress']; ?>" /><br />

            <label>Password:</label> 
            <input type="text" name="password"
                value="<?php echo $customer['password']; ?>" /><br /> 

        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Update Customer" /><br />
        </div>

        </form>
        
        <p><a href="customer_manager/index.php">View Customer List</a></p>
       </main>
       <?php include("view/footer.php"); ?>
   </body>
</html>