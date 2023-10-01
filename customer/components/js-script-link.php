
<?php 
$asset_dir = "/customer/assets/js";
$env_file = [
  "jquery" => $asset_dir."/jquery.min.js",
  "jquery.scrollex" => $asset_dir."/jquery.scrollex.min.js",
  "jquery.scrolly" => $asset_dir."/jquery.scrolly.min.js",
  "browser" => $asset_dir."/browser.min.js", 
  "breakpoints" => $asset_dir."/breakpoints.min.js", 
  "util" => $asset_dir."/util.js", 
  "main" => $asset_dir."/main.js", 
];
?>

<script src="<?php echo $env_file["jquery"];?>"></script>
<script src="<?php echo $env_file["jquery.scrollex"];?>"></script>
<script src="<?php echo $env_file["jquery.scrolly"];?>"></script>
  <script src="<?php echo $env_file["browser"];?>"></script>
  <script src="<?php echo $env_file["breakpoints"];?>"></script>
  <script src="<?php echo $env_file["util"];?>"></script>
  <script src="<?php echo $env_file["main"];?>"></script>
