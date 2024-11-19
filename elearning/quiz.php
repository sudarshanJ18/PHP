<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedAnswer = $_POST['quiz'];
    $correctAnswer = 'Jupiter';
    $result = ($selectedAnswer === $correctAnswer) ? 'Correct! Jupiter is the largest planet.' : 'Incorrect. The correct answer is Jupiter.';
    header("Location: gamification.php?result=" . urlencode($result));
    exit();
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Page - LPU E-Learning</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<section class="py-16 bg-white">
    <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Quick Quiz</h2>
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
        <form action="quiz.php" method="POST">
            <p class="text-gray-700">Which is the largest planet in our solar system?</p>
            <div class="mt-4 space-y-2">
                <label class="block">
                    <input type="radio" name="quiz" value="Earth"> Earth
                </label>
                <label class="block">
                    <input type="radio" name="quiz" value="Jupiter"> Jupiter
                </label>
                <label class="block">
                    <input type="radio" name="quiz" value="Mars"> Mars
                </label>
                <label class="block">
                    <input type="radio" name="quiz" value="Venus"> Venus
                </label>
            </div>
            <button type="submit" class="mt-6 bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">
                Submit Answer
            </button>
        </form>
    </div>
</section>

</body>
</html>
