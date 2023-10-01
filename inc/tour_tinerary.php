<?php 

require("db.php");

$tour_id = $_GET["tour_id"];

if(!$tour_id || $tour_id == NULL):
  $tour_id = 1;
endif;

// the table 
$item_1 = "tws_tour";

$get_item_cmd = "SELECT * FROM `$item_1`  WHERE `$item_1`.id = 1";
$query_1 = mysqli_query($conn,$get_item_cmd);

while($row_1 = $query_1->fetch_array()):
?>

    <div class="resume-item" style="margin-top:3em;">
      <h4><?php echo $row_1['tour_name']; ?></h4>
      <p><?php echo $row_1['tour_description']; ?></p>
    </div>
    <?php echo $row_1['tour_detail']; ?>
<?php
endwhile;
?>
