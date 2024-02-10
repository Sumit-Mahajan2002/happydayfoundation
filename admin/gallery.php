<?php
include_once './includes/sidebar.php';
?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php
                include_once './includes/topbar.php';
                ?>
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">Gallery</h1>

                    <?php
                    if(isset($_GET['manage-galery'])) {
                        include_once './pages/website-edits/gallery/manage-galery.php';
                    }
                    elseif(isset($_GET['add-new-tags'])){
                        include_once './pages/website-edits/gallery/add-new-tags.php';
                    }
                    ?>

                </div>

            </div>
<?php
include_once './includes/footer.php';
?>