<?php
include_once './includes/sidebar.php';
?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php
                include_once './includes/topbar.php';
                ?>
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">Messages</h1>

                    <?php
                    if(isset($_GET['viewall'])) {
                        include_once './pages/ngo-services/messages.php';
                    }
                    ?>

                </div>
            </div>
<?php
include_once './includes/footer.php';
?>