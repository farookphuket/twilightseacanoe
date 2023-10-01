<?php
$auth_file = $_SERVER["DOCUMENT_ROOT"]."/customer/auth_user.php";
require_once($auth_file);

$customer_api_file = $_SERVER["DOCUMENT_ROOT"]."/api/customer_api.php";
require_once($customer_api_file);

$env_file = [
  "css" => "/customer/assets/css/main.css", 
  "js" => $_SERVER["DOCUMENT_ROOT"]."/customer/components/js-script-link.php",
  "navbar" => $_SERVER["DOCUMENT_ROOT"]."/customer/components/navbar.php", 
  "copyright" => $_SERVER["DOCUMENT_ROOT"]."/customer/components/copyright-footer.php"
];

$link_file = [
  "home" => "/customer/dashboard.php",
];

$img_dir = "/customer/images";
$img_file = [
  "pic01" => $img_dir."/pic01.jpg",
  "pic02" => $img_dir."/pic02.jpg",
  "pic03" => $img_dir."/pic03.jpg",
  "pic04" => $img_dir."/pic04.jpg",
  "pic05" => $img_dir."/pic05.jpg",
  "pic06" => $img_dir."/pic06.jpg",
  "pic07" => $img_dir."/pic07.jpg",
];

?>
<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Welcome <?php echo $_SESSION["NAME"];?></title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo $env_file["css"];?>" />
  <noscript>
    <link rel="stylesheet" href="assets/css/noscript.css" />
  </noscript>
</head>

<body class="is-preload">

  <!-- Wrapper -->
  <div id="wrapper" class="fade-in">

    <!-- Intro -->
    <div id="intro">
      <h1>Twilight<br />
        Sea Canoe</h1>
        <!--
      <p>A free, fully responsive HTML5 + CSS3 site template designed by <a href="https://twitter.com/ajlkn">@ajlkn</a> for <a href="https://html5up.net">HTML5 UP</a><br />
        and released for free under the <a href="https://html5up.net/license">Creative Commons license</a>.</p>
      <ul class="actions">
        <li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
      </ul>
-->
        <p>Welcome 
    <?php echo $_SESSION["NAME"];?> we would like to show your booking information as you made.
        </p>
        <div>
          <p> 
            <?php 
            $x = $getMyCustomerInfo();
            var_dump($x); ?>
          </p>
        </div>
    </div>

    <!-- Header -->
    <header id="header">
        <a href="<?php echo $link_file["home"];?>" class="logo">twilight sea canoe</a>
    </header>

    <!-- Nav -->
    <nav id="nav">
      <?php include_once($env_file["navbar"]); ?>
    </nav>

    <!-- Main -->
    <div id="main">

      <!-- Featured Post -->
      <article class="post featured">
        <header class="major">
            <span class="date">
    <?php 
              $today = date("Y-M-d");
              echo $today;
    ?>
            </span>
          <h2><a href="#">And this is a<br />
              massive headline</a></h2>
          <p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />
            facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />
            amet nullam sed etiam veroeros.</p>
        </header>
<a href="#" class="image main"><img src="<?php echo $img_file["pic01"];?>" alt="" /></a>
        <ul class="actions special">
          <li><a href="#" class="button large">Full Story</a></li>
        </ul>
      </article>

      <!-- Posts -->
      <section class="posts">
        <article>
          <header>
            <span class="date">April 24, 2017</span>
            <h2><a href="#">Sed magna<br />
                ipsum faucibus</a></h2>
          </header>
          <a href="#" class="image fit"><img src="<?php echo $img_file["pic02"];?>" alt="" /></a>
          <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
          <ul class="actions special">
            <li><a href="#" class="button">Full Story</a></li>
          </ul>
        </article>
        <article>
          <header>
            <span class="date">April 22, 2017</span>
            <h2><a href="#">Primis eget<br />
                imperdiet lorem</a></h2>
          </header>
          <a href="#" class="image fit"><img src="<?php echo $img_file["pic03"];?>" alt="" /></a>
          <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
          <ul class="actions special">
            <li><a href="#" class="button">Full Story</a></li>
          </ul>
        </article>
        <article>
          <header>
            <span class="date">April 18, 2017</span>
            <h2><a href="#">Ante mattis<br />
                interdum dolor</a></h2>
          </header>
          <a href="#" class="image fit"><img src="<?php echo $img_file["pic04"];?>" alt="" /></a>
          <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
          <ul class="actions special">
            <li><a href="#" class="button">Full Story</a></li>
          </ul>
        </article>
        <article>
          <header>
            <span class="date">April 14, 2017</span>
            <h2><a href="#">Tempus sed<br />
                nulla imperdiet</a></h2>
          </header>
          <a href="#" class="image fit"><img src="<?php echo $img_file["pic05"];?>" alt="" /></a>
          <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
          <ul class="actions special">
            <li><a href="#" class="button">Full Story</a></li>
          </ul>
        </article>
        <article>
          <header>
            <span class="date">April 11, 2017</span>
            <h2><a href="#">Odio magna<br />
                sed consectetur</a></h2>
          </header>
          <a href="#" class="image fit"><img src="<?php echo $img_file["pic06"];?>" alt="" /></a>
          <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
          <ul class="actions special">
            <li><a href="#" class="button">Full Story</a></li>
          </ul>
        </article>
        <article>
          <header>
            <span class="date">April 7, 2017</span>
            <h2><a href="#">Augue lorem<br />
                primis vestibulum</a></h2>
          </header>
          <a href="#" class="image fit"><img src="<?php echo $img_file["pic07"];?>" alt="" /></a>
          <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
          <ul class="actions special">
            <li><a href="#" class="button">Full Story</a></li>
          </ul>
        </article>
      </section>

      <!-- Footer -->
      <footer>
        <div class="pagination">
          <!--<a href="#" class="previous">Prev</a>-->
          <a href="#" class="page active">1</a>
          <a href="#" class="page">2</a>
          <a href="#" class="page">3</a>
          <span class="extra">&hellip;</span>
          <a href="#" class="page">8</a>
          <a href="#" class="page">9</a>
          <a href="#" class="page">10</a>
          <a href="#" class="next">Next</a>
        </div>
      </footer>

    </div>

    <!-- Footer -->
    <footer id="footer">
      <section>
        <form method="post" action="#">
          <div class="fields">
            <div class="field">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" />
            </div>
            <div class="field">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" />
            </div>
            <div class="field">
              <label for="message">Message</label>
              <textarea name="message" id="message" rows="3"></textarea>
            </div>
          </div>
          <ul class="actions">
            <li><input type="submit" value="Send Message" /></li>
          </ul>
        </form>
      </section>
      <section class="split contact">
        <section class="alt">
          <h3>Address</h3>
          <p>1234 Somewhere Road #87257<br />
            Nashville, TN 00000-0000</p>
        </section>
        <section>
          <h3>Phone</h3>
          <p><a href="#">(000) 000-0000</a></p>
        </section>
        <section>
          <h3>Email</h3>
          <p><a href="#">info@untitled.tld</a></p>
        </section>
        <section>
          <h3>Social</h3>
          <ul class="icons alt">
            <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
          </ul>
        </section>
      </section>
    </footer>

    <?php include_once($env_file["copyright"]); ?>

  </div>

  <!-- Scripts -->
  <?php
  include_once($env_file["js"]);
  ?>

</body>

</html>


