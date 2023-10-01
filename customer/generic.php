<?php

require_once("./auth_user.php"); 

?>
<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
  <title>Generic Page - Massively by HTML5 UP</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <noscript>
    <link rel="stylesheet" href="assets/css/noscript.css" />
  </noscript>
</head>

<body class="is-preload">

  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Header -->
    <header id="header">
      <a href="index.php" class="logo">Massively</a>
    </header>

    <!-- Nav -->
    <nav id="nav">
      <?php include_once("./components/navbar.php"); ?>
    </nav>

    <!-- Main -->
    <div id="main">

      <!-- Post -->
      <section class="post">
        <header class="major">
          <span class="date">April 25, 2017</span>
          <h1>This is a<br />
            Generic Page</h1>
          <p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />
            facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />
            amet nullam sed etiam veroeros.</p>
        </header>
        <div class="image main"><img src="images/pic01.jpg" alt="" /></div>
        <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis
          dolor imperdiet dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim auctor sit amet.
          Pellentesque leo mauris, consectetur id ipsum sit amet, fergiat. Pellentesque in mi eu massa lacinia malesuada
          et a elit. Donec urna ex, lacinia in purus ac, pretium pulvinar mauris. Nunc lorem mauris, fringilla in
          aliquam at, euismod in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
          turpis egestas. Curabitur sapien risus, commodo eget turpis at, elementum convallis enim turpis, lorem ipsum
          dolor sit amet nullam.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus rutrum facilisis. Class aptent taciti
          sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam tristique libero eu nibh
          porttitor fermentum. Nullam venenatis erat id vehicula viverra. Nunc ultrices eros ut ultricies condimentum.
          Mauris risus lacus, blandit sit amet venenatis non, bibendum vitae dolor. Nunc lorem mauris, fringilla in
          aliquam at, euismod in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
          turpis egestas. In non lorem sit amet elit placerat maximus. Pellentesque aliquam maximus risus. Donec eget ex
          magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet
          dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim auctor sit amet. Pellentesque leo mauris,
          consectetur id ipsum.</p>
      </section>

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

    <!-- Copyright -->
    <div id="copyright">
      <ul>
        <li>&copy; Untitled</li>
        <li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
        <li>Demo Images: <a href="https://unsplash.com">Unsplash</a></li>
      </ul>
    </div>

  </div>

  <!-- Scripts -->
  <?php include_once("./components/js-script-link.php"); ?>

</body>

</html>
