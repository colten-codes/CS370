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
            <h1>Update your information!</h1>
        </div>

        <div class="navbar">
            <a href="homepage.html">Home</a>
            <a href="#">Classes</a>
            <a href="#">Help</a>
        </div>
        
        <div class="content">
            
        <div class="loginForm">
            <form action="checkDatabase.php" method="post">
            <p class = "gray">You may keep your current username</p>
                <label for="user">New Username:</label>
                <input type="text" id="user" name="user"><br><br>
                
                <label for="pwd">New Password:</label>
                <input type="pwd" id="pwd" name="pwd"><br><br>
                <label for="rpwd">Retype Password:</label>
                <input type="rpwd" id="rpwd" name="rpwd"><br><br>
                <input type="submit" value="change">
            </form>
        </div>
        
    </div>

</body>

</html>