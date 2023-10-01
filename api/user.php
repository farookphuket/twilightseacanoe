<?php

$db = $_SERVER["DOCUMENT_ROOT"] . "/inc/db.php";
require_once($db);


$user_table = "tws_users";
$access_table = "tws_personal_access_token";
$role_table = "tws_roles";
$role_user_table = "tws_role_user";

$user_data = [
  "url" => "/authentication"
];

/** ================================ log out user START
 *
 *
 */
$logOutUser = function ($user_id) use ($access_table, $conn) {
  if (isset($_SESSION["USER_HAS_LOGIN_KEY"])) :
    //echo"<br />the user id is ".$user_id." and token is ".$_SESSION["USER_TOKEN"];
    session_destroy();
    header("location:index.php");
  endif;
};
/** ================================ log out user END
 *
 *
 */

/* ================================= Set token for user
 * -- after login session
 *
 * */
$createUserToken = function ($user) use ($conn, $access_table) {
  $token = $user["token"];
  $email = $user["email"];
  $id = $user["id"];

  $get_1 = "SELECT* FROM `$access_table` WHERE user_id=? AND email=? AND DATE(created_at)=DATE(NOW());";
  $res = $conn->prepare($get_1);
  $res->bind_param("ss", $id, $email);
  $res->execute();
  $res->store_result();


  if ($res->num_rows == 0) :
    $data = "INSERT INTO `$access_table`(user_id,email,token,created_at,updated_at) VALUES('$id','$email','$token',NOW(),NOW());";
    mysqli_query($conn, $data);
  endif;
};

/* ================= SET USER DEFAULT URL =======================
 *
 * */
$setUserDefaultURL = function ($user_id) use ($conn, $user_table, $role_table, $role_user_table) {
  $rData = [];
  $url = "";
  $sql = "SELECT* FROM `$user_table` LEFT JOIN `$role_user_table` ON `$user_table`.id=`$role_user_table`.user_id RIGHT JOIN `$role_table` ON `$role_user_table`.role_id=`$role_table`.id WHERE `$user_table`.id=$user_id;";
  $res = mysqli_query($conn, $sql);
  if ($res->num_rows > 0) :
    while ($row = mysqli_fetch_array($res)) :
      if ($row["role_name"] == "admin" && $row["is_admin"] == true) :

        $_SESSION["USER_IS_ADMIN"] = true;
        $url = "/admin/dashboard.php";
      endif;

      if ($row["role_name"] == "booking") :
        $url = "/booking/dashboard.php";

        $_SESSION["USER_IS_BOOKING"] = true;
      endif;

      if ($row["role_name"] == "account") :
        $url = "/account/dashboard.php";

        $_SESSION["USER_IS_ACCOUNT"] = true;
      endif;


      if ($row["role_name"] == "agency") :
        $url = "/agency/dashboard.php";

        $_SESSION["USER_IS_AGENCY"] = true;
      endif;

      if ($row["role_name"] == "customer") :
        $url = "/customer";
        $_SESSION["USER_IS_CUSTOMER"] = true;
      endif;
      if ($row["role_name"] == "staff") :
        $url = "/staff";
      endif;
    endwhile;
  endif;

  $rData["url"] = $url;

  return $rData;
};

/** ========================================= CHECK USER ========================
 *
 */
$checkUser = function ($email, $pass) use ($conn, $user_table, $user_data, $createUserToken, $setUserDefaultURL) {

  $id = 0;
  $is_admin = 0;
  $name = "";
  $password = "";

  $sql = "SELECT id,name,password,is_admin FROM `$user_table` WHERE email=?";
  $smt = $conn->prepare($sql);
  if ($smt) :
    $smt->bind_param('s', $email);
    $smt->execute();
    $smt->store_result();
  endif;
  if ($smt->num_rows() > 0) :
    $smt->bind_result($id, $name, $password, $is_admin);
    $smt->fetch();
    if (password_verify($pass, $password)) :

      /*
       * SET user session
       * */
      session_regenerate_id();
      $_SESSION["USER_HAS_LOGIN_KEY"] = true;
      //$_SESSION["USER_TOKEN"] = "the random word";
      $ran = openssl_random_pseudo_bytes(16);
      $hex = bin2hex($ran);
      $_SESSION["USER_TOKEN"] = $hex;

      $token = $_SESSION["USER_TOKEN"];

      $_SESSION["NAME"] = $name; // need user name to show session
      $_SESSION["USER_ID"] = $id; // need user id for query

      // user url
      $getUrl = $setUserDefaultURL($id);
      if ($is_admin == true) :
        $_SESSION["USER_IS_ADMIN"] = true;
      endif;

      // user array to create
      $user = [
        "id" => $id,
        "email" => $email,
        "token" => $token
      ];

      //create new token for this user
      $createUserToken($user);

      $user_data["name"] = $name;
      $user_data["token"] = $token;

      $_SESSION["USER_DEFAULT_URL"] = $getUrl["url"];
      $user_data["url"] = $getUrl["url"];

      $user_data["msg"] = "login success";


    else :

      $user_data = [
        "msg" => "login fail!",
        "error" => 1,
        "url" => "/authentication"
      ];
    endif;
  endif;
  return $user_data;
};


