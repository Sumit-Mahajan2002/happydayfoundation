<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Campaign Option</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <form action="./controller/process.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                            </div>
                            <input type="text" class="form-control" id="editCampaignName" name="editCampaignName" aria-label="Name" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Short</br>Description</span>
                            </div>
                            <textarea class="form-control" id="editShortDescription" name="editShortDescription" aria-label="Short Description" placeholder="max 20 words."></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Long</br>Description</span>
                            </div>
                            <textarea class="form-control" id="editLongDescription" name="editLongDescription" aria-label="Long Description"></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Fund To Be Raised: INR</span>
                            </div>
                            <input type="number" class="form-control" id="editFundToRaise" name="editFundToRaise" aria-label="fundtoberaised" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <input type="hidden" id="editCampaignId"  name="editCampaignId">

                        <button type="submit" class="btn btn-primary" name="updateCampaign">Update</button>
                    </form>
        </div>
      </div>
      <div class="modal-footer">
        

      </div>
    </div>
  </div>
</div>













<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New Campaign Option
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Campaign Option</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <form>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                            </div>
                            <input type="text" class="form-control" id="campaignName" aria-label="Name" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Short</br>Description</span>
                            </div>
                            <textarea class="form-control" id="shortDescription" aria-label="Short Description" placeholder="max 20 words."></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Long</br>Description</span>
                            </div>
                            <textarea class="form-control" id="longDescription" aria-label="Long Description"></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Fund To Be Raised: INR</span>
                            </div>
                            <input type="number" class="form-control" id="fundToRaise" aria-label="fundtoberaised" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <button type="button" class="btn btn-primary" onclick="createCampaign()">Create</button>
                    </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- Table -->
<div>
    <div class="card shadow mb-4 mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Current Live Campaigns</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
            $result = $conn->query("SELECT
                c.`id` AS `campaign_id`,
                c.`name`,
                c.`image`,
                c.`shortDescription`,
                c.`description`,
                c.`fundToRaise`,
                SUM(CASE WHEN d.`status` = 'Credit' THEN d.`amount` ELSE 0 END) AS `total_amount_for_campaign`
            FROM
                `campaign` c
            LEFT JOIN
                `donations` d ON c.`id` = d.`campaign_id`
            GROUP BY
                c.`id`");

            if ($result->num_rows > 0) {
                echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Name</th>';
                echo '<th>Image</th>';
                echo '<th>Short Description</th>';
                echo '<th>Description</th>';
                echo '<th>Fund To Raise</th>';
                echo '<th>Total Amount Raised</th>';
                echo '<th>Actions</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['campaign_id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo "<td><img src='./uploads/" . $row['image'] . "' alt='Image' style='width: 200px; height: auto'></td>";
                    echo '<td>' . $row['shortDescription'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['fundToRaise'] . '</td>';
                    echo '<td>' . $row['total_amount_for_campaign'] . '</td>';
                    echo '<td>';
                    echo '<button class="btn btn-primary" onclick="editRecord(' . $row['campaign_id'] . ')">Edit</button>';
                    // Adjust the deleteRecord function as needed
                    echo '<button class="btn btn-danger" onclick="deleteRecord(' . $row['campaign_id'] . ')">Delete</button>';
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo 'No data found';
            }

            $conn->close();
            ?>
            </div>
        </div>
    </div>
</div>



<script>

    function updateCampaign() {
        var editCampaignId = document.getElementById('editCampaignId').value;
        var editCampaignName = document.getElementById('editCampaignName').value;
        var editShortDescription = document.getElementById('editShortDescription').value;
        var editLongDescription = document.getElementById('editLongDescription').value;
        var editFundToRaise = document.getElementById('editFundToRaise').value;

        var editFormData = new FormData();
        editFormData.append('updateCampaign', '1');
        editFormData.append('campaignId', editCampaignId);
        editFormData.append('name', editCampaignName);
        editFormData.append('shortDescription', editShortDescription);
        editFormData.append('longDescription', editLongDescription);
        editFormData.append('fundToRaise', editFundToRaise);

        var editXhr = new XMLHttpRequest();
        editXhr.open("POST", "./controller/process.php", true);
        editXhr.onreadystatechange = function () {
            if (editXhr.readyState == 4 && editXhr.status == 200) {
                // Handle the response
                console.log(editXhr.responseText);
                // location.reload(); 
            }
        };
        editXhr.send(editFormData);
    }



    function editRecord(campaignId) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./controller/process.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var campaignData = JSON.parse(xhr.responseText);

                document.getElementById('editCampaignId').value = campaignData.id;
                document.getElementById('editCampaignName').value = campaignData.name;
                document.getElementById('editShortDescription').value = campaignData.shortDescription;
                document.getElementById('editLongDescription').value = campaignData.description;
                document.getElementById('editFundToRaise').value = campaignData.fundToRaise;

                $('#editModal').modal('show');
            }
        };
        xhr.send("getCampaign=1&campaignId=" + campaignId);
    }


    function createCampaign() {
        var campaignName = document.getElementById('campaignName').value;
        var shortDescription = document.getElementById('shortDescription').value;
        var longDescription = document.getElementById('longDescription').value;
        var fundToRaise = document.getElementById('fundToRaise').value;

        // Retrieve the file input
        var inputFile = document.getElementById('inputGroupFile01');
        var file = inputFile.files[0];

        // Create a FormData object to send both text and file data
        var formData = new FormData();
        formData.append('createCampaign', '1');
        formData.append('name', campaignName);
        formData.append('shortDescription', shortDescription);
        formData.append('longDescription', longDescription);
        formData.append('fundToRaise', fundToRaise);
        formData.append('image', file);

        // Perform AJAX request with FormData
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./controller/process.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response
                console.log(xhr.responseText);
                // Assuming the response is a redirect URL
                window.location.href = xhr.responseText;
            }
        };
        xhr.send(formData);
    }


    function deleteRecord(campaignId) {
        var confirmDelete = confirm("Are you sure you want to delete this record?");

        if (confirmDelete) {
            // Make an AJAX request to the PHP script to delete the record
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./controller/delete.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Reload the page or update the table as needed
                    location.reload();
                }
            };
            xhr.send("deleteCampaign=1&campaignId=" + campaignId);
        }
    }
</script>
