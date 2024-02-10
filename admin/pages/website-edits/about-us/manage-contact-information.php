
<?php
$sqlContact = "SELECT * FROM about_us WHERE id = 1";
$resultContact = $conn->query($sqlContact);

if ($resultContact->num_rows > 0) {
    $contactInfo = $resultContact->fetch_assoc();
}
?>

<form action="./controller/process.php" method="post">

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $contactInfo['email']; ?>">
    </div>

    <div class="form-group">
        <label for="contact">Contact details</label>
        <input type="number" class="form-control" id="contact" aria-describedby="contactHelp" placeholder="+91 999 9999 999" name="contact" value="<?php echo $contactInfo['contact']; ?>">
    </div>

    <div class="form-group">
        <label for="instagram">Instagram</label>
        <input type="text" class="form-control" id="instagram" placeholder="Enter your Instagram username" name="instagram" value="<?php echo $contactInfo['instagram']; ?>">
    </div>

    <div class="form-group">
        <label for="facebook">Facebook</label>
        <input type="text" class="form-control" id="facebook" placeholder="Enter your Facebook profile link" name="facebook" value="<?php echo $contactInfo['facebook']; ?>">
    </div>

    <div class="form-group">
        <label for="twitter">Twitter</label>
        <input type="text" class="form-control" id="twitter" placeholder="Enter your Twitter handle" name="twitter" value="<?php echo $contactInfo['twitter']; ?>">
    </div>

    <div class="form-group">
        <label for="linkedin">LinkedIn</label>
        <input type="text" class="form-control" id="linkedin" placeholder="Enter your LinkedIn profile link" name="linkedin" value="<?php echo $contactInfo['linkedin']; ?>">
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" placeholder="Enter your address" name="address" value="<?php echo $contactInfo['address']; ?>">
    </div>

    <div class="form-group">
        <label for="maplinks">Map iFrame Links</label>
        <textarea class="form-control" id="maplinks" placeholder="Enter map link for your location" name="maplinks" cols="10" rows="3"><?php echo $contactInfo['maplinks']; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary" name="updateContactInfo">Update</button>

</form>