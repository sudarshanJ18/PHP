<?php
session_start();

$host = "localhost";
$username = "root";
$password = "1234";
$database = "college";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$course = $_POST['course'];
$subject = $_POST['subject'];
$topic = $_POST['topic'];
$date = $_POST['date'];
$summary = $_POST['summary'];

$notes_upload = $_FILES['notes']['name'];
$target = "Notes_upload/" . $notes_upload;
move_uploaded_file($_FILES['notes']['tmp_name'], $target);

$video_upload = $_FILES['video']['name'];
$target1 = "Video_upload/" . $video_upload;
move_uploaded_file($_FILES['video']['tmp_name'], $target1);

$query = "INSERT INTO tbl_notes_details (course, subject, topic, date, notes, video, summary) 
          VALUES ('$course', '$subject', '$topic', '$date', '$notes_upload', '$video_upload', '$summary')";

if (mysqli_query($conn, $query)) {
    echo '<script>alert("Upload Successful!");window.location="notesupload.php";</script>';
} else {
    echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
}

mysqli_close($conn);
?>
