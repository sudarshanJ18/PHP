<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | E-Learning-Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-poppins bg-gradient-to-r from-green-500 to-blue-500 min-h-screen flex flex-col items-center p-4">

    <!-- Navigation Bar -->
    <nav class="w-full bg-black bg-opacity-70 shadow-md py-3 mb-8 animate-slideInDown">
        <ul class="flex justify-center space-x-10">
            <li><a href="index.php" class="text-white hover:text-green-500 font-medium">Home</a></li>
            <li><a href="login.php" class="text-white hover:text-green-500 font-medium">Login</a></li>
            <li><a href="gamification.php" class="text-white hover:text-green-500 font-medium">Gamification</a></li>
            <li><a href="contact.php" class="text-white hover:text-green-500 font-medium">Contact</a></li>
        </ul>
    </nav>

    <div class="contact-section w-full max-w-screen-lg bg-white bg-opacity-80 rounded-lg shadow-lg p-8 flex flex-wrap gap-8 animate-fadeIn">
        <!-- Left Column: Google Map and Company Address -->
        <div class="w-full lg:w-1/2">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Find Us Here</h2>
            <div class="map mb-6">
                <iframe class="w-full h-64 rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2056.86041007671!2d75.70341719239163!3d31.25550857571405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5f5e9c489cf3%3A0x4049a5409d53c300!2sLovely%20Professional%20University!5e0!3m2!1sen!2sin!4v1731091370435!5m2!1sen!2sin" loading="lazy"></iframe>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Company Address</h2>
                <p>Lovely Professional University,</p>
                <p>Grand Trunk Road, Kapurthala</p>
                <p>Phone: <span class="font-medium">9392479356</span></p>
                <p>Email: <a href="mailto:info@lpu.com" class="text-blue-600 hover:underline">info@lpu.com</a></p>
                <p class="mt-4">Follow us: 
                    <a href="https://www.facebook.com/LPUUniversity/" class="text-blue-600 hover:underline">Facebook</a>, 
                    <a href="https://x.com/LPUUniversity/" class="text-blue-600 hover:underline">Twitter</a>
                </p>
            </div>
        </div>

        <!-- Right Column: Contact Form -->
        <div class="w-full lg:w-1/2">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contact Us</h2>
            <form method="post" action="contact-post.php" class="space-y-4">
                <div>
                    <label for="name" class="block text-lg text-gray-700">Name</label>
                    <input type="text" id="name" name="userName" placeholder="Enter your name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>
                <div>
                    <label for="email" class="block text-lg text-gray-700">Email</label>
                    <input type="email" id="email" name="userEmail" placeholder="Enter your email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="phone" class="block text-lg text-gray-700">Mobile</label>
                    <input type="tel" id="phone" name="userPhone" placeholder="Enter your phone number" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="message" class="block text-lg text-gray-700">Subject</label>
                    <textarea id="message" name="userMsg" placeholder="Type your message here" class="w-full p-3 border border-gray-300 rounded-lg h-32 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <div>
                    <button type="submit" class="w-full bg-green-500 text-white py-3 rounded-lg hover:bg-green-600 transition duration-300">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
