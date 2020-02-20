<?php

$positieveWoorden = convertFileToArray("positive-words.txt");
$neutraleWoorden = convertFileToArray("neutral-words.txt");
$negatieveWoorden = convertFileToArray("negative-words.txt");
$lyrics = file_get_contents("lyrics.txt");
$lyrics = str_replace("\n", " ", $lyrics);
$lyrics = explode(" ", $lyrics);

function convertFileToArray($file)
{
    $array = file_get_contents($file);
    $array = explode("\n", $array);
    return $array;
}

$positieveWoordenCount      = 0;
$neutraleWoordenCount       = 0;
$negatieveWoordenCount      = 0;

foreach ($lyrics as $word) {
    foreach ($positieveWoorden as $woord) {
        if ($word == $woord) {
            $positieveWoordenCount++;
        }
    }

    foreach ($neutraleWoorden as $woord) {
        if ($word == $woord) {
            $neutraleWoordenCount++;
        }
    }
    foreach ($negatieveWoorden as $woord) {
        if ($word == $woord) {
            $negatieveWoordenCount++;
        }
    }
}

$result = round((($neutraleWoordenCount + $positieveWoordenCount - $negatieveWoordenCount) / $neutraleWoordenCount), 2);

echo ("Positieve woorden: "  . $positieveWoordenCount . PHP_EOL);
echo ("Neutrale woorden: "   . $neutraleWoordenCount . PHP_EOL);
echo ("Negatieve woorden: "  . $negatieveWoordenCount . PHP_EOL);

echo ("Het sentiment van de tekst krijgt een score van: " . $result . PHP_EOL);
