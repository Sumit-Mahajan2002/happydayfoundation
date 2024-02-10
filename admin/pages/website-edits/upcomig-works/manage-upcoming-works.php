<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New Work
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Work</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <form action="./controller/process.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload Image</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="workImage" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                    </div>
                    <input type="text" class="form-control" name="workTitle" aria-label="Title" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Short</br>Description</span>
                    </div>
                    <textarea class="form-control" name="workShortDescription" aria-label="Short Description" placeholder="max 20 words."></textarea>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Long</br>Description</span>
                    </div>
                    <textarea class="form-control" name="workLongDescription" aria-label="Long Description"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="createWork">Create</button>
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
            <h6 class="m-0 font-weight-bold text-primary">Current Live Gallery</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM upcoming_work";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td> <img src='./uploads/" . $row['image'] . "' alt='Image' style='width: 200px; height: auto'></td>";
                            echo "<td>" . $row['shortDescription'] . "</br></br>" . $row['description'] . "</td>";
                            echo "<td><button class='btn btn-danger' onclick='deleteWork(" . $row['id'] . ")'>Delete</button></td>";
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
    function deleteWork(workId) {
        var confirmDelete = confirm("Are you sure you want to delete this work?");

        if (confirmDelete) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./controller/delete.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload();
                }
            };
            xhr.send("deleteWork=1&workId=" + workId);
        }
    }
</script>
