<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamification - LPU E-Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Animations for progress bar */
        @keyframes progress-bar {
            0% { width: 0%; }
            100% { width: 70%; }
        }

        .progress-bar {
            animation: progress-bar 2s ease-in-out forwards;
        }

        /* Add smooth transition for other elements */
        .transition-all {
            transition: all 0.3s ease;
        }

        .hover\:scale-105:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Navigation -->
<header class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 shadow-lg">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center p-4">
        <a href="index.php" class="text-white text-3xl font-bold">LPU Learning</a>
        <nav class="space-x-6 text-white font-medium">
            <a href="index.php" class="hover:text-gray-300 transition duration-300">Home</a>
            <a href="gamification.php" class="hover:text-gray-300 transition duration-300">Gamification</a>
            <a href="login.php" class="hover:text-gray-300 transition duration-300">Login</a>
        </nav>
    </div>
</header>

<!-- Gamification Content -->
<section class="py-16 bg-blue-50 text-center">
    <h2 class="text-3xl font-semibold text-gray-800 mb-8">Play a Game</h2>
    <div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Game 1: Sudoku -->
        <div class="game-card bg-gradient-to-r from-blue-500 to-indigo-600 p-6 rounded-xl shadow-2xl hover:scale-105 transition-all transform hover:shadow-2xl">
            <h3 class="text-2xl font-bold text-white drop-shadow-md">Sudoku</h3>
            <p class="text-white mt-2 text-lg">Challenge your brain with Sudoku puzzles.</p>
            <a href="sudoku.php" class="mt-4 bg-white text-blue-600 py-2 px-6 rounded-full hover:bg-gray-200 transition duration-300">Play Sudoku</a>
        </div>
        
        <!-- Game 2: Simulation -->
        <div class="game-card bg-gradient-to-r from-green-400 to-blue-500 p-6 rounded-xl shadow-2xl hover:scale-105 transition-all transform hover:shadow-2xl">
            <h3 class="text-2xl font-bold text-white drop-shadow-md">Simulation</h3>
            <p class="text-white mt-2 text-lg">Experience real-world scenarios in a simulation game.</p>
            <a href="simulation.php" class="mt-4 bg-white text-green-600 py-2 px-6 rounded-full hover:bg-gray-200 transition duration-300">Play Simulation</a>
        </div>
        
        <!-- Game 3: RPG Quest -->
        <div class="game-card bg-gradient-to-r from-purple-600 to-pink-500 p-6 rounded-xl shadow-2xl hover:scale-105 transition-all transform hover:shadow-2xl">
            <h3 class="text-2xl font-bold text-white drop-shadow-md">RPG Quest</h3>
            <p class="text-white mt-2 text-lg">Embark on a quest in an RPG adventure.</p>
            <a href="rpg-quest.php" class="mt-4 bg-white text-purple-600 py-2 px-6 rounded-full hover:bg-gray-200 transition duration-300">Play RPG Quest</a>
        </div>
        
        <!-- Game 4: Memory Match -->
        <div class="game-card bg-gradient-to-r from-yellow-400 to-red-500 p-6 rounded-xl shadow-2xl hover:scale-105 transition-all transform hover:shadow-2xl">
            <h3 class="text-2xl font-bold text-white drop-shadow-md">Memory Match</h3>
            <p class="text-white mt-2 text-lg">Improve your memory with matching pairs.</p>
            <a href="memory-match.php" class="mt-4 bg-white text-yellow-600 py-2 px-6 rounded-full hover:bg-gray-200 transition duration-300">Play Memory Match</a>
        </div>
        
        <!-- Game 5: Quiz -->
        <div class="game-card bg-gradient-to-r from-indigo-600 to-blue-400 p-6 rounded-xl shadow-2xl hover:scale-105 transition-all transform hover:shadow-2xl">
            <h3 class="text-2xl font-bold text-white drop-shadow-md">Quiz</h3>
            <p class="text-white mt-2 text-lg">Test your knowledge with various quizzes.</p>
            <a href="load_quiz.php" class="mt-4 bg-white text-indigo-600 py-2 px-6 rounded-full hover:bg-gray-200 transition duration-300">Take a Quiz</a>
        </div>

        <!-- Game 6: Crossword -->
        <div class="game-card bg-gradient-to-r from-teal-500 to-cyan-600 p-6 rounded-xl shadow-2xl hover:scale-105 transition-all transform hover:shadow-2xl">
            <h3 class="text-2xl font-bold text-white drop-shadow-md">Crossword</h3>
            <p class="text-white mt-2 text-lg">Solve crosswords and test your word skills.</p>
            <a href="crossword.php" class="mt-4 bg-white text-teal-600 py-2 px-6 rounded-full hover:bg-gray-200 transition duration-300">Play Crossword</a>
        </div>
    </div>
