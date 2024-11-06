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
            <form class="form" action="login.php" method="post">
                <h1 class="heading">Welcome</h1>
                <input class="input" type="text" name="username" id="username" placeholder="Username">
                <input class="input" type="password" name="password" id="password" placeholder="Password">
                <span class="sign-in">Haven't signed up? <a href="index.php">Sign Up</a></span>

                <input class="login-button" type="submit" value="Login">
            </form>
        </section>

        <section class="message-section">
            <h1>Sign In Page</h1>
        </section>
    </main>
</body>

</html>