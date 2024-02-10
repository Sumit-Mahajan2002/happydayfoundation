<?php 
require_once 'includes/header.php';
?>
<main id="main" class="mt-5">



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
            $sql = "SELECT * FROM campaign";
            $result = $conn->query($sql);
            $campaignsData = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $campaignsData[] = $row;
            ?>

            <div class="col-md-4 col-sm-4 col-xs-12 mt-5">
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


</main>
<?php 
require_once 'includes/footer.php';
?>