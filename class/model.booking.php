<?php 
class Model_Booking extends DB{

  protected $tb_booking = "tws_booking";
  protected function getBooking(){
    $stmt = $this->connect()->query("SELECT* FROM $this->tb_booking;");
    
    return $stmt;
  }
}
