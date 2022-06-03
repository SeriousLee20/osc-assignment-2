<?php
    include 'database.php';
    session_start();
?>

<?php
/**
 * 
 * Get Total Question Number
 */

 $query = "SELECT * FROM questions";

 // Get Results
 $result = $mysqli -> query($query) or die($mysqli-> error.__LINE__);
 $total = $result->num_rows;
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

        <!-- Page before starting the quiz -->
            <h2>Test Your PHP Knowledge</h2>
            <p>This is a multiple choice quiz to test your knowledge of PHP.</p>
            <ul>
                <li><strong>Number of Question:</strong><?php echo $total; ?></li>
                <li><strong>Type:</strong>Multiple Choice</li>
                <li><strong>Estimated Time:</strong><?php echo $total * .5." Minutes"; ?></li>
            </ul>
            <!-- Goes to question.php and the quesiton 1 -->
            <a href="question.php?n=1" class="start">Start Quiz</a>
        </div>
    </main>

    <footer>
        <div class="container">
            Copyright &copy; 2022, PHP Quizzer
        </div>
    </footer>
</body>
</html>