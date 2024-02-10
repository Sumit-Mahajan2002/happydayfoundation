<?php 
require_once 'includes/header.php';
?>


  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
          



<?php
$i = 1;
              $sql = "SELECT * FROM home_slider";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {

if($i == 1){
          ?>

            <div class="carousel-item active" style="background-image: url(./admin/uploads/<?php echo $row['image'] ?>)">
              <div class="carousel-container">
                <div class="container">
                  <h2 class="animate_animated animate_fadeInDown"><?= $row['primaryText'] ?></h2>
                  <p class="animate_animated animate_fadeInUp"><?= $row['secondaryText'] ?></p>
                  <a href="campaign.detail.php?id=<?= $row['campaign_id'] ?>" class="btn-get-started scrollto animate_animated animate_fadeInUp">Go To Details</a>
                </div>
              </div>
            </div>

          
          <?php }
else {

?>

 <div class="carousel-item" style="background-image: url(./admin/uploads/<?php echo $row['image'] ?>)">
              <div class="carousel-container">
                <div class="container">
                  <h2 class="animate_animated animate_fadeInDown"><?= $row['primaryText'] ?></h2>
                  <p class="animate_animated animate_fadeInUp"><?= $row['secondaryText'] ?></p>
                  <a href="campaign.detail.php?id=<?= $row['campaign_id'] ?>" class="btn-get-started scrollto animate_animated animate_fadeInUp">Go To Details</a>
                </div>
              </div>
            </div>
<?php 
}
} ?>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section>
  <!-- Done slider -->

  <main id="main">
    
    <div id="blog" class="blog-area">
      <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Campaigns</h2>
              </div>
            </div>
          </div>
          <div class="row">
          
          <?php
            $sql = "SELECT * FROM campaign LIMIT 3";
            $result = $conn->query($sql);
            $campaignsData = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $campaignsData[] = $row;
            ?>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="blog.html">
                    <img src="./admin/uploads/<?= $row['image'] ?>" alt="">
                  </a>
                </div>
                <div class="blog-meta">
                  <span class="date-type">
                    <i class="fa fa-calendar"></i>To Be Raised : <?= $row['fundToRaise'] ?>
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a href="blog.html"><?= $row['name'] ?></a>
                  </h4>
                  <p><?= $row['shortDescription'] ?></p>
                </div>
                <span>
                  <a href="campaign.detail.php?id=<?= $row['id'] ?>" class="ready-btn">Read more</a>
                </span>
              </div>
            </div>
            
            <?php 
                }
            }
            ?>

          </div>
        </div>
      </div>
    </div>    
    <!-- Done Campaign -->

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
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">About Our Organization</h4>
                </a>
                <p><?= $aboutUsData['about_us_text'] ?></p>
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div>
    <!-- Done About -->
    
    <div id="team" class="our-team-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Our Upcoming Work</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <?php 
            $sql = "SELECT * FROM upcoming_work LIMIT 3";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
          ?>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="single-team-member">
                <div class="team-img">
                  <a href="#">
                    <img src="./admin/uploads/<?= $row['image'] ?>" alt="">
                  </a>
                </div>
                <div class="team-content text-center">
                  <h4><?= $row['title'] ?></h4>
                  <p><?= $row['shortDescription'] ?></p>
                </div>
              </div>
            </div>
          <?php } } ?>
        </div>
      </div>
    </div>
    <!-- Done Upcoming Works -->
    
  </main>
  

<?php 
require_once 'includes/footer.php';
?>