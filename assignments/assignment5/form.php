<?php

require_once 'directories.php';

$directoryName = '';
$fileContent = '';
$errorMessage = '';
$successMessage = '';
$filePath = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $directoryName = $_POST['directoryName'];
    $fileContent = $_POST['fileContent'];

    $dirHandler = new Directories();

    
    $result = $dirHandler->createDirectoryAndFile($directoryName, $fileContent);

    if ($result['status'] === 'error') {
        $errorMessage = $result['message'];
    } else {
        $successMessage = $result['message'];
        $filePath = $result['path'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Directory and File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
        }
        textarea {
            height: 300px;
            resize: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Create Directory and File</h1>

        
        <?php if (!empty($errorMessage)): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        
        <?php if (!empty($successMessage)): ?>
            <p style="color: green;"><?php echo $successMessage; ?></p>
            <p><a href="<?php echo $filePath; ?>" target="_blank">Click here to view file</a></p>
        <?php endif; ?>

        
        <form method="POST">
            
            <div class="mb-3">
                <label for="directoryName" class="form-label">Folder Name:</label>
                <input type="text" id="directoryName" name="directoryName" class="form-control" required>
            </div>

            
            <div class="mb-3">
                <label for="fileContent" class="form-label">Folder Content:</label>
                <textarea id="fileContent" name="fileContent" class="form-control" required></textarea>
            </div>

            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
