<?php
require_once("includes/header.php");
require_once("includes/classes/VideoUploadData.php");
include_once("includes/classes/VideoProcessor.php");
require_once("includes/classes/UserInfo.php");

if(!isset($_POST["uploadButton"])){
    echo "nothing send to this page";
    exit();
}

// 1) idk for now
$videoUploadData = new VideoUploadData(
                                $_FILES["fileInput"],
                                $_POST["titleInput"],
                                $_POST["descriptionInput"],
                                $_POST["privacyInput"],
                                $_POST["categoryInput"],
                                $user->getFullName()

);


$videoProcessor = new VideoProcessor($con);
$wasUploaded = $videoProcessor-> upload($videoUploadData)



?>
