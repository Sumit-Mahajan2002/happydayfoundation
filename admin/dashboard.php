<?php
include_once './includes/sidebar.php';
?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">


                <?php
                include_once './includes/topbar.php';
                ?>
                
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                    
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                LIVE CAMPAIGNS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $sql = "SELECT COUNT(*) AS live_campaigns_count FROM campaign";
                                                    $result = $conn->query($sql);
                                                    
                                                    if ($result->num_rows > 0) {
                                                        $row = $result->fetch_assoc();
                                                        $liveCampaignsCount = $row['live_campaigns_count'];
                                                        echo $liveCampaignsCount . ' LIVE Campaigns';
                                                    } else {
                                                        $liveCampaignsCount = 0;
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Donations Received</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $sql = "SELECT SUM(amount) as totalDonation FROM `donations` WHERE `status` = 'Credit'";
                                                    $result = $conn->query($sql);
                                                    
                                                    if ($result->num_rows > 0) {
                                                        $row = $result->fetch_assoc();
                                                        $totalDonation = $row['totalDonation'];
                                                        echo ' INR ' . $totalDonation;
                                                    } else {
                                                        $totalDonation = 0;
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Internship Applications
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                        $sql = "SELECT COUNT(`id`) as internshipApplicationCount FROM `internship_applications`";
                                                        $result = $conn->query($sql);
                                                        
                                                        if ($result->num_rows > 0) {
                                                            $row = $result->fetch_assoc();
                                                            $internshipApplicationCount = $row['internshipApplicationCount'];
                                                            echo ' Internshi Applications ' . $internshipApplicationCount;
                                                        } else {
                                                            $internshipApplicationCount = 0;
                                                        }
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Messages</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $sql = "SELECT COUNT(id) as msgCount FROM `contact_us_form`";
                                                $result = $conn->query($sql);
                                                
                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    $msgCount = $row['msgCount'];
                                                    echo 'Messages ' . $msgCount;
                                                } else {
                                                    $msgCount = 0;
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
<?php
include_once './includes/footer.php';
?>