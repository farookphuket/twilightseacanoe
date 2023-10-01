<?php
ob_start();
session_start();


$_SESSION['tour_id'] = $_POST['tour_id'];
$_SESSION['adult'] = $_POST['adult'];
$_SESSION['child'] = $_POST['child'];
$_SESSION['bookingdate'] = $_POST['bookingdate'];

$page = "index";

//require "inc/db.php";
include_once(__DIR__ . "/inc/db.php");




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <?php
  //require 'master/int.php'; 

  include_once(__DIR__ . "/master/int.php");

  ?>


  <!-- SEO meta copy to the head of html index file START -->
  <title>Great Job Bro! you select one of the best tour in Phuket</title>
  <meta name="keywords" content="cart,twilightseacanoe,twilight phuket,better than the original">
  <meta name="description" content="feel free to ask for more information">
  <!-- SEO meta copy to the head of html index file END -->
</head>

<body>
  <main>
    <!-- ======= Header ======= -->
    <?php
    //require 'master/header.php'; 
    include_once(__DIR__ . "/master/header.php");

    ?>
    <!-- End Header -->
    <!-- ======= My Resume Section ======= -->
    <section id="cart" class="resume" style="margin-top:6em;">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8">
            <h2>information</h2>

            <div class="table-responsive">

              <table border="0" cellpadding="5" cellspacing="0" class="table  table-hover">
                <thead>

                  <th class="w-auto">#</th>
                    <th>Departure Date </th>
                  <th>Tour Name</th>
                  <th>Adult</th>
                  <th>Child</th>
                  <th>Total Price</th>
                </thead>
                <tbody>

                  <?php
                  $database = "tour";

                  $sql = "SELECT * FROM $database WHERE id = '" . $_SESSION["tour_id"] . "' ";
                  $obj = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($obj);

                  $sumadult = 0;
                  $sumchild = 0;
                  $SumTotal = 0;

                  $sumadult = $_SESSION["adult"] * $row['adult_price'];
                  $sumchild = $_SESSION["child"] * $row['child_price'];

                  $Total = $sumadult + $sumchild;

                  $SumTotal = $SumTotal + $Total;

                  $book_date = date_create($_SESSION["bookingdate"]);

                  ?>
                  <tr>
                    <td>1 </td>
                    <td><?php echo date_format($book_date, "d/m/Y"); ?></td>
                    <td><?php echo $row['tour_name']; ?></td>
                    <td><?php echo $_SESSION["adult"]; ?></td>
                    <td><?php echo $_SESSION["child"]; ?></td>
                    <td><?php echo number_format($Total, 2); ?></td>
                  </tr>
                  <tr>

                    <td colspan="6">
                      <div class="text-end">

                        <button type="button" class="btn btn-outline-danger" onClick="window.location='index.php'">Remove</button>
                      </div>

                    </td>
                  </tr>

                </tbody>
              </table>

            </div>

            <div>
              <h3 style="text-align:center;">Total <?php echo number_format($SumTotal, 2); ?> THB</h3>
            </div>

            <hr style="border-top: 1px solid #a2a2a2;">

            <?php if ($_SESSION['tour_id'] != '') : ?>
              <div style="margin-bottom:2em;">

                <form class="form-horizontal" method="post" action="checkout.php">
                  <input type="hidden" name="total" value="<?php echo $SumTotal; ?>">
                  <input type="hidden" name="tour_name" value="<?php echo $row['tour_name']; ?>">
                  <input type="hidden" name="tour_id" value="<?php echo $row['id']; ?>">
                  <input type="hidden" name="adult" value="<?php echo $_SESSION["adult"]; ?>">
                  <input type="hidden" name="child" value="<?php echo $_SESSION["child"];; ?>">
                  <input type="hidden" name="bookingdate" value="<?php echo $_SESSION["bookingdate"]; ?>">
                  <div class="text-center">
                    <h3><b>Traveler Details</b></h3>
                  </div>
                  <div class="form-group" style="margin-top:1.5em;">
                    <label class="col-sm-2 control-label">Full Name </label>
                    <div class="col-sm-10">
                      <input type="text" name="fullname" class="form-control" placeholder="your name eg:John Doe" required />
                    </div>
                  </div>

                  <div class="form-group" style="margin-top:1.5em;">
                    <label class="col-sm-2 control-label">Nationality </label>
                    <div class="col-sm-10">
                      <input type="text" name="nationality" class="form-control" placeholder="Where are you from?" required />
                    </div>
                  </div>
                  <div class="form-group" style="margin-top:1.5em;">
                    <label class="col-sm-2 control-label">Phone Number </label>
                    <div class="col-sm-10">
                      <input type="number" name="phone" class="form-control" placeholder="number only!" required />
                    </div>
                  </div>
                  <div class="form-group" style="margin-top:1.5em;">
                    <label class="col-sm-2 control-label">Email </label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" placeholder="your email eg:youremail@host.com" required />
                    </div>
                  </div>
                  <div class="form-group" style="margin-top:1.5em;">
                    <label class="col-sm-2 control-label">Special Requires </label>
                    <div class="col-sm-10">
                      <textarea name="special_require" class="form-control" placeholder="something we should know about you please call us."></textarea>
                    </div>
                  </div>

                  <fieldset style="margin-top:2em;margin-bottom:2em;">
                    <legend> Hotel and room</legend>

                  <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label class="control-label">Hotel Name </label>
                        <div class="col-sm-10">
                          <input type="text" name="hotel_name" id="hotel_name" class="form-control" placeholder="Enter Your Hotel Name"  />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">

                      <div class="form-group">
                        <label class="control-label">Room Number </label>
                        <div class="col-sm-10">
                          <input type="text" name="room_number" id="room_number" class="form-control" placeholder="Enter the room number"  />
                        </div>
                      </div>
                    </div>
                  </div>
                  </fieldset>
                  <div class="form-group" style="margin-top:1.5em;">
                    <div class="text-end">
                      <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                      <button class="btn btn-outline-success" type="submit">BOOK<br></button>
                    </div>
                  </div>
                </form>
              </div>
            <?php

            endif;  ?>

            <?php //mysqli_close($conn); 
            ?>

          </div>
        </div>
      </div>
    </section>



  </main><!-- End #main -->
  <?php
  require 'master/footer.php';
  require('master/script_extra.php');
  ?>

  <script src="/assets/js/main.js"></script>

</body>

</html>
