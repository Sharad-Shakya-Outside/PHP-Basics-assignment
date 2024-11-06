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
            <form action="index.php" method="post">
                <h1>Welcome</h1>
                <div class="form-element">
                    <label for="username">Username</label>
                    <input type="text" id="username">
                </div>
                <div class="form-element">
                    <label for="password">Password</label>
                    <input type="password" id="password">
                </div>

                <button type="submit">Login</button>
            </form>

            <p class="sign-in">Haven't signed up? <a class="page-link" href="signup.php">Sign Up</a></p>
        </section>

        <section class="message-section">
            <h1>Sign In Page</h1>
        </section>
    </main>
</body>

</html>