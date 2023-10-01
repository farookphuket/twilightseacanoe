<?php
session_start();


$user_api = $_SERVER["DOCUMENT_ROOT"] . "/api/user.php";
require_once($user_api);

$booking_api = $_SERVER["DOCUMENT_ROOT"] . "/api/booking_api.php";
require_once($booking_api);

$helper_file = $_SERVER["DOCUMENT_ROOT"] . "/inc/helper_function.php";
require_once($helper_file);


/* The variable when form submit */
$total = $_POST['total'];
$tour_id = $_POST['tour_id'];
$tour_name = $_POST['tour_name'];
$bookingdate = $_POST['bookingdate'];

$hotel_name = $_POST['hotel_name'];
$room_number = $_POST['room_number'];

$book_date = date_create($bookingdate);

$fullname = $_POST['fullname'];
$nationality = $_POST['nationality'];
$phone = $_POST['phone'];
$adult = $_POST['adult'];
$child = $_POST['child'];
$email = $_POST['email'];


$send_from_host = "https://www.twilightseacanoe.com";

$date_of_departure = date_format(date_create($bookingdate), "Y-m-d");
$diff = dayToGo($date_of_departure);

$special_require = $_POST['special_require'];


$error = 0;
$msg = "";



$user_data = [
  "name" => $fullname,
  "email" => $email,
  "password" => password_hash("twilightseacanoe", PASSWORD_DEFAULT),
  "role" => 3
];
$newUser = $createNewUser($user_data);
$msg = $newUser["msg"];
$user_id = $newUser["user_id"];

if ($newUser["error"] != 0) :
  $error = 1;
endif;

$customer_data = [
  "customer_phone" => $phone,
  "customer_nationality" => $nationality,
  "hotel_name" => $hotel_name,
  "room_number" => $room_number,
  "tour_id" => $tour_id,
  "user_id" => $user_id,
  "email" => $email
];

$newCustomer = $saveCustomer($customer_data);
if ($newCustomer["customer_id"] != 0) :
  $msg .= "create customer ";
else :
  $msg .= "Error cannot create customer";
endif;

$booking_data = [
  "tour_id" => $tour_id,
  "email" => $email,
  "departure_date" => $_POST['bookingdate'] . " " . date("H:i:s"),
  "agency_id" => 1, // is direct booking
  "customer_id" => $newCustomer["customer_id"],
  "total_price" => $total,
  "is_paid" => 0,
  "adult_count" => $adult,
  "kid_count" => $child,
  "report" => $special_require

];
$newBooking = $saveBooking($booking_data);
if ($newBooking["booking_id"] != 0) :
  $msg .= "<br />user name $fullname can be login now<br />";
endif;




// login user
$newUserLogin = $checkUser($user_data["email"], "twilightseacanoe");
$url = $newUserLogin["url"];
$msg .= "<p style='margin-top:2em;font-weight:bold;color:blue;'>Now you can login to go to <br />$url</p>";
//echo "<meta http-equiv='refresh' content='0;URL=$url'>";
//echo $msg;


/* ========= get the picture link
* <img src="https://i.ibb.co/LvRZGz5/musa-and-group.jpg" alt="musa-and-group" border="0">
* <img src="https://i.ibb.co/3zk9M9v/tw-logo.png" alt="tw-logo" border="0">
* <img src="https://i.ibb.co/vcHCf8C/ln-logo.png" alt="ln-logo" border="0">
* <img src="https://i.ibb.co/6P1F8wZ/ig-logo.png" alt="ig-logo" border="0">
* <img src="https://i.ibb.co/0mntSj9/fb-logo.png" alt="fb-logo" border="0">
* <img src="https://i.ibb.co/hmLp68M/twilight-png-logo.png" alt="twilight-png-logo" border="0">
* <img src="https://i.ibb.co/L075XYP/image-11.png" alt="image-11" border="0">
* <img src="https://i.ibb.co/vVQCk2B/image-12.png" alt="image-12" border="0">
* <img src="https://i.ibb.co/18h4925/image-1.png" alt="image-1" border="0">
* <img src="https://i.ibb.co/b1bS7k6/image-10.png" alt="image-10" border="0">
* <img src="https://i.ibb.co/r3pDZyn/image-5.png" alt="image-5" border="0">
* <img src="https://i.ibb.co/ZSpm424/photo3.jpg" alt="photo3" border="0">
* * */





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

require_once "inc/db.php";

