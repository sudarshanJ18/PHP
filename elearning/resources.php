<?php
// Dynamically generate learning resources based on the technology
$phpResources = [
    [
        'title' => 'PHP Installer',
        'link' => 'https://www.php.net/manual/en/install.php',
        'description' => 'PHP Installation Guide'
    ],
    [
        'title' => 'PHP Documentation',
        'link' => 'https://www.php.net/docs.php',
        'description' => 'PHP Official Documentation'
    ],
    [
        'title' => 'PHP Manual',
        'link' => 'https://www.php.net/manual/en/index.php',
        'description' => 'PHP Manual'
    ]
];

$laravelResources = [
    [
        'title' => 'Laravel Installer',
        'link' => 'https://laravel.com/docs/11.x/installation',
        'description' => 'Laravel Installation Guide'
    ],
    [
        'title' => 'Laravel Documentation',
        'link' => 'https://laravel.com/docs/11.x/readme',
        'description' => 'Laravel Official Documentation'
    ]
];

$reactResources = [
    [
        'title' => 'React Installer',
        'link' => 'https://react.dev/learn/installation',
        'description' => 'React Installation Guide'
    ],
    [
        'title' => 'React Documentation',
        'link' => 'https://react.dev/',
        'description' => 'React Official Documentation'
    ]
];

$nodejsResources = [
    [
        'title' => 'Node.js Installer',
        'link' => 'https://nodejs.org/en/download/package-manager',
        'description' => 'Node.js Installation Guide'
    ],
    [
        'title' => 'Node.js Documentation',
        'link' => 'https://nodejs.org/docs/latest/api/',
        'description' => 'Node.js Official Documentation'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Resources</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Animation */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-50">

<!-- Header Section -->
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
        </nav>
    </div>
</header>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-semibold text-center text-blue-600 mb-8 fade-in-up">Learning Resources</h1>
    <p class="text-center text-lg text-gray-700 mb-12 fade-in-up">Access various documentation resources to help you learn and master technologies.</p>

    <!-- PHP Section -->
    <div class="mb-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 fade-in-up">PHP Resources</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($phpResources as $resource): ?>
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out fade-in-up">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4"><?php echo $resource['title']; ?></h3>
                    <a href="<?php echo $resource['link']; ?>" target="_blank" class="text-blue-500 hover:text-blue-700 transition duration-300"><?php echo $resource['description']; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Laravel Section -->
    <div class="mb-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 fade-in-up">Laravel Resources</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($laravelResources as $resource): ?>
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out fade-in-up">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4"><?php echo $resource['title']; ?></h3>
                    <a href="<?php echo $resource['link']; ?>" target="_blank" class="text-blue-500 hover:text-blue-700 transition duration-300"><?php echo $resource['description']; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- React Section -->
    <div class="mb-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 fade-in-up">React Resources</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($reactResources as $resource): ?>
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out fade-in-up">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4"><?php echo $resource['title']; ?></h3>
                    <a href="<?php echo $resource['link']; ?>" target="_blank" class="text-blue-500 hover:text-blue-700 transition duration-300"><?php echo $resource['description']; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Node.js Section -->
    <div class="mb-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 fade-in-up">Node.js Resources</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($nodejsResources as $resource): ?>
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out fade-in-up">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4"><?php echo $resource['title']; ?></h3>
                    <a href="<?php echo $resource['link']; ?>" target="_blank" class="text-blue-500 hover:text-blue-700 transition duration-300"><?php echo $resource['description']; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Footer Section -->
<footer class="bg-blue-500 py-8 text-white">
    <div class="flex justify-center space-x-6 mt-4">
        <a href="#" class="text-xl text-gray-700 hover:text-blue-500 transition-all">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="#" class="text-xl text-gray-700 hover:text-blue-500 transition-all">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="text-xl text-gray-700 hover:text-blue-500 transition-all">
            <i class="fab fa-linkedin"></i>
        </a>
    </div>
</footer>

</body>
</html>
