<?php
// Check if notes_id is set in the URL
if (isset($_GET['notes_id'])) {
    $notes_id = $_GET['notes_id'];
} else {
    die("Error: notes_id is required.");
}

// Database credentials
$un = "root";
$upw = "1234";
$host = "localhost";
$dbname = "college";

// Create a MySQLi connection
$conn = new mysqli($host, $un, $upw, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query to fetch the notes details
$get = "SELECT * FROM tbl_notes_details WHERE notes_id = ?";
$stmt = $conn->prepare($get);

// Bind the parameter to the SQL query
$stmt->bind_param("i", $notes_id);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the data
if ($row = $result->fetch_object()) {
    // Display links for downloading notes and video
    echo "<a href='Notes_upload/$row->notes' target='main_content'>
            <img src='web/images/notes.png' height='45px' width='160px'/>
          </a>";
    echo "<a href='Video_upload/$row->video' target='main_content'>
            <img src='web/images/video.png' height='45px' width='160px'/>
          </a>";
} else {
    echo "No notes found for the given ID.";
}

// Close the prepared statement and connection
$stmt->close();
$conn->close();
?>
