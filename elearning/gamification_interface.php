<?php include('gamification.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gamification Dashboard</title>
    <link rel="stylesheet" href="web/css/style.css"> <!-- Use your existing styles -->
    <style>
        .leaderboard {
            margin: 20px auto;
            width: 60%;
            background: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
        }
        table {
            width: 100%;
            text-align: left;
        }
        th, td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="leaderboard">
        <?php getLeaderboard(); ?>
    </div>
    
    <form method="POST" action="gamification.php">
        <input type="hidden" name="user_id" value="1"> <!-- Replace with dynamic user ID -->
        <button type="submit" name="complete_task">Complete a Task</button>
    </form>
</body>
</html>
