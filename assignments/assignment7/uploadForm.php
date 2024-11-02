<?php
session_start(); // Start the session to access session variables

// Check if there is a message to display
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']); // Clear the message after displaying it

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload PDF File</title>
</head>
<body>
    <h2>Upload a PDF File</h2>

    <!-- Display the message after form submission -->
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data" action="fileUploadProc.php"> <!-- Keep action to fileUploadProc.php -->
        <label for="file_name">File Name:</label>
        <input type="text" name="file_name" required><br><br>

        <label for="uploadedFile">Choose PDF File:</label>
        <input type="file" name="uploadedFile" accept="application/pdf" required><br><br>

        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>