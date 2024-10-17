<?php

$outerlistnums =[];
$innerlistnums =[];

 
for ($i = 1; $i <= 3; $i++) {
   
    $innerlist = '<ul>'; 

    for ($j = 1; $j <= 5; $j++) {
        $innerlist .= '<li> ' . $j . '</li>'; 
    }

    $innerlist .= '</ul>';

    $outerlistnums[] = '<li> ' . $i . $innerlist . '</li>';
}

$outerlist = '<ul>' . implode('', $outerlistnums) . '</ul>'; //implode to write the array items as a string.
?>



<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>exercise1</title>

    </head>
    
    <body>
        
    <?php echo $outerlist; ?>
        
    </body>

</html>