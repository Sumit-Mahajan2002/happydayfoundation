<form action="./controller/process.php" method="post">

    <div class="form-group">
        <label for="impact">Impact Section</label>
        <textarea name="impactText" id="impact" cols="30" rows="10" class="form-control" aria-describedby="impactHelp" placeholder="Impact" max="50"><?php
            $sql = "SELECT impact FROM about_us WHERE id = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo $row['impact'];
            }
            ?></textarea>
        <small id="impactHelp" class="form-text text-muted">This will be displayed on impact section</small>
    </div>

    <button type="submit" class="btn btn-primary" name="updateImpact">Update</button>

</form>