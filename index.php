<?php
session_start();

// tell PHP to ignore warning errors
error_reporting(E_ERROR | E_PARSE);
require_once "header.php";

    //Store the player's value for the corresponding clicked box, each in a separate session variable
    if (isset($_POST["playButton"]) && isset($_POST["cell0"])) {
        $_SESSION["gamestate0"] = $_SESSION["currentplayer1"];   
        resultsValidation();
    }
    if (isset($_POST["playButton"]) && isset($_POST["cell1"])) {
        $_SESSION["gamestate1"]= $_SESSION["currentplayer1"];
        resultsValidation();
    }
    if (isset($_POST["playButton"]) && isset($_POST["cell2"])) {
        $_SESSION["gamestate2"]= $_SESSION["currentplayer1"];
        resultsValidation();
    }
    if (isset($_POST["playButton"]) && isset($_POST["cell3"])) {
        $_SESSION["gamestate3"] = $_SESSION["currentplayer1"];
        resultsValidation();
    }
    if (isset($_POST["playButton"]) && isset($_POST["cell4"])) {
        $_SESSION["gamestate4"] = $_SESSION["currentplayer1"];
        resultsValidation();
    }
    if (isset($_POST["playButton"]) && isset($_POST["cell5"])) {
        $_SESSION["gamestate5"] = $_SESSION["currentplayer1"];
        resultsValidation();
    }
    if (isset($_POST["playButton"]) && isset($_POST["cell6"])) {
        $_SESSION["gamestate6"] = $_SESSION["currentplayer1"];
        resultsValidation();
    }
    if (isset($_POST["playButton"]) && isset($_POST["cell7"])) {
        $_SESSION["gamestate7"] = $_SESSION["currentplayer1"];
        resultsValidation();
    }
    if (isset($_POST["playButton"]) && isset($_POST["cell8"])) {
        $_SESSION["gamestate8"] = $_SESSION["currentplayer1"];
        resultsValidation();
    }
    
    // Reset the games' parameters and values to start the game afresh
    if (isset($_POST["restartButton"])) {
        unset($_SESSION["currentplayer1"]);
        $_SESSION["currentplayer1"] = "X";
        unset($_SESSION["gamestate0"], $_SESSION["gamestate1"], $_SESSION["gamestate2"], $_SESSION["gamestate3"], $_SESSION["gamestate4"], $_SESSION["gamestate5"], $_SESSION["gamestate6"], $_SESSION["gamestate7"], $_SESSION["gamestate8"], $_SESSION["disable"]);
    }

    //Display the first player's turn
    if (!isset($_POST["playButton"])) {
        $_SESSION["currentplayer1"] = "X";
        $_SESSION["gamestatus"] = "It's ".$_SESSION["currentplayer1"]."'s turn";
    }

    // Verify whether one player has won or the game has ended in a draw and if the game is still in progress switch the player's turn
    function resultsValidation() {
        if(($_SESSION["gamestate0"] === $_SESSION["gamestate1"] && $_SESSION["gamestate1"] === $_SESSION["gamestate2"] && $_SESSION["gamestate2"] === "X") || 
        ($_SESSION["gamestate0"] === $_SESSION["gamestate4"] && $_SESSION["gamestate4"] === $_SESSION["gamestate8"] && $_SESSION["gamestate8"] === "X") ||
        ($_SESSION["gamestate0"] === $_SESSION["gamestate3"] && $_SESSION["gamestate3"] === $_SESSION["gamestate6"] && $_SESSION["gamestate6"] === "X") ||
        ($_SESSION["gamestate1"] === $_SESSION["gamestate4"] && $_SESSION["gamestate4"] === $_SESSION["gamestate7"] && $_SESSION["gamestate7"] === "X") ||
        ($_SESSION["gamestate2"] === $_SESSION["gamestate4"] && $_SESSION["gamestate4"] === $_SESSION["gamestate6"] && $_SESSION["gamestate6"] === "X") ||
        ($_SESSION["gamestate2"] === $_SESSION["gamestate5"] && $_SESSION["gamestate5"] === $_SESSION["gamestate8"] && $_SESSION["gamestate8"] === "X") ||
        ($_SESSION["gamestate3"] === $_SESSION["gamestate4"] && $_SESSION["gamestate4"] === $_SESSION["gamestate5"] && $_SESSION["gamestate5"] === "X") ||
        ($_SESSION["gamestate6"] === $_SESSION["gamestate7"] && $_SESSION["gamestate7"] === $_SESSION["gamestate8"] && $_SESSION["gamestate8"] === "X")) {
            unset($_SESSION["gamestatus"]);
            $_SESSION["gamestatus"] = "Player X has won!";
            $_SESSION["disable"] = "disabled";
            return;
        } elseif (($_SESSION["gamestate0"] === $_SESSION["gamestate1"] && $_SESSION["gamestate1"] === $_SESSION["gamestate2"] && $_SESSION["gamestate2"] === "O") || 
        ($_SESSION["gamestate0"] === $_SESSION["gamestate4"] && $_SESSION["gamestate4"] === $_SESSION["gamestate8"] && $_SESSION["gamestate8"] === "O") ||
        ($_SESSION["gamestate0"] === $_SESSION["gamestate3"] && $_SESSION["gamestate3"] === $_SESSION["gamestate6"] && $_SESSION["gamestate6"] === "O") ||
        ($_SESSION["gamestate1"] === $_SESSION["gamestate4"] && $_SESSION["gamestate4"] === $_SESSION["gamestate7"] && $_SESSION["gamestate7"] === "O") ||
        ($_SESSION["gamestate2"] === $_SESSION["gamestate4"] && $_SESSION["gamestate4"] === $_SESSION["gamestate6"] && $_SESSION["gamestate6"] === "O") ||
        ($_SESSION["gamestate2"] === $_SESSION["gamestate5"] && $_SESSION["gamestate5"] === $_SESSION["gamestate8"] && $_SESSION["gamestate8"] === "O") ||
        ($_SESSION["gamestate3"] === $_SESSION["gamestate4"] && $_SESSION["gamestate4"] === $_SESSION["gamestate5"] && $_SESSION["gamestate5"] === "O") ||
        ($_SESSION["gamestate6"] === $_SESSION["gamestate7"] && $_SESSION["gamestate7"] === $_SESSION["gamestate8"] && $_SESSION["gamestate8"] === "O")) {
            unset($_SESSION["gamestatus"]);
            $_SESSION["gamestatus"] = "Player O has won!";
            $_SESSION["disable"] = "disabled";
            return;
        } elseif (isset($_SESSION["gamestate0"], $_SESSION["gamestate1"], $_SESSION["gamestate2"], $_SESSION["gamestate3"], $_SESSION["gamestate4"], $_SESSION["gamestate5"], $_SESSION["gamestate6"], $_SESSION["gamestate7"], $_SESSION["gamestate8"])) {
            unset($_SESSION["gamestatus"]);
            $_SESSION["gamestatus"] = "Game ended in a draw!";
        } else {
            $_SESSION["currentplayer1"] = $_SESSION["currentplayer1"] === "X" ? "O" : "X";
            $_SESSION["gamestatus"] = "It's ".$_SESSION["currentplayer1"]."'s turn";
        }
    }
