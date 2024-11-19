<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP RPG Quest - Learn PHP</title>
</head>
<body>
    <h1>Welcome to the PHP RPG Quest!</h1>
    <p>Embark on a journey to learn PHP through interactive quests. Each quest will teach you a new concept and challenge you to complete tasks using PHP!</p>

    <p><strong>Your goal:</strong> Complete all the PHP challenges and become a PHP master.</p>

    <?php if (!isset($_SESSION['quest_completed'])): ?>
        <a href="quest1.php"><button>Start First Quest</button></a>
    <?php else: ?>
        <p>You have completed the first quest! Proceed to the next quest.</p>
        <a href="quest2.php"><button>Start Second Quest</button></a>
    <?php endif; ?>
</body>
</html>
