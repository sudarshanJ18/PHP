<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Navigation -->
<header class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 shadow-lg">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center p-4">
        <a href="index.php" class="text-white text-3xl font-bold">LPU</a>
        <nav class="space-x-6 text-white font-medium">
            <a href="index.php" class="hover:text-gray-300 transition duration-300">Home</a>
            <a href="registration.php" class="hover:text-gray-300 transition duration-300">Registration</a>
            <a href="gamification.php" class="hover:text-gray-300 transition duration-300">Gamification</a>
            <a href="contact.php" class="hover:text-gray-300 transition duration-300">Contact</a>
        </nav>
    </div>
</header>

<!-- Login Form -->
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">User Login</h1>
        <form action="loginproces.php" method="post" class="space-y-6">
            <div>
                <label for="username" class="block text-gray-700 font-medium">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" 
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" 
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-lg transition duration-300">
                Login
            </button>
        </form>
        <p class="text-center mt-4 text-gray-600">Don't have an account? 
            <a href="registration.php" class="text-blue-500 hover:underline">Sign up here</a>.
        </p>
    </div>
</div>
<footer class="bg-blue-500 py-8 text-white text-center">
    <div class="space-y-4">
        <p>&copy; 2024 Tute - E-Learning Platform</p>

        <div class="flex justify-center space-x-4">
            <a href="#" class="text-xl text-gray-700 hover:text-blue-500">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#" class="text-xl text-gray-700 hover:text-blue-400">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-xl text-gray-700 hover:text-blue-700">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="#" class="text-xl text-gray-700 hover:text-pink-500">
                <i class="fab fa-instagram"></i>
            </a>
        </div>

    </div>
</footer>

</body>
</html>
