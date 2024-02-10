<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New FAQ
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New FAQ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <form action="./controller/process.php" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Question</span>
                    </div>
                    <input type="text" class="form-control" name="question" aria-label="Question" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Short Description</span>
                    </div>
                    <textarea class="form-control" name="answer" aria-label="Short Description"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="createFAQ">Create</button>
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
            <h6 class="m-0 font-weight-bold text-primary">Current Live FAQs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Answer / Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Question</th>
                            <th>Answer / Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM faqs";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['question'] . "</td>";
                            echo "<td>" . $row['answer'] . "</td>";
                            echo "<td><button class='btn btn-danger' onclick='deleteFAQ(" . $row['id'] . ")'>Delete</button></td>";
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
    function deleteFAQ(faqId) {
        var confirmDelete = confirm("Are you sure you want to delete this FAQ?");

        if (confirmDelete) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./controller/delete.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload();
                }
            };
            xhr.send("deleteFAQ=1&faqId=" + faqId);
        }
    }
</script>
