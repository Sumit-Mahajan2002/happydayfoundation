<?php
session_start();
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$activeSubPage = $_GET;
include './db/config.php';

$UID = $_SESSION['user_id'];
if(!isset($UID)){
    header('location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/admin.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    

    
    <!-- For Tables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                
                <div class="sidebar-brand-text mx-3">N G O <sup> Admin </sup></div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item <?= ($activePage == 'dashboard') ?  'active': '';?>">
                <a class="nav-link " href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item <?= ($activePage == 'messages') ?  'active': '';?>">
                <a class="nav-link " href="messages.php?viewall=1">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Messages</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                NGO Services
            </div>

            
            <li class="nav-item <?= ($activePage == 'donations') ?  'active': '';?>">
                <a class="nav-link <?= ($activePage == 'donations') ?  '': 'collapsed';?>" href="#" data-toggle="collapse" data-target="#collapseDonations"
                    aria-expanded="true" aria-controls="collapseDonations">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Donations</span>
                </a>
                <div id="collapseDonations" class="collapse <?= ($activePage == 'donations') ?  'show': '';?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Components:</h6>
                        
                        <a class="collapse-item <?= ($activeSubPage['viewDonation'] ?? '') ?  'active': '';?>" href="./donations.php?viewDonation=1">View Donations</a>
                    </div>
                </div>
            </li>

            <li class="nav-item <?= ($activePage == 'internships') ?  'active': '';?>">
                <a class="nav-link <?= ($activePage == 'internships') ?  '': 'collapsed';?>" href="#" data-toggle="collapse" data-target="#collapseX"
                    aria-expanded="true" aria-controls="collapseX">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Internship</span>
                </a>
                <div id="collapseX" class="collapse <?= ($activePage == 'internships') ?  'show': '';?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Internship:</h6>
                        <a class="collapse-item <?= ($activeSubPage['viewInternshipApplications'] ?? '') ?  'active': '';?>" href="./internships.php?viewInternshipApplications=1">Internship Applications</a>
                        <a class="collapse-item <?= ($activeSubPage['AddInternshipTypes'] ?? '') ?  'active': '';?>" href="./internships.php?AddInternshipTypes=1">Add Internship Types</a>
                    </div>
                </div>
            </li>

            <li class="nav-item <?= ($activePage == 'campaigns') ?  'active': '';?>">
                <a class="nav-link <?= ($activePage == 'campaigns') ?  '': 'collapsed';?>" href="#" data-toggle="collapse" data-target="#collapseCampaigns"
                    aria-expanded="true" aria-controls="collapseCampaigns">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Campaigns</span>
                </a>
                <div id="collapseCampaigns" class="collapse <?= ($activePage == 'campaigns') ?  'show': '';?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Campaigns:</h6>
                        <a class="collapse-item <?= ($activeSubPage['manageCampaigns'] ?? '') ?  'active': '';?>" href="./campaigns.php?manageCampaigns=1">Manage Campaigns</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Website Edits
            </div>

            
            <li class="nav-item <?= ($activePage == 'home') ?  'active': '';?>">
                <a class="nav-link <?= ($activePage == 'home') ?  '': 'collapsed';?>" href="#" data-toggle="collapse" data-target="#collapseHome"
                    aria-expanded="true" aria-controls="collapseHome">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Home Screen</span>
                </a>
                <div id="collapseHome" class="collapse <?= ($activePage == 'home') ?  'show': '';?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Edit Components:</h6>
                        <a class="collapse-item <?= ($activeSubPage['slider'] ?? '') ?  'active': '';?>" href="./home.php?slider=1">Slider</a>
                    </div>
                </div>
            </li>
            
            
            <li class="nav-item <?= ($activePage == 'about') ?  'active': '';?>">
                <a class="nav-link <?= ($activePage == 'about') ?  '': 'collapsed';?>" href="#" data-toggle="collapse" data-target="#collapseAboutUs"
                    aria-expanded="true" aria-controls="collapseAboutUs">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>About Us</span>
                </a>
                <div id="collapseAboutUs" class="collapse <?= ($activePage == 'about') ?  'show': '';?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Edit About Us:</h6>
                        <a class="collapse-item <?= ($activeSubPage['manage_about'] ?? '') ?  'active': '';?>" href="./about.php?manage_about=1">About</a>
                        <a class="collapse-item <?= ($activeSubPage['manage_mission'] ?? '') ?  'active': '';?>" href="./about.php?manage_mission=1">Mission</a>
                        <a class="collapse-item <?= ($activeSubPage['manage_vision'] ?? '') ?  'active': '';?>" href="./about.php?manage_vision=1">Vision</a>
                        <a class="collapse-item <?= ($activeSubPage['manage_impact'] ?? '') ?  'active': '';?>" href="./about.php?manage_impact=1">Impact</a>
                        <a class="collapse-item <?= ($activeSubPage['manage_contact_information'] ?? '') ?  'active': '';?>" href="./about.php?manage_contact_information=1">Contact Information</a>
                        <a class="collapse-item <?= ($activeSubPage['manage_faq'] ?? '') ?  'active': '';?>" href="./about.php?manage_faq=1">Manage FAQs</a>
                    </div>
                </div>
            </li>

            <li class="nav-item <?= ($activePage == 'gallery') ?  'active': '';?>">
                <a class="nav-link <?= ($activePage == 'gallery') ?  '': 'collapsed';?>" href="#" data-toggle="collapse" data-target="#collapseGallery"
                    aria-expanded="true" aria-controls="collapseGallery">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Gallery</span>
                </a>
                <div id="collapseGallery" class="collapse <?= ($activePage == 'gallery') ?  'show': '';?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Edit Gallery:</h6>
                        <a class="collapse-item <?= ($activeSubPage['manage-galery'] ?? '') ?  'active': '';?>" href="./gallery.php?manage-galery=1">Manage</a>
                        <a class="collapse-item <?= ($activeSubPage['add-new-tags'] ?? '') ?  'active': '';?>" href="./gallery.php?add-new-tags=1">Add New Tags</a>
                    </div>
                </div>
            </li>

            <li class="nav-item <?= ($activePage == 'upcoming-work') ?  'active': '';?>">
                <a class="nav-link <?= ($activePage == 'upcoming-work') ?  '': 'collapsed';?>" href="#" data-toggle="collapse" data-target="#collapseUpcomingWork"
                    aria-expanded="true" aria-controls="collapseUpcomingWork">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Upcoming Works</span>
                </a>
                <div id="collapseUpcomingWork" class="collapse <?= ($activePage == 'upcoming-work') ?  'show': '';?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Edit Upcoming Works:</h6>
                        <a class="collapse-item <?= ($activeSubPage['manage'] ?? '') ?  'active': '';?>" href="./upcoming-work.php?manage=1">Manage</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Account
            </div>

            <li class="nav-item <?= ($activePage == 'settings') ?  'active': '';?>">
                <a class="nav-link <?= ($activePage == 'settings') ?  '': 'collapsed';?>" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Account</span>
                </a>
                <div id="collapsePages" class="collapse <?= ($activePage == 'settings') ?  'show': '';?>" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Account management:</h6>
                        <a class="collapse-item <?= ($activeSubPage['profile'] ?? '') ?  'active': '';?>" href="settings.php?profile=1">Settings</a>
                        <a class="collapse-item" href="./controller/logout.php">Logout</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>