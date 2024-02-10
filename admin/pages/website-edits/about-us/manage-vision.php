<form action="./controller/process.php" method="post">

    <div class="form-group">
        <label for="vision">Vision Section</label>
        <textarea name="visionText" id="vision" cols="30" rows="10" class="form-control" aria-describedby="visionHelp" placeholder="Vision" max="50"><?php
            $sql = "SELECT vision FROM about_us WHERE id = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo $row['vision'];
            }
            ?></textarea>
        <small id="visionHelp" class="form-text text-muted">This will be displayed on vision section</small>
    </div>

    <button type="submit" class="btn btn-primary" name="updateVision">Update</button>

</form>

