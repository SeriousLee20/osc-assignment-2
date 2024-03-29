<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="auth.css"/>
</head>
<body>
    <?php
        include_once '../config/database.php';

        if(isset($_POST['register'])){
            $email = stripslashes($_REQUEST['email']);
            $type = stripslashes($_REQUEST['type']);
            $password = stripslashes($_REQUEST['password']);
            $password_confirmation = stripslashes($_REQUEST['password_confirmation']);
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $checkQuery = "SELECT * FROM Users WHERE email = '$email'";
            $duplicate = mysqli_query($db, $checkQuery);
            if ($password != $password_confirmation) {  
                echo "<div class='form'>
                    <h3>Password are not match</h3><br/>
                    <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                    </div>";
            }
            else if (mysqli_num_rows($duplicate) > 0) {
                echo "<div class='form'>
                    <h3>Email registered.</h3><br/>
                    <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                    </div>";
            } 
            
            else {
                $insertQuery = "INSERT INTO Users (email, type, password) VALUES
                ('$email', '$type', '$password_hash')";
                
                if(mysqli_query($db, $insertQuery)){
                    echo "<div class='form'>
                    <h3>You are registered successfully.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a></p>
                    </div>";
                }
                else{
                    echo "<div class='form'>
                    <h3>Required fields are missing.</h3><br/>
                    <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                    </div>";
                }
            }
        } else {
            ?>
                <form class="form" action="" method="post">
                    <h1 class="login-title">Registration</h1>
                    <input type="text" class="login-input" name="email" placeholder="Email">
                    <input type="password" class="login-input" name="password" placeholder="Password">
                    <input type="password" class="login-input" name="password_confirmation" placeholder="Password Confirmation">
                    <div class="select-type">
                        <label for="cars" class="type-option">Choose a car:</label>
                        <select id="type" name="type">
                            <option value="student">Student</option>
                            <option value="lecturer">Lecturer</option>
                        </select>
                    </div>
                    <input type="submit" name="register" value="Register" class="login-button">
                    <p class="link"><a href="login.php">Click to Login</a></p>
                </form>
            <?php
                }
        ?>
</body>


