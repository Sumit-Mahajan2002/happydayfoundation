<?php 
require_once 'includes/header.php';
?>
<main id="main" class="mt-5">



    <!-- ======= Team Section will be upcoming work ======= -->
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
          $sql = "SELECT * FROM upcoming_work";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="./admin/uploads/<?=$row['image']?>" alt="">
                </a>
              </div>
              <div class="team-content text-center">
                <h4><?=$row['title']?></h4>
                <p><?=$row['shortDescription']?></p>
              </div>
            </div>
          </div>
          
          <?php }}?>

        </div>
      </div>
    </div><!-- End Team Section -->


</main>
<?php 
require_once 'includes/footer.php';
?>