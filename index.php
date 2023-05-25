<?php

$file = "dataBuku.txt";
$read = file($file);

foreach ($read as $data) {
    echo $data . "<br>";
}

echo "<br> <a href='insert.php'><button>Back</button></a>";
?>