<html lang="en">

<head>
    <title>Convos Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="loginPage.css">
</head>

<body>

        <div class="header">
            <h1>Convos</h1>
            <p>Where the academically gifted stand out.</p>
        </div>

        <div class="navbar">
            <a href="homepage.html">Home</a>
            <a href="#">Classes</a>
            <a href="#">Help</a>
        </div>
        <div class="content">
        <div class="loginForm">
            <form action="authorize.php" method="post">

                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                <input type="submit" value="login">
            </form>
        </div>
        
    </div>

</body>

</html>