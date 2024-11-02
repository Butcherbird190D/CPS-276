<?php
require_once 'listFilesProc.php';

$listFiles = new listFilesProc(); 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>List Files</title>
    </head>
    <body style="padding: 30px;">
        <h1>List Files</h1>
        
        <a href="fileSubmit.php">Add File</a>
        <br>
        <div id="namesList"><?php echo $listFiles->getFileNames('list'); ?></div> 
    </body>
</html>
