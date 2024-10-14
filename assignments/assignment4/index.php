<?php
if (count($_POST) > 0) {
    require_once 'nameProcessor.php';
    $addName = new AddNamesProc();
    $output = $addName->addClearNames(); 
} else {
    $output = ''; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Names</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRv08O4iM4F3z8gOq7z1nDy8P4Sm06e7w7f3AOhna" crossorigin="anonymous">
    <style>
        body {
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        h1 {
            margin-bottom: 20px;
        }
        textarea {
            margin-top: 10px;
            width: 100%;
        }
        button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Names</h1>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <button type="submit" name="add" class="btn btn-primary">Add Name</button>
                <button type="submit" name="clear" class="btn btn-secondary">Clear Names</button>
            </div>
            <div class="mb-3">
                <label for="namelist" class="form-label">List of Names</label>
                <textarea style="height: 500px;" class="form-control" id="namelist" name="namelist" readonly><?php echo $output; ?></textarea>
            </div>
        </form>
    </div>
</body>
</html>