<?php
require_once 'Notes.php';

$notes = new Notes();
$notesData = [];
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $startDate = $_POST['begDate'];
    $endDate = $_POST['endDate'];
    $notesData = $notes->getNotes($startDate, $endDate);
    
    if (is_string($notesData)) {
        $message = $notesData;
        $notesData = [];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Notes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
      #msg {
        margin: 10px 0;
        color: red;
      }
    </style>
</head>
<body class="container">

    <h1 class="my-4">Display Notes</h1>

    <?php if (!empty($message)) { ?>
        <div id="msg"><?php echo htmlspecialchars($message); ?></div>
    <?php } ?>

    <form method="POST" action="display_note.php" class="mb-4">
        <div class="form-group">
            <label for="begDate">Start Date:</label>
            <input type="date" class="form-control" id="begDate" name="begDate">
        </div>

        <div class="form-group">
            <label for="endDate">End Date:</label>
            <input type="date" class="form-control" id="endDate" name="endDate">
        </div>

        <button type="submit" class="btn btn-primary">Get Notes</button>
    </form>

    <?php if (is_array($notesData) && count($notesData) > 0) { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date/Time</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notesData as $note) { ?>
                    <tr>
                        <td><?php echo date("m/d/Y h:i A", strtotime($note['created_at'])); ?></td>
                        <td><?php echo htmlspecialchars($note['note_content']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>

</body>
</html>
