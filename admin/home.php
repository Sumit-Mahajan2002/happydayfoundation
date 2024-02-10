<?php
include_once './includes/sidebar.php';
?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php
                include_once './includes/topbar.php';
                ?>
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">Home</h1>

                    <?php
                    if(isset($_GET['slider'])) {
                        include_once './pages/website-edits/home/manage-slider.php';
                    }
                    elseif(isset($_GET['componentsToShow'])){
                        include_once './pages/website-edits/home/components-to-show.php';
                    }
                    
                    
                    ?>

                </div>

            </div>
<?php
include_once './includes/footer.php';
?>