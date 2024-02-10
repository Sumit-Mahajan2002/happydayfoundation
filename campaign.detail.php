<?php
require_once 'includes/header.php';

$id = $_GET['id'];
?>
<main id="main" class="mt-5">




    <!-- ======= Blog Header ======= -->
    <div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Campaign Details </h1>
                </div>
                <div class="layer3">
                  <h2 class="title3">Support A Causes, Donate Now</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Blog Header -->

    <!-- ======= Blog Page ======= -->
    <div class="blog-page area-padding">
      <div class="container">
        <div class="row">

        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                
                <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM campaign WHERE id=$id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>

                <article class="blog-post-wrapper">
                  <div class="post-thumbnail">
                    <img src="./admin/uploads/<?=$row['image']?>" alt="" style="height:100%;width:100%;"/>
                    
                  </div>
                  <div class="post-information">
                    <h2><?=$row['name']?></h2>
                    <div class="entry-meta">
                      <span class="author-meta"><i class="bi bi-person"></i> <a href="#">NGO ADMIN</a></span>
                      <span><i class="bi bi-currency-rupee"></i> To Be Raised : <?=$row['fundToRaise']?></span>
                      
                    </div>
                    <div class="entry-content">
                      <p><?=$row['shortDescription']?></p>
                      <blockquote>
                        <p><?=$row['description']?></p>
                      </blockquote>
                    </div>
                  </div>
                </article>

                <?php }}?>

                <div class="clear"></div>

              </div>
            </div>
          </div>


        <div class="col-lg-4 col-md-4">

            <div class="single-post-comments">

                <div class="comment-respond">
                    <h3 class="comment-reply-title">Donate</h3>
                    <form action="payment/pay.php" method="POST">
                        <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <p>Name</p>
                            <input type="text" required name="name" id="name"/>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <p>Email</p>
                            <input type="email" required name="email" id="email"/>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <p>Contact</p>
                            <input type="text" required name="contact" id="contact"/>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <p>Donation Amount</p>
                            <input type="text" required name="donationAmount" id="donationAmount"/>
                        </div>
                        <input type="hidden" name="campaignID" value="<?=$id;?>">
                        <input type="hidden" name="campaignid">

                        <input type="submit" value="Donate" />
                        </div>
                    </form>
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