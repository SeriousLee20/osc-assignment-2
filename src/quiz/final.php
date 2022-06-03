<?php session_start(); ?>

<!-- Display the results -->
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
           
            <h2>You're Done!</h2>
            <p>Congrats! You have completed the test.</p>
            <p>Final Score: <?php echo $_SESSION['score']; ?></p>
            <a href="question.php?n=1" class="start">Take the quiz again.</a>
            <?php $_SESSION['score'] = 0; ?>
        </div>
    </main>

    <footer>
        <div class="container">
            Copyright &copy; 2022, PHP Quizzer
        </div>
    </footer>
</body>
</html>