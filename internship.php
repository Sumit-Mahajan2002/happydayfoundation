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
                <h2>Internship Application</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form contact-form">
                <form action="includes/process.php" enctype="multipart/form-data" method="post" role="form" class="php-email-form">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Full Name" required>
                  </div>
                  <div class="form-group mt-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                  <div class="form-group mt-3">
                    <input type="number" class="form-control" name="contact" id="contact" placeholder="Contact" required>
                  </div>

                  <div class="form-group mt-3">
                      <select class="form-control" id="internship-type" name="internship-type">
                          <option value="" disabled selected>Select Internship</option>
                          <?php
                          $Sql = "SELECT * FROM internship_types";
                          $Result = $conn->query($Sql);

                          while ($Row = $Result->fetch_assoc()) {
                              echo "<option value='" . $Row['internship_name'] . "'>" . $Row['internship_name'] . "</option>";
                          }
                          ?>
                      </select>
                  </div>

                  <div class="input-group mt-3">
                    <div class="mb-3">
                      <label for="resume" class="form-label">Upload Resume</label>
                      <input class="form-control" type="file" id="resume" name="resume" accept=".pdf,.jpeg,.jpg,.docx,.doc,.png">
                    </div>
                  </div>

                  <input type="hidden" name="applyForIntern">
                  
                  
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Applied Successfully</div>
                  </div>

                  <div class="text-center"><button type="submit" name="applyForIntern" id="applyForIntern">Apply</button></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Contact Section -->


</main>
<?php 
require_once 'includes/footer.php';
?>