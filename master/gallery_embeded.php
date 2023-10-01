<?php
$photo_api = $_SERVER["DOCUMENT_ROOT"] . "/api/photo_api.php";
require_once($photo_api);

$getPhoto = $getAllPhotos();

//var_dump($getPhoto);

?>
<section id="gallery" class="gallery">

  <div class="container" data-aos="fade-up">
    <div class="section-title text-center">
      <h2>Photo <span>Gallery</span></h2>

    </div>
  </div>

  <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-0">

      <?php while ($row = $getPhoto->fetch_array()) : ?>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="<?php echo $row["photo_url"]; ?>" class="gallery-lightbox" data-gall="gallery-item">
              <img src="<?php echo $row["photo_url"]; ?>" alt="<?php echo $row["photo_alt"]; ?>" class="img-fluid" />
            </a>
          </div>
        </div>
      <?php endwhile; ?>
<!-- 

<a href="https://ibb.co/Vxcmnwn"><img src="https://i.ibb.co/ZSpm424/photo3.jpg" alt="photo3" border="0"></a>
<a href="https://ibb.co/9r7CQPJ"><img src="https://i.ibb.co/VqsPf6d/photo2.jpg" alt="photo2" border="0"></a>
<a href="https://ibb.co/9pnk1cC"><img src="https://i.ibb.co/51TgSGf/photo1.jpg" alt="photo1" border="0"></a>
<a href="https://ibb.co/9qb0krv"><img src="https://i.ibb.co/dQPvw5c/j29.jpg" alt="j29" border="0"></a>
-->

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../images/photo2.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../images/photo2.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../images/photo3.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../images/photo3.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../images/photo4.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../images/photo4.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>




      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j1.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j1.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j2.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j2.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j3.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j3.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j4.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j4.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j5.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j5.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j6.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j6.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j7.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j7.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j8.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j8.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j9.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j9.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j10.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j10.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j11.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j11.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j12.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j12.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j13.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j13.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j14.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j14.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j15.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j15.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j16.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j16.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j17.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j17.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j18.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j18.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j19.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j19.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j20.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j20.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j21.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j21.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j22.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j22.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j23.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j23.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j24.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j24.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j25.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j25.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j26.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j26.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j27.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j27.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="../assets/img/j28.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="../assets/img/j28.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>





    </div>

  </div>
</section><!-- End Gallery Section -->
