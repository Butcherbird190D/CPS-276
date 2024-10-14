<?php

$table = '<table class="table table-bordered">';

 
for ($i = 1; $i <= 15; $i++) { //make row
   
    $table .= '<tr>'; 

    for ($j = 1; $j <= 5; $j++) { //make 5 cells
        $table .= '<td>Row ' . $i . ' Cell '  . $j . '</td>';
    }

    $table .= '</tr>'; // close that row and restart

}

$table .=  '</table>' // once all rows and cells made, close table
?>


<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>exercise3</title>

    </head>
    
    <body>

        <div class = "container">
        
        <?php echo $table; ?>

        </div>
        
    </body>

</html>