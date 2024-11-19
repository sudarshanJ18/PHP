<?php
session_start();

if (empty($_SESSION['admin_session'])) {
    header('Location: admin_login.php');
    exit();
}

$host = 'localhost';
$username = 'root';
$password = '1234';
$database = 'college';
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM registration WHERE register_no = ?");
    $stmt->bind_param('s', $delete_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<script>window.location="user_list.php";</script>';
    }
    $stmt->close();
}

if (isset($_GET['accept_id'])) {
    $accept_id = $_GET['accept_id'];
    $stmt = $conn->prepare("UPDATE registration SET status = 'accept' WHERE register_no = ?");
    $stmt->bind_param('s', $accept_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<script>alert("Status changed successfully");window.location="user_list.php";</script>';
    }
    $stmt->close();
}

$stmt = $conn->prepare("SELECT * FROM registration ORDER BY regdate ASC");
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body class="bg-gray-100">

<!-- Navigation Menu -->
<div class="bg-blue-700 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-white text-xl font-bold">E-Learning Admin Panel</h1>
        <nav>
            <ul class="flex space-x-6 text-white">
                <li><a href="user_list.php" class="hover:underline">Users</a></li>
                <li><a href="subject_master.php" class="hover:underline">Subjects</a></li>
                <li><a href="notesupload.php" class="hover:underline">Upload</a></li>
                <li><a href="List_of_notes.php" class="hover:underline">Notes</a></li>
                <li><a href="admin_logout.php" class="hover:underline">Logout</a></li>
            </ul>
        </nav>
    </div>
</div>

<!-- User List Table -->
<div class="container mx-auto my-10">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-10 py-3 px-4">#</th>
                    <th class="w-32 py-3 px-4">Reg Date</th>
                    <th class="py-3 px-4">Name</th>
                    <th class="py-3 px-4">Gender</th>
                    <th class="py-3 px-4">Course</th>
                    <th class="py-3 px-4">Sem</th>
                    <th class="py-3 px-4">Reg No</th>
                    <th class="py-3 px-4">Profile</th>
                    <th class="w-20 py-3 px-4">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php 
                $i = 1;
                while ($row = $result->fetch_object()) { ?>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4 text-center"><?php echo $i++; ?></td>
                        <td class="py-3 px-4 text-center"><?php echo $row->regdate; ?></td>
                        <td class="py-3 px-4 text-center"><?php echo $row->first_name . ' ' . $row->last_name; ?></td>
                        <td class="py-3 px-4 text-center"><?php echo $row->gender; ?></td>
                        <td class="py-3 px-4 text-center"><?php echo $row->course; ?></td>
                        <td class="py-3 px-4 text-center"><?php echo $row->sem; ?></td>
                        <td class="py-3 px-4 text-center"><?php echo $row->register_no; ?></td>
                        <td class="py-3 px-4 text-center">
                            <img src="profile_upload/<?php echo $row->photo; ?>" alt="Profile" class="h-10 w-10 rounded-full">
                        </td>
                        <td class="py-3 px-4 text-center flex justify-center space-x-4">
    <!-- Accept Action -->
    <a href="user_list.php?accept_id=<?php echo $row->register_no; ?>" class="text-green-600 hover:text-green-800">
        <i class="fas fa-check-circle text-2xl"></i> <!-- Font Awesome Check Icon -->
    </a>

    <!-- Delete Action -->
    <a href="user_list.php?delete_id=<?php echo $row->register_no; ?>" 
       onclick="return confirm('Are you sure you want to delete this user?')" 
       class="text-red-600 hover:text-red-800">
        <i class="fas fa-times-circle text-2xl"></i> <!-- Font Awesome Times Icon -->
    </a>
</td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



<?php
$stmt->close();
$conn->close();
?>
</body>
</html>
