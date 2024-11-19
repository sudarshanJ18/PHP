<?php
session_start();

if (empty($_SESSION['admin_session'])) {
    header('location:admin_login.php');
    exit();
} else {
    ob_start(); 

    $host = "localhost";
    $username = "root";
    $password = "1234";
    $database = "college";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM subject_master ORDER BY sub_id ASC");
    $stmt->execute();
    $result = $stmt->get_result();

    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $delete_stmt = $conn->prepare("DELETE FROM subject_master WHERE sub_id = ?");
        $delete_stmt->bind_param("i", $delete_id);
        $delete_stmt->execute();

        if ($delete_stmt->affected_rows > 0) {
            echo '<script>window.location="subject_list.php";</script>';
        }
        $delete_stmt->close();
    }
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles if needed */
    </style>
</head>
<body class="bg-gray-100">

    <div class="bg-blue-500 text-white p-4">
        <div class="max-w-screen-xl mx-auto flex justify-between items-center">
            <a href="index.php" class="text-3xl font-semibold">LPU</a>
            <div>
                <ul class="flex space-x-4">
                    <li><a href="user_list.php" class="hover:text-yellow-300">USERS</a></li>
                    <li><a href="subject_master.php" class="hover:text-yellow-300">SUBJECTS</a></li>
                    <li><a href="notesupload.php" class="hover:text-yellow-300">UPLOAD</a></li>
                    <li><a href="List_of_notes.php" class="hover:text-yellow-300">NOTES</a></li>
                    <li><a href="admin_logout.php" class="hover:text-yellow-300">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-2xl font-semibold mb-4">Subject List</h2>
            <table class="min-w-full table-auto">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="px-4 py-2">SUBJECT ID</th>
                        <th class="px-4 py-2">SUBJECT NAME</th>
                        <th class="px-4 py-2">LOGO</th>
                        <th class="px-4 py-2">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_object()) {
                    ?>
                    <tr class="bg-gray-100 hover:bg-gray-200">
                        <td class="px-4 py-2"><?php echo $row->sub_id; ?></td>
                        <td class="px-4 py-2"><?php echo $row->subject; ?></td>
                        <td class="px-4 py-2 text-center">
                            <img src="Logo_upload/<?php echo $row->logo; ?>" alt="Logo" class="h-8 w-8 mx-auto">
                        </td>
                        <td class="px-4 py-2 text-center">
                            <div class="flex justify-center gap-4">
                                <a href="subject_list.php?delete_id=<?php echo $row->sub_id; ?>" 
                                   onclick="return confirm('Are you sure you want to delete this subject?')" 
                                   class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    
</body>
</html>

<?php
    // Close database connection
    $stmt->close();
    $conn->close();
}
?>