/* ========================= Roles =============================
 *
 * */
$getRoles = function () use ($conn, $role_table) {
  $obj = [];
  $sql = "SELECT* FROM `$role_table` WHERE role_name != 'admin';";
  $res = $conn->query($sql);
  $obj = $res;
  return $obj;
};

/* ========================= END Roles =============================
 *
 * */

/* ========================== Set user Role START ======================
 * this object must be above the createNewUser
 * */
$setUserRole = function ($user_id, $role_id) use ($conn, $role_user_table) {
  $sql = "SELECT* FROM `$role_user_table` WHERE user_id='$user_id' AND role_id='$role_id';";
  if ($conn->query($sql)->num_rows == 0) :
    $add = "INSERT INTO `$role_user_table`(user_id,role_id)
VALUES('$user_id','$role_id');";
    $conn->query($add);
  endif;
};
/* ========================== Set user Role END ======================
 *
 * */

/* ========================== Get user all START =====================
 * */
$getUserAll = function () use ($conn, $user_table, $role_user_table, $role_table) {

  // will not include admin user
  $getAll = "SELECT* FROM `$user_table` JOIN `$role_user_table` ON `$role_user_table`.user_id=`$user_table`.id  JOIN `$role_table` ON `$role_user_table`.role_id=`$role_table`.id  WHERE is_admin != true;";
  $qu = $conn->query($getAll);
  return $qu;
};
/* ========================== Get user all END =====================
 * */

/* ========================== Create New User START ======================
 * */
$createNewUser = function ($userObject) use ($conn, $user_table, $setUserRole, $user_data) {
  //var_dump($userObject);
  $name = $userObject["name"];
  $email = $userObject["email"];
  $password = $userObject["password"];
  $role_id = $userObject["role"];
  $user_id = 0; // will set by insert id
  $err = 0;
  $msg = "";
  $get1 = "SELECT* FROM `$user_table` WHERE name='$name' OR email='$email';";
  $res = $conn->query($get1);
  if ($res->num_rows > 0) :
    $err = 1;
    $msg = "Error name or email is existed";
  endif;

  if ($err == 0) :
    $sql = "INSERT INTO `$user_table` (name,email,password,is_admin,activated_at,created_at,updated_at)
VALUES('$name','$email','$password','0',NOW(),NOW(),NOW());";
    $conn->query($sql);

    $user_id = $conn->insert_id;

    // insert role for new user
    $setUserRole($user_id, $role_id);

    $msg = "user has been created at id &nbsp;$user_id &nbsp;role id $role_id";

  endif;

  $user_data["msg"] = $msg;
  $user_data["error"] = $err;
  $user_data["user_id"] = $user_id;

  return $user_data;
};

/* ========================== Create New User END ======================
 * */


/* ========================== Update User Email START =======================
 * */
$updateUserEmail = function ($email, $id) use ($conn, $user_table) {
  $getEmail = "SELECT* FROM `$user_table` WHERE email='$email' AND id!='$id';";
  $res = $conn->query($getEmail);
  $error = 0;
  $msg = "";
  if ($res->num_rows > 0) :
    // email is existed and not belong to this user 
    $error = 1;
    $msg = "Error! the email $email is taken";
  else :
    $conn->query(
    "UPDATE `$user_table` SET email='$email' WHERE id='$id';"
  );
    $msg = "Success! the email have been save";
  endif;
  $data = [
    "error" => $error, 
    "msg" => $msg
  ];
  return $data;
};


/* ========================== Update User Email END =======================
 * */

/* ========================== Update User Name START =======================
 * */
$updateUserName = function($name,$id) use($conn,$user_table){

  $getName = "SELECT* FROM `$user_table` WHERE name='$name' AND id!='$id';";
  $res = $conn->query($getName);
  $error = 0;
  $msg = "";
  if ($res->num_rows > 0) :
    // email is existed and not belong to this user 
    $error = 1;
    $msg = "Error! the name $name is taken";
  else :
    $conn->query(
    "UPDATE `$user_table` SET name='$name' WHERE id='$id';"
  );
    $msg = "Success! the name have been save";
  endif;
  $data = [
    "error" => $error, 
    "msg" => $msg
  ];
  return $data;
};
/* ========================== Update User Name END =======================
 * */
