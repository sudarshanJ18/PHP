<?php
session_start();

if (!isset($_SESSION['population'])) {
    $_SESSION['population'] = 0;
    $_SESSION['resources'] = 100;
    $_SESSION['city_built'] = false;
}

function buildCity() {
    if ($_SESSION['city_built']) {
        return "City already built. Click 'Advance Time' to proceed.";
    }

    $_SESSION['city_built'] = true;
    $_SESSION['population'] = 10; 
    $_SESSION['resources'] = 100; 

    return "Building a new city... Population set to 10, resources set to 100.";
}

function advanceTime() {
    if (!$_SESSION['city_built']) {
        return "You need to build a city first.";
    }

    $_SESSION['resources'] -= $_SESSION['population'] * 0.5; 
    $_SESSION['population'] += rand(0, 4); 

    if ($_SESSION['resources'] <= 0) {
        $_SESSION['resources'] = 0;
        return "Resources are depleted! The city is in crisis.";
    }

    return "Time advanced. Population: {$_SESSION['population']} | Resources: " . number_format($_SESSION['resources'], 2);
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['build_city'])) {
        $message = buildCity();
    } elseif (isset($_POST['advance_time'])) {
        $message = advanceTime();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimCity-like PHP Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .simulation-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        #city-details {
            margin-top: 20px;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="simulation-container">
        <h1>SimCity-like PHP Game</h1>
        <p><?php echo $message; ?></p>
        <div id="city-details">
            <p>Population: <?php echo $_SESSION['population']; ?></p>
            <p>Resources: <?php echo number_format($_SESSION['resources'], 2); ?></p>
        </div>

        <!-- Buttons to build city or advance time -->
        <form method="post">
            <button type="submit" name="build_city">Build a New City</button>
            <button type="submit" name="advance_time">Advance Time</button>
        </form>

        <div class="footer">
            <p>Build and manage your city as it grows while learning PHP!</p>
        </div>
    </div>
</body>
</html>
