<?php
session_start();
ob_start();

$user_api = $_SERVER["DOCUMENT_ROOT"] . "/api/user.php";
require_once($user_api);

$customer_api = $_SERVER["DOCUMENT_ROOT"] . "/api/customer_api.php";
require_once($customer_api);

$name = $_POST["name"];
$email = $_POST["email"];
$tel = $_POST["phone"];
$nationality = $_POST["customer_nationality"];
$user_id = $_POST["user_id"];
$customer_id = $_POST["customer_id"];

$msg = "";
$error_msg = "";
$error = 0;

if ($user_id == $_SESSION["USER_ID"]) :

  $updateEmail = $updateUserEmail($email, $user_id);
  $updateName = $updateUserName($name, $user_id);
  $updatePhone = $updateCustomerPhone($tel, $customer_id);


  if ($updateEmail["error"] == 1) :
    $error = 1;
    $error_msg = $updateEmail["msg"];

  endif;

  if ($updateName["error"] == 1) :
    $error = 1;
    $error_msg = $updateName["msg"];
  endif;


  $msg = "Success! your data has been save";
endif;

?>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<div style="margin:0 auto;height:100vh;background-color:#e7e7e7;padding:2em;">
  <div style="margin:2em;border:1px solid blueviolet;">
    <?php
    if ($error != 0) :
    ?>
      <h1 style="color:red">Error Message!</h1>

      <p style="color:red;font-weight:bold;">
        <?php echo $error_msg; ?>
      </p>

    <?php
    else :
    ?>
      <h1 style="color:green">Success!</h1>
      <div>

        <p style="color:green;font-weight:bold;">
          <?php echo $msg; ?>
        </p>
      </div>

    <?php endif; ?>
  </div>
</div>
<script>
  let t1 = setTimeout(() => {
    location.pathname = "/customer/profile.php"
  }, 5500)
  t1()
  clearTimeout(t1)
</script>
