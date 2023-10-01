<?php
session_start();
ob_start();
if (!$_SESSION["USER_HAS_LOGIN_KEY"]) :
?>
  <script>
    alert("Error no key");
    const myTime = setTimeout(() => {
      window.location.pathname = "/authentication"
    }, 2500)
    myTime()
    clearTimeout(myTime);
  </script>
<?php
  die();

endif;
?>
