<?php
require_once("./auth_user.php");

// the environment variable
$account_env = $_SERVER["DOCUMENT_ROOT"] . "/account/account_env.php";
require_once($account_env);

$api = $_SERVER["DOCUMENT_ROOT"] . "/api/account.php";
require_once($api);

$get_today_pay = $getTodayPay();

$get_staff = $getAllStaff();
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
  <title>Daily payment</title>
  <meta name="keywords" content="daily payment">
  <meta name="description" content="daily payment">

  <link rel="stylesheet" href="<?php echo $datePickerCss; ?>">

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
              <div class="card ">
                <div class="card-header ">
                  <h4 class="card-title">Payment Form</h4>
                  <p class="card-category">
                    บันทึกรายจ่ายใหม่
                  </p>
                </div>
                <div class="card-body ">
                  <div style="margin-top:2em;">
                    <form action="./_pay_add.php" method="post">

                      <fieldset style="border:2px dashed blueviolet;margin-bottom:2em;">
                        <legend>
                          ระบุรายการใบรายจ่าย
                        </legend>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="">ใบรายจ่ายสำหรับทัวร์ชื่อ</label>
                              <input id="tour_name" type="text" name="tour_name" class="form-control">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">ใช้เรือใหญ่กี่ลำ</label>
                              <input id="boat_count" type="number" name="boat_count" class="form-control">
                            </div>
                          </div>

                          <div class="col-md-8">
                            <div class="form-group ml-4">
                              <label for="">คำอธิบายเพิ่มเติม</label>
                              <input id="work_report" type="text" name="work_report" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group ml-4">
                              <label for="">วันที่บันทึก
                                <span style="font-weight:bold;color:red;font-size:1.4em;">
                                  หากวันที่บันทึกไม่ใช่วันนี้ (<?php echo date("Y-m-d"); ?>) กรุณาระบุที่นี่
                                </span>
                              </label>
                              <input id="tour_day" type="text" name="tour_day" class="form-control">
                            </div>
                          </div>

                        </div>
                      </fieldset>

                      <fieldset style="border:2px dashed blueviolet;margin-bottom:2em;">
                        <legend> เลือกรายชื่อพนักงาน</legend>
                        <div class="form-group ml-4">
                          <ul>
                            <?php while ($usr = $get_staff["staff"]->fetch_array()) : ?>
                              <li style="display:inline-block;margin:2em;">
                                <label for="" style="padding:2px;">

                                  <input class="form-control" type="checkbox" name="staff_id[]" value="<?php echo $usr["user_id"]; ?>" id="staff_id[]">


                                  <span style="color:blue;font-weight:bold;">

                                    <?php echo $usr["nick_name"] . " - " . $usr["first_name"]; ?>
                                  </span>
                                  <span style="border-left:1px solid burlywood;margin-left:0.7em;padding:1px;color:blueviolet;font-weight:bold;">&nbsp;
                                    <?php echo $usr["pay_rate"]; ?>
                                  </span>
                                </label>
                              </li>
                            <?php endwhile; ?>
                          </ul>
                        </div>
                      </fieldset>

                      <fieldset style="border:2px dashed blueviolet;margin-bottom:2em;">
                        <legend> บันทึกรายการรายจ่าย</legend>
                        <div class="control-group ml-4">

                          <?php
                          for ($i = 0; $i < 5; $i++) :
                          ?>
                            <div class="row">
                              <div class="col-md-6">

                                <div class="form-group">
                                  <label>รายการ (
                                    <span style="font-weight:bold;color:red;">
                                      รายการ รายจ่าย ภาษาไทยหรือภาษาอังกฤษ
                                    </span>
                                    )</label>
                                  <input type="text" name="pay_list[]" id="pay_list[]" class="form-control" placeholder="Name...">
                                </div>
                              </div>
                              <div class="col-md-6">

                                <div class="form-group">
                                  <label>ราคา </label>
                                  <input type="number" name="price[]" id="price[]" class="form-control" placeholder="number only eg:123456">
                                </div>
                              </div>
                            </div>
                          <?php endfor; ?>
                        </div>
                      </fieldset>

                      <div class="form-group">

                        <button type="submit" class="btn btn-info btn-fill pull-right">บันทึกข้อมูลใหม่</button>
                        <div class="clearfix"></div>
                      </div>
                    </form>

                  </div>
                </div>
                <div class="card-footer ">

                </div>
              </div>
            </div>

            <!-- show Table paylist START -->
            <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">
                      รายการรายจ่าย
                    </h4>
                    <p class="card-category">
                      รายการรายจ่าย
                    </p>
                </div>
                <div class="card-body table-full-width table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                      <th>ID ผู้บันทึก </th>
                      <th>รายการ</th>
                      <th>ราคา</th>
                      <th>วันที่บันทึก</th>
                    </thead>
                    <?php while ($row = $get_today_pay->fetch_array()) : ?>
                      <tr>
                        <th><?php echo $row["name"] . " ( ID " . $row["user_id"] . " )"; ?> </th>
                        <td>
                          <?php echo $row["pay_list"]; ?>
                        </td>
                        <td><?php echo $row["price"]; ?></td>
                        <td>
                          <?php
                          $is_report_later = false;
                          $show_date_report = date_format(date_create($row["created_at"]),"Y-m-d");
                          if ($row["reported_at"] != $row["created_at"]) :
                            $is_report_later = true;
                            $show_date_report = date_format(date_create($row["reported_at"]), "Y-m-d");
                          endif;
                          ?>
                          <span> 
                      <?php echo $show_date_report;?>
                          </span>
                        </td>
                      </tr>
                    <?php endwhile; ?>
                  </table>
                </div>
              </div>
            </div>
            <!-- show Table paylist END -->

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

<script src="<?php echo $jquery_ui; ?>"></script>



<script>
  $(document).ready(function() {
    $("#tour_day").datepicker()

  })
</script>

</html>
