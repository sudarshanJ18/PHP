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
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .text {
            font-family: "Comic Sans MS";
            font-size: 16px;
            color: #000099;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="bg-blue-500 text-white p-4">
        <div class="max-w-screen-xl mx-auto flex justify-between items-center">
            <a href="index.php" class="text-3xl font-semibold">Tute</a>
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
        <div class="bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-semibold mb-6">Upload Notes</h2>
            <form action="upload_process.php" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="course" class="text-lg text-blue-600">COURSE</label>
                        <select name="course" id="course" class="w-full p-3 mt-2 border rounded-md">
							<option>SELECT</option>
							<option value="BCA">BCA</option>
							<option value="BSc">BSc</option>
							<option value="BTech">BTech</option>
                            <option value="MCA">MCA</option>
                            <option value="MSc">MSc</option>
                            <option value="MTech">MTech</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="text-lg text-blue-600">SUBJECT</label>
                        <select name="subject" id="subject" class="w-full p-3 mt-2 border rounded-md">
                            <option>SELECT</option>
                            <?php
                            $get = "SELECT * FROM subject_master";
                            $result = $conn->query($get);
                            while ($row = $result->fetch_object()) {
                                echo "<option>{$row->subject}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="topic" class="text-lg text-blue-600">TOPIC</label>
                        <input type="text" name="topic" id="topic" class="w-full p-3 mt-2 border rounded-md" placeholder="Enter Topic">
                    </div>
                    <div class="mb-4">
                        <label for="date" class="text-lg text-blue-600">DATE</label>
                        <input type="text" name="date" id="date" value="<?php echo date('d/m/Y'); ?>" class="w-full p-3 mt-2 border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="notes" class="text-lg text-blue-600">NOTES UPLOAD</label>
                        <input type="file" name="notes" id="notes" class="w-full p-3 mt-2 border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="video" class="text-lg text-blue-600">VIDEO UPLOAD</label>
                        <input type="file" name="video" id="video" class="w-full p-3 mt-2 border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="summary" class="text-lg text-blue-600">SUMMARY</label>
                        <textarea name="summary" id="summary" class="w-full p-3 mt-2 border rounded-md" rows="3"></textarea>
                    </div>
                    <div class="mb-4 col-span-2 text-center">
                        <button type="submit" name="submit" class="bg-blue-500 text-white p-3 rounded-lg w-full sm:w-auto hover:bg-blue-700">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer class="bg-gray-800 text-white text-center p-4 mt-6">
        <p>&copy; <?php echo date('Y'); ?> E-Learning | All Rights Reserved</p>
    </footer>
</body>
</html>
