<?php
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}
?>

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

        <div class="content">
        <div class="loginForm">
            <form action="authorize.php" method="post">

                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <?php
                    require_once('recaptchalib.php');
                    $publickey = "6LfTChAkAAAAAJxSxfk5VnU1-epZF4VAPFtsf9qS"; // you got this from the signup page
                    echo recaptcha_get_html($publickey);
                ?>
                <script src='https://www.google.com/recaptcha/api.js'></script>
                <div class="g-recaptcha" data-sitekey="6LfTChAkAAAAAJxSxfk5VnU1-epZF4VAPFtsf9qS"></div>
                <input type="submit" value="Submit">
            </form>
        </div>
        
    </div>

</body>

</html>