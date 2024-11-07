<?php
include "database.php";

$nameError = $passwordError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"]) ) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
        $nameError = "Please enter a username!";
    }
    if (empty($password)) {
        $passwordError = "Please enter a password";
    }

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = (?)");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
        
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION["username"] = $user['username'];
                $_SESSION["loggedin"] = true;

                header("Location: index.php");
                exit();
            } else {
                echo "<div class='failure'>Incorrect password.</div>";
            }
        } else {
            echo "<div class='failure'>Username does not exist.</div>";
        }
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP basic Day 3 - Login and Signup</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container">
        <section class="form-section">
            <form class="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <h1 class="heading">Welcome</h1>
                <input class="input" type="text" name="username" id="username" placeholder="Username">
                <span style="color: red; margin-top: -1.5rem"><?php echo $nameError ?></span>
                <input class="input" type="password" name="password" id="password" placeholder="Password">
                <span style="color: red; margin-top: -1.5rem"><?php echo $passwordError ?></span>
                <span class="sign-in">Haven't signed up? <a href="register.php">Sign Up</a></span>

                <input class="login-button" type="submit" name="login" value="Login">
            </form>
        </section>

        <section class="message-section">
            <h1>Sign In Page</h1>
        </section>
    </main>
</body>

</html>