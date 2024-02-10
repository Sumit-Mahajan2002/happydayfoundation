<form action="./controller/process.php" method="post">

    <div class="form-group">
        <label for="aboutUs">About Us Section</label>
        <textarea name="aboutUsText" cols="30" rows="10" class="form-control" id="aboutUs" aria-describedby="aboutHelp" placeholder="About Us" max="50" ><?php
                $sql = "SELECT about_us_text FROM about_us WHERE id = 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['about_us_text'];
                }?></textarea>
        <small id="aboutHelp" class="form-text text-muted">This will be displayed on the about section</small>
    </div>

    <button type="submit" class="btn btn-primary" name="updateAboutUs">Update</button>

</form>
