<?php
include_once './includes/sidebar.php';
?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php
                include_once './includes/topbar.php';
                ?>
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">Upcoming Work</h1>

                    <?php include './pages/website-edits/upcomig-works/manage-upcoming-works.php';?>

                    
                </div>

            </div>
<?php
include_once './includes/footer.php';
?>