<?php

$captcha=$_POST['cf-turnstile-response'];

if (!$captcha) {
    // What happens when the CAPTCHA was entered incorrectly
    echo '<h2>Please check the the captcha form.</h2>';
        exit;
}

$secretKey = "0x4AAAAAABY4OnCdIQxOjE1-awGXsaUFT6c";
$ip = $_SERVER['REMOTE_ADDR'];

$url_path = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
$data = array('secret' => $secretKey, 'response' => $captcha, 'remoteip' => $ip);

$options = array(
    'http' => array(
    'method' => 'POST',
    'content' => http_build_query($data))
);

$stream = stream_context_create($options);

$result = file_get_contents(
        $url_path, false, $stream);

$response =  $result;

$responseKeys = json_decode($response,true);
//print_r ($responseKeys);
if(intval($responseKeys["success"]) !== 1) {
    echo '<h2>spam?</h2>';
} else { 
    if ($_POST["user"] == "admin" && $_POST["pass"] == "pass") {
        echo "You are logged in.";
    } else {
        echo "You are not logged in.";
    }
}

?>