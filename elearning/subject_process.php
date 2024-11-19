<?php
// Database connection details
$un = "root";
$upw = "1234";
$host = "localhost";
$dbname = "college";

// Create a connection using MySQLi
$conn = mysqli_connect($host, $un, $upw, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$subject = $_POST['subject'];
$logo_upload = $_FILES['logo']['name'];
$target2 = "Logo_upload/" . $logo_upload;

// Move uploaded file to the target directory
if (move_uploaded_file($_FILES['logo']['tmp_name'], $target2)) {
    // Prepare the SQL query
    $query = "INSERT INTO subject_master (subject, logo) VALUES ('$subject', '$logo_upload')";
    
    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("UPLOAD SUCCESSFULLY");window.location="subject_master.php";</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Failed to upload logo.";
}

// Close the database connection
mysqli_close($conn);
?>
