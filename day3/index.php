<!-- Build a basic user registration and login system using PHP and MySQL. The system should include the following features:**

Registration Page:

Create an HTML form where users can sign up with a username and password.

Validate and sanitize the form inputs in PHP.

Hash the password using password_hash() before storing it in the database.

Store the user information in a MySQL database.

Login Page:

Create an HTML form for users to log in with their credentials.

Verify the submitted password using password_verify() against the stored hash in the database.

Start a session upon successful login and redirect the user to a welcome page.

Logout Functionality:

Implement a logout button that destroys the user session and redirects to the login page.

Database Design:

Set up a MySQL database with a users table having columns: id, username, and password.

Bonus (Optional):

Implement basic error handling (e.g., displaying error messages for incorrect login credentials).

Add a feature to check if the username is already taken during registration."

Deliverables:

A working PHP project folder with all the files.

A README file explaining the steps to set up and run the project.
 -->

<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    This is the home page <br>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>

</html>
<?php

if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>