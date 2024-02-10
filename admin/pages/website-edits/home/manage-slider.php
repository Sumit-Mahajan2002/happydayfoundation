<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New Slider
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <form id="sliderForm" name="sliderForm" enctype="multipart/form-data" action="./controller/process.php" method="post">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Primary Text</span>
        </div>
        <input type="text" class="form-control" aria-label="Primary Text" aria-describedby="inputGroup-sizing-default" name="primaryText">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Secondary Text</span>
        </div>
        <input type="text" class="form-control" aria-label="Secondary Text" aria-describedby="inputGroup-sizing-default" name="secondaryText">
    </div>

    <div class="input-group mb-1">
        <div class="input-group-prepend">
            <span class="input-group-text">Upload Image</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="sliderImage">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
    <p style="color: red">Upload an image of 1568*626 px</p>

    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="campaignSelect">Campaign</label>
        </div>
        <select class="custom-select" id="campaignSelect" name="campaign_id">
            <?php
            $campaignResult = $conn->query("SELECT id, name FROM campaign");
            while ($campaignRow = $campaignResult->fetch_assoc()) {
                echo "<option value='" . $campaignRow['id'] . "'>" . $campaignRow['name'] . "</option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" name="createSlider">Create</button>
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
            <h6 class="m-0 font-weight-bold text-primary">Current Live Sildes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Primary Text</th>
                            <th>Secondary Text</th>
                            <th>For Campaign</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Image</th>
                            <th>Primary Text</th>
                            <th>Secondary Text</th>
                            <th>For Campaign</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $sql = "SELECT hs.*, c.name AS campaign_name FROM home_slider hs
                            LEFT JOIN campaign c ON hs.campaign_id = c.id";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><img src='./uploads/" . $row['image'] . "' alt='Slider Image' style='width: 100px; height: auto;'></td>";
                        echo "<td>" . $row['primaryText'] . "</td>";
                        echo "<td>" . $row['secondaryText'] . "</td>";
                        echo "<td>" . $row['campaign_name'] . "</td>"; // Display the campaign name
                        echo "<td><button class='btn btn-danger' onclick='deleteSlide(" . $row['id'] . ")'>Delete</button></td>";
                        echo "</tr>";
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteSlide(slideId) {
        // You can use AJAX to send a request to the server to delete the slide with the given ID
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./controller/delete.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page or update the table as needed
                location.reload();
            }
        };
        xhr.send("deleteSlide=" + slideId);
    }

</script>