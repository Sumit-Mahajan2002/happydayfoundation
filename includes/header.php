<?php
include './includes/config.php';


// about
$sql = "SELECT * FROM about_us WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $aboutUsData = $result->fetch_assoc();
} else {
    $aboutUsData = [];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NGO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1><a href="index.php"><span>NGO</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="about.php">About</a></li>
          <li><a class="nav-link scrollto" href="campaigns.php">Campaigns</a></li>
          <li><a class="nav-link scrollto" href="gallery.php">Gallery</a></li>
          <li class="dropdown"><a href="#"><span>Pages</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="mission.php">Mission</a></li>
              <li><a href="vision.php">Vision</a></li>
              <li><a href="impact.php">Impact</a></li>
              <li><a href="upcomingworks.php">Upcoming Works</a></li>
              <li><a href="internship.php">Apply For Internship</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
          
          <li>
            <a class="nav-link scrollto mx-5" href="campaigns.php" style="
          background: rgb(255 207 94) none repeat scroll 0 0; border: 1px solid #ccc; color: #444; font-size: 16px; font-weight: 700; padding: 12px 30px; text-transform: uppercase; transition: all 0.3s ease 0s; border-radius: 30px; ">Donate</a>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
