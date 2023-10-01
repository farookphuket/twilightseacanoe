<?php
$db = $_SERVER["DOCUMENT_ROOT"] . "/inc/db.php";
require_once($db);

$booking_table = "tws_booking";
$user_table = "tws_users";
$agency_table = "tws_agency";
$customer_table = "tws_customer";
$cus_link_user = "tws_customer_user";




$saveCustomer = function ($customer, $edit_id = 0) use ($conn, $cus_link_user, $customer_table) {

  $user_id = $customer["user_id"];
  $tour_id = $customer["tour_id"];
  $email = $customer["email"];
  $customer_id = 0;
  $hotel_name = $customer["hotel_name"];
  $room_number = $customer["room_number"];
  $customer_phone = $customer["customer_phone"];
  $customer_nationality = $customer["customer_nationality"];

  if ($edit_id != 0) :
    // update customer
    $customer_id = $edit_id;
  else :
    // create new customer 
    $newCustomer = "INSERT INTO `$customer_table` 
  (`tour_id`,`customer_email`,`hotel_name`,`room_number`,`customer_phone`,`customer_nationality`,`created_at`,`updated_at`) 
  VALUES(
  '$tour_id',
  '$email',
  '$hotel_name',
  '$room_number',
  '$customer_phone',
  '$customer_nationality', 
  NOW(), 
  NOW()
  );";
    $conn->query($newCustomer);
    $customer_id = $conn->insert_id;

    // link new customer row to user table
    $conn->query("INSERT INTO `$cus_link_user`(`customer_id`,`user_id`) VALUES('$customer_id','$user_id');");

  endif;
  $data = [
    "customer_id" => $customer_id,
    "msg" => "the tour id $tour_id"
  ];
  return $data;
};

$saveBooking = function ($booking, $edit_id = 0) use ($conn, $booking_table) {
  $tour_id = $booking["tour_id"];
  $customer_id = $booking["customer_id"];
  $email = $booking["email"];
  $agency_id = $booking["agency_id"];
  $departure_date = date_format(date_create($booking["departure_date"]),"Y-m-d H:i:s");
  $adult_count = $booking["adult_count"];
  $kid_count = $booking["kid_count"];
  $total_price = $booking["total_price"];
  $is_paid = $booking["is_paid"];
  $report = $booking["report"];
  $booking_id = 0;

  if ($edit_id != 0) :
  // update booking
  $booking_id = $edit_id;
  else :
  // create new booking 
  $newBooking = "INSERT INTO `$booking_table`(`tour_id`,`departure_date`,`agency_id`,
  `booking_email`,`customer_id`,
  `total_price`,`is_paid`,`adult_count`,`kid_count`,`report`,`booked_at`,`updated_at`) VALUES(
  '$tour_id','$departure_date','$agency_id',
  '$email',
  '$customer_id',
  '$total_price','$is_paid','$adult_count','$kid_count','$report',
  NOW(), 
  NOW()
  );";
  $conn->query($newBooking);
  $booking_id = $conn->insert_id;
  endif;
  $data = [
    "booking_id" => $booking_id
  ];
  return $data;
};

$getTodayBooking = function () use ($conn, $user_table, $booking_table) {
  $getBooking = $conn->query("SELECT* FROM `$user_table`");
};
