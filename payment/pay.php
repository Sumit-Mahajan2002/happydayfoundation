<?php
include '../includes/config.php';
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['contact'];
    $donationAmount = $_POST['donationAmount'];
    $campaignID = $_POST['campaignID'];
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_64eea62b899b1fc3b3f5cd4e89e",
                  "X-Auth-Token:test_46f52319f0326872f25566f14ef"));
$payload = Array(
    'purpose' => 'NGO Donation',
    'amount' => $donationAmount,
    'phone' => $phone,
    'buyer_name' => $name,
    'redirect_url' => 'http://localhost/NGO/thankyou.php',
    'send_email' => true,
    'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => true,
    'email' => $email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$response = json_decode($response);
$TID = $response->payment_request->id;

// set data in database
$sql = "INSERT INTO `donations`(`name`, `email`, `phone`, `campaign_id`, `transactionID`, `amount`) VALUES ('$name','$email','$phone','$campaignID','$TID','$donationAmount')";
if ($conn->query($sql) === TRUE) {
    
    $_SESSION['TID'] = $TID;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['name'] = $name;
    $_SESSION['amount'] = $donationAmount;
    $_SESSION['campaignID'] = $campaignID;
 
    header('location:'.$response->payment_request->longurl);
    die();

} else {
    echo 'Error ' . $conn->error;
}

// echo '<pre>';
// print_r($response);
// echo $response;

?>