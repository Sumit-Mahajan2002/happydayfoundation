<?php 
require_once 'includes/header.php';
?>
<main id="main" class="mt-5">




    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
      <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Contact us</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-phone"></i>
                  <p>
                    Call: <?=$aboutUsData['contact']?><br>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-envelope"></i>
                  <p>
                    Email: <a href="mailto:<?= $aboutUsData['email'] ?>" target="_blank" class=""><?= $aboutUsData['email'] ?></a><br>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-geo-alt"></i>
                  <p>
                    <?= $aboutUsData['address'] ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- Start Google Map -->
            <div class="col-md-6">
              <!-- Start Map -->
              <?= $aboutUsData['maplinks'] ?>
              <!-- End Map -->
            </div>
            <!-- End Google Map -->

            <!-- Start  contact -->
            <div class="col-md-6">
              <div class="form contact-form">
                <form action="includes/process.php" method="post" role="form" class="php-email-form">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="form-group mt-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  </div>
                  <input type="hidden" name="sendMsg_">
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-center"><button type="submit" name="sendMsg_">Send Message</button></div>
                </form>
              </div>
            </div>
            <!-- End Left contact -->
          </div>
        </div>
      </div>
    </div><!-- End Contact Section -->


    
<div class="row no-margin m-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center">Frequently Asked Questions (FAQs)</h2>
                <?php
                
                $sql = "SELECT * FROM faqs";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<div class="accordion" id="accordionExample">';
                    $counter = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="accordion-item">';
                        echo '<h2 class="accordion-header" id="heading' . $counter . '">';
                        echo '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $counter . '" aria-expanded="true" aria-controls="collapse' . $counter . '">';
                        echo $row['question'];
                        echo '</button>';
                        echo '</h2>';
                        echo '<div id="collapse' . $counter . '" class="accordion-collapse collapse" aria-labelledby="heading' . $counter . '" data-bs-parent="#accordionExample">';
                        echo '<div class="accordion-body">';
                        echo $row['answer'];
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $counter++;
                    }
                    echo '</div>';
                } else {
                    echo '<p>No FAQs available at the moment.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>


    
<script>
    
    window.onload = function() {
        var iframes = document.querySelectorAll('iframe');
        iframes.forEach(function(iframe) {
            iframe.style.width = '100%';
        });
    };
    </script>

    
</main>
<?php 
require_once 'includes/footer.php';
?>