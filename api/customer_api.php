<?php
$db = $_SERVER["DOCUMENT_ROOT"] . "/inc/db.php";
require_once($db);


$customer_table = "tws_customer";
$user_table = "tws_users";
$tour_table = "tws_tour";
$table_link = "tws_customer_user";
$booking_table = "tws_booking";

$getMyCustomerInfo = function () use ($conn, $customer_table, $user_table, $table_link, $booking_table, $tour_table) {
  $user_id = $_SESSION["USER_ID"];
  $res = $conn->query("SELECT* FROM `$user_table` u 
    JOIN `$table_link` ON u.id = `$table_link`.user_id 
    JOIN `$customer_table` ON `$table_link`.customer_id=`$customer_table`.id 
    RIGHT JOIN `$booking_table` ON `$table_link`.customer_id=`$booking_table`.customer_id 
    JOIN `$tour_table` ON `$booking_table`.tour_id=`$tour_table`.id
    WHERE u.id='$user_id'
    ");
  $x = [
    "result" => $res
  ];
  return $x;
};


/*  ==================  Update Customer Phone number START 
 * */
$updateCustomerPhone = function ($phone, $id) use ($conn, $customer_table) {
  $conn->query("
    UPDATE `$customer_table` SET customer_phone='$phone' WHERE id='$id'
    ");

  $x = $conn->affected_rows;
  return $x;
};


/*  ==================  Update Customer Phone number END 
 * */


/* =================== update customer detail START ===================
 * */
$saveCustomerDetail = function ($customer, $id = 0) use ($conn, $customer_table) {

  if ($id != 0) :
    // get the customer by id 
    $getCustomer = "SELECT* FROM `$customer_table` WHERE id='$id';";
    $query = $conn->query($getCustomer);
    if ($query->num_rows != 0) :
    endif;
  else :
  // create new customer

  endif;
};
/* =================== update customer detail END ===================
 * */
