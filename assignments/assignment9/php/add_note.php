<?php
require_once 'Notes.php';

$notes = new Notes();
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $noteContent = $_POST['note_content'];
    $dateTime = $_POST['date_time'];
    $message = $notes->addNote($noteContent, $dateTime);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
      #msg {
        margin: 10px 0;
        color: red;
      }
    </style>
</head>
<body class="container">

    <h1 class="my-4">Add a Note</h1>

    <?php if (!empty($message)) { ?>
        <div id="msg"><?php echo htmlspecialchars($message); ?></div>
    <?php } ?>

    <form method="POST" action="add_note.php">
        <div class="form-group">
            <label for="date_time">Date and Time:</label>
            <input type="datetime-local" class="form-control" id="date_time" name="date_time">
        </div>

        <div class="form-group">
            <label for="note_content">Note:</label>
            <textarea id="note_content" name="note_content" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Note</button>
    </form>

    <a href="display_note.php" class="btn btn-secondary mt-3">View Notes</a>

</body>
</html>
