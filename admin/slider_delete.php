<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php')
?>

<?php
// Read the JSON file contents into a variable
$jsonData = file_get_contents($datasource.'slideritems.json'); // Replace 'your_file.json' with the path to your JSON file

// Decode the JSON data into an associative array
$data = json_decode($jsonData, true);

// Find the index of the object to delete based on the ID
$indexToDelete = -1;
foreach ($data as $index => $item) {
    if ($item['id'] == 1) { // Replace '1' with the desired ID of the object to delete
        $indexToDelete = $index;
        break;
    }
}

// Remove the object from the array if it was found
if ($indexToDelete !== -1) {
    array_splice($data, $indexToDelete, 1);
    echo "Object deleted successfully.";
} else {
    echo "Object not found.";
}

// Convert the updated data back to JSON
$jsonData = json_encode($data);

// Save the updated JSON back to the file
file_put_contents($datasource.'slideritems.json', $jsonData); // Replace 'your_file.json' with the path to your JSON file
?>
