
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
    </div>
    <div class="card-body">
    <?php
        $result = $conn->query("SELECT * FROM contact_us_form");

        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Name</th>';
            echo '<th>E-mail</th>';
            echo '<th>Subject</th>';
            echo '<th>Message</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['subject'] . '</td>';
                echo '<td>' . $row['msg'] . '</td>';
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
