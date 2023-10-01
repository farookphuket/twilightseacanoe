<?php 

function dayToGo($str){
  $today = time();
  $day_input = strtotime($str);
  $x = $day_input - $today;
  $days_label = "day";
  //echo "the x is $x<br />";
  if ($x > 0) :
    $diff = round($x / (60 * 60 * 24));

    if ($x > 1) :
      $days_label = "days";

    endif;

    $msg = "in <span style='font-weight:bold;color:green;'> $diff $days_label</span><br />";
  else :

    $xShow = date_format(date_create($str),"Y-m-d");
    $msg = "<span style='font-weight:bold;color:red;'>$xShow has done?</span><br />";
   // echo "Error! you choose wrong day<br />";
  endif;
  return $msg;
}

function showCompany($text = ''){
  if(!$text || $text=''):
  $text = "Twilight <br />Sea Canoe";
  endif;
  return $text;
}
