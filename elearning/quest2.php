<?php
session_start();

if (!isset($_SESSION['quest2_completed'])) {
    $_SESSION['quest2_completed'] = false;
}

function completeQuest() {
    $_SESSION['quest2_completed'] = true;
    $_SESSION['inventory'][] = 'PHP Function Master Badge';
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
    <title>Quest 2: PHP Functions</title>
</head>
<body>
    <h1>Quest 2: Learn PHP Functions</h1>
    <p><strong>Objective:</strong> Write a PHP function to add two numbers and display the result.</p>

    <?php if (!$_SESSION['quest2_completed']): ?>
        <form method="POST">
            <label for="num1">Enter first number:</label>
            <input type="number" name="num1" id="num1" required><br>
            <label for="num2">Enter second number:</label>
            <input type="number" name="num2" id="num2" required><br>
            <button type="submit" name="complete_quest">Complete Quest</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['num1']) && isset($_POST['num2'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $sum = $num1 + $num2;

            echo "<p>The sum of $num1 and $num2 is: $sum</p>";
        }
        ?>

    <?php else: ?>
        <p>Congratulations! You've completed the quest and earned the PHP Function Master Badge!</p>
        <a href="index.php"><button>Return to Main Menu</button></a>
    <?php endif; ?>

</body>
</html>
