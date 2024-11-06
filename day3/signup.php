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
            <form action="login.php" method="post">
                <h1>Welcome</h1>
                <div class="form-element">
                    <label for="username">Username</label>
                    <input type="text" id="username">
                </div>
                <div class="form-element">
                    <label for="password">Password</label>
                    <input type="password" id="password">
                </div>
                <div class="form-element">
                    <label for="confirm">Confirm password</label>
                    <input type="password" id="confirm">
                </div>

                <button type="submit">Sign Up</button>
            </form>
            
            <p class="sign-in">Already signed up? <a class="page-link" href="login.php">Sign In</a></p>
        </section>
    </main>
</body>

</html>