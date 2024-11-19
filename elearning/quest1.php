<?php
session_start();

if (!isset($_SESSION['quest1_completed'])) {
    $_SESSION['quest1_completed'] = false;
}

function completeQuest() {
    $_SESSION['quest1_completed'] = true;
    $_SESSION['inventory'][] = 'PHP Beginner Badge';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['complete_quest'])) {
    completeQuest();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quest 1: PHP Variables</title>
</head>
<body>
    <h1>Quest 1: Learn PHP Variables</h1>
    <p><strong>Objective:</strong> Complete the code to store your name in a variable and display it.</p>
    
    <?php if (!$_SESSION['quest1_completed']): ?>
        <form method="POST">
            <label for="name">Enter your name:</label>
            <input type="text" name="name" id="name">
            <button type="submit" name="complete_quest">Complete Quest</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
            $name = $_POST['name']; // Store player's name in a variable
            echo "<p>Your name is: " . htmlspecialchars($name) . "</p>";
        }
        ?>

    <?php else: ?>
        <p>Congratulations! You've completed the quest and earned the PHP Beginner Badge!</p>
        <a href="index.php"><button>Return to Main Menu</button></a>
    <?php endif; ?>

</body>
</html>
