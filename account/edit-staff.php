<?php
require_once("./auth_user.php"); // this line must be on the top of file

$account_env = $_SERVER["DOCUMENT_ROOT"] . "/account/account_env.php";
require_once($account_env);


// components 
$components_dir = $_SERVER["DOCUMENT_ROOT"] . "/account/components";

$head_tag = $components_dir . "/head-tag.php";

$account_api = $_SERVER["DOCUMENT_ROOT"] . "/api/account.php";
require_once($account_api);

// get the staff
$staff = $getAllStaff();

$edit_id = $_GET["staff_id"];
$edit = 0;
if (isset($_GET["edit"]) == true && $edit_id != 0) :
  $edit = $editStaff($edit_id);
endif;
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
  require_once($head_tag);
  ?>
  <title>editing Staff... </title>
  <meta name="keywords" content="Staff management">
  <meta name="description" content="Staff management">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="./assets/css/demo.css">

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
            <div class="col-md-12">
              <?php
              //the staff info is here now 
              while ($row = $edit["staff"]->fetch_array()) :
              ?>
                <div class="card ">
                  <div class="card-header ">
                    <h4 class="card-title">แก้ไขข้อมูลของพนักงาน
                      <span style="padding:2em;font-weight:bold;color:green;">
                        <?php echo $row["name"]; ?>
                      </span>
                    </h4>
                    <p class="card-category">
                      <span style="font-weight:bold;color:black;">
                        กดปุ่ม "บันทึกข้อมูล <?php echo $row["name"]; ?>" หากท่านต้องการบันทึกการเปลี่ยนแปลง
                      </span>
                    </p>
                  </div>
                  <div class="card-body ">
                    <div style="margin-top:1.5em;">
                      <form action="./_staff_update.php" method="post">
                        <input type="hidden" name="staff_id" id="staff_id" value="<?php echo $row["user_id"]; ?>">
                        <div class="form-group">
                          <label>Name (
                            <span style="font-weight:bold;color:red;">
                              ชื่อภาษาอังกฤษเท่านั้นความยาว 4-8 ตัวอักษรห้ามเว้นวรรค
                            </span>
                            )</label>
                          <input required type="text" name="name" id="name" class="form-control" placeholder="Name..." value="<?php echo $row["name"] ?>">
                        </div>

                        <div class="form-group">
                          <label>First Name (ชื่อภาษาอังกฤษ หรือภาษาไทย)</label>
                          <input type="text" class="form-control" name="fName" id="fName" placeholder="Name..." value="<?php echo $row["first_name"] ?>">
                        </div>

                        <div class="form-group">
                          <label>Family Name (นามสกุลภาษาอังกฤษหรือภาษาไทย)</label>
                          <input type="text" class="form-control" name="lName" id="lName" placeholder="Last Name..." value="<?php echo $row["last_name"] ?>">
                        </div>

                        <div class="form-group">
                          <label>Nick Name (ชื่อเล่น ชื่อเรียก ภาษาอังกฤษหรือภาษาไทย)</label>
                          <input type="text" class="form-control" name="nName" id="nName" placeholder="Nick Name..." value="<?php echo $row["nick_name"] ?>">
                        </div>
                        <div class="form-group">
                          <label>E-mail</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Staff Email..." value="<?php echo $row["email"] ?>">
                        </div>


                        <div class="form-group">
                          <?php

                          $join = date("m/d/Y", strtotime($row["joined_at"]));
                          ?>
                          <label>วันที่สมัคร (เดือน/วัน/ปี)</label>
                          <input type="text" class="form-control" name="joined_at" id="joined_at" placeholder="Joined at..." value="<?php echo $join; ?>">
                        </div>

                        <div class="form-group">

                          <label for="">Birthday (เดือน/วัน/ปี)</label>
                          <input class="form-control" id="birthday" type="text" name="birthday" placeholder="Enter the birthday" value="<?php echo date("m/d/Y", strtotime($row["birthday"])); ?>">
                        </div>

                        <div class="form-group">

                          <div class="row">
                            <div class="col-md-12">

                              <label>Sex


                              </label>
                              <div style="display:flex;justify-content:center;align-self:stretch;">
                                <div>

                                  <?php
                                  $sex = "male";
                                  if ($row["sex"] != "male") :
                                    $sex = "female";

                                  endif;
                                  //       echo "sex is " . $sex;
                                  ?>

                                  <span style="display:inline-block;margin-left:5em;">

                                    <input type="radio" class="form-control" name="sex" value="male" <?php echo ($sex) == "male" ? "checked" : ""; ?>>
                                    Male</span>
                                </div>

                                <div style="margin-left:2em;">

                                  <span style="display:inline-block;">

                                    <input type="radio" class="form-control" name="sex" value="female" <?php echo ($sex) == "female" ? "checked" : ""; ?>>
                                    Female</span>
                                </div>



                              </div>
                            </div>



                            <div style="margin-top:2em;">&nbsp;
                              <hr />
                            </div>
                            <div class="col-md-12">
                              <label for="">Position</label>
                              <div style="display:flex;justify-items:center;justify-content:center;align-self:stretch;">
                                <?php $position = $row["position"]; ?>

                                <span style="display:inline-block;margin-right:2em;">

                                  <input type="radio" class="form-control" name="position" value="lead_guide" <?php echo ($position) == "lead_guide" ? "checked" : ""; ?>>
                                  Lead Guide</span>

                                <span style="display:inline-block;margin-right:2em;">

                                  <input type="radio" class="form-control" name="position" value="paddle_guide" <?php echo ($position) == "paddle_guide" ? "checked" : ""; ?>>
                                  Paddle Guide</span>

                                <span style="display:inline-block;">

                                  <input type="radio" class="form-control" name="position" value="cook" <?php echo ($position) == "cook" ? "checked" : ""; ?>>
                                  Cook</span>

                                <div style="display:inline-block;margin-left:2em;"
                                  class="form-group"> 
                                  <label for="">position</label>
                                  <input 
                                    class="form-control"
                                    name="position" type="text" value="<?php echo $position;?>" />
                                </div>
                              </div>

                            </div>
                          </div>


                        </div>


                        <div class="form-group">
                          <label>หมายเหตุ
                            <span>
                              รายละเอียดอื่นๆ ของพนักงาน ช่องนี้เว้นว่างได้
                            </span>
                          </label>
                          <input type="text" class="form-control" name="comment" id="comment" placeholder="Staff Comment..." value="<?php echo $row["comment"] ?>">
                        </div>

                        <div class="row">
                          <div class="col-md-4">

                            <div class="form-group">
                              <label>ค่าแรงต่อวัน</label>
                              <input type="number" class="form-control" name="pay_rate" id="pay_rate" placeholder="Staff Email..." value="<?php echo $row["pay_rate"] ?>">
                            </div>
                          </div>
                          <div class="col-md-4">

                            <div class="form-group">
                              <label>ค่าแรงเพิ่มเติม
                                <span style="color:purple;font-weight:bold;">
                                  ถ้าไม่มีให้เว้นไว้
                                </span>
                              </label>
                              <input type="number" class="form-control" name="pay_extra" id="pay_extra" placeholder="Staff Email..." value="<?php echo $row["pay_extra"] ?>">
                            </div>
                          </div>
                          <div class="col-md-4">

                            <div class="form-group">
                              <label>หักภาษี
                                <span style="margin-left:1em;color:purple;font-weight:bold;">
                                  ถ้าเว้นว่างจะไม่หักภาษี
                                </span>
                              </label>
                              <input type="number" class="form-control" name="tax_rate" id="tax_rate" placeholder="Staff Email..." value="<?php echo $row["tax_rate"]; ?>">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">

                          <div class="pull-right">

                            <button type="submit" class="btn btn-info btn-fill mr-2">บันทึกข้อมูล
                              <span>
                                <?php echo $row["name"]; ?>
                              </span>
                            </button>

                            <button type="button" class="btn btn-danger btn-fill pull-right" id="btnCancel">ยกเลิก

                            </button>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </form>

                    </div>

                  </div>
                  <div class="card-footer ">
                    &nbsp;
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header ">
                  <h4 class="card-title">รายชื่อพนักงาน</h4>
                  <p class="card-category">All staffs detail including Taxes</p>
                </div>
                <div class="card-body ">

                  <div class="table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                      <?php //var_dump($staff);
                      while ($row = $staff["staff"]->fetch_array()) :
                        $edit_id = $row["user_id"];
                      ?>
                        <tr>
                          <th>Name</th>

                          <td>
                            <?php echo $row["name"]; ?>
                          </td>
                          <th>ชื่อเล่น</th>
                          <td><?php echo $row["nick_name"]; ?></td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td><?php echo $row["email"]; ?></td>
                          <th>ตำแหน่ง</th>
                          <td>
                            <p style="font-size:1.4em;font-weight:bold;color:blueviolet;">

                              <?php
                              $show_position = "What";
                              if ($row["position"] == "lead_guide") :
                                $show_position = "หลีดไกด์";
                              elseif ($row["position"] == "paddle_guide") :
                                $show_position = "ไกด์";
                              elseif ($row["position"] == "cook") :
                                $show_position = "กุ๊ก..";
                              endif;
                              echo $show_position;
                              ?>
                            </p>
                          </td>
                          <th> คลิกที่รูปเพื่อดูรูปเต็ม</th>
                          <td style="width:20%;"> 
                            <div style="width:50px;height:50px;">
                              <a style="margin-left:2em;" href="<?php echo $row["avatar"];?>" target="_blank">

                              <img 
                                class="avatar border-gray" src="<?php echo $row["avatar"];?>" alt="<?php echo $row["email"];?>">
                              </a>

                            </div>    
                          </td>
                        </tr>
                        <tr>
                          <th>ค่าแรงรายวัน</th>
                          <td>
                            <?php echo $row["pay_rate"]; ?>
                          </td>
                          <th>ค่าแรงเพิ่มเติม</th>
                          <td><?php echo $row["pay_extra"]; ?></td>
                          <th>หักภาษี
                            <span style="color:blue;font-weight:bold;">คิดเป็น %</span>
                          </th>
                          <td><?php echo $row["tax_rate"]; ?>%</td>
                        </tr>
                        <tr>
                          <th>เพศ </th>
                          <td>
                            <?php 
                            $sex = $row["sex"];
                            $show_sex = "Male";
                            switch($sex):
                            case"female":
                            $show_sex = "Female";
                            break;
                            default:
                            $show_sex = "ชาย";
                            break;

                            endswitch;
                            
                            ?>
                            <span style="font-weight:bold;color:navy;font-size:1.6em;">
                              <?php echo $show_sex; ?>
                            </span>
                          </td>
                          <th>วันเกิด</th>
                          <td> 
                            <?php echo date("d-m-Y", strtotime($row["birthday"])); ?>
                          </td>
                          <th> อายุ </th>
                          <td>
                            <?php echo getPersonAge($row["birthday"]); ?>
                          </td>
                          <th>Manage</th>
                          <td>
                            <div class="text-right">

                              <a class="btn btn-primary" href="/account/edit-staff.php?edit=true&staff_id=<?php echo $edit_id; ?>">แก้ไข
                                <span style="margin-left:0.6em;">
                                  <?php echo $row["name"]; ?>
                                </span>
                              </a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                      <?php
                      endwhile;
                      ?>
                    </table>
                  </div>


                </div>
                <div class="card-footer ">
                  &nbsp;
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
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
  <!--

