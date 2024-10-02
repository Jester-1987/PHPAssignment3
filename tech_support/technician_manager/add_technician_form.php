<!DOCTYPE html>
<html>
    <head>
        <title>SportsPro Technical Support - Add Technician - Add Contact</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <?php include("view/header.php"); ?>
        <main>
        <h2>Add Technician</h2>

            <form action="add_technician.php" method="post" id="add_contact_form">
            <div id="data">
                <label>First Name:</label>
                <input type="text" name="firstName" /><br />
                
                <label>Last Name:</label>
                <input type="text" name="lastName" /><br />
                
                <label>Email Address:</label>
                <input type="text" name="email" /><br />

                <label>Phone:</label>
                <input type="text" name="phone" /><br />

                <label>Password:</label>
                <input type="text" name="password" /><br />              
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Add Technician" /><br />
            </div>
        </form>

   
        <p><a href="index.php">View Technician List</a></p>
    </main>
    <?php include("view/footer.php"); ?>
</body>
</html>