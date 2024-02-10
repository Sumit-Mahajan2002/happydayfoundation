<?php

include 'includes/config.php';
session_start();
$TID = $_SESSION['TID'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$amount = $_SESSION['amount'];


$payment_id = $_GET['payment_id'];
$payment_status = $_GET['payment_status'];
$payment_request_id = $_GET['payment_request_id'];

$checkSQL = "SELECT `transactionID` FROM `donations` WHERE `transactionID`='$payment_request_id'";
$result = $conn->query($checkSQL);

if ($result->num_rows > 0) {

    $updateSQL = "UPDATE `donations` SET `status`='$payment_status' WHERE `transactionID`='$payment_request_id'";
    if ($conn->query($updateSQL) === TRUE) {
?>
        
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thank You For Donation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-4">
                    
                        <?php
                        if($payment_status == "Credit"){
                        echo '

                        <div class="border border-3 border-success"></div>
                        <div class="card  bg-white shadow p-5">


                            <div class="mb-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg>
                            </div>
                            <div class="text-center">
                                <h1>Thank You !</h1>
                                <p>We have send the link to your inbox. Lorem ipsum dolor sit,lorem lorem </p>
                                
                                <a href="index.php" class="btn btn-outline-success">Back Home</a>
                            </div>

                        </div>
                        </div>
                            ';
                        } else {
                            echo '
                            <div class="border border-3 border-danger"></div>
                            <div class="card  bg-white shadow p-5">
    
                            <div class="mb-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg"  class="text-danger" width="75" height="75" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16"> 
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="M15 8a6.973 6.973 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                </svg>
                            </div>
                            <div class="text-center">
                                <h2>Error While Processing Payment!</h2>
                                <a href="index.php" class="btn btn-outline-danger">Back Home</a>
                            </div>
                            </div>
                            </div>
                        ';
                        
                        }
                        ?>

                    
        </div>
    </body>

</html>

<?php
    } else {
        echo "Error updating donation status: " . $conn->error;
    }
$conn->close();
} else {
    echo "Invalid transaction ID";
}

?>