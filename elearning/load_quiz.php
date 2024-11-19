<?php
// Increase the memory limit to prevent memory exhaustion errors
ini_set('memory_limit', '2048M');  // Set the memory limit to 2 GB
session_start();

// Initialize quiz_level if not set
if (!isset($_SESSION['quiz_level'])) {
    $_SESSION['quiz_level'] = 1;  // Set default quiz level to 1
}

// Define the paths to the JSON files
$dataFiles = [
    'data/unfiltered-web-dev.json',
    'data/unfiltered-web-test-without-answers.json',
    'data/unfiltered-web-train.json'
];

// Function to load quiz data in chunks to prevent memory exhaustion
function loadQuizData($dataFiles) {
    $quizData = [];
    foreach ($dataFiles as $dataFile) {
        // Check if the file exists before attempting to load it
        if (!file_exists($dataFile)) {
            die("Error: The JSON file $dataFile does not exist.");
        }

        // Open the file in read mode
        $fileHandle = fopen($dataFile, 'r');
        if ($fileHandle) {
            while (($line = fgets($fileHandle)) !== false) {
                $lineData = json_decode($line, true);
                if ($lineData !== null) {
                    $quizData[] = $lineData; // Add decoded line to quizData
                }
            }
            fclose($fileHandle);
        }
    }
    return $quizData;
}

// Load and combine data from all JSON files
$quizData = loadQuizData($dataFiles);

// Check if quiz data is valid and contains questions
if (empty($quizData)) {
    die('Error: No quiz data available.');
}

// Flag to track quiz progression
$quizCompleted = false;

// Check if quiz is completed
if (isset($_POST['complete_quiz'])) {
    $_SESSION['quiz_level']++;
    $quizCompleted = true;
}

// Function to display a quiz question
function displayQuiz($questionData) {
    if (isset($questionData['Question']) && isset($questionData['Answer'])) {
        echo '<h3>' . htmlspecialchars($questionData['Question']) . '</h3>';
        echo '<ul>';
        foreach ($questionData['Answer'] as $answer) {
            echo '<li>' . htmlspecialchars($answer) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Invalid question data.</p>';
    }
}

// Function to display learning content after a quiz level
function displayLearningContent() {
    echo '<h2>Learn PHP</h2>';
    echo '<p>Now that you have completed the quiz, let\'s learn more about PHP arrays!</p>';
    echo '<p>In PHP, arrays allow you to store multiple values in a single variable. You can use both indexed arrays and associative arrays. Here is an example:</p>';
    echo '<pre>';
    echo '$fruits = ["Apple", "Banana", "Cherry"];<br>';
    echo 'echo $fruits[0];  // Outputs: Apple</pre>';
    echo '<p>Experiment with creating arrays using different data types and manipulating them with functions like <code>array_push()</code>, <code>array_pop()</code>, etc.</p>';
    echo '<form method="POST"><input type="submit" name="complete_quiz" value="Go to Next Level"></form>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .question {
            font-size: 24px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px;
            background-color: #f0f0f0;
            margin: 5px;
            cursor: pointer;
        }
        li:hover {
            background-color: #ddd;
        }
        .container {
            width: 60%;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>PHP Quiz Game</h1>

    <?php
    // Determine the current quiz level
    $currentLevel = $_SESSION['quiz_level'];
    
    // Display content based on the quiz level
    if ($currentLevel == 1 && !$quizCompleted) {
        echo '<h2>Level 1: Web Development Basics</h2>';
        echo '<p>Let\'s start with some basic questions about web development. Answer the questions below!</p>';

        // Display the first question
        if (isset($quizData[0])) {
            $firstQuestion = $quizData[0]; // Get the first question
            displayQuiz($firstQuestion);
        } else {
            echo '<p>Error: No questions available for this level.</p>';
        }
    } elseif ($currentLevel == 2 && !$quizCompleted) {
        echo '<h2>Level 2: PHP Basics</h2>';
        echo '<p>Great job on completing Level 1! Now, let’s dive deeper into PHP basics.</p>';

        // Display the second question
        if (isset($quizData[1])) {
            $secondQuestion = $quizData[1]; // Get the second question
            displayQuiz($secondQuestion);
        } else {
            echo '<p>Error: No questions available for this level.</p>';
        }
    } elseif ($currentLevel == 2 && $quizCompleted) {
        // Display learning content after the quiz
        displayLearningContent();
    } elseif ($currentLevel == 3) {
        echo '<h2>Level 3: Advanced PHP</h2>';
        echo '<p>Now, let’s learn some advanced PHP topics!</p>';
        // Add additional levels or content here
    }
    ?>

    <form method="POST">
        <input type="submit" name="complete_quiz" value="Complete Quiz Level">
    </form>
</div>

</body>
</html>
