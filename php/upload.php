<?php
// Include the database configuration file
include 'bdd.php';
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);



if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $fileName = uniqid('img_') . '.' . $fileType;
    

    if(in_array($fileType, $allowTypes)){
        
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetDir . $fileName)){
            var_dump($targetDir . $fileName);
            // Insert image file name into database
            $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "L'image ".$fileName. " à été upload correctement.";
            }else{
                $statusMsg = "L'upload de l'image à échoué, merci de réesssayez.";
            } 
        }else{
            $statusMsg = "Malheureusement, il y a eu une erreur lors de l'upload de l'image.";
        }
    }else{
        $statusMsg = 'Désolé, seul les formats suivents sont autorisés : JPG, JPEG, PNG, GIF et PDF.';
    }
}else{
    $statusMsg = 'Merci de choisir un fichier à upload.';
}

// Display status message
echo $statusMsg;

?>