<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New Image To Gallery
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Image To Gallery</h5>
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
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Select Tag</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="tag">
                <option selected>Choose...</option>
                <?php
                    $tagSql = "SELECT * FROM gallerytags";
                    $tagResult = $conn->query($tagSql);

                    while ($tagRow = $tagResult->fetch_assoc()) {
                        echo "<option value='" . $tagRow['tag'] . "'>" . $tagRow['tag'] . "</option>";
                    }
                ?>
              </select>
            </div>

            <button type="submit" class="btn btn-primary" name="createImage">Create</button>
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
                            <th>Image</th>
                            <th>Tag</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Tag</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        // Fetch data from gallery_imgs table
                        $gallerySql = "SELECT * FROM gallery_imgs";
                        $galleryResult = $conn->query($gallerySql);

                        while ($galleryRow = $galleryResult->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><img src='./uploads/" . $galleryRow['image'] . "'  style='width: 250px; height: auto;'></td>";
                            echo "<td>" . $galleryRow['tag'] . "</td>";
                            echo "<td><button class='btn btn-danger' onclick='deleteGalleryImage(" . $galleryRow['id'] . ")'>Delete</button></td>";
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
    function deleteGalleryImage(imageId) {
        var confirmDelete = confirm("Are you sure you want to delete this image?");

        if (confirmDelete) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./controller/delete.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload();
                }
            };
            xhr.send("deleteGalleryImage=1&imageId=" + imageId);
        }
    }
</script>
