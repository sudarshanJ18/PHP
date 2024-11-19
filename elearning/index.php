<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPU - E-Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/scrollreveal"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Navigation -->
<header class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 shadow-lg">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center p-4">
        <a href="index.php" class="text-white text-3xl font-bold">LPU - E Learning Platform</a>
        <nav class="space-x-6 text-white font-medium">
            <a href="index.php" class="hover:text-gray-300 transition duration-300">Home</a>
            <a href="login.php" class="hover:text-gray-300 transition duration-300">Login</a>
            <a href="registration.php" class="hover:text-gray-300 transition duration-300">Registration</a>
			<a href="gamification.php" class="hover:text-gray-300 transition duration-300">Gamification</a>
            <a href="resources.php" class="hover:text-gray-300 transition duration-300">Resources</a>
            <a href="contact.php" class="hover:text-gray-300 transition duration-300">Contact</a>
            <a href="admin_login.php" class="hover:text-gray-300 transition duration-300">Admin</a>
        </nav>
    </div>
</header>

<div class="relative bg-cover bg-center" style="background-image: url('https://i.postimg.cc/0jyBfXRP/slider1.jpg'); height: 400px;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 flex justify-center items-center">
        <div class="text-center text-white space-y-4">
            <h1 class="text-4xl md:text-5xl font-extrabold animate-up">A Place of Learning & Liberty</h1>
            <p class="text-lg md:text-xl animate-fade">We provide leading intensive courses to help you achieve your dreams.</p>
            <a href="registration.php" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-full text-lg transition duration-300">Get Started</a>
        </div>
    </div>
</div>


<!-- Features Section -->
<section class="py-16 bg-gray-50 text-center">
    <h2 class="text-3xl font-semibold text-gray-800 mb-10 animate-up">Our Key Features</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="bg-white shadow-xl rounded-lg p-6 transition transform hover:scale-105 hover:shadow-2xl hover:bg-blue-100">
            <img src="web/images/icon1.png" alt="Feature 1" class="w-16 mx-auto mb-4">
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Intensive Courses</h3>
            <p class="text-gray-600">Learn from the best instructors and become an expert in your field.</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-6 transition transform hover:scale-105 hover:shadow-2xl hover:bg-blue-100">
            <img src="web/images/icon2.png" alt="Feature 2" class="w-16 mx-auto mb-4">
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Professional Mentorship</h3>
            <p class="text-gray-600">Get guidance from industry leaders and grow your professional network.</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-6 transition transform hover:scale-105 hover:shadow-2xl hover:bg-blue-100">
            <img src="web/images/icon3.png" alt="Feature 3" class="w-16 mx-auto mb-4">
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Career Support</h3>
            <p class="text-gray-600">Receive career guidance and get ready for the job market with our resources.</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-6 transition transform hover:scale-105 hover:shadow-2xl hover:bg-blue-100">
            <img src="web/images/icon4.png" alt="Feature 4" class="w-16 mx-auto mb-4">
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Global Network</h3>
            <p class="text-gray-600">Join a community of learners and professionals from around the world.</p>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16 bg-white">
    <div class="max-w-screen-xl mx-auto flex flex-col lg:flex-row items-center space-x-8">
        <div class="lg:w-1/2">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4 animate-up">About Our Platform</h2>
            <p class="text-gray-600 text-lg">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
        </div>
        <div class="lg:w-1/2 mt-8 lg:mt-0">
            <img src="https://i.postimg.cc/G2gS2PV2/pic1.jpg" alt="About Image" class="w-full h-auto rounded-lg shadow-xl">
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-blue-500 py-8 text-white">
    <div class="flex justify-between items-center max-w-6xl mx-auto px-6">
        <!-- Authors Section (Left) -->
        <div class="text-left space-y-2">
            <p class="text-lg font-semibold">&copy; 2024 LPU - E-Learning Platform</p>
            <p class="text-md">Developed by:</p>
            <p class="text-sm italic">Jalla Sudarshan Reddy</p>
            <p class="text-sm italic">Nalla Bhargav Thirupathi Rao</p>
            <p class="text-sm italic">Joel Daniel Vijayabhavanam</p>
        </div>

        <!-- Faculty Submission Section (Right) -->
        <div class="text-right space-y-2">
            <p class="text-lg">Project submitted to:</p>
            <p class="text-md font-bold">Dr. Mamta Sharma</p>
        </div>
    </div>

    <!-- Social Media Links (Centered below) -->
    <div class="flex justify-center space-x-6 mt-4">
        <a href="#" class="text-xl text-gray-700 hover:text-blue-500 transition-all">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="#" class="text-xl text-gray-700 hover:text-blue-400 transition-all">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="text-xl text-gray-700 hover:text-blue-700 transition-all">
            <i class="fab fa-linkedin"></i>
        </a>
        <a href="#" class="text-xl text-gray-700 hover:text-pink-500 transition-all">
            <i class="fab fa-instagram"></i>
        </a>
    </div>
</footer>

</body>
</html>
