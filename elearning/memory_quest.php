<?php 
session_start();

if (!isset($_SESSION['level'])) {
    $_SESSION['level'] = 1; 
}

$gameCompleted = false;

if (isset($_POST['complete_level'])) {
    $_SESSION['level']++;
    $gameCompleted = true;
}

if (isset($_POST['submit_array'])) {
    $fruits = [$_POST['fruit1'], $_POST['fruit2'], $_POST['fruit3']];
    $fruitArray = implode(", ", $fruits); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Memory Quest</title>
    <style>
        .card {
            width: 50px;
            height: 50px;
            display: inline-block;
            background-color: lightgray;
            text-align: center;
            line-height: 50px;
            font-size: 24px;
            cursor: pointer;
        }
        .flipped {
            background-color: white;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
        }
        .card-container div {
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1>PHP Memory Quest - Level <?php echo $_SESSION['level']; ?></h1>

    <!-- Level Content -->
    <?php if ($_SESSION['level'] == 1): ?>
        <h2>Level 1: Match the Cards</h2>
        <p>Match the cards to unlock your first achievement!</p>
        <div id="board" class="card-container"></div>
        <form method="POST">
            <input type="submit" name="complete_level" value="Complete Level">
        </form>
    <?php elseif ($_SESSION['level'] == 2 && !$gameCompleted): ?>
        <h2>Level 2: Learn PHP Arrays</h2>
        <p>Great job completing Level 1! Now, let's learn about PHP arrays. Follow the instructions below.</p>
        <p>In this level, you'll create a PHP array by entering fruit names. Here's a quick guide on how to create arrays in PHP:</p>
        <ul>
            <li><strong>What is a PHP Array?</strong> An array in PHP is a variable that can hold multiple values. Each value is stored in a specific position in the array, and you can access it using an index.</li>
            <li><strong>Creating an Array:</strong> Arrays in PHP can be created using the <code>array()</code> function or the short array syntax <code>[]</code>.</li>
            <li><strong>Accessing Array Elements:</strong> You can access array elements using the index. PHP arrays are zero-indexed, meaning the first element is at index 0.</li>
        </ul>
        <h3>Example:</h3>
        <pre>
            $fruits = array("Apple", "Banana", "Cherry");  // Create an array
            echo $fruits[0];  // Outputs: Apple
        </pre>

        <h3>Your Task:</h3>
        <form method="POST">
            <input type="text" name="fruit1" placeholder="Enter Fruit 1" required>
            <input type="text" name="fruit2" placeholder="Enter Fruit 2" required>
            <input type="text" name="fruit3" placeholder="Enter Fruit 3" required>
            <input type="submit" name="submit_array" value="Submit Array">
        </form>
        <?php
        if (isset($fruitArray)) {
            echo "<p>Your array of fruits: $fruitArray</p>";
            echo "<p>Notice how each fruit is accessed and displayed. You can also manipulate the array in many ways, such as adding, removing, or sorting elements!</p>";
        }
        ?>
    <?php elseif ($_SESSION['level'] == 2 && $gameCompleted): ?>
        <h2>Congratulations on Completing Level 2!</h2>
        <p>Now, you've successfully created your array! Here’s what you just learned:</p>
        <p><strong>PHP Arrays:</strong></p>
        <ul>
            <li>Arrays allow you to store multiple values in a single variable.</li>
            <li>You can access values in an array by using their index (starting at 0).</li>
            <li>You can manipulate arrays by adding or removing elements, sorting them, and more!</li>
        </ul>
        <h3>Example Code:</h3>
        <pre>
            $fruits = ["Apple", "Banana", "Cherry"];
            echo $fruits[0]; // Outputs: Apple
        </pre>
        <p>Experiment with arrays further! Try creating arrays with different types of values, such as numbers, strings, and even other arrays!</p>
        <form method="POST">
            <input type="submit" name="complete_level" value="Move to Next Level">
        </form>
    <?php elseif ($_SESSION['level'] == 3): ?>
        <h2>Level 3: PHP Form Handling</h2>
        <p>Submit your favorite programming language below:</p>
        <form method="POST">
            <input type="text" name="language" placeholder="Enter your favorite programming language" required>
            <input type="submit" name="submit_language" value="Submit">
        </form>
        <?php
        if (isset($_POST['submit_language'])) {
            echo "<p>Your favorite programming language is: " . htmlspecialchars($_POST['language']) . "!</p>";
        }
        ?>
    <?php endif; ?>

    <?php
    if ($_SESSION['level'] == 1) {
        echo "<script>
            let cards = ['A', 'B', 'C', 'A', 'B', 'C']; // Simple set of cards
            cards = shuffle(cards);
            let flippedCards = [];
            let matchedCards = [];
    
            function shuffle(array) {
                for (let i = array.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
                return array;
            }
    
            function generateBoard() {
                let board = document.getElementById('board');
                for (let i = 0; i < cards.length; i++) {
                    let card = document.createElement('div');
                    card.classList.add('card');
                    card.setAttribute('data-index', i);
                    card.innerHTML = '?';
                    card.onclick = flipCard;
                    board.appendChild(card);
                }
            }
    
            function flipCard(event) {
                let card = event.target;
                if (flippedCards.length < 2 && !card.classList.contains('flipped')) {
                    card.classList.add('flipped');
                    card.innerHTML = cards[card.getAttribute('data-index')];
                    flippedCards.push(card);
    
                    if (flippedCards.length === 2) {
                        checkMatch();
                    }
                }
            }
    
            function checkMatch() {
                if (flippedCards[0].innerHTML === flippedCards[1].innerHTML) {
                    matchedCards.push(flippedCards[0], flippedCards[1]);
                    flippedCards = [];
                } else {
                    setTimeout(() => {
                        flippedCards[0].classList.remove('flipped');
                        flippedCards[0].innerHTML = '?';
                        flippedCards[1].classList.remove('flipped');
                        flippedCards[1].innerHTML = '?';
                        flippedCards = [];
                    }, 1000);
                }
            }
    
            generateBoard();
        </script>";
    }
    ?>

</body>
</html>
