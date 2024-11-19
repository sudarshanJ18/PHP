<?php
  $fn= $_POST['fn'];
  $ln= $_POST['ln'];
  $father= $_POST['father'];
  $mother= $_POST['mother'];
  $dob= $_POST['dob'];
  $gender= $_POST['gender'];
  $course= $_POST['course'];
  $sem= $_POST['sem'];
  $reg= $_POST['reg'];
  $addr= $_POST['addr'];
  $city= $_POST['city']; 
  $pin= $_POST['pin'];
  $phno= $_POST['phno'];
  $email= $_POST['email'];
  $user= $_POST['username'];
  $pw= $_POST['pw'];
  $cpw= $_POST['cpw'];
  $regdate = date('d/m/Y');

  $pic = $_FILES['profile']['name'];
  $target = "profile_upload/" . $pic;
  move_uploaded_file($_FILES['profile']['tmp_name'], $target);

  $un = "root";
  $upw = "1234";
  $host = "localhost";

  $conn = new mysqli($host, $un, $upw, "college");

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $query = "INSERT INTO registration (regdate, first_name, last_name, father_name, mother_name, dob, gender, course, sem, register_no, address, city, pin, phone, email, photo, username, password, status) 
            VALUES ('$regdate', '$fn', '$ln', '$father', '$mother', '$dob', '$gender', '$course', '$sem', '$reg', '$addr', '$city', '$pin', '$phno', '$email', '$pic', '$user', '$pw', 'reject')";

  if ($pw == $cpw) {
      if ($conn->query($query) === TRUE) {
          echo '<script>alert("REGISTERED SUCCESSFULLY");window.location="login.php";</script>';
      } else {
          echo "Error: " . $query . "<br>" . $conn->error;
      }
  } else {
      echo '<script>alert("PASSWORD DOES NOT MATCH");window.location="registration.php";</script>';
  }

  $conn->close();
?>
