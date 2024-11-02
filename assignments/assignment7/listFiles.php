<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Uploaded Files</title>
</head>
<body>
    <h2>List of Uploaded PDF Files</h2>

    <?php
    // Ensure you're including the file where ListFilesProc is defined
    require_once "fileUploadProc.php"; // Include the fileUploadProc where your addFileName method is defined
    require_once "listFilesProc.php"; // Include the file where ListFilesProc is defined

    // Create an instance of the ListFilesProc class
    $listFiles = new ListFilesProc();

    // Fetch the file names for listing
    $fileList = $listFiles->getFileNames('list'); 

    // Output the file list
    echo $fileList; 
    ?>

    <p><a href="uploadForm.php">Back to Upload Page</a></p> <!-- Link back to the upload page -->
</body>
</html>