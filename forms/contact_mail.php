<?php


if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
} else {
    $captcha = false;
}

if (!$captcha) {
    echo 'You are spam!';
} else {
    $secret   = '6LfYYXklAAAAAMpFTS9q1U37-dxExRCyHzNLERRz';
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
    );
    // use json_decode to extract json response
    $response = json_decode($response);

    if ($response->success === false) {
        //Do something with error
        echo 'You are spam!';
    }
}


$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$web = "webmaster@expressdata.co.th";
$to = "phuketandamantwilight@gmail.com";

$noreply="noreply@twilightseacanoe.com";

$html="<b>Name : </b>".$name."<br>";
$html.="<b>Email : </b>".$email."<br>";
$html.="<b>Subject : </b>".$subject."<br>";
$html.="<b>Message : </b>".$message."<br>";

//$bcc="";
$subject = "Twilight Sea Canoe Contact";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: ".$noreply . "\r\n";
//$headers .= "CC: ".$email1.', '.$email2. "\r\n";
$headers .= "CC: ".$web;
mail($to,$subject,$html,$headers);

echo "<meta http-equiv='refresh' content='0;URL=../index.php'>";

?>
