<?php include 'database.php';  ?>
<?php session_start(); ?>

<?php
    // set question number
    $number = (int) $_GET['n'];

    /**
     * 
     * Get Total Question Number
     */

    $query = "SELECT * FROM questions";

    // Get Results
    $result = $mysqli -> query($query) or die($mysqli-> error.__LINE__);
    $total = $result->num_rows;
    

    /**
     * Set Question
     */
    $query = "SELECT * FROM questions WHERE question_number = $number";

    // Get result from query
    // pass error & line number
    $result = $mysqli -> query($query) or die($mysqli-> error.__LINE__);

    // associate array with requested data
    $question = $result -> fetch_assoc();

    /**
     * Set Choices
     */
    $query = "SELECT * FROM choices WHERE question_number = $number";

    // Get result from query
    // pass error & line number
    $choices = $mysqli -> query($query) or die($mysqli-> error.__LINE__);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>

</head>
<body>
    

    <header>
        <div class = "container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total ?></div>

            <p class="question">
                <?php
                    echo $question['text'];
                ?>
            </p>

            <form method="post" action="process.php">

                <ul class="choices">

                <?php
                while($row = $choices->fetch_assoc()):
                ?>

                    <li><input name="choice" type="radio" value="<?php echo $row['id'] ?>"><?php echo $row['text'] ?></li>

                <?php
                    endwhile;
                ?>
            
                </ul>
                <input type="submit" name="submit" value="Submit">
                <input type="hidden" name="number" value="<?php echo $number; ?>"/>

            </form>
            
        </div>
    </main>

    <footer>
        <div class="container">
            Copyright &copy; 2022, PHP Quizzer
        </div>
    </footer>
</body>
</html>