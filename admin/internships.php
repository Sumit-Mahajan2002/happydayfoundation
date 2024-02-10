<?php
include_once './includes/sidebar.php';
?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php
                include_once './includes/topbar.php';
                ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Internship Applications</h1>

                    <?php
                    if(isset($_GET['viewInternshipApplications'])) {
                        include_once './pages/ngo-services/internships/internship-applications.php';
                    }elseif(isset($_GET['AddInternshipTypes'])) {
                        include_once './pages/ngo-services/internships/internship-types.php';
                    }
                    ?>

                </div>
            </div>
<?php
include_once './includes/footer.php';
?>