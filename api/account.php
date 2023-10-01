<?php

$db_inc = $_SERVER["DOCUMENT_ROOT"] . "/inc/db.php";
require_once($db_inc);
//echo "the path is" . $path_inc . "<br />";
$pay_table = "tws_daily_pay";
$user_table = "tws_users";
$user_role = "tws_role_user";
$staff_table = "tws_staff";
$staff_user = "tws_staff_user";
$work_table = "tws_workdays";
$staff_workday = "tws_staff_workday";

function getPersonAge($birthdate)
{
  $b_date = new DateTime($birthdate);
  $today = new DateTime();
  $date_diff = $today->diff($b_date);
  $years = $date_diff->y;
  $months = ($date_diff->m != 0) ? $date_diff->m . " เดือน " : " ";
  $days = ($date_diff->d != 0) ? $date_diff->d . " วัน " : " ";
  $bd = " $years ปี " . $months . " " . $days;
  return $bd;
}

$saveEmail = function ($email, $user_id = 0) use ($conn, $user_table) {
  // get the email 
  $get_email = "SELECT* FROM `$user_table` WHERE email='$email' AND id != '$user_id';";
  $res = $conn->query($get_email);
  $data = [];
  $msg = "";
  $error = 0;
  if ($res->num_rows == 0) :
    $conn->query("UPDATE `$user_table` SET email='$email',updated_at=NOW()  WHERE id='$user_id';");
    $msg = "Success! update email done";
  else :
    $error = 1;
    $msg = "Error! $email has existed";
  endif;
  $data = [
    "msg" => $msg,
    "error" => $error

  ];
  return $data;
};


$accountProfileEdit = function () use ($conn, $user_table, $staff_table) {
  $user_id = $_SESSION["USER_ID"];
  $sql = "SELECT* FROM `$user_table` JOIN `$staff_table` ON `$user_table`.id=`$staff_table`.user_id WHERE `$user_table`.id='$user_id';";
  $user = $conn->query($sql);
  return $user;
};

$accountUpdateProfile = function ($profile) use ($conn, $user_table, $staff_table, $saveEmail) {
  $user_id = $_SESSION["USER_ID"];
  $email = $profile["email"];
  $name = $profile["name"];

  $msg = "";
  $error = 0;

  // staff table data 
  $avatar = $profile["avatar"];
  $nick_name = $profile["nick_name"];
  $first_name = $profile["first_name"];
  $last_name = $profile["last_name"];
  $comment = $profile["comment"];

  // update email
  $up_email = $saveEmail($email, $user_id);
  $msg = $up_email["msg"];
  $error = $up_email["error"];


  // update name on
  // users table
  $conn->query("UPDATE `$user_table` SET name='$name' WHERE id='$user_id';");

  // update staff table 
  $conn->query("UPDATE `$staff_table` SET 
    first_name='$first_name',
    last_name='$last_name',
    nick_name='$nick_name',
    comment='$comment',
    avatar='$avatar' , 
    updated_at=NOW()
    WHERE user_id='$user_id';    
    ");

  if ($error != 1) :
    $msg = "Success data has been updated";
  endif;
  $data = [
    "msg" => $msg,
    "error" => $error
  ];
  return   $data;
};


/* =========== Create New  ============================= 
 * Workday
 * */
$saveWorkDay = function ($wdData, $edit_id = 0) use ($conn, $work_table) {

  $insert_id = 0;
  $today = date("Y-m-d H:i:s");
  $reported_at = ($wdData["tour_day"] != "") ? date_format(date_create($wdData["tour_day"]), "Y-m-d H:i:s") : $today;
  $tour_name = $wdData["tour_name"];
  $boat_count = $wdData["boat_count"];
  $work_report = $wdData["work_report"];

  $msg = "";

  if ($edit_id == 0) :
    // create new data 
    $sql = "INSERT INTO `$work_table`(`tour_name`,`tour_day`,`boat_count`,`work_report`,`created_at`,`updated_at`) VALUES(
    '$tour_name',
    '$reported_at',
    '$boat_count',
    '$work_report',
    NOW(),
    NOW()
    );";
    $conn->query($sql);
    $insert_id = $conn->insert_id;
    $msg = "Success! สร้างข้อมูลรายงานของวัน $reported_at แล้ว";
  else :

  endif;
  $data = [
    "msg" => $msg,
    "insert_id" => $insert_id
  ];

  return $data;
};

/* ===================== Link pip table ==================
 * insert data to pay_table 
 * create the staff link to
 * work table need the insert
 * id from $createNewWorkDay 
 * */