?>
<h1 class="game-title">Tic-tac-toe</h1>
<h2 class="language-implementation">Program logic implemented in PHP</h2>
<form action="index.php" method="post">
    <div class="game-grid">
        <div data-cell-index="0" class="cells">
            <?php if ($_SESSION["gamestate0"] === "X") : ?>
                X
            <?php elseif ($_SESSION["gamestate0"] === "O") : ?>
                O
            <?php else : ?>
                <input type="radio" id="btn" name="cell0" value="0" <?php echo $_SESSION["disable"];?> onclick="document.querySelector('#play-btn').click();"/>
            <?php endif; ?>
        </div>
        <div data-cell-index="1" class="cells">
            <?php if ($_SESSION["gamestate1"] === "X") : ?>
                X
            <?php elseif ($_SESSION["gamestate1"] === "O") : ?>
                O
            <?php else : ?>
                <input type="radio" name="cell1" value="1" <?php echo $_SESSION["disable"];?> onclick="document.querySelector('#play-btn').click();"/>
            <?php endif; ?>
        </div>
        <div data-cell-index="2" class="cells">
            <?php if ($_SESSION["gamestate2"] === 'X') : ?>
                X
            <?php elseif ($_SESSION["gamestate2"] === 'O') : ?>
                O
            <?php else : ?>
                <input type="radio" name="cell2" value="2" <?php echo $_SESSION["disable"];?> onclick="document.querySelector('#play-btn').click();"/>
            <?php endif; ?>
        </div>
        <div data-cell-index="3" class="cells">
            <?php if ($_SESSION["gamestate3"] === 'X') : ?>
                X
            <?php elseif ($_SESSION["gamestate3"] === 'O') : ?>
                O
            <?php else : ?>
                <input type="radio" name="cell3" value="3" <?php echo $_SESSION["disable"];?> onclick="document.querySelector('#play-btn').click();"/>
            <?php endif; ?>
        </div>
        <div data-cell-index="4" class="cells">
            <?php if ($_SESSION["gamestate4"] === 'X') : ?>
                X
            <?php elseif ($_SESSION["gamestate4"] === 'O') : ?>
                O
            <?php else : ?>
                <input type="radio" name="cell4" value="4" <?php echo $_SESSION["disable"];?> onclick="document.querySelector('#play-btn').click();"/>
            <?php endif; ?>
        </div>
        <div data-cell-index="5" class="cells">
            <?php if ($_SESSION["gamestate5"] === 'X') : ?>
                X
            <?php elseif ($_SESSION["gamestate5"] === 'O') : ?>
                O
            <?php else : ?>
                <input type="radio" name="cell5" value="5" <?php echo $_SESSION["disable"];?> onclick="document.querySelector('#play-btn').click();"/>
            <?php endif; ?>
        </div>
        <div data-cell-index="6" class="cells">
            <?php if ($_SESSION["gamestate6"] === 'X') : ?>
                X
            <?php elseif ($_SESSION["gamestate6"] === 'O') : ?>
                O
            <?php else : ?>
                <input type="radio" name="cell6" value="6" <?php echo $_SESSION["disable"];?> onclick="document.querySelector('#play-btn').click();"/>
            <?php endif; ?>
        </div>
        <div data-cell-index="7" class="cells">
            <?php if ($_SESSION["gamestate7"] === 'X') : ?>
                X
            <?php elseif ($_SESSION["gamestate7"] === 'O') : ?>
                O
            <?php else : ?>
                <input type="radio" name="cell7" value="7" <?php echo $_SESSION["disable"];?> onclick="document.querySelector('#play-btn').click();"/>
            <?php endif; ?>
        </div>
        <div data-cell-index="8" class="cells">
            <?php if ($_SESSION["gamestate8"] === 'X') : ?>
                X
            <?php elseif ($_SESSION["gamestate8"] === 'O') : ?>
                O
            <?php else : ?>
                <input type="radio" name="cell8" value="8" <?php echo $_SESSION["disable"];?> onclick="document.querySelector('#play-btn').click();"/>
            <?php endif; ?>
        </div>
    </div>
    <h3 class="game-status" ><?php echo $_SESSION["gamestatus"];?></h3>
    <button type="submit" name="playButton" id="play-btn" value="" hidden>Play</button>
    <input type="submit" name="restartButton" value="Restart Button" class="game-restart"/>
</form>
<?php
require_once "footer.php";
