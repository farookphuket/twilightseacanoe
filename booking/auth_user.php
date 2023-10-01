<?php
session_start();
ob_start();
$error = 0;
$url = "";
if (!isset($_SESSION["USER_HAS_LOGIN_KEY"])) :
  $url = "/authentication";
  $error = 1;
else :

  if (!isset($_SESSION["USER_IS_BOOKING"])) :

    // will redirect them to the default url for this specific user 
    $url = $_SESSION["USER_DEFAULT_URL"];
    $error = 1;

  endif;
endif;
if ($error == 1) :
?>


  <script>
    let t = setTimeout(() => {
      location.href = "<?php echo $url; ?>"
    }, 2500)
    t()
    clearTimeout(t)
  </script>
<?php
endif;
