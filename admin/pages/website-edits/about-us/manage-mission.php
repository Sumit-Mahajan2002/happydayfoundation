<form action="./controller/process.php" method="post">

    <div class="form-group">
        <label for="mission">Mission Section</label>
        <textarea name="missionText" cols="30" rows="10" class="form-control" id="mission" aria-describedby="missionHelp" placeholder="Mission" max="50"><?php
                $sql = "SELECT mission FROM about_us WHERE id = 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo trim($row['mission']);
                }
            ?></textarea>
        <small id="missionHelp" class="form-text text-muted">This will be displayed on the mission section</small>
    </div>

    <button type="submit" class="btn btn-primary" name="updateMission">Update</button>

</form>
