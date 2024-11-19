<?php
ob_start(); 
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$un = "root";
$upw = "1234";
$host = "localhost";
$dbname = "college";

$conn = new mysqli($host, $un, $upw, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM registration WHERE username = ? AND password = ? AND status = 'accept'");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
    while ($r = $res->fetch_object()) {
        $fn = $r->first_name;
        $ln = $r->last_name;
        $name = $fn . ' ' . $ln;
        $father = $r->father_name;
        $mother = $r->mother_name;
        $dob = $r->dob;
        $gender = $r->gender;
        $course = $r->course;
        $sem = $r->sem;
        $reg = $r->register_no;
        $phno = $r->phno;
        $email = $r->email;
        $profile_pic = $r->photo;
        $password = $r->password;
        $status = 'accept';
    }

    $_SESSION['un'] = $username;
    $_SESSION['name'] = $name;
    $_SESSION['dob'] = $dob;
    $_SESSION['gender'] = $gender;
    $_SESSION['course'] = $course;
    $_SESSION['sem'] = $sem;
    $_SESSION['reg'] = $reg;
    $_SESSION['phno'] = $phno;
    $_SESSION['email'] = $email;
    $_SESSION['pic'] = $profile_pic;
    $_SESSION['pswd'] = $password;

    header("location:elearning.php");
} else {
    echo '<script>alert("NOT AUTHENTICATED");window.location="login.php";</script>';
}

$conn->close();
?>
