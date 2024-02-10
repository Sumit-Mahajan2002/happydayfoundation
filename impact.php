<?php 
require_once 'includes/header.php';
?>
<main id="main" class="mt-5">


    <div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Impact</h1>
                </div>
                <div class="layer3">
                  <h2 class="title3">Our Impact On Socity</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="blog-page area-padding">
      <div class="container">
        <div class="row align-iem-center justify-content-center">
            
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                
                <article class="blog-post-wrapper">
                  <div class="post-information">
                    <h2>Impact on socity</h2>
                    <div class="entry-meta"> </div>
                    <div class="entry-content">
                        
                      <blockquote>
                        <p><?= $aboutUsData['impact'] ?></p>
                      </blockquote>
                    </div>
                  </div>
                </article>
                <div class="clear"></div>
                
                
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