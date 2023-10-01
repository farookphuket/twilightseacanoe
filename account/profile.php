<?php
require_once("./auth_user.php");


$api = $_SERVER["DOCUMENT_ROOT"] . "/api/account.php";
$env_file = $_SERVER["DOCUMENT_ROOT"] . "/account/account_env.php";
require_once($api);
require_once($env_file);

$edit_user = $accountProfileEdit();
?>
<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once("./components/head-tag.php");
  ?>
  <title><?php echo $_SESSION["NAME"]; ?>'s profile Account Manage</title>
  <meta name="keywords" content="account profile">
  <meta name="description" content="Account profile">

</head>

<body>

  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

  <div class="wrapper">

    <!-- Sidebar left START -->
    <?php include_once("./components/sidebar-left.php"); ?>
    <!-- Sidebar left END -->

    <div class="main-panel">

      <?php include_once("./components/sidebar-fix.php"); ?>
      <!-- 
    END of sidebar style
-->

      <!-- Topnav START -->
      <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <?php include_once("./components/topnav.php"); ?>
      </nav>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <?php while ($row = $edit_user->fetch_array()) : ?>
              <div class="col-md-8">
                <div class="card ">
                  <div class="card-header ">
                    <h4 class="card-title">Edit <?php echo $_SESSION["NAME"]; ?>'s profile</h4>
                    <p class="card-category">
                      แก้ไข Profile ของ <?php echo $row["name"]; ?>
                    </p>

                  </div>
                  <div class="card-body ">

                    <form method="post" action="./_profile_update.php">
                      <div class="row">
                        <div class="col-md-5 pr-1">
                          <div class="form-group">
                            <label>ชื่อผู้ใช้งาน </label>
                            <input type="hidden" name="update_profile" value="<?php echo $row["user_id"];?>" />
                            <input type="text" name="name" id="name" class="form-control" placeholder="User Name" value="<?php echo $row["name"]; ?>">
                          </div>
                        </div>
                        <div class="col-md-3 px-1">
                          <div class="form-group">
                            <label>ชื่อเล่น ชื่อเรียก</label>
                            <input type="text" name="nick_name" id="nick_name" class="form-control" placeholder="Nick Name" value="<?php echo $row["nick_name"] ?>">
                          </div>
                        </div>
                        <div class="col-md-4 pl-1">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $row["email"]; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name ชื่อตัว" value="<?php echo $row["first_name"] ?>">
                          </div>
                        </div>
                        <div class="col-md-6 pl-1">
                          <div class="form-group">
                            <label>Last Name ชื่อสกุล</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name ชื่อสกุล" value="<?php echo $row["last_name"] ?>">
                          </div>
                        </div>
                      </div>


                      <div class="row">

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Avatar URL
                              <span style="color:red;font-weight:bold;">
                                ลิ้งค์รูปจากเนต
                              </span>
                            </label>
                            <textarea class="form-control" name="avatar" id="avatar" placeholder="Avatar URL "><?php echo $row["avatar"]; ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>About Me เกี่ยวกับฉัน</label>
                            <textarea name="comment" id="comment" class="form-control" placeholder="About Me"><?php echo $row["comment"]; ?></textarea>

                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                  <div class="card-footer ">
                    <p>&nbsp;</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-image">
                    <img src="<?php echo $row["avatar"]; ?>" alt="<?php echo $row["name"]; ?>">
                  </div>
                  <div class="card-body">
                    <div class="author">
                      <a href="<?php echo $row["avatar"]; ?>" target="_blank">
                        <img class="avatar border-gray" src="<?php echo $row["avatar"]; ?>" alt="<?php echo $row["email"]; ?>">
                        <h5 class="title">
                          <?php echo $row["first_name"] . " - " . $row["last_name"]; ?>
                        </h5>
                      </a>
                      <p class="description">
                        <?php 
                        $name = $row["name"];
                        $first_name = $row["first_name"];
                        $age = getPersonAge($row["birthday"]);
                        $show = "ชื่อเล่น $name อายุ ".$age;
                        ?>
                        ชื่อจริง  
                        <span style="color:green;font-weight:bold;">
                        <?php echo $first_name;?>
                        </span>
                        <?php echo $show;?>
                      </p>
                    </div>
                    <p class="description text-center">
                      <?php echo $row["comment"]; ?>
                    </p>
                    <?php if($row["created_at"] != $row["updated_at"]):?>
                    <p class="description text-right">
                      last update <?php echo $row["updated_at"];?>
                    </p>
                    <?php endif; ?>
                  </div>
                  <hr>
                  <div class="button-container mr-auto ml-auto">
                    <button href="#" class="btn btn-simple btn-link btn-icon">
                      <i class="fa fa-facebook-square"></i>
                    </button>
                    <button href="#" class="btn btn-simple btn-link btn-icon">
                      <i class="fa fa-twitter"></i>
                    </button>
                    <button href="#" class="btn btn-simple btn-link btn-icon">
                      <i class="fa fa-google-plus-square"></i>
                    </button>
                  </div>
                </div>



              </div>


          </div>
        </div>
      </div>
    <?php endwhile; ?>
    <footer class="footer">
      <div class="container">
        <?php
        $footer = $_SERVER["DOCUMENT_ROOT"] . '/account/components/footer.php';
        require_once($footer);
        ?>
      </div>
    </footer>
    </div>
  </div>

  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>

</body>


<script src="<?php echo $jquery; ?>" type="text/javascript"></script>
<script src="<?php echo $popper; ?>" type="text/javascript"></script>
<script src="<?php echo $bootstrap; ?>" type="text/javascript"></script>
<script src="<?php echo $bt_switch; ?>"></script>

<script src="<?php echo $jq_sharrre; ?>"></script>

<script src="<?php echo $bt_notify; ?>"></script>

<script src="<?php echo $light_bt; ?>" type="text/javascript"></script>

<script src="<?php echo $demo_js; ?>"></script>

<!--
<script type="text/javascript">
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    //demo.initDashboardPageCharts();
    demo.showNotification('top', 'center', 'this is the test', 3)
    //demo.showNotification();

  });
</script>
  -->

</html>
