<?php
require_once(__DIR__ . "/../api/visitor.php");
$v = $visitor();
?>
<!-- ======= Footer ======= -->
<footer id="footer">


  <div class="container">

    <!-- visitor section start -->
    <div style="margin-top:4em;text-align:center;margin-right:0.7em;">

      <div style="text-align:left;padding-left:2em;">
        <div style="font-size:1.2em;font-weight:bold;">
          <p> 
visitor
          </p>
          </div>
        <div style="margin-bottom:-4em;">
          <p>

            <span style="font-weight:bold;">Today</span>&nbsp;&middot;
            <span style="font-weight:bold;padding-right:1em;">[&nbsp;<?php echo $v["visited_today"]; ?> ]</span>

            <span style="font-weight:bold;">This Month</span>&nbsp;&middot;
            <span style="font-weight:bold;padding-right:1em;">[&nbsp;<?php echo $v["visited_month"]; ?> ]</span>



          </p>
          <p style="margin-top:-3.7em;float:right;">

            <span style="font-weight:bold;">All</span>&nbsp;&middot;
            <span style="font-weight:bold;">[&nbsp;<?php echo $v["visited_all"]; ?> ]</span>
          </p>
          <p style="margin-top:-1.9em;text-align:right;margin-right:1.4em;">

            <span style="font-weight:bold;">IP</span>&nbsp;&middot;
            <span style="font-weight:bold;">[&nbsp;<?php echo $v["ip"]; ?>]</span>
          </p>
        </div>
      </div>
    </div>
    <!-- visitor section END -->

    <div class="col-lg-12">

      <div class="copyright">
        <span style="margin-left:-11em;">
          &copy; Copyright
        </span>
        <br /><strong>Phuket Andaman Twilight Phuket</strong>
        All Rights Reserved
      </div>
    </div>
    <div class="credits">
      <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
      -->
      <p>

        Designed by <a href="https://expressdata.co.th/" target="_blank">Expressdata</a>
      </p>


    </div>
  </div>


</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->