</section>

<!-- Add these styles in your CSS -->
<style>
    .game-card {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        padding: 2rem;
        border-radius: 1rem;
    }

    .game-card:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .game-card h3 {
        font-size: 1.875rem;
        font-weight: bold;
        color: #fff;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        transition: color 0.3s ease;
    }

    .game-card a {
        display: inline-block;
        text-decoration: none;
        padding: 12px 25px;
        border-radius: 50px;
        background-color: #fff;
        color: #2d3748;
        font-weight: 600;
        text-transform: uppercase;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .game-card a:hover {
        background-color: #e2e8f0;
        transform: scale(1.1);
    }

    .game-card .text-gray-600 {
        transition: color 0.3s ease;
    }

    .game-card:hover .text-gray-600 {
        color: #4B5563; /* Darker gray */
    }
</style>

<!-- Progress Bar Component -->
<section class="py-8 bg-white text-center">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Your Learning Progress</h2>
    <div class="max-w-md mx-auto">
        <div class="bg-gray-200 rounded-full h-4">
            <div class="bg-blue-600 h-4 rounded-full progress-bar" style="width: 70%;"></div>
        </div>
        <p class="text-gray-600 mt-2">You are 70% through your current course!</p>
    </div>
</section>

<!-- Leaderboard Section -->
<section class="py-16 bg-white text-center">
    <h2 class="text-3xl font-semibold text-gray-800 mb-8">Top Performers</h2>
    <div class="max-w-2xl mx-auto">
        <table class="min-w-full bg-gray-50 shadow rounded-lg">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-6">Rank</th>
                    <th class="py-3 px-6">User</th>
                    <th class="py-3 px-6">Points</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="py-4 px-6">1</td>
                    <td class="py-4 px-6">Bhargav</td>
                    <td class="py-4 px-6">1200</td>
                </tr>
                <tr class="border-b">
                    <td class="py-4 px-6">2</td>
                    <td class="py-4 px-6">Joel</td>
                    <td class="py-4 px-6">1100</td>
                </tr>
                <tr>
                    <td class="py-4 px-6">3</td>
                    <td class="py-4 px-6">Sudarshan</td>
                    <td class="py-4 px-6">900</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<!-- Quiz Selection Section -->
<section class="py-16 bg-gray-100 text-center">
    <h2 class="text-3xl font-semibold text-gray-800 mb-8">Choose a Quiz</h2>
    <div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Quiz Card 1 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-all">
            <h3 class="text-xl font-bold text-gray-800">Solar System Quiz</h3>
            <p class="text-gray-600 mt-2">Test your knowledge about planets and space.</p>
            <button onclick="openQuiz('solar-system')" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Take Quiz</button>
        </div>
        <!-- Quiz Card 2 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-all">
            <h3 class="text-xl font-bold text-gray-800">History Quiz</h3>
            <p class="text-gray-600 mt-2">Challenge yourself with historical facts.</p>
            <button onclick="openQuiz('history')" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Take Quiz</button>
        </div>
        <!-- Quiz Card 3 -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:scale-105 transition-all">
            <h3 class="text-xl font-bold text-gray-800">Science Quiz</h3>
            <p class="text-gray-600 mt-2">How well do you know science?</p>
            <button onclick="openQuiz('science')" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Take Quiz</button>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-white py-8">
    <div class="max-w-screen-xl mx-auto text-center">
        <p>&copy; 2024 LPU E-Learning Platform. All Rights Reserved.</p>
        <div class="space-x-6 mt-4">
            <a href="#" class="hover:text-gray-300 transition duration-300">Privacy Policy</a>
            <a href="#" class="hover:text-gray-300 transition duration-300">Terms of Use</a>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script>
    function openQuiz(quiz) {
        // Handle opening quiz functionality here (for example, redirect to quiz page)
        alert('Opening ' + quiz + ' quiz...');
    }
</script>

</body>
</html>