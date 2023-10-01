<?php 
$db = $_SERVER["DOCUMENT_ROOT"]."/inc/db.php";
require_once($db);

$photo_table = "tws_photos";
$photo_link = "tws_photo_user";
$user_table = "tws_users"; 

$getAllPhotos = function() use($conn,$user_table,$photo_table,$photo_link){
  $get = "SELECT* FROM `$user_table` 
  JOIN `$photo_link` ON `$user_table`.id=`$photo_link`.user_id 
  JOIN `$photo_table` ON `$photo_table`.id=`$photo_link`.photo_id;";
  $res = $conn->query($get);
  return $res;
};


?>
