<?php
$auth_file = $_SERVER["DOCUMENT_ROOT"] . "/customer/auth_user.php";
require_once($auth_file);

$customer_api_file = $_SERVER["DOCUMENT_ROOT"] . "/api/customer_api.php";
require_once($customer_api_file);


$env_file = [
  "css" => "/customer/assets/css/main.css",
  "js" => $_SERVER["DOCUMENT_ROOT"] . "/customer/components/js-script-link.php",
  "navbar" => $_SERVER["DOCUMENT_ROOT"] . "/customer/components/navbar.php",
  "copyright" => $_SERVER["DOCUMENT_ROOT"] . "/customer/components/copyright-footer.php",
  "helper" => $_SERVER["DOCUMENT_ROOT"] . "/inc/helper_function.php",
];


// helper function
include_once($env_file["helper"]);


$company = showCompany();

$link_file = [
  "home" => "/customer/dashboard.php",
];

$img_dir = "/customer/images";
$img_file = [
  "pic01" => $img_dir . "/pic01.jpg",
  "pic02" => $img_dir . "/pic02.jpg",
  "pic03" => $img_dir . "/pic03.jpg",
  "pic04" => $img_dir . "/pic04.jpg",
  "pic05" => $img_dir . "/pic05.jpg",
  "pic06" => $img_dir . "/pic06.jpg",
  "pic07" => $img_dir . "/pic07.jpg",
];

?>
<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
  <title>Welcome <?php echo $_SESSION["NAME"]; ?> | Member zone</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="<?php echo $env_file["css"]; ?>" />
  <noscript>
    <link rel="stylesheet" href="assets/css/noscript.css" />
  </noscript>
</head>

<body class="is-preload">

  <!-- Wrapper -->
  <div id="wrapper" class="fade-in">

    <!-- Intro -->
    <div id="intro">
      <h1> 
          <?php echo $company; ?> 
        </h1>
      <!--
      <p>A free, fully responsive HTML5 + CSS3 site template designed by <a href="https://twitter.com/ajlkn">@ajlkn</a> for <a href="https://html5up.net">HTML5 UP</a><br />
        and released for free under the <a href="https://html5up.net/license">Creative Commons license</a>.</p>
      <ul class="actions">
        <li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
      </ul>
-->
      <p>Welcome
        <?php echo $_SESSION["NAME"]; ?> we would like to show your booking information as you made.
      </p>
      <div>
        <p>
          <?php
          $x = $getMyCustomerInfo();
          ?>
            &nbsp;
        </p>
      </div>
    </div>

    <!-- Header -->
    <header id="header">
      <a href="<?php echo $link_file["home"]; ?>" class="logo">twilight sea canoe</a>
    </header>

    <!-- Nav -->
    <nav id="nav">
      <?php include_once($env_file["navbar"]); ?>
    </nav>

    <!-- Main -->
    <div id="main">




      <div class="table-wrapper">

        <header>
          <h2>my recent booking</h2>
          <p>will show the recent booking.</p>
        </header>
        <?php
        $name = "";
        while ($row = $x["result"]->fetch_array()) :
          ?>

        <table>
          <tr>
            <th> name</th>
              <td><?php echo $row["name"];?></td>
            <th> email</th>
              <td><?php echo $row["email"];?></td>
          </tr>

          <tr>
            <th> Hotel</th>
              <td><?php echo $row["hotel_name"];?></td>
            <th> Room</th>
              <td>
                <?php echo $row["room_number"]; ?>
              </td>
          </tr>
            <tr>
              <th>tour name</th>
              <td>

                <p> 
                  <a href="/customer/tour.php?id=<?php echo $row["tour_id"];?>" title="see the tour detail">

                <?php 

echo $row["tour_title"];
                ?>
                  </a>
                </p>
              </td>
              <th>description</th>
              <td>
                <?php echo $row["tour_description"];?>
              </td>
            </tr>
            <tr>
              <th>full price</th>
              <td>
                <?php echo $row["total_price"];?>
              </td>
              <th>paid status</th>
              <td>
                <?php 
                if($row["is_paid"] == 0):
                ?>
<p style="color:red;font-weight:bold;">NOT PAY</p>
                <?php
                else:
                ?>

<p style="color:green;font-weight:bold;">Paid</p>
                <?php
                endif;
                ?>
              </td>
            </tr>
            <tr>
              <th>departure date</th>
              <td>
                <?php echo date_format(date_create($row["departure_date"]),"Y-m-d");?>
              </td>
              <th>go</th>
              <td>
                <?php echo dayToGo($row["departure_date"]);?>
                <span>booking</span>
                <span>
                  <?php 
                 $book_date = $row["booked_at"]; 
                  echo date_format(date_create($book_date),"Y-m-d");?>
                </span>
              </td>
            </tr>
        </table>
          <?php
        endwhile;
        ?>

      </div>



      <!-- Footer -->
      <!--
      <footer>
        <div class="pagination">
          <!--<a href="#" class="previous">Prev</a>-->
      <!--
          <a href="#" class="page active">1</a>
          <a href="#" class="page">2</a>
          <a href="#" class="page">3</a>
          <span class="extra">&hellip;</span>
          <a href="#" class="page">8</a>
          <a href="#" class="page">9</a>
          <a href="#" class="page">10</a>
          <a href="#" class="next">Next</a>
        </div>
      </footer>
      -->

    </div>

    <?php include_once($env_file["copyright"]); ?>

  </div>

  <!-- Scripts -->
  <?php
  include_once($env_file["js"]);
  ?>

</body>

</html>
