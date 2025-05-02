<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="logincheck.php" method="post">
        login<input type="text" name="user"><br>
        password<input type="password" name="pass"><br>
        <input type="submit">
    </form>
    
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" defer></script>

<div class="cf-turnstile" data-sitekey="0x4AAAAAABY4OrJ6FUX8qgxy" data-callback="logincheck.php"></div>
</body>
</html>