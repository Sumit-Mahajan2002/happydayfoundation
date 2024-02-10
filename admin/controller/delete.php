<?php
include '../db/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    function validateInt($input) {
        return filter_var($input, FILTER_VALIDATE_INT);
    }

    function validateString($input) {
        global $conn;
        return mysqli_real_escape_string($conn, $input);
    }

    if (isset($_POST['DeleteGalleryTag'])) {
        $tagId = validateInt($_POST['tagId']);
        $sql = "DELETE FROM gallerytags WHERE id = $tagId";

        if ($conn->query($sql) === TRUE) {
            echo "Tag deleted successfully";
        } else {
            echo "Error deleting tag: " . $conn->error;
        }
    }

    if (isset($_POST['deleteCampaign'])) {
        $campaignId = validateInt($_POST['campaignId']);
    
        // Fetch the image file path from the database
        $imageSql = "SELECT image FROM campaign WHERE id = $campaignId";
        $imageResult = $conn->query($imageSql);
    
        if ($imageResult->num_rows > 0) {
            $imageRow = $imageResult->fetch_assoc();
            $imageFilePath = $imageRow['image']; // Adjust the path as needed
    
            // Check if the file exists before attempting to delete
            if (file_exists($imageFilePath)) {
                // Attempt to delete the file
                if (unlink($imageFilePath)) {
                    echo "Image deleted successfully";
                } else {
                    echo "Error deleting image: Unable to unlink file";
                }
            } else {
                echo "Error deleting image: File does not exist";
            }
        }
    
        // Delete the campaign from the database
        $sql = "DELETE FROM campaign WHERE id = $campaignId";
        
        if ($conn->query($sql) === TRUE) {
            echo "Campaign deleted successfully";
        } else {
            echo "Error deleting campaign: " . $conn->error;
        }
    }
    
    if (isset($_POST['deleteSlide'])) {
        $slideId = validateInt($_POST['deleteSlide']);

        $deleteSql = "DELETE FROM home_slider WHERE id = $slideId";

        
        $imageSql = "SELECT image FROM home_slider WHERE id = $slideId";
        $imageResult = $conn->query($imageSql);

        if ($imageResult->num_rows > 0) {
            $imageRow = $imageResult->fetch_assoc();
            $imageFilePath = $imageRow['image'];

            unlink($imageFilePath);
        }


        if ($conn->query($deleteSql) === TRUE) {
            echo "Slide deleted successfully";
            
        } else {
            echo "Error deleting slide: " . $conn->error;
        }

        exit();
    }

    if (isset($_POST['deleteFAQ']) && isset($_POST['faqId'])) {
        $faqId = validateInt($_POST['faqId']);
        $deleteSql = "DELETE FROM faqs WHERE id = $faqId";

        if ($conn->query($deleteSql) === TRUE) {
            echo "FAQ deleted successfully";
        } else {
            echo "Error deleting FAQ: " . $conn->error;
        }
    }

    if (isset($_POST['deleteGalleryImage'])) {
        $imageId = validateInt($_POST['imageId']);
        $deleteSql = "DELETE FROM gallery_imgs WHERE id = $imageId";


        $imageSql = "SELECT image FROM gallery_imgs WHERE id = $imageId";
        $imageResult = $conn->query($imageSql);

        if ($imageResult->num_rows > 0) {
            $imageRow = $imageResult->fetch_assoc();
            $imageFilePath = $imageRow['image'];

            unlink($imageFilePath);
        }


        if ($conn->query($deleteSql) === TRUE) {
            echo "Image deleted successfully";

        } else {
            echo "Error deleting image: " . $conn->error;
        }
    }

    if (isset($_POST['deleteWork'])) {
        $workId = validateInt($_POST['workId']);

        $sql = "SELECT image FROM upcoming_work WHERE id = $workId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imageFilePath = $row['image'];

            $deleteSql = "DELETE FROM upcoming_work WHERE id = $workId";
            if ($conn->query($deleteSql) === TRUE) {
                unlink($imageFilePath);
                echo "Work deleted successfully";
            } else {
                echo "Error deleting work: " . $conn->error;
            }
        }
    }

    if (isset($_POST['DeleteInternshipType']) && isset($_POST['id'])) {
        $internshipTypeId = $_POST['id'];
    
        $deleteQuery = "DELETE FROM internship_types WHERE id = $internshipTypeId";
    
        if ($conn->query($deleteQuery) === TRUE) {
            echo "Internship type deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }



    $conn->close();
}
?>
