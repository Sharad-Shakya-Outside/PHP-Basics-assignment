<?php
include "database.php";

$nameError = $passwordError = $confirmError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $confirm = filter_input(INPUT_POST, "confirm", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
        $nameError = "Please enter a username!";
    }
    if (empty($password)) {
        $passwordError = "Please enter a password";
    }
    if (empty($confirm)) {
        $confirmError = "Please confirm your password";
    }
    if (!empty($password) && !empty($confirm) && $password !== $confirm) {
        $confirmError = "The passwords don't match";
    }

    if (!empty($username) && !empty($password) && !empty($confirm)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<div class='failure'>Username already taken!!!</div>";
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hash);

            if ($stmt->execute()) {
                echo "<div class='success'>Registration Successful! You can now <a href='login.php'>sign in</a></div>";
            } else {
                echo "<div class='failure'>Error: " . $stmt->error . "</div>";
            }
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
    <title>Signup Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container">
        <section class="message-section">
            <h1>Hello, New User!</h1>
        </section>

        <section class="form-section">
            <form class="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <h1 class="heading">Sign Up</h1>
                <input class="input" type="text" name="username" id="username" placeholder="Username">
                <span style="color: red; margin-top: -1.5rem"><?php echo $nameError ?></span>
                <input class="input" type="password" name="password" id="password" placeholder="Password">
                <span style="color: red; margin-top: -1.5rem"><?php echo $passwordError ?></span>
                <input class="input" type="password" name="confirm" id="confirm" placeholder="Confirm Password">
                <span style="color: red; margin-top: -1.5rem"><?php echo $confirmError ?></span>
                <span class="sign-in">Already signed up? <a href="login.php">Sign In</a></span>

                <input class="login-button" type="submit" name="register" value="Sign Up">
            </form>
        </section>
    </main>
</body>

</html>