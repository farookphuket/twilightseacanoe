<?php
session_start();
ob_start();
$error = 0;
$url = "";
if (!isset($_SESSION["USER_HAS_LOGIN_KEY"])) :
  $url = "/authentication";
  $error = 1;
else :

  if (!isset($_SESSION["USER_IS_CUSTOMER"])) :

    // will redirect them to the default url for this specific user 
    $url = $_SESSION["USER_DEFAULT_URL"];
    $error = 1;


  endif;
endif;
if ($error == 1) :
?>
  <div style="background-color:black;border:1px solid red;font-size:2em;height:100vh;">
    <div style="background-color:white;padding:1.05em;text-align:center;max-width:85%;margin:0 auto;">

      <p style="color:red;font-weight:bold;">
        You are not Authorize!
      </p>
    </div>
  </div>

  <script>
    let t = setTimeout(() => {
      location.href = "<?php echo $url; ?>"
    }, 2500)
    t()
    clearTimeout(t)
  </script>
<?php
  die();
endif;
