<?php

echo $_POST["agency_name"];

$user_api = $_SERVER["DOCUMENT_ROOT"] . "/api/user.php";
require_once($user_api);

$agency_api = $_SERVER["DOCUMENT_ROOT"] . "/api/agency_api.php";
require_once($agency_api);

$user_data = [
  "name" => $_POST["agency_name"],
  "email" => $_POST["email"],
  "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
  "role" => 6,
];

// create new user in table "tws_users" and set role for this user to "agency"
$newUser = $createNewUser($user_data);

// agency data
$agency_data = [
  "agency_name" => $user_data["name"],
  "tel" => $_POST["tel"]

];

if ($newUser["error"] != 1) :
  // if not error from create new user then create the agency 
  $agency_data["user_id"] = $newUser["user_id"];
  $newAgency = $saveAgency($agency_data);
else :
  // if cannot create new user stop script 
  echo "<br /><hr />Staus is Error! &nbsp;" . $newUser["msg"] . "<br />";
?>
  <script>
    let t1 = setTimeout(() => {
      location.pathname = "/booking/agency.php"
    }, 4500)
    t1()
    clearTimeout(t1)
  </script>
<?php
endif;
if ($newAgency["agency_id"] == 0) :
  // error 
  echo"<span style='font-weight:bold;color:red;'>";
  echo "Error! something went wrong!";
  echo"</span>";
else :

  echo"<span style='font-weight:bold;color:green;'>";
  echo "Success! data has been save";
  echo"</span>";
  $id = $newAgency["agency_id"];
  $url = "/booking/agency.php?edit_id=" . $id;
?>
  <script>


    let t2 = setTimeout(() => {
      location.href = "<?php echo $url; ?>"
    }, 4500)
    t2()
    clearTimeout(t2)
  </script>
<?php
endif;
