<?php
include_once './includes/sidebar.php';


$sql = "SELECT * FROM `admin` WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $adminData = $result->fetch_assoc();
} else {
    echo "Admin not found in the database.";
}

$conn->close();

?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php
                include_once './includes/topbar.php';
                ?>
                
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">Settings</h1>

                    <form action="./controller/process.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" value="<?php echo $adminData['username']; ?>">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password" value="<?php echo $adminData['password']; ?>">
                        </div>

                        <button type="submit" class="btn btn-primary" name="updateAccountAuth">Update Auth</button>
                    </form>


                </div>

            </div>
<?php
include_once './includes/footer.php';
?>