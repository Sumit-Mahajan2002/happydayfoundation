<?php

// $sql = "SELECT `name`, `email`, `phone`, `transactionID`, `amount`, `status`, `date` FROM `donations`";
$sql = "SELECT d.`id`, d.`name` AS `donor_name`, d.`email`, d.`phone`, d.`campaign_id`, d.`transactionID`, d.`amount`, d.`status`, d.`date`, c.`name` AS `campaign_name`
FROM `donations` d
JOIN `campaign` c ON d.`campaign_id` = c.`id`";
$result = $conn->query($sql);

?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Donations Received</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Donor Details</th>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Donation For</th>
                        <th>Status</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Donor Details</th>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Donation For</th>
                        <th>Status</th>
                        <th>Date & Time</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    // Loop through the results and display them in the table
                    while ($row = $result->fetch_assoc()) {
                        $color = "#00d100";
                        if($row['status'] != 'Credit') {
                            $color = "red";
                        }
                        
                        echo '<tr>';
                        echo '<td style="color: '.$color.'"><strong>Name: </strong> ' . $row['donor_name'] . '<br><strong>E-mail: </strong> ' . $row['email'] . '<br><strong>Contact: </strong> ' . $row['phone'] . '</td>';
                        echo '<td style="color: '.$color.'">' . $row['transactionID'] . '</td>';
                        
                        echo '<td style="color: '.$color.'"><strong>' . $row['amount'] . '</strong></td>';
                        echo '<td style="color: '.$color.'"><strong>' . $row['campaign_name'] . '</strong></td>';
                        echo '<td style="color: '.$color.'"><strong>' . $row['status'] . '</strong></td>';
                        
                        

                        echo '<td><strong>' . $row['date'] . '</strong></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
// Close the database connection
$conn->close();
?>
