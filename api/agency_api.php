<?php

$db = $_SERVER["DOCUMENT_ROOT"] . "/inc/db.php";
require_once($db);

$user_table = "tws_users";
$agency_table = "tws_agency";
$agency_user = "tws_agency_user";

$getAgency = function() use($conn,$agency_table,$user_table,$agency_user){

  $get_agency = $conn->query("SELECT* FROM `$user_table` 
    JOIN `$agency_user` ON `$agency_user`.user_id=`$user_table`.id 
    JOIN `$agency_table` ON `$agency_user`.agency_id=`$agency_table`.id");
  $data = [
    "agency" => $get_agency
  ];

  return $data;
};

$editAgency = function($edit_id) use($conn,$user_table,$agency_table,$agency_user){
  $get = $conn->query(
    "SELECT* FROM `$user_table` 
    JOIN `$agency_user` ON `$agency_user`.user_id=`$user_table`.id 
    JOIN `$agency_table` ON `$agency_user`.agency_id=`$agency_table`.id 
    WHERE `$agency_user`.agency_id='$edit_id'
    "
  );
  return $get;
};

$saveAgency = function ($agency, $edit_id = 0) use ($conn, $agency_table, $user_table, $agency_user) {

  $name = $agency["agency_name"];
  $tel =  $agency["tel"];
  $user_id = $agency["user_id"];

  if ($edit_id == 0) :
    // create new agency 
    $sql = "INSERT INTO `$agency_table`(`agency_name`,`tel`,`created_at`,`updated_at`) 
      VALUES(
      '$name', 
      '$tel',
      NOW(), 
      NOW()
      );";

    $conn->query($sql);
    $edit_id = $conn->insert_id;

    // create link to pip table 
    $conn->query("INSERT INTO `$agency_user`(`user_id`,`agency_id`) VALUES(
    '$user_id', 
    '$edit_id'
    )");
  else :
  // update agency data

  endif;


  $get_agency = $conn->query("SELECT* FROM `$user_table` 
    JOIN `$agency_user` ON `$agency_user`.user_id=`$user_table`.id 
    JOIN `$agency_table` ON `$agency_user`.agency_id=`$agency_table`.id");
  $data = [
    "agency_id" => $edit_id,
    "agency" => $get_agency
  ];

  return $data;
};
