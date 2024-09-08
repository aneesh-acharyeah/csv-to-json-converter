<?php

// Set file paths
$inputFile = __DIR__ . '/../input/data.csv';
$outputFile = __DIR__ . '/../output/data.json';

// Check if input CSV file exists
if (!file_exists($inputFile)) {
    die("Input CSV file not found!");
}

// Read CSV file into an array
$data = [];
if (($handle = fopen($inputFile, 'r')) !== false) {
    $header = fgetcsv($handle); // Get the headers
    while (($row = fgetcsv($handle)) !== false) {
        $data[] = array_combine($header, $row);
    }
    fclose($handle);
}

// Convert CSV data to JSON format
$jsonData = json_encode($data, JSON_PRETTY_PRINT);

// Write JSON data to file
file_put_contents($outputFile, $jsonData);

echo "CSV file has been successfully converted to JSON.\n";
