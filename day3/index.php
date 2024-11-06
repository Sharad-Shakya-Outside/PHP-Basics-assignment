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
        <section class="message-section">
            <h1>Sign Up Page</h1>
        </section>

        <section class="form-section">
            <form class="form" action="index.php" method="post">
                <h1 class="heading">Welcome</h1>
                <input class="input" type="text" name="username" id="username" placeholder="Username">
                <input class="input" type="password" name="password" id="password" placeholder="Password">
                <input class="input" type="password" name="confirm" id="confirm" placeholder="Confirm Password">
                <span class="sign-in">Already signed up? <a href="login.php">Sign In</a></span>

                <input class="login-button" type="submit" value="Sign Up">
            </form>
        </section>
    </main>
</body>

</html>