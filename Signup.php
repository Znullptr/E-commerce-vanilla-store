<?php
    session_start();
    include("connection.php");
    include("functions.php");
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" initial-scale=1>
    <link rel="stylesheet" type="text/css" href="./css/myStyle3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="./Signup.js"></script>
</head>
<body>
    <header>
        <h2> <a href="#" class="logo">vanilla</a></h2>
    </header>
    <section class="main">
        <img src="./img/balloons.png" alt="">
        <div id="box" class="box">
            <form method="post">
                <fieldset>
                    <legend><b>Inscription</b></legend>
                    <div id="error" class="error"></div>
                    <br>
                    <div class="element">Username <input name="username" placeholder="username" type="text" required></div><br>
                    <div class="element">Name<input name="name" type="text" placeholder="Tahar" required></div><br>
                    <div class="element">Surname</label><input name="surname" placeholder="Jaafer" type="text" required></div><br>
                    <div class="element">Email</label><input name="email" type="email" placeholder="example@gmail.com" pattern="[a-z0-9._%+-]+@gmail.com" required></div><br>
                    <div class="element">Adress</label><input name="adress" placeholder="Mahdia" type="text"></div><br>
                    <div class="element">Telephone</label><input name="phone" type="phone" placeholder="+216 00 000 000" pattern="^[+216][/s][0-9]{2})[0-9]{3})[/s][0-9]{3})$" required></div><br>
                    <div class="element">Password</label><input id="password" name="password" type="password" required></div><br>
                    <div class="element">Confirm</label><input id="confirm" name="confirm" type="password" required></div><br>
                    <div class="element"><label for="signup"></label><input id="button" type="submit" value="Sign Up" class="signup"></div>
                </fieldset>
            </form>
        </div>
    </section>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //something is clicked
        $username = $_POST['username'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $adress = $_POST['address'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $num_rows = check_exist_user($con, $username);
        $num_rows1 = check_exist_email($con, $email);

        if (!empty($username) && !is_numeric($username) && !empty($email) && !empty($password) && !empty($confirm)) {
            if ($num_rows > 0) {
                echo '<script type="text/javascript">',
                'show_user_error();',
                '</script>';
            } elseif ($num_rows1 > 0) {
                echo '<script type="text/javascript">',
                'show_email_error();',
                '</script>';
            } elseif ($password != $confirm) {
                echo '<script type="text/javascript">',
                'show_data_error();',
                '</script>';
            } else {
                $query = "INSERT INTO `Client` (`name`, `surname`, `username`, `adress`, `email`, `telephone`, `password`, `confirm`) VALUES ('$name', '$surname', '$username', '$adress', '$email', '$phone', '$password', '$confirm')";
                mysqli_query($con, $query);
                echo '<script type="text/javascript">';
                echo 'window.location.href = "Shop.php";';
                echo '</script>';
                exit();
            }
        }
    }
    ?>
</body>
</html>
