<?php
require_once("./auth_user.php");

if (isset($_SESSION["USER_IS_ACCOUNT"])) :
  $url = $_SESSION["USER_DEFAULT_URL"];
?>

  <div style="background-color:black;border:1px solid red;font-size:2em;height:100vh;">
    <div style="background-color:white;padding:1.05em;text-align:center;max-width:85%;margin:0 auto;">

      <p style="color:red;font-weight:bold;">
        welcome
        <span style="font-weight:bold;color:green;padding:0.5em;">
          <?php echo $_SESSION["NAME"]; ?>
        </span>
        please click
        <a href="./dashboard.php">ME</a>
        or wait 5 secound
      </p>
    </div>
  </div>
  <script>
    const url = "<?php echo $url; ?>"
    const t = setTimeout(() => {
      location.pathname = url
    }, 5000)
    t()
    clearTimeout(t)
  </script>
<?php
endif;

