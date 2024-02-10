<?php
include_once './includes/sidebar.php';
?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">


                <?php
                include_once './includes/topbar.php';
                ?>

                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">Campaigns</h1>

                    <?php
                    if(isset($_GET['manageCampaigns'])) {
                        include_once './pages/ngo-services/campaigns/manage-campaigns.php';
                    }
                    ?>

                </div>

            </div>
<?php
include_once './includes/footer.php';
?>