<script>
      // Facebook Pixel Code Don't Delete
      !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','//connect.facebook.net/en_US/fbevents.js');

      try{
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      }catch(err) {
        console.log('Facebook Track Error:', err);
      }
    </script>
-->

  <!--
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7e4f63f2da4fee31","version":"2023.4.0","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}' crossorigin="anonymous"></script>
    -->
</body>

<!--
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
-->

<script src="<?php echo $jquery; ?>" type="text/javascript"></script>
<script src="<?php echo $popper; ?>" type="text/javascript"></script>
<script src="<?php echo $bootstrap; ?>" type="text/javascript"></script>
<script src="<?php echo $bt_switch; ?>"></script>
<!--
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
-->
<!--
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
-->

<!--
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
-->

<!--
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
-->

<!--
<script src="./assets/js/plugins/chartist.min.js"></script>
  -->
<!--
<script src="./assets/js/plugins/jquery.sharrre.js"></script>
-->

<!--
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
-->

<!--
<script src="./assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
-->
<script src="<?php echo $jq_sharrre; ?>"></script>

<script src="<?php echo $bt_notify; ?>"></script>

<script src="<?php echo $light_bt; ?>" type="text/javascript"></script>

<script src="<?php echo $demo_js; ?>"></script>


<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<?php
$error_msg = "this is Error message of test!!";
$_GET["error_msg"] = $error_msg;
if (isset($_GET["error_msg"])) :
?>
  <!--
  <script type="text/javascript">
    $(document).ready(function() {
      demo.showNotification('bottom', 'right', "<?php //echo $_GET["error_msg"]; 
                                                ?>", 4)
      //demo.showNotification();

    });
  </script>
  -->
<?php endif; ?>

<script>
  $(document).ready(function() {
    $("#btnEdit").click(function(id) {
      let edit_id = $(this).attr("data-id")
      let urlTo = "/account/edit-staff.php?edit=true&staff_id=" + encodeURIComponent(edit_id)
      // redirect to edit page
      window.location = urlTo
    })

    $("#btnCancel").click(function() {
      window.location = "/account/staff.php"
    })


    $("#joined_at").datepicker()
    $("#birthday").datepicker()
  })
</script>

</html>