$staffComeToWorkToday = function ($staff) use ($conn, $user_table, $staff_table, $staff_workday, $pay_table) {

  $s_id = $staff["staff_id"];
  $work_id = $staff["work_id"];
  $report_id = $_SESSION["USER_ID"];

  $today = date("Y-m-d H:i:s");
  $s_tourday = ($staff["tour_day"] != "") ? date_format(date_create($staff["tour_day"]), "Y-m-d H:i:s") : $today;
  $get = "SELECT* FROM `$user_table` JOIN `$staff_table` ON `$user_table`.id=`$staff_table`.user_id WHERE `$user_table`.id='$s_id';";
  $res = $conn->query($get);

  $s_name = "";
  $s_price = 0;
  $msg = "";

  while ($row = $res->fetch_array()) :
    $s_name = $row["name"];
    $s_price = $row["pay_rate"];
    $pay_list = "ค่าแรงพนักงาน $s_name ($s_price/วัน)";

    // insert data to table tws_daily_pay
    $conn->query("INSERT INTO `$pay_table`(`user_id`,`pay_list`,`price`,`reported_at`,`created_at`,`updated_at`) VALUES(
      '$report_id',
      '$pay_list',
      '$s_price',
      '$s_tourday', 
      NOW(), 
      NOW()
      );");

    // insert data to staff_workday table
    $conn->query("INSERT INTO `$staff_workday`(`user_id`,`workday_id`) 
      VALUES(
      '$s_id',
      '$work_id'
      )");

    $msg = "the pay report  $s_name as $s_price on day $s_tourday has been save";
  endwhile;
  $data = [
    "msg" => $msg,
    "user_name" => $s_name
  ];
  return $data;
};



$getTodayPay = function () use ($conn, $pay_table, $user_table) {
  $data = [];
  $sql = "SELECT* FROM `$pay_table` JOIN `$user_table` ON `$user_table`.id=`$pay_table`.user_id;";
  $res = $conn->query($sql);

  $data = $res;
  return $data;
};


/* ==================== Create new pay report 
 * to "tws_daily_pay" table this method 
 * this method concern with $createNewWorkDay
 * */
$createNewPay = function ($p) use ($conn, $pay_table, $getTodayPay) {
  $pay_list = $p["pay_list"];
  $price = $p["price"];
  $today = date("Y-m-d H:i:s");
  $reported_at = ($p["reported_at"] != "") ? date_format(date_create($p["reported_at"]), "Y-m-d H:i:s") : $today;


  $user_id = $_SESSION["USER_ID"];
  $sql = "INSERT INTO `$pay_table`(user_id,pay_list,price,reported_at,created_at,updated_at)
  VALUES(
  '$user_id', 
  '$pay_list', 
  '$price', 
  '$reported_at',
  NOW(), 
  NOW()
  );";

  $conn->query($sql);
  // get the data
  $pay["pay"] = $getTodayPay();
  return $pay["pay"];
};



/* ========== Staff list 
* show in the daily pay form
 * */
$getAllStaff = function () use ($conn, $user_table, $staff_table) {

  $own_id = $_SESSION["USER_ID"];
  $data = [];
  $sql = "SELECT* FROM `$user_table` 
  JOIN `$staff_table` ON `$user_table`.id=`$staff_table`.user_id 
  WHERE `$user_table`.id != '$own_id';";
  $res = $conn->query($sql);
  $data["staff"] = $res;

  return $data;
};

$editStaff = function ($staff_id) use ($conn, $user_table, $staff_table) {

  $data = [];
  $sql = "SELECT* FROM `$user_table` 
  JOIN `$staff_table` ON `$user_table`.id=`$staff_table`.user_id 
  WHERE `$user_table`.id='$staff_id';";
  $res = $conn->query($sql);
  $data["staff"] = $res;

  return $data;
};


$updateStaffEmail = function ($email, $staff_id) use ($conn, $user_table) {
  $get = "SELECT* FROM `$user_table` WHERE email='$email';";
  $res = $conn->query($get);
  $canUpdate = 0;
  if ($res->num_rows == 0) :

    $sql = "UPDATE `$user_table` SET email='$email' WHERE id='$staff_id';";
    $conn->query($sql);
    $canUpdate = 1;
  else :
    while ($row = $res->fetch_array()) :
      if ($row["id"] == $staff_id) :

        $sql = "UPDATE `$user_table` SET email='$email' WHERE id='$staff_id';";
        $conn->query($sql);
        $canUpdate = 1;
      endif;
    endwhile;
  endif;
  return $canUpdate;
};
$updateStaff = function ($staff, $update_id) use ($conn, $user_table, $staff_table, $updateStaffEmail) {

  $name = $staff["name"];
  $email = $staff["email"];

  $nick_name = $staff["nName"];
  $first_name = $staff["fName"];
  $last_name = $staff["lName"];

  $sex = $staff["sex"];
  $position = $staff["position"];
  $joined_at = date_format(date_create($staff["joined_at"]), "Y-m-d H:i:s");
  $birthday = date_format(date_create($staff["birthday"]), "Y-m-d H:i:s");

  $pay_rate = $staff["pay_rate"];
  $pay_extra = $staff["pay_extra"];
  $tax_rate = $staff["tax_rate"];
  $comment = $staff["comment"];
  if ($pay_extra == ' ' || $pay_extra == null) :
    $pay_extra = 0;
  endif;

  if ($tax_rate == ' ' || $tax_rate == null) :
    $tax_rate = 0;
  endif;

  $error = 0;
  $msg = "";

  // update email
  $upEmail = $updateStaffEmail($email, $update_id);
  if ($upEmail != 1) :
    $msg = "Error! คุณไม่สามารถใช้อีเมล $email ได้";
    $error = 1;
  endif;

  // update name 
  $conn->query("UPDATE `$user_table` SET name='$name' WHERE id='$update_id';");

  // update staff table 
  $res = $conn->query("UPDATE `$staff_table` SET 
    first_name='$first_name',
    last_name='$last_name',
    nick_name='$nick_name',
    pay_rate='$pay_rate',
    birthday='$birthday',
    sex='$sex',
    position='$position',
   joined_at='$joined_at',  
    pay_extra='$pay_extra',
    tax_rate='$tax_rate', 
    comment='$comment', 
    updated_at=NOW() 
    WHERE user_id='$update_id';
    ");
  if ($res) :
    $msg = "Success! data has beeen update";
  endif;

  $data = [
    "msg" => $msg,
    "error" => $error
  ];

  return $data;
};


$nameIsExisted = function ($name) use ($conn, $user_table) {
  $sql = "SELECT* FROM `$user_table` WHERE name='$name';";
  $res = $conn->query($sql);
  if ($res->num_rows > 0) :
    return true;
  endif;
  return false;
};


$emailIsExisted = function ($email) use ($conn, $user_table) {
  $sql = "SELECT* FROM `$user_table` WHERE email='$email';";
  $res = $conn->query($sql);
  if ($res->num_rows > 0) :
    return true;
  endif;
  return false;
};



$createNewStaff = function ($user) use (
  $conn,
  $nameIsExisted,
  $emailIsExisted,
  $user_table,
  $staff_table,
  $user_role,
  $staff_user
) {
  $msg = "";

  // user table
  $name = $user["name"];
  $email = $user["email"];
  $pass = password_hash("1234", PASSWORD_DEFAULT);

  $role = 4;
  // staff table
  $nick_name = $user["nName"];
  $first_name = $user["fName"];
  $last_name = $user["lName"];
  $pay_rate = $user["pay_rate"];
  $pay_extra = $user["pay_extra"];
  $tax_rate = $user["tax_rate"];

  $position = $user["position"];
  $joined_at = date_format(date_create($user["joined_at"]), "Y-m-d H:i:s");
  $birthday = date_format(date_create($user["birthday"]), "Y-m-d H:i:s");
  $sex = $user["sex"];

  $comment = $user["comment"];
  $error = 0;
  if ($nameIsExisted($name)) :
    $msg = "Error! ชื่อซ้ำกันลองเปลี่ยนชื่ออื่น";
    $error = 1;
  endif;

  if ($emailIsExisted($user["email"])) :
    $msg = "Error! อีเมลซ้ำกันลองเปลี่ยนอีเมลอื่น";
    $error = 1;
  endif;

  if ($error != 1) :

    // add new user
    $sql = "INSERT INTO `$user_table` (name,email,password,is_admin,activated_at,created_at,updated_at) 
      VALUES(
        '$name','$email','$pass',0,NOW(),NOW(),NOW()
      );";

    $conn->query($sql);
    $u_id = $conn->insert_id;

    // set the user role to staff
    $role_cmd = "INSERT INTO `$user_role` (user_id,role_id) VALUES(
      '$u_id',
      '$role'
    );";

    $conn->query($role_cmd);

    // add new staff to staff table
    $sql_staff = "INSERT INTO `$staff_table` (user_id,first_name,last_name,nick_name,
        pay_rate,pay_extra,tax_rate,position,sex,joined_at,birthday,comment,created_at,updated_at) VALUES (
        '$u_id',
        '$first_name',
        '$last_name',
        '$nick_name',
        '$pay_rate',
        '$pay_extra',
        '$tax_rate',
        '$position', 
        '$sex', 
        '$joined_at', 
        '$birthday', 
        '$comment',
        NOW(), 
        NOW()
    );";

    $conn->query($sql_staff);
    $staff_id = $conn->insert_id;

    $st_2 = "INSERT INTO `$staff_user` (user_id,staff_id)
      VALUES (
      '$u_id',
      '$staff_id'
      );";
    $conn->query($st_2);

    $msg = "Success! เพิ่มพนักงานใหม่แล้ว";
  endif;
  $data["msg"] = $msg;
  $data["error"] = $error;
  return $data;
};


$createNewDayliPay = function () use ($conn, $pay_table) {
  $sql = "SELECT* FROM `$pay_table`";
  $res = $conn->query($sql);

  return $res;
};
