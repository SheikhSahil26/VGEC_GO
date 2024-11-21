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

// Retrieve faculty name from AJAX request
$facultyName = $_GET['facultyName'] ?? '';
$at_time_slot = $_GET['at_time_slot'] ?? '';
$day = $_GET['day'] ?? '';

if ($facultyName && $at_time_slot && $day) {
    // Fetch data for the given faculty
    $sql = "SELECT * FROM faculty_loc WHERE name LIKE ? AND at_time_slot = ? AND day = ?";
    $stmt = $conn->prepare($sql);

    // Use LIKE for partial match on faculty name
    $searchTerm = "%" . $facultyName . "%";
    $stmt->bind_param("sss", $searchTerm, $at_time_slot, $day); // Bind three parameters

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
        echo json_encode(['error' => 'No faculty found with this name.']);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Invalid parameters.']);
}

$conn->close();
?>
