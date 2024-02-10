<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New Tag For Gallery
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Tag For Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <form action="./controller/process.php" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="tag">Tag</span>
                    </div>
                    <input type="text" class="form-control" name="tag" aria-label="Tag" aria-describedby="tag" required>
                </div>
                <button type="submit" class="btn btn-primary" name="create_tag">Create</button>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- ... (your existing HTML code) ... -->

<!-- Table -->
<div>
    <div class="card shadow mb-4 mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Current Tags</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 20%">ID</th>
                            <th  style="width: 60%">Tag</th>
                            <th  style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tag</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                    <?php
                        $result = $conn->query("SELECT id, tag FROM gallerytags");

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['tag'] . "</td>";
                                echo "<td><button class='btn btn-danger' onclick='deleteTag(" . $row['id'] . ")'>Delete</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No tags found</td></tr>";
                        }
                        $conn->close();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteTag(tagId) {
        var confirmDelete = confirm("Are you sure you want to delete this tag?");

        if (confirmDelete) {
            // Make an AJAX request to the PHP script to delete the tag
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./controller/delete.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Reload the page or update the table as needed
                    location.reload();
                }
            };
            xhr.send("DeleteGalleryTag=1&tagId=" + tagId);
        }
    }
</script>

