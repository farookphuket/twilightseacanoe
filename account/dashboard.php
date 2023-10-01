<?php
require_once("./auth_user.php");


$api = $_SERVER["DOCUMENT_ROOT"]."/api/account.php";
$env_file = $_SERVER["DOCUMENT_ROOT"]."/account/account_env.php";
require_once($api);
require_once($env_file);
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
  <title>Account Dashboard</title>
  <meta name="keywords" content="account dashboard">
  <meta name="description" content="Account Dashboard">

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
                  <p class="card-category">24 Hours performance</p>
                </div>
                <div class="card-body ">
                  <div>
                    <form action="">

                    </form>
                  </div>
                </div>
                <div class="card-footer ">
                  <p>this is the footer </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card ">
                <div class="card-header ">
                  <h4 class="card-title">2017 Sales</h4>
                  <p class="card-category">All products including Taxes</p>
                </div>
                <div class="card-body ">
                  <div id="chartActivity" class="ct-chart"></div>
                </div>
                <div class="card-footer ">
                  <div class="legend">
                    <i class="fa fa-circle text-info"></i> Tesla Model S
                    <i class="fa fa-circle text-danger"></i> BMW 5 Series
                  </div>
                  <hr>
                  <div class="stats">
                    <i class="fa fa-check"></i> Data information certified
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card  card-tasks">
                <div class="card-header ">
                  <h4 class="card-title">Tasks</h4>
                  <p class="card-category">Backend development</p>
                </div>
                <div class="card-body ">
                  <div class="table-full-width">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value>
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                          <td>Sign contract for "What are conference organizers afraid of?"</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                              <i class="fa fa-times"></i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value checked>
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                          <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                              <i class="fa fa-times"></i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value checked>
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                          <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                          </td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                              <i class="fa fa-times"></i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" checked>
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                          <td>Create 4 Invisible User Experiences you Never Knew About</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                              <i class="fa fa-times"></i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value>
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                          <td>Read "Following makes Medium better"</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                              <i class="fa fa-times"></i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value disabled>
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                          <td>Unfollow 5 enemies from twitter</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                              <i class="fa fa-times"></i>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                  </div>
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

  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>

</body>


<script src="<?php echo $jquery;?>" type="text/javascript"></script>
<script src="<?php echo $popper;?>" type="text/javascript"></script>
<script src="<?php echo $bootstrap;?>" type="text/javascript"></script>
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
