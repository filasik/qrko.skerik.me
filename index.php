<?php
//vendor autoload
require __DIR__ . '/vendor/autoload.php';

//use tracy for debug
use Tracy\Debugger;
Debugger::enable();
use chillerlan\QRCode\{QRCode, QROptions};

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>qrko.skerik.me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container w-50">
    <h1 class="mt-5">qrko.skerik.me</h1>
    <p>QR Code Generator - absolutely free.</p>
    <form method="post">
        <label for="url">Enter URL...</label>
        <input id="url" type="text" name="url" class="form-control my-3 form-control-lg" placeholder="URL" required>
        <input type="submit" class="btn btn-outline-dark btn-lg" name="generate" value="Generate QR">
    </form>

    <div class="col-12 text-center">
    <?php
    // if form is submitted
    if (isset($_POST['generate'])) {
        // get url from form
        $data = $_POST['url'];
        // generate QR code
        $qrcode = (new QRCode)->render($data);
        // output QR code
        printf('<img src="%s" alt="QR Code" />', $qrcode);
    }

    ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
