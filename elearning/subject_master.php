<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Add Subject</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<!-- Navigation -->
<div class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto p-4 flex justify-between items-center">
        <div class="logo">
            <a href="index.php" class="text-2xl font-bold text-green-600">LPU</a>
        </div>
        <div class="header_right">
            <ul class="flex space-x-6 text-lg text-gray-700">
                <li><a href="user_list.php" class="hover:text-green-600">USERS</a></li>
                <li><a href="subject_master.php" class="text-green-600 font-bold">SUBJECTS</a></li>
                <li><a href="notesupload.php" class="hover:text-green-600">UPLOAD</a></li>
                <li><a href="List_of_notes.php" class="hover:text-green-600">NOTES</a></li>
                <li><a href="admin_logout.php" class="hover:text-green-600">LOGOUT</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Form Container -->
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Add New Subject</h2>
    
    <form action="subject_process.php" method="post" enctype="multipart/form-data">
        <!-- Subject Input -->
        <div class="mb-5">
            <label for="subject" class="block text-lg text-gray-600 mb-2">Subject Name</label>
            <input type="text" name="subject" id="subject" placeholder="Enter Subject Name"
                   class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-green-500"
                   required>
        </div>

        <!-- Logo Upload -->
        <div class="mb-5">
            <label for="logo" class="block text-lg text-gray-600 mb-2">Upload Logo</label>
            <input type="file" name="logo" id="logo"
                   class="w-full p-2 bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:border-green-500"
                   accept="image/*" required>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" name="submit"
                    class="bg-green-600 text-white py-2 px-6 rounded-full hover:bg-green-700 transition duration-200">
                Submit
            </button>
        </div>
    </form>

    <!-- View All Subjects Button -->
    <div class="text-right mt-6">
        <a href="subject_list.php" class="inline-block bg-blue-600 text-white py-2 px-4 rounded-full hover:bg-blue-700 transition duration-200">
            <i class="fas fa-eye"></i> View All Subjects
        </a>
    </div>
</div>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
