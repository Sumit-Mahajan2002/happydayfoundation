<?php
include '../db/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // LOGIN:
    if(isset($_POST['loginAdmin'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT id, username FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            session_start();
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: ../dashboard.php");
            exit();
        } else {
            // header("Location: ../login.php?invalid");
            echo "ErrorP: " . $conn->error;
        }
    }


    if(isset($_POST['updateAccountAuth'])){
        $newUsername = $_POST['username'];
        $newPassword = $_POST['password'];

        $updateSql = "UPDATE `admin` SET `username` = '$newUsername', `password` = '$newPassword' WHERE id = 1";

        if ($conn->query($updateSql) === TRUE) {
            header("Location: ../settings.php");
            exit();
        } else {
            echo "Error updating authentication details: " . $conn->error;
        }
    }




    // Other :

    if (isset($_POST['create_tag'])) {
        $tag = $_POST['tag'];

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO gallerytags (tag) VALUES (?)");
        $stmt->bind_param("s", $tag);

        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../gallery.php?add-new-tags=1");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    if(isset($_POST['updateAboutUs'])){
        $aboutUsText = $_POST['aboutUsText'];

        $sql = "UPDATE about_us SET about_us_text = '$aboutUsText' WHERE id = 1";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../about.php?manage_about=1");
            $conn->close();
            exit();
        } else {
            echo "Error updating About Us text: " . $conn->error;
        }
    }

    if(isset($_POST['updateMission'])){
        $missionText = trim($_POST['missionText']);

        $updateSql = "UPDATE about_us SET mission = '$missionText' WHERE id = 1";

        if ($conn->query($updateSql) === TRUE) {
            header("Location: ../about.php?manage_mission=1");
            $conn->close();
            exit();
        } else {
            echo "Error updating mission: " . $conn->error;
        }
    }

    if(isset($_POST['updateVision'])){
        $visionText = trim($_POST['visionText']);

        $updateSql = "UPDATE about_us SET vision = '$visionText' WHERE id = 1";

        if ($conn->query($updateSql) === TRUE) {
            header("Location: ../about.php?manage_vision=1");
            $conn->close();
            exit();
        } else {
            echo "Error updating vision: " . $conn->error;
        }
    }

    if (isset($_POST['updateImpact'])) {
        $impactText = trim($_POST['impactText']);
        $updateSql = $conn->prepare("UPDATE about_us SET impact = ? WHERE id = 1");
        $updateSql->bind_param("s", $impactText);
    
        if ($updateSql->execute()) {
            header("Location: ../about.php?manage_impact=1");
            $updateSql->close();
            $conn->close();
            exit();
        } else {
            echo "Error updating impact section: " . $updateSql->error;
        }
    }

    if (isset($_POST['CreateInternshipType'])) {
        $internshipType = $_POST['internshipType'];
        $sql = "INSERT INTO `internship_types` (`internship_name`) VALUES ('$internshipType')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../internships.php?AddInternshipTypes=1");
            $updateSql->close();
            $conn->close();
            exit();
        } else {
            echo 'Error creating internship type: ' . $conn->error;
        }
    }

    if (isset($_POST['updateContactInfo'])) {
        $email = trim($_POST['email']);
        $contact = trim($_POST['contact']);
        $instagram = trim($_POST['instagram']);
        $facebook = trim($_POST['facebook']);
        $twitter = trim($_POST['twitter']);
        $linkedin = trim($_POST['linkedin']);
        $address = trim($_POST['address']);
        $maplinks = trim($_POST['maplinks']);
    
        $updateSql = $conn->prepare("UPDATE about_us SET email = ?, contact = ?, instagram = ?, facebook = ?, twitter = ?, linkedin = ?, address = ?, maplinks = ? WHERE id = 1");
        $updateSql->bind_param("ssssssss", $email, $contact, $instagram, $facebook, $twitter, $linkedin, $address, $maplinks);
    
        if ($updateSql->execute()) {
            header("Location: ../about.php?manage_contact_information=1");
            $updateSql->close();
            $conn->close();
            exit();
        } else {
            echo "Error updating contact information: " . $updateSql->error;
        }
    }

    if(isset($_POST['createFAQ'])){
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        // Insert data into the database
        $sql = "INSERT INTO faqs (`question`, `answer`) VALUES ('$question', '$answer')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../about.php?manage_faq=1");
            $conn->close();
            exit();
        } else {
            echo "Error creating FAQ: " . $conn->error;
        }
    }


    if (isset($_POST['createCampaign'])) {
        $name = $_POST['name'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];
        $fundToRaise = $_POST['fundToRaise'];
 
        // File upload handling
        $targetDirectory = "../uploads/campaigns/"; // Specify your target directory
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Use prepared statement to prevent SQL injection
                $stmt = $conn->prepare("INSERT INTO campaign (`name`, `shortDescription`, `description`, `fundToRaise`, `image`) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssis", $name, $shortDescription, $longDescription, $fundToRaise, $targetFile);

                if ($stmt->execute()) {
                    $stmt->close();
                    echo "./campaigns.php?manageCampaigns";
                } else {
                    echo "Error creating campaign: " . $stmt->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $conn->close();
        exit();
    }



    if (isset($_POST['createImage'])) {
        $targetDir = "../uploads/gallery/";  // Change this path accordingly
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a valid image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size (adjust as needed)
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedFormats = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Insert data into the database
                $tag = $_POST['tag'];
                $imagePath = $targetFile;

                $sql = "INSERT INTO gallery_imgs (`image`, `tag`) VALUES ('$imagePath', '$tag')";

                if ($conn->query($sql) === TRUE) {
                    header("Location: ../gallery.php?manage-galery=1");
                    $conn->close();
                    exit();
                } else {
                    echo "Error creating image: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }




    if (isset($_POST['createSlider'])) {
        $primaryText = $_POST['primaryText'];
        $secondaryText = $_POST['secondaryText'];
        $campaignId = $_POST['campaign_id'];

        // File upload handling
        $targetDir = "../uploads/slider/";  // Create a directory to store uploaded files
        $targetFile = $targetDir . basename($_FILES["sliderImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["sliderImage"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["sliderImage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["sliderImage"]["tmp_name"], $targetFile)) {
                // Insert data into the database
                $sql = "INSERT INTO home_slider (`image`, `primaryText`, `secondaryText`, `campaign_id`) VALUES ('$targetFile', '$primaryText', '$secondaryText', '$campaignId')";

                if ($conn->query($sql) === TRUE) {
                    header("Location: ../home.php?slider=1");
                    $conn->close();
                    exit();
                } else {
                    echo "Error creating slider: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }



    if (isset($_POST['createWork'])) {
        // Upcoming Works
        $workTitle = $_POST['workTitle'];
        $workShortDescription = $_POST['workShortDescription'];
        $workLongDescription = $_POST['workLongDescription'];

        $targetDirectory = "../uploads/upcomingworks/";
        $targetFile = $targetDirectory . basename($_FILES["workImage"]["name"]);
        move_uploaded_file($_FILES["workImage"]["tmp_name"], $targetFile);

        $sql = "INSERT INTO upcoming_work (title, shortDescription, description, image) VALUES ('$workTitle', '$workShortDescription', '$workLongDescription', '$targetFile')";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../upcoming-work.php?manage=1");
            $conn->close();
            exit();
        } else {
            echo "Error creating work: " . $conn->error;
        }
    }

    
    if (isset($_POST['updateStatus'])) {
        $applicationId = $_POST['applicationId'];
        $status = $_POST['status'];

        $sql = "UPDATE `internship_applications` SET `status` = '$status' WHERE `id` = '$applicationId'";

        if ($conn->query($sql) === TRUE) {
            echo 'Status updated successfully';
        } else {
            echo 'Error updating status: ' . $conn->error;
        }
    }




    // new changes

    if(isset($_POST['getCampaign'])) {
        $campaignId = $_POST['campaignId'];
        $result = $conn->query("SELECT * FROM `campaign` WHERE `id` = $campaignId");
        if ($result->num_rows > 0) {
            $campaignData = $result->fetch_assoc();
            echo json_encode($campaignData);
        } else {
            echo json_encode(['error' => 'Campaign not found']);
        }
    }

    
    if (isset($_POST['updateCampaign'])) {
        $campaignId = $_POST['editCampaignId'] ;
        $name = $_POST['editCampaignName'] ;
        $shortDescription =$_POST['editShortDescription'] ;
        $longDescription =  $_POST['editLongDescription'] ;
        $fundToRaise =$_POST['editFundToRaise'] ;
    
        // Add debugging
        echo 'Campaign ID: ' . $campaignId . '<br>';
        echo 'Name: ' . $name . '<br>';
        echo 'Short Description: ' . $shortDescription . '<br>';
        echo 'Long Description: ' . $longDescription . '<br>';
        echo 'Fund To Raise: ' . $fundToRaise . '<br>';
    
        // Update the campaign data in the database
        $sql = "UPDATE `campaign` SET `name`='$name',`shortDescription`='$shortDescription',`description`='$longDescription',`fundToRaise`='$fundToRaise' WHERE  `id`='$campaignId'";
    
        if ($conn->query($sql) === TRUE) {
            echo 'Campaign updated successfully';
            header('location: ../campaigns.php?manageCampaigns=1');
        } else {
            echo 'Error updating campaign: ' . $conn->error;
        }
    }
    
}
?>
