<?php

// comment this line on the production
//error_reporting(E_ALL & ~E_NOTICE);
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


//require_once("../inc/db.php");
include_once(__DIR__ . "./../inc/db.php");

$visitor_table = "tws_visitor";

//$today = date("Y-m-d");
$visitor_data = [];
$client_data = [];


function getUserIp()
{
  $ipaddress = '';
  if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if (isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';
  return $ipaddress;
}

function getUserOs()
{
  $os = "";
  $u_os = $_SERVER["HTTP_USER_AGENT"];
  $os = explode(";", $u_os)[1];
  return $os;
}


$getClientData = function () use ($visitor_data) {

  $ip = getUserIp();
  $visitor_data["ip"] = $ip;
  $visitor_data["os"] = getUserOs();
  //$visitor_data["device"] = getUserDevice();

  return $visitor_data;
};

$createNewVisitor = function () use ($getClientData, $visitor_data, $visitor_table, $conn) {
  $xData = $getClientData();
  $ip = $xData["ip"];
  $client = $xData["os"];

  $query = "INSERT INTO `$visitor_table`(`ip`,`user_agent`,`created_at`,`updated_at`) VALUES('$ip','$client',NOW(),NOW())";
  mysqli_query($conn, $query);

  $visitor_data["id"] = $conn->insert_id;
  return $visitor_data;
};

$getVisitorYear = function () use ($conn, $visitor_table) {
  $sql = "SELECT* FROM `$visitor_table` WHERE YEAR(created_at)=YEAR(NOW());";
  $res =  mysqli_query($conn, $sql);
  $count = $res->num_rows;
  //$visitor_data["visited_year"] = $count;
  return $count;
};

$getVisitorMonth = function () use ($conn, $visitor_table) {
  $sql = "SELECT* FROM `$visitor_table` WHERE MONTH(created_at)=MONTH(NOW()) AND YEAR(created_at)=YEAR(NOW());";
  $res =  mysqli_query($conn, $sql);
  $count = $res->num_rows;
  //$visitor_data["visited_month"] = $count;
  return $count;
};


$getVisitorToday = function () use ($conn, $visitor_table) {
  $sql = "SELECT* FROM `$visitor_table` WHERE DATE(created_at)=DATE(NOW());";
  $res =  mysqli_query($conn, $sql);
  $count = $res->num_rows;
  //return the number
  return $count;
};

$getVisitorAll = function () use ($conn, $visitor_table) {
  $sql = "SELECT* FROM `$visitor_table`;";
  $res =  mysqli_query($conn, $sql);
  $count = $res->num_rows;
  //return number
  return $count;
};
$visitor = function () use ($conn, $visitor_table, $visitor_data, $getVisitorAll, $getVisitorToday, $getVisitorMonth, $getVisitorYear, $createNewVisitor) {

  $ip = getUserIp();
  // $xData = $getClientData();
  // $client = $xData["os"];

  $sqlCommand = "SELECT*FROM `$visitor_table` WHERE ip='$ip' AND DATE(created_at)=CURDATE();";
  //$res = $conn->query($sqlCommand);

  if ($conn->query($sqlCommand)->num_rows == 0) :
    // create new one now
    $createNewVisitor();
  //$xId = $nData["id"];
  //$visitor_data["msg"] = "Ha ha no data but created one now id is $xId";
  endif;
  $visitor_data["ip"] = $ip;
  $visitor_data["visited_all"] = $getVisitorAll();
  $visitor_data["visited_today"] = $getVisitorToday();
  $visitor_data["visited_month"] = $getVisitorMonth();
  $visitor_data["visited_year"] = $getVisitorYear();
  return $visitor_data;
};
