<?php 
require_once 'fileUploadProc.php';
$fup = new FilesUploadProc();

$fileName='';
$output = "";

if(isset($_POST['uploadFile'])){
    $output = $fup->addFileName();

    $fileName = 'filename';

    if (file_exists($fileName)) {
        return "That file name already exists";
    }
    else if ($_FILES['file']['size'] > 100000) {
        return "The file is too big";
    } 
    else {
        return $fileName;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>File Upload</title>
    </head>
    
    <body style="padding: 30px;">
        <h1>File Upload</h1>
        <p><?php echo $output; ?></p>
        <form method="post" action="fileSubmit.php" enctype="multipart/form-data">
            
            <div class="form-group">
                <a href="fileList.php">Show File List</a>
            </div>
            <br>
            <div class="form-group">
                <label for="fileName">File Name</label><br>
                <input type="text" class="form-control" id="filename" name="filename">
            </div>
            <br>
            <div class="form-group">
                <input type="file" class="form-control-file" id="file" name="file" accept=".pdf" size="100000">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id ="uploadFile" name="uploadFile" value="Upload File">
            </div>
        
        </form>
     
    </body>
</html>