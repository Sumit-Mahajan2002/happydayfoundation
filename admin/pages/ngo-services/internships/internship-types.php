<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New Internship Type
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Internship Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <form action="./controller/process.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Internship Type</span>
                            </div>
                            <input type="text" class="form-control" id="internshipType" name="internshipType" aria-label="internshipType" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <button type="submit" class="btn btn-primary" name="CreateInternshipType">Create</button>
                    </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>

      </div>
    </div>
  </div>
</div>

<!-- Table -->
<div>
    <div class="card shadow mb-4 mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Current Types</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
            $result = $conn->query("SELECT * FROM internship_types");

            if ($result->num_rows > 0) {
                echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Type</th>';
                echo '<th>Actions</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['internship_name'] . '</td>';
                    echo '<td>';
                    echo '<button class="btn btn-danger" onclick="deleteInternshipType(' . $row['id'] . ')">Delete</button>';
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
    </div>
</div>


<script>
  function createInternship(internshipType) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./controller/create_internship.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            location.reload();
            loadInternshipTypesTable();
        }
    };
    xhr.send("CreateInternshipType=1&internshipType=" + internshipType);
  }

  function deleteInternshipType(internshipTypeId) {
    if (confirm("Are you sure you want to delete this internship type?")) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "./controller/delete.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(xhr.responseText);
          location.reload();
        }
      };
      xhr.send("DeleteInternshipType=1&id=" + internshipTypeId);
    }
  }
</script>
