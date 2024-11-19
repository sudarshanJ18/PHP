<?php
session_start();
ob_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $host = "localhost";
    $un = "root";
    $upw = "1234";
    $dbname = "college";
    $port= 3306;

    $conn = new mysqli($host, $un, $upw, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM registration WHERE username = ? AND status = 'accept'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);

    if ($stmt === false) {
        die("MySQL statement preparation failed: " . $conn->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_object();

        if (password_verify($password, $row->pw)) {
            $_SESSION['un'] = $username;
            $_SESSION['name'] = $row->first_name . ' ' . $row->last_name;
            $_SESSION['dob'] = $row->dob;
            $_SESSION['gender'] = $row->gender;
            $_SESSION['course'] = $row->course;
            $_SESSION['sem'] = $row->sem;
            $_SESSION['reg'] = $row->reg;
            $_SESSION['phno'] = $row->phno;
            $_SESSION['email'] = $row->email;
            $_SESSION['pic'] = $row->profile;

            header("Location: elearning.php");
            exit;
        } else {
            echo '<script>alert("Incorrect password");window.location="login.php";</script>';
        }
    } else {
        echo '<script>alert("User not found or not accepted");window.location="login.php";</script>';
    }

    $stmt->close();
    $conn->close();
}
?>