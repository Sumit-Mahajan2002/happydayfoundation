<?php 
require_once 'includes/header.php';
?>
<main id="main" class="mt-5">


    <!-- ======= Portfolio Section will be gallery ======= -->
    <div id="portfolio" class="portfolio-area area-padding fix">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Gallery</h2>
            </div>
          </div>
        </div>


        <div class="row wesome-project-1 fix">
          <!-- Start Portfolio -page -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul id="portfolio-flters">


            <?php
            $sql = "SELECT * FROM `gallerytags`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $filterValues = [];
                echo '<li data-filter="*" class="filter-active">All</li>';

                while ($row = $result->fetch_assoc()) {
                    echo '<li data-filter=".' . $row['tag'] . '">' . $row['tag'] . '</li>';
                    $filterValues[] = $row['tag'];
                }
            }
            ?>
            </ul>
          </div>
        </div>

        <div class="row awesome-project-content portfolio-container">


          <?php
          $getIMGSQL = "SELECT * FROM `gallery_imgs`";
          $res = $conn->query($getIMGSQL);
          if ($res->num_rows > 0) {
              while ($row = $res->fetch_assoc()) {
                  ?>
            <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item <?=$row['tag']?> portfolio-item">
              <div class="single-awesome-project">
                <div class="awesome-img">
                  <a href="#"><img src="./admin/uploads/<?=$row['image']?>" alt="" /></a>
                  <div class="add-actions text-center">
                    <div class="project-dec">
                      <a class="portfolio-lightbox" data-gallery="myGallery" href="./admin/uploads/<?=$row['image']?>">
                        <h4><?=$row['tag']?></h4>
                        <span>CLICK TO VIEW</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php

              }
          }
          ?>

        </div>
      </div>
    </div><!-- End Portfolio Section -->


</main>
<?php 
require_once 'includes/footer.php';
?>