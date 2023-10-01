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
  "contact_footer" => $_SERVER["DOCUMENT_ROOT"] . "/customer/components/footer-contact-form.php",
];

// helper function
include_once($env_file["helper"]);

$company = showCompany();
$myProfile = $getMyCustomerInfo();

$link_file = [
  "home" => "/customer/dashboard.php",
  "server" => "twilight sea canoe"
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
  <title>customer
    <?php echo $_SESSION["NAME"]; ?>'s profile
  </title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="<?php echo $env_file["css"]; ?>" />
  <noscript>
    <link rel="stylesheet" href="assets/css/noscript.css" />
  </noscript>
</head>

<body class="is-preload">

  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Header -->
    <header id="header">
      <a href="<?php echo $link_file["home"]; ?>" class="logo">
        <?php echo $link_file["server"]; ?>
      </a>
    </header>

    <!-- Nav -->
    <nav id="nav">
      <?php include_once($env_file["navbar"]); ?>
    </nav>

    <!-- Main -->
    <div id="main">

      <!-- Post -->
      <section class="post">
        <header class="major">
          <h1>
            <?php echo $company; ?>
          </h1>
        </header>

          </p>

        <!-- Form -->
        <?php
          $customer_id = 0;
        while ($row = $myProfile["result"]->fetch_array()) :
          //var_dump($row);
          $customer_id = $row["customer_id"];
        ?>
          <h2>Editing <?php echo $row["name"]; ?>'s profile..</h2>

          <form method="post" action="/customer/updateProfile.php">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION["USER_ID"];?>">
            <input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">
            <div class="row gtr-uniform">
              <div class="col-6 col-12-xsmall">
                <input type="text" name="name" id="name" value="<?php echo $row["name"]; ?>" placeholder="Name" />
              </div>

              <div class="col-6 col-12-xsmall">
                <input type="text" name="customer_nationality" id="customer_nationality" value="<?php echo $row["customer_nationality"]; ?>" placeholder="Name Of Nationality" />
              </div>
              <div class="col-6 col-12-xsmall">
                <input type="email" name="email" id="email" value="<?php echo $row["email"]; ?>" placeholder="Email" />
              </div>

              <div class="col-6 col-12-xsmall">
                <input type="number" name="phone" id="phone" value="<?php echo $row["customer_phone"]; ?>" placeholder="Phone Number" />
              </div>


              <div style="margin-top:2em;">
                <ul class="actions">
                  <li><input type="submit" value="Save" /></li>
                </ul>
              </div>

            </div>
          </form>
        <?php endwhile; ?>
        <hr />


      </section>

    </div>

    <!-- Footer -->
    <!-- contact form -->
    <?php include_once($env_file["contact_footer"]); ?>

    <!-- Copyright -->
    <?php include_once($env_file["copyright"]); ?>
  </div>

  <!-- Scripts -->
  <?php include_once($env_file["js"]); ?>

</body>

</html>
