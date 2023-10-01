<?php
require_once("./auth_user.php");

$url = "/authentication";
if (isset($_SESSION["USER_DEFAULT_URL"])) :
  $url = $_SESSION["USER_DEFAULT_URL"];
endif;
?>

<script>
  const t = setTimeout(() => {
    location.pathname = "<?php echo $url; ?>"
  }, 2500)
  t()
  clearTimeout(t)
</script>
