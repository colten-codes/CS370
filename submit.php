<?php
session_start();

//disable ssl verification
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

$response = $_POST['g-recaptcha-response'];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => 'your_secret_key',
    'response' => $response
);
$options = array(
    'http' => array (
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context, -1, 40000, $arrContextOptions);
$captcha_success=json_decode($verify);

if ($captcha_success->success==false) {
    //Something is wrong with the reCAPTCHA
    echo "reCAPTCHA validation failed";

} else if ($captcha_success->success==true) {
    //reCAPTCHA successful, proceed with form processing
    echo "reCAPTCHA validation succeeded";
    

}
?>
