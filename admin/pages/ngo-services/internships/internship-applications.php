
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Internship Applications</h6>
    </div>
    <div class="card-body">
    <?php
        $result = $conn->query("SELECT * FROM internship_applications");

        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Name</th>';
            echo '<th>Details</th>';
            echo '<th>Internship Type</th>';
            echo '<th>Resume</th>';
            echo '<th>Action</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>Email: ' . $row['email'] . '</br>Phone: ' . $row['phone'] . '</td>';
                echo '<td>' . $row['internship_type'] . '</td>';
                echo '<td><a href="../resumes/' . $row['resume'] . '" target="_blank">View Resume</a></td>';
                echo '<td>';

                if($row['status'] == "pending"){
                    echo '<button class="btn btn-success" onclick="approveApplication(' . $row['id'] . ')">Approve</button>';
                    echo ' <button class="btn btn-danger" onclick="rejectApplication(' . $row['id'] . ')">Reject</button>';
                }elseif($row['status'] == "approved"){
                    echo '<p style="color: green">Approved</p>';
                }elseif($row['status'] == "rejected"){
                    echo '<p style="color: red">Rejected</p>';
                }
                
                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'No data found';
        }
    ?>
    </div>
</div>


<script>
    function approveApplication(applicationId) {
        sendStatusUpdate(applicationId, 'approved');
    }

    function rejectApplication(applicationId) {
        sendStatusUpdate(applicationId, 'rejected');
    }

    function sendStatusUpdate(applicationId, status) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./controller/process.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                location.reload()
            }
        };
        xhr.send("updateStatus=1&applicationId=" + applicationId + "&status=" + status);
    }

    function loadInternshipApplicationsTable() {
        // Implement code to reload or update the table
    }
</script>
