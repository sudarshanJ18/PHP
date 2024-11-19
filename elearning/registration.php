<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fn = trim($_POST['fn']);
    $ln = trim($_POST['ln']);
    $father = trim($_POST['father']);
    $mother = trim($_POST['mother']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $course = trim($_POST['course']);
    $sem = trim($_POST['sem']);
    $reg = trim($_POST['reg']);
    $addr = trim($_POST['addr']);
    $city = trim($_POST['city']);
    $pin = trim($_POST['pin']);
    $phno = trim($_POST['phno']);
    $email = trim($_POST['email']);
    $user = trim($_POST['username']);
    $pw = trim($_POST['pw']);
    $cpw = trim($_POST['cpw']);

    if (empty($fn) || empty($ln) || empty($father) || empty($mother) || empty($dob) || empty($gender) || empty($course) || empty($sem) || empty($reg) || empty($addr) || empty($city) || empty($pin) || empty($phno) || empty($email) || empty($user) || empty($pw) || empty($cpw)) {
        $errors[] = "All fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (!is_numeric($phno) || strlen($phno) != 10) {
        $errors[] = "Please enter a valid 10-digit phone number.";
    }

    if (!is_numeric($pin)) {
        $errors[] = "Pin code should contain only digits.";
    }

    if ($pw !== $cpw) {
        $errors[] = "Passwords do not match.";
    }

    $hashedPassword = password_hash($pw, PASSWORD_DEFAULT);

    $pic = "";
    if (isset($_FILES['profile']) && $_FILES['profile']['error'] == 0) {
        $pic = $_FILES['profile']['name'];
        $target = "profile_upload/" . basename($pic);
        $fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileType, $allowedTypes)) {
            $errors[] = "Profile picture must be an image (JPG, JPEG, PNG, GIF).";
        } elseif (!move_uploaded_file($_FILES['profile']['tmp_name'], $target)) {
            $errors[] = "Failed to upload profile picture.";
        }
    }

    if (empty($errors)) {
        $conn = new mysqli('localhost', 'root', '1234', 'college');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $regdate = date('Y-m-d');
        $stmt = $conn->prepare("INSERT INTO registration (regdate, first_name, last_name, father, mother, dob, gender, course, sem, reg, addr, city, pin, phno, email, profile, username, password, status) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'accept')");
        $stmt->bind_param("ssssssssssssssssss", $regdate, $fn, $ln, $father, $mother, $dob, $gender, $course, $sem, $reg, $addr, $city, $pin, $phno, $email, $pic, $user, $hashedPassword);

        if ($stmt->execute()) {
            echo '<script>alert("Registered successfully");window.location="login.php";</script>';
        } else {
            $errors[] = "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        foreach ($errors as $error) {
            echo '<script>alert("' . $error . '");</script>';
        }
    }
}
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - LPU E-Learning</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Navigation Bar -->
<nav class="bg-blue-600 p-4 text-white">
    <div class="max-w-screen-lg mx-auto flex justify-between items-center">
        <a href="index.php" class="text-lg font-bold">LPU</a>
        <div>
            <a href="index.php" class="mx-4">Home</a>
            <a href="login.php" class="mx-4">Login</a>
            <a href="gamification.php" class="mx-4">Gamification</a>
            <a href="contact.php" class="mx-4">Contact</a>
        </div>
    </div>
</nav>

