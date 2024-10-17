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

    // Call the method to create the directory and file
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
    <title>File and Directory Creation</title>
</head>
<body>
    <h1>Create Directory and File</h1>

    <?php if (!empty($errorMessage)): ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <?php if (!empty($successMessage)): ?>
        <p style="color: green;"><?php echo $successMessage; ?></p>
        <a href="<?php echo $filePath; ?>" target="_blank">Path where file is located</a>
    <?php endif; ?>

    <form method="POST">
        <label for="directoryName">Directory Name:</label>
        <input type="text" id="directoryName" name="directoryName" required>

        <br><br>

        <label for="fileContent">File Content:</label>
        <textarea id="fileContent" name="fileContent" rows="5" required></textarea>

        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
