<?php
 
//Open the file.
$fileHandle = fopen("student.csv", "r");
 
//Loop through the CSV rows.
while (($row = fgetcsv($fileHandle)) !== FALSE) {
    echo 'Name: ' . $row[0] . '<br>';
    echo 'Country: ' . $row[1] . '<br>';
    echo '<br>';
}
