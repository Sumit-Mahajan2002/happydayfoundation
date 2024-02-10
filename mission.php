<?php 
require_once 'includes/header.php';
?>
<main id="main" class="mt-5">


    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Mission </h2>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">We are on the mission</h4>
                </a>
                <p><?= $aboutUsData['mission'] ?></p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="assets/img/mission.jpg" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
</main>
<?php 
require_once 'includes/footer.php';
?>