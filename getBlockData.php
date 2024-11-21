<?php
// Database connection (adjust credentials accordingly)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faculty_info";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve block ID from AJAX request
$blockId = $_GET['blockId'] ?? '';
$at_time_slot = $_GET['at_time_slot'] ?? '';
$day = $_GET['day'] ?? '';

if ($blockId && $at_time_slot && $day) {
    // Fetch data for the given block
    $sql = "SELECT * FROM faculty_loc WHERE block = ? AND at_time_slot = ? AND day = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $blockId, $at_time_slot, $day);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch all rows as an associative array
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row; // Add each row to the data array
        }

        echo json_encode($data); // Send all data as JSON
    } else {
        echo json_encode(['error' => 'No data found for this block.']);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Invalid parameters.']);
}

$conn->close();
?>
