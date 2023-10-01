<?php 
$logout_page = $_SERVER["DOCUMENT_ROOT"]."/authentication/logout.php";
$sample_dir = "/customer/sample_page";

$sample_file = [
  "page_1" => $sample_dir."/sample_1.php",
  "page_2" => $sample_dir."/sample_2.php",
  "page_3" => $sample_dir."/sample_3.php"
];


$link_file = [
  "home" => "/customer/dashboard.php",
  "profile" => "/customer/profile.php", 
  "logout" => "/authentication/logout.php"
];

?>
<ul class="links">
  <li><a href="<?php echo $link_file["home"];?>">Home</a></li>
  <!--
  <li><a href="<?php echo $sample_file["page_2"];?>">Generic Page</a></li>
  <li><a href="<?php echo $sample_file["page_3"];?>">Elements Page</a></li>
-->

<?php 
if(isset($_SESSION["USER_HAS_LOGIN_KEY"])):
?>
  <li><a href="<?php echo $link_file["profile"];?>">
<?php echo $_SESSION["NAME"]; ?> 's profile
</a></li>
  <!--
<li><a href="./../../authentication/logout.php">LogOut</a></li>
  -->
  <li><a href="<?php echo $link_file["logout"];?>">LogOut</a></li>

  <li><a href="<?php echo $sample_file["page_1"];?>">sample Page</a></li>
<?php 
endif;
?>
</ul>
<ul class="icons">
  <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
  <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
  <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
  <li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
</ul>
