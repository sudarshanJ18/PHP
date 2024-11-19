<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudoku Game</title>
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

        .sudoku-container {
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

        table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            width: 33.33%;
            height: 33.33%;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #ddd;
        }

        input {
            width: 40px;
            height: 40px;
            font-size: 18px;
            text-align: center;
            border-radius: 4px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #007BFF;
            outline: none;
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

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="sudoku-container">
        <h1>Sudoku Puzzle</h1>
        <table id="sudoku-grid"></table>
        <button onclick="checkSudoku()">Check Puzzle</button>
        <div class="footer">
            <p>Enjoy solving the puzzle! Good luck!</p>
        </div>
    </div>

    <script>
        const sudokuSolution = [
            [5, 3, 0, 0, 7, 0, 0, 0, 0],
            [6, 0, 0, 1, 9, 5, 0, 0, 0],
            [0, 9, 8, 0, 0, 0, 0, 6, 0],
            [8, 0, 0, 0, 6, 0, 0, 0, 3],
            [4, 0, 0, 8, 0, 3, 0, 0, 1],
            [7, 0, 0, 0, 2, 0, 0, 0, 6],
            [0, 6, 0, 0, 0, 0, 2, 8, 0],
            [0, 0, 0, 4, 1, 9, 0, 0, 5],
            [0, 0, 0, 0, 8, 0, 0, 7, 9]
        ];

        function generateGrid() {
            const table = document.getElementById("sudoku-grid");
            for (let row = 0; row < 9; row++) {
                let tr = document.createElement("tr");
                for (let col = 0; col < 9; col++) {
                    let td = document.createElement("td");
                    let input = document.createElement("input");
                    input.type = "text";
                    input.maxLength = 1;
                    input.dataset.row = row;
                    input.dataset.col = col;

                    if (sudokuSolution[row][col] !== 0) {
                        input.value = sudokuSolution[row][col];
                        input.disabled = true;
                    }

                    input.addEventListener("input", function() {
                        validateInput(input);
                    });

                    td.appendChild(input);
                    tr.appendChild(td);
                }
                table.appendChild(tr);
            }
        }

        function validateInput(input) {
            if (!/[1-9]/.test(input.value)) {
                input.value = '';
            }
        }

        function checkSudoku() {
            let userSolution = [];
            let isValid = true;

            let inputs = document.querySelectorAll("input[type='text']");
            inputs.forEach(input => {
                let row = input.dataset.row;
                let col = input.dataset.col;
                if (!userSolution[row]) userSolution[row] = [];
                userSolution[row][col] = parseInt(input.value) || 0;
            });

            for (let i = 0; i < 9; i++) {
                if (!checkRow(userSolution, i) || !checkCol(userSolution, i) || !checkGrid(userSolution, i)) {
                    isValid = false;
                    break;
                }
            }

            if (isValid) {
                alert("Congratulations! You've solved the puzzle!");
            } else {
                alert("The solution is incorrect. Please try again.");
            }
        }

        function checkRow(solution, row) {
            let seen = new Set();
            for (let col = 0; col < 9; col++) {
                let val = solution[row][col];
                if (val === 0) continue;
                if (seen.has(val)) return false;
                seen.add(val);
            }
            return true;
        }

        function checkCol(solution, col) {
            let seen = new Set();
            for (let row = 0; row < 9; row++) {
                let val = solution[row][col];
                if (val === 0) continue;
                if (seen.has(val)) return false;
                seen.add(val);
            }
            return true;
        }

        function checkGrid(solution, grid) {
            let seen = new Set();
            let startRow = Math.floor(grid / 3) * 3;
            let startCol = (grid % 3) * 3;

            for (let row = startRow; row < startRow + 3; row++) {
                for (let col = startCol; col < startCol + 3; col++) {
                    let val = solution[row][col];
                    if (val === 0) continue;
                    if (seen.has(val)) return false;
                    seen.add(val);
                }
            }
            return true;
        }

        generateGrid();
    </script>
</body>
</html>
