<?php
session_start();

if (!isset($_SESSION['level'])) {
    $_SESSION['level'] = 1;
}

$crossword_answers = [
    1 => ['E', 'C', 'H', 'O', 'P', 'P'],
    2 => ['A', 'R', 'R', 'A', 'Y', 'S'],
    3 => ['F', 'U', 'N', 'C', 'T', 'I', 'O', 'N'],
    4 => ['S', 'W', 'I', 'T', 'C', 'H'],
    5 => ['L', 'A', 'R', 'A', 'V', 'E', 'L']
];

$level_descriptions = [
    1 => "The `echo` function in PHP is used to output one or more strings. It's one of the most commonly used functions to display text, variables, or HTML content on the web page.",
    2 => "Arrays in PHP are used to store multiple values in a single variable. They are extremely flexible and can hold different data types. PHP supports indexed, associative, and multidimensional arrays.",
    3 => "A `function` in PHP is a block of code that can be repeatedly called to perform a specific task. Functions help in reducing code redundancy and improving modularity.",
    4 => "The `switch` statement in PHP is a control structure used to execute one block of code among many based on the value of a variable. It's an alternative to multiple `if-else` conditions.",
    5 => "Laravel is a popular open-source PHP web framework known for its elegant syntax and features like routing, authentication, and database management. It's widely used for building modern web applications."
];

$result = '';
$current_level = $_SESSION['level'];
$correct = false; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correct = true;
    foreach ($crossword_answers[$current_level] as $index => $answer) {
        $cell_name = "cell" . ($index + 1);
        if (strtoupper(trim($_POST[$cell_name] ?? '')) !== $answer) {
            $correct = false;
            break;
        }
    }

    if ($correct) {
        if ($current_level < 5) {
            $result = "Level $current_level Complete! Well done!<br><br>" . $level_descriptions[$current_level];
            $_SESSION['level']++;
            $_POST = []; 
        } else {
            $result = "Congratulations! You've completed all levels!<br><br>" . $level_descriptions[$current_level];
            session_destroy(); 
        }
    } else {
        $result = 'Incorrect. Try Again!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Learning Crossword Puzzle</title>
    <style>
        body { text-align: center; }
        table { border-collapse: collapse; margin: 20px auto; }
        td { width: 50px; height: 50px; text-align: center; border: 1px solid #ddd; }
        input { width: 100%; height: 100%; font-size: 24px; text-align: center; border: none; }
        input:focus { outline: none; background-color: #f0f8ff; }
        button { padding: 10px 20px; font-size: 16px; margin-top: 20px; }
        .result { font-size: 18px; color: green; }
        .error { color: red; }
        .animated { animation: blink 1s linear infinite; }
        @keyframes blink { 50% { color: orange; } }
        .congrats {
            font-size: 30px;
            font-weight: bold;
            color: green;
            animation: zoomIn 1s ease-in-out;
        }
        @keyframes zoomIn {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>
    <h1>PHP Learning Crossword Puzzle - Level <?php echo $current_level; ?></h1>
    <form method="POST">
        <table>
           
            <?php 
            $num_cells = count($crossword_answers[$current_level]);
            $cols = 6;
            $rows = ceil($num_cells / $cols);

            $cell_counter = 1;
            for ($r = 0; $r < $rows; $r++) {
                echo "<tr>";
                for ($c = 0; $c < $cols; $c++) {
                    if ($cell_counter <= $num_cells) {
                        $cell_name = "cell" . $cell_counter;
                        echo "<td><input type='text' maxlength='1' name='$cell_name' value='" . ($_POST[$cell_name] ?? '') . "' /></td>";
                        $cell_counter++;
                    } else {
                        echo "<td></td>";
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>

        <?php if ($current_level === 1): ?>
            <p>Clue: PHP function used to output text</p>
        <?php elseif ($current_level === 2): ?>
            <p>Clue: Common PHP data type for storing values</p>
        <?php elseif ($current_level === 3): ?>
            <p>Clue: PHP keyword for reusable code blocks</p>
        <?php elseif ($current_level === 4): ?>
            <p>Clue: PHP control structure to evaluate conditions</p>
        <?php elseif ($current_level === 5): ?>
            <p>Clue: Popular PHP web framework</p>
        <?php endif; ?>

        <button type="submit">Check Puzzle</button>
    </form>

    <div class="result">
        <?php if (!empty($result)): ?>
            <p class="<?php echo strpos($result, 'Incorrect') !== false ? 'error' : 'animated'; ?>">
                <?php echo $result; ?>
            </p>
        <?php endif; ?>
    </div>

    <?php if ($correct && $current_level < 5): ?>
        <p class="congrats">Congratulations on Completing Level <?php echo $current_level; ?>!</p>
    <?php elseif ($current_level === 5 && $correct): ?>
        <p class="congrats">You have completed all levels. Great Job!</p>
    <?php endif; ?>
</body>
</html>
