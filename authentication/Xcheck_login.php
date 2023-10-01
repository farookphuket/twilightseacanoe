<?php
session_start();
ob_start();
//require("../inc/db.php");
require_once("../api/user.php");

$email = $_POST["email"];
$pass = $_POST["password"];

$x = $checkUser($email, $pass);

if (isset($_SESSION["USER_HAS_LOGIN_KEY"])) :
  echo "yes you are cool login";
else :
  echo "no you are not cool!";
endif;
echo "<br /> the code is work now <br />";
echo "<hr />";
var_dump($x);
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") :
  $num = 0;
  $smt = "no";
  if ($smt = $conn->prepare("SELECT id,password,email FROM `$table` WHERE name=?")) :
    $smt->bind_param('s', $_POST["username"]);
    $smt->execute();
    $smt->store_result();
    //$smt->bind_result($id, $pass);
    $num = $smt->num_rows();

    echo "<br /> if 2 work";
  //$smt->close();
  endif;

  if ($num > 0) :
    $smt->bind_result($id, $password, $email);
    $smt->fetch();
    if (password_verify($_POST["password"], $password)) :
      echo "<br />login good";
    else :
      echo "<br />login fail<pre>$xPass</pre>";
    endif;
    var_dump($password);
    echo "<br />if 3 block";

  endif;


  echo "<br />after if the num row $num";
endif;
*/
/*
$checkUser = function () use ($conn, $table) {
  $sql = "SELECT id,password,email FROM `$table` WHERE name=?";
  $xsmt = $conn->prepare($sql);
  if ($xsmt) :
    $xsmt->bind_param('s', $_POST["username"]);
    $xsmt->execute();
    $xsmt->store_result();

  endif;
  if ($xsmt->num_rows() > 0) :
    $xsmt->bind_result($id, $password, $email);
    $xsmt->fetch();
    if (password_verify($_POST["password"], $password)) :
      echo "<br />login success!";
    else :
      echo "<br />Login fail";
    endif;
  endif;
  // echo "<br /><hr /><br />work!<br />";
};

$checkUser();
*/
