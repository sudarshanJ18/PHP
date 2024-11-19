<?php
session_start();

if (!isset($_SESSION['quest3_completed'])) {
    $_SESSION['quest3_completed'] = false;
}

function completeQuest() {
    $_SESSION['quest3_completed'] = true;
    $_SESSION['inventory'][] = 'PHP Array Expert Badge';
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
    <title>Quest 3: PHP Arrays</title>
</head>
<body>
    <h1>Quest 3: Learn PHP Arrays</h1>
    <p><strong>Objective:</strong> Create a PHP array to store 3 different fruits and display them.</p>

    <?php if (!$_SESSION['quest3_completed']): ?>
        <form method="POST">
            <label for="fruit1">Enter first fruit:</label>
            <input type="text" name="fruit1" id="fruit1" required><br>
            <label for="fruit2">Enter second fruit:</label>
            <input type="text" name="fruit2" id="fruit2" required><br>
            <label for="fruit3">Enter third fruit:</label>
            <input type="text" name="fruit3" id="fruit3" required><br>
            <button type="submit" name="complete_quest">Complete Quest</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fruit1']) && isset($_POST['fruit2']) && isset($_POST['fruit3'])) {
            $fruits = [$_POST['fruit1'], $_POST['fruit2'], $_POST['fruit3']];
            echo "<p>Your array of fruits: </p><ul>";
            foreach ($fruits as $fruit) {
                echo "<li>" . htmlspecialchars($fruit) . "</li>";
            }
            echo "</ul>";
        }
        ?>

    <?php else: ?>
        <p>Congratulations! You've completed the quest and earned the PHP Array Expert Badge!</p>
        <a href="index.php"><button>Return to Main Menu</button></a>
    <?php endif; ?>

</body>
</html>
