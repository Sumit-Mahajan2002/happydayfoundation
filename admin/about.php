<?php
include_once './includes/sidebar.php';
?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                
                <?php
                include_once './includes/topbar.php';
                ?>

                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">About</h1>
                    
                    <?php
                    if(isset($_GET['manage_about'])) {
                        include_once './pages/website-edits/about-us/manage-about.php';
                    }
                    elseif(isset($_GET['manage_mission'])){
                        include_once './pages/website-edits/about-us/manage-mission.php';
                    }
                    elseif(isset($_GET['manage_vision'])){
                        include_once './pages/website-edits/about-us/manage-vision.php';
                    }
                    elseif(isset($_GET['manage_impact'])){
                        include_once './pages/website-edits/about-us/manage-impact.php';
                    }
                    elseif(isset($_GET['manage_contact_information'])){
                        include_once './pages/website-edits/about-us/manage-contact-information.php';
                    }
                    elseif(isset($_GET['manage_faq'])){
                        include_once './pages/website-edits/about-us/manage-faq.php';
                    }
                    ?>

                </div>

            </div>
<?php
include_once './includes/footer.php';
?>