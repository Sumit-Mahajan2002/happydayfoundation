<?php 
require_once 'includes/header.php';
?>
<main id="main" class="mt-5">



    <!-- ======= About Section ======= -->
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>About </h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-7 col-sm-8 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <div class="image" style="height: 500px; width: 100%; background-size: cover; background-image: url(assets/img/about.webp)"></div>
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          <div class="col-md-5 col-sm-4 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">About Our Charity</h4>
                </a>
                <p><?= $aboutUsData['about_us_text'] ?></p>
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div><!-- End About Section -->

    
</main>
<?php 
require_once 'includes/footer.php';
?>