$sql = "INSERT INTO booking (tour_id, booking_date, adult, child, totalprice)VALUES ($tour_id, '$bookingdate', $adult, $child, $total)";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

  //echo $last_id;

  $sql2 = "INSERT INTO booking_detail (booking_id, fullname, nationality, phone, email, special_require,hotel_name,room_number,age_status)
            VALUES ($last_id, '$fullname', '$nationality', '$phone', '$email','$special_require',
            '$hotel_name',
           '$room_number', 
            0)";
  if ($conn->query($sql2) === TRUE) {

    $to = "";

    // this address is for testing 
    $to .= "$email,firefrook@gmail.com,info@farookphuket.com,";
    $to .= "info@see-southern.com,";

    // uncomment this on the live server
   // $to .= ",$email,";
   // $to .= "phuketandamantwilight@gmail.com,twilightseacanoe@gmail.con,info@twilightseacanoe.com,";
    
    $subject = "Twilight Seacanoe Tour info";


    $message = "<div style='margin:0 auto;padding:1em;background-attachment:fixed;background-image:url(https://i.ibb.co/VqsPf6d/photo2.jpg);background-repeat:no-repeat;border:1px solid blue;background-size:cover;padding-bottom:2em;'> 
    <div style='display:flex;margin:5em;padding:4em;justify-content:flex-end;flex-direction:column;flex-grow:4;flex-wrap:wrap;'>

      <div style='margin:0 auto;height:100vh;padding-bottom:1.7em;'> 
        <div style='right:0; left:0;top:30%;width:80%;margin:0 auto;'> 
          <div style='background-color:white;border-radius:50px 20px;padding:2em;'>
    <p>Dear <span style='font-weight:bold;color:blue;'>" . $fullname . "</span>
    you have receive this e-mail from " . $send_from_host . " because you just made a booking with us as the information below.
    </p>
            <p> 
              please show this copy to our staff on your arrival
            </p>

<div style='background-color:#cce3d2;margin-top:2em;margin-bottom:2em;border-radius:20px;padding:1.4em;'>
<div style='overflow-x:auto;margin-bottom:2em;'>
            <table  width=100%>
              <tr>
                  <th>
<span style='color:#c7b510;font-weight:bold;'>
                      name
                      </span>
                  </th>
                  <td>
 <span style='color:blue;font-size:1.2em;font-weight:bold;'>
                      " . $fullname . "
                 </span> 
                  </td>
                  <th>
                    
<span style='color:#c7b510;font-weight:bold;'>
                      email
                 </span> 
                  </th>
    <td>

 <span style='color:blue;font-weight:bold;'>
   " . $email . "
   </span> 
    </td>

              </tr>

              <tr>
                <th width=15%>hotel</th>
    <td>
    " . $hotel_name . "
    </td>
                <th width=25%>room</th>
    <td>
    " . $room_number . "
    </td>

              </tr>
              <tr>
                <th>tour name</th>
                <td width=35%>".$tour_name."</td>
                  <th width=35%>date of departure</th>
    <td>
    <span style='color:red;font-weight:bold;font-size:1.2em;'>" . $date_of_departure . "</span>
    " . $diff . "
    </td>
              </tr>
                <tr>
                  <th>Payment</th>
                  <td>Pay on arrival 
    <span style='font-weight:bold;color:red;'>
    " . $total . " 
    </span> Thaibath.
                  </td>

                <th width=23%>phone</th>
    <td width=35%>
    " . $phone . "
    </td>
                </tr>
                <tr>
                  <th> Adult</th>
    <td>
    " . $adult . "
    </td>

                  <th> Child</th>
    <td>
    " . $child . "
    </td>
                </tr>
                <tr>

                  <th width=25%>Special Require</th>
                  <td width=45% colspan=4>
    " . $special_require . "
                  </td>
                </tr>
            </table>
      </div>
              </div>
            <p>
Dear \"" . $fullname . "\"
The pick up time from your hotel \"" . $hotel_name . "\" can be late due to the traffic situation to ask for the absolute pick up time by make a call to the following method on your departure day (2023-09-19)
and please wait at the <span style='color:blue;font-weight:bold;'>" . $hotel_name . "</span>'s lobby'.
            </p>
          </div>


        </div>

    <div style='margin:1em;width:85%'><p>&nbsp;</p></div>
        <div style='margin:0 auto;width:75%;left:25px;background-color:white;padding:0.7em;border-radius:18px 5px;'> 
    <p style='margin-top:1em;'>Note to <span style='font-weight:bold;color:blue;'>" . $fullname . " 
    </span> the pick up time from your hotel <span style='font-weight:bold;color:blue;'>" . $hotel_name . "</span> can be late due to the traffic situation please contact the following number for an absolute pick up time on your departure day \"" . $date_of_departure . "\"
    </p>
          <div style='border-radius:18px;background-color:#cce3d2;padding:1em;'>
<div style='overflow-x:auto;margin-bottom:2em;'>
            <table width='100%' cellspacing=2 cellpadding=2 > 
              <tr>
                <th>office</th>
                <td>084-053-3456</td>
              </tr>

              <tr>
                <th>Ole</th>
                <td>084-309-1661</td>
              </tr>
            </table>
      </div>
          </div>
        </div>

        <!-- logo -->
        <div style='bottom:15px;right:25px;padding:2em;'>
    <div style='display:flex;justify-content:flex-end;gap:5%;'>

      <span style='margin-right:1em;'>

    <a href='https://twitter.com/twilight33456' target='_blank'>
          <img src='https://i.ibb.co/3zk9M9v/tw-logo.png' alt='' height='66' width='66'>
    </a>
      </span>
    <a href='https://www.instagram.com/twilightseacanoe/' target='_blank'>

          <img src='https://i.ibb.co/6P1F8wZ/ig-logo.png' alt='' height='66' width='66'>
    </a>
    <a href='https://web.facebook.com/twilightseacanoe?_rdc=1&_rdr' target='_blank'>

          <img src='https://i.ibb.co/0mntSj9/fb-logo.png' alt='' height='66' width='66'>
    </a>
    <a href='https://twilightseacanoe.com/tour/index.php' target='_blank'>

          <img src='https://i.ibb.co/hmLp68M/twilight-png-logo.png' alt='' height='66' width='66'>
    </a>
    </div>

        </div>
      </div>
    </div>

    </div>";


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <info@twilightseacanoe.com>' . "\r\n";
    //$headers .= "CC: " . $web . "\r\n";
    mail($to, $subject, $message, $headers);
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



mysqli_close($conn);

/*
* the session of this customer email will be set here
* */

$_SESSION["client_email"] = $_POST["email"];

echo "<meta http-equiv='refresh' content='0;URL=thankyou.php'>";
