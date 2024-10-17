<?php

/*$i = 0;
$output = "";

while ($i < 10) {
    $output .= "<p>$i</p>";
    $i++;
}*/


//$output = 3;
//$output = "scott" //this is an example of interperative language. once this is parsed, the variable dies. it will not remember variables like compiled languages (Java)

echo '<ul>'; // Start the outer list
for ($i = 1; $i <= 3; $i++) {
    echo '<li>Item ' . $i; // Start the inner item
    echo '<ul>'; // Start the inner list
    for ($j = 1; $j <= 5; $j++) {
        echo '<li>Sub-item ' . $j . '</li>'; // Inner list items
    }
    echo '</ul>'; // End the inner list
    echo '</li>'; // End the inner item
}
echo '</ul>'; // End the outer list

$string = <<<HTML
<p>this is a paragraph</p> 
This is a heredoc, a multi-line string with "quotes". They render because we use a heredoc for this.
HTML;

//adding a variable into a string
$favoriteAnimal = "dog";
echo "My favorite animals are  {$favoriteAnimal}s ";

$str = "scott";

function myFunction() {
    global $str;
    $str = "John";
    return $str;
}

myFunction();

echo $str;

//explode
$s = "Php is cool";
$arr = explode (" ", $s);
echo "<pre>"; //this is a trick for helping see the array
print_r($arr);
//implode does the opposite. thakes array and puts it back into a string. reference book if needed.

//concatenation is with . to add two together. use .= to add to an existing variable
$string2 = " hello";
$string2 .= " there";
$string2 .= " stranger";
echo $string2;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>htmlTest</title>
</head>

<body class = "container">
    <?php echo $string; ?>
</body>


</html>