<section class="py-16 bg-white">
    <div class="max-w-screen-lg mx-auto p-6 shadow-lg rounded-lg bg-gray-50">
        <h2 class="text-2xl font-bold mb-8 text-center">Register Here</h2>

        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 text-red-700 p-4 mb-6 rounded">
                <ul>
                    <?php foreach ($errors as $error) echo "<li>$error</li>"; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <input name="fn" type="text" placeholder="First Name" required class="border p-3 rounded" value="<?php echo isset($fn) ? $fn : ''; ?>" />
                <input name="ln" type="text" placeholder="Last Name" required class="border p-3 rounded" value="<?php echo isset($ln) ? $ln : ''; ?>" />
                <input name="father" type="text" placeholder="Father's Name" required class="border p-3 rounded" value="<?php echo isset($father) ? $father : ''; ?>" />
                <input name="mother" type="text" placeholder="Mother's Name" required class="border p-3 rounded" value="<?php echo isset($mother) ? $mother : ''; ?>" />
                <input name="dob" type="text" placeholder="Date of Birth (DD/MM/YYYY)" required class="border p-3 rounded" value="<?php echo isset($dob) ? $dob : ''; ?>" />
                <input name="reg" type="text" placeholder="Register Number" required class="border p-3 rounded" value="<?php echo isset($reg) ? $reg : ''; ?>" />
                <input name="addr" type="text" placeholder="Address" required class="border p-3 rounded" value="<?php echo isset($addr) ? $addr : ''; ?>" />
                <div>
                    <label>Gender :</label>
                    <input type="radio" name="gender" value="Male" <?php echo (isset($gender) && $gender == 'Male') ? 'checked' : ''; ?> /> Male
                    <input type="radio" name="gender" value="Female" <?php echo (isset($gender) && $gender == 'Female') ? 'checked' : ''; ?> /> Female
                </div>
                <input name="city" type="text" placeholder="City" required class="border p-3 rounded" value="<?php echo isset($city) ? $city : ''; ?>" />
                <input name="pin" type="text" placeholder="Pin Code" required class="border p-3 rounded" value="<?php echo isset($pin) ? $pin : ''; ?>" />
                <input name="phno" type="text" placeholder="Mobile Number" required class="border p-3 rounded" value="<?php echo isset($phno) ? $phno : ''; ?>" />
                <input name="email" type="email" placeholder="Email" required class="border p-3 rounded" value="<?php echo isset($email) ? $email : ''; ?>" />
                <input name="username" type="text" placeholder="Username" required class="border p-3 rounded" value="<?php echo isset($user) ? $user : ''; ?>" />
                <input name="pw" type="password" placeholder="Password" required class="border p-3 rounded" />
                <input name="cpw" type="password" placeholder="Confirm Password" required class="border p-3 rounded" />
                <input type="file" name="profile" class="border p-3 rounded" />
                <select name="course" class="border p-3 rounded" required>
                    <option value="BBA" <?php echo isset($course) && $course == 'BBA' ? 'selected' : ''; ?>>BBA</option>
                    <option value="BTech" <?php echo isset($course) && $course == 'BTech' ? 'selected' : ''; ?>>BTech</option>
                    <option value="BCA" <?php echo isset($course) && $course == 'BCA' ? 'selected' : ''; ?>>BCA</option>
                    <option value="BSc" <?php echo isset($course) && $course == 'BSc' ? 'selected' : ''; ?>>BSc</option>
                </select>
                <select name="sem" class="border p-3 rounded" required>
                    <option value="1" <?php echo isset($sem) && $sem == '1' ? 'selected' : ''; ?>>Semester 1</option>
                    <option value="2" <?php echo isset($sem) && $sem == '2' ? 'selected' : ''; ?>>Semester 2</option>
                    <option value="3" <?php echo isset($sem) && $sem == '3' ? 'selected' : ''; ?>>Semester 3</option>
                    <option value="4" <?php echo isset($sem) && $sem == '4' ? 'selected' : ''; ?>>Semester 4</option>
                    <option value="5" <?php echo isset($sem) && $sem == '5' ? 'selected' : ''; ?>>Semester 5</option>
                    <option value="6" <?php echo isset($sem) && $sem == '6' ? 'selected' : ''; ?>>Semester 6</option>
                    <option value="7" <?php echo isset($sem) && $sem == '7' ? 'selected' : ''; ?>>Semester 7</option>
                    <option value="8" <?php echo isset($sem) && $sem == '8' ? 'selected' : ''; ?>>Semester 8</option>
                </select>
            </div>
            <button type="submit" class="mt-6 bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded block mx-auto">Register</button>
        </form>
    </div>
</section>

</body>
</html>
