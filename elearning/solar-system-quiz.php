<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar System Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Header -->
<header class="bg-blue-600 text-white py-4 text-center">
    <h1 class="text-3xl font-bold">Solar System Quiz</h1>
</header>

<!-- Game Content -->
<section class="py-16 bg-white text-center">
    <h2 class="text-2xl font-semibold text-gray-800 mb-8">Test your knowledge of the Solar System!</h2>
    <div id="question-container" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <p id="question-text" class="text-lg text-gray-700">What is the largest planet in our Solar System?</p>
        <div id="answer-options" class="mt-4 space-y-2">
            <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Jupiter</button>
            <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Earth</button>
            <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Mars</button>
            <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Saturn</button>
        </div>
        <p id="feedback" class="text-gray-600 mt-4"></p>
    </div>
</section>

<!-- Footer -->
<footer class="bg-blue-600 text-white py-4 text-center">
    <p class="text-lg">LPU E-Learning Platform</p>
</footer>

<script>
    // Example Game Logic
    const correctAnswer = "Jupiter"; // Define the correct answer
    const buttons = document.querySelectorAll("#answer-options button");

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            const userAnswer = button.textContent;
            const feedback = document.getElementById("feedback");

            if (userAnswer === correctAnswer) {
                feedback.textContent = "Correct! Jupiter is the largest planet.";
                feedback.classList.add("text-green-500");
            } else {
                feedback.textContent = "Incorrect! Try again.";
                feedback.classList.add("text-red-500");
            }
        });
    });
</script>

</body>
</html>
