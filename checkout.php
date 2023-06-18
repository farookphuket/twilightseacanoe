<?php
session_start();



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

require "inc/db.php";

$total = $_POST['total'];
$tour_id = $_POST['tour_id'];
$tour_name = $_POST['tour_name'];
$bookingdate = $_POST['bookingdate'];

$book_date = date_create($bookingdate);

$fullname = $_POST['fullname'];
$nationality = $_POST['nationality'];
$phone = $_POST['phone'];
$adult = $_POST['adult'];
$child = $_POST['child'];
$email = $_POST['email'];

/*
* the session of this customer email will be set here
* */
//$_SESSION["client_email"] = $_POST["email"];

$special_require = $_POST['special_require'];




$sql = "INSERT INTO booking (tour_id, booking_date, adult, child, totalprice)VALUES ($tour_id, '$bookingdate', $adult, $child, $total)";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

  //echo $last_id;

  $sql2 = "INSERT INTO booking_detail (booking_id, fullname, nationality, phone, email, special_require, age_status)
  VALUES ($last_id, '$fullname', '$nationality', '$phone', '$email','$special_require',0)";
  if ($conn->query($sql2) === TRUE) {

    //$web = "webmaster@expressdata.co.th";


    $to = "phuketandamantwilight@gmail.com,twilightseacanoe@gmail.com,$email,firefrook@gmail.com";
    //$to = "$email,firefrook@gmail.com";
    $subject = "Twilight Seacanoe Tour info";

    /**
     * last update 5 June 2023
     */
    $message = "
<div style='margin:0 auto;background-color:#e7e7e7;'>
      <div style='margin-left:1.5em;padding:4px;border-left:8px solid green;'>

<h1>Twilight sea canoe booking info</h1>
<p style='margin-bottom:2em;'>
dear " . $fullname . " your booking information as it shown below.
</p>
<div style='overflow-x:auto;margin-bottom:2em;'>

<table style='background-color:#6b786e;border:1px solid;margin-left:2em;width:100%;'>
            <tr style='border:1px dotted #b619e6;'>
                        <th style='background-color:white;padding:3px;width:25%;'>
booking number
                        </th>
                        <td style='background-color:#19e650;text-align:center;'>" . $last_id . "</td>
            </tr>
            <tr style='border:1px dotted #b619e6;'>
                        <th style='background-color:white;padding:3px;width:25%;'>
Name
                        </th>
                        <td style='background-color:#19e650;text-align:center;'>
                                    " . $fullname . "</td>
            </tr>

            <tr style='border:1px dotted #b619e6;'>
                        <th style='background-color:white;padding:3px;'>
Nationality
                        </th>
                        <td style='background-color:#19e650;text-align:center;'>
                                    " . $nationality . "</td>
            </tr>
            <tr style='border:1px dotted #b619e6;'>
                        <th style='background-color:white;padding:3px;'>
Email
                        </th>
                        <td style='background-color:#19e650;text-align:center;'>
                                    " . $email . "</td>
            </tr>
            <tr style='border:1px dotted #b619e6;'>
                        <th style='background-color:white;padding:3px;'>
Phone
                        </th>
                        <td style='background-color:#19e650;text-align:center;'>
                                    " . $phone . "</td>
            </tr>

            <tr style='border:1px dotted #b619e6;'>
                        <th style='background-color:white;padding:3px;'>
Adult
                        </th>
                        <td style='background-color:#19e650;text-align:center;'>
                                    " . $adult . "
                        </td>
            </tr>

            <tr style='border:1px dotted #b619e6;'>
                        <th style='background-color:white;padding:3px;'>
Child
                        </th>
                        <td style='background-color:#19e650;text-align:center;'>
                                    " . $child . "
                        </td>
            </tr>
            <tr style='border:1px dotted #b619e6;'>
                        <th style='background-color:white;padding:3px;'>
Tour Departure On
                        </th>
                        <td style='background-color:#19e650;text-align:center;'>
                                    " . $bookingdate . "
                        </td>
            </tr>

            <tr style='border:1px dotted #b619e6;'>
                        <th style='background-color:white;padding:3px;'>
Special Require
                        </th>
                        <td style='background-color:white;'>
                                    <p style='color:red;font-weight:bold;'> 
" . $special_require . "
                                    </p>
                                    
                        </td>
            </tr>

            <tr style='border:1px dotted #b619e6;'>
                        <th style='background-color:white;padding:3px;'>
Total Price
                        </th>
                        <td style='background-color:#19e650;text-align:center;'>
                                    " . $total . " THAI BATH.
                        </td>
            </tr>
            <tr style='border:1px dotted #b619e6;'>
                        <th style='background-color:white;padding:3px;'>
Payment Status
                        </th>
                        <td style='background-color:white;text-align:center;'>
                                    <p style='background-color:yellow;color:red;font-weight:bold;'>Will be collect at Pier</p>

                        </td>
            </tr>



</table>
</div>

<div style='margin-left:2px;'>

<p style='color:blueviolet;'> 
on your departure date as " . $bookingdate . " 
please wait at the hotel lobby 
</p>
<p style='color:gray;'>
      <span style='color:red;font-weight:bold;'>*</span>
The pick up time can be late due to the traffic situation to ask for the absolute pick up time by make a call to the following method

</p>
<ul style='margin-top:2em;'>
<li>
      <span>
office number
      </span>
&nbsp;&middot;&nbsp;
<strong style='color:green;'>084-053-3456</strong> 
</li>
<li>
booking &nbsp;&middot;&nbsp;
<strong style='color:green;'>084-309-1661</strong> 
</li>


<li>
            Whatapp&nbsp;&middot;&nbsp;
<strong style='color:green;'>084-053-3456</strong>  
</li>

</ul>
<p>
best regard 
<br />
Twilight Sea Canoe Team.
</p>
</div>
      </div>

</div>
";



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
