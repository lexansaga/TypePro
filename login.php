<?php
require_once "config.php";

if (isset($_SESSION['user_id'])) {
    header("location: typing.php?");
} else {
    if (isset($_POST['Login'])) {
        $email = trim($_POST['Email']);
        $password = trim($_POST['Password']);

        if (empty($email) || empty($password)) {
            echo "Please fill up all information";
        } else {
            if ($email == 'admin@typepro.com' && $password == '8dgI2lBs6HTcQCd#*#i1') {
                $_SESSION['isadmin'] = true;
                header("location: main.php?");
            } else {
                $query = $connection->prepare("SELECT * FROM tbl_users WHERE Email=:email AND Password=:password");

                $query->bindParam("email", $email);
                $query->bindParam("password", $password);

                try {
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_ASSOC);
                    if (!$result) {
                        echo "Wrong username and password";
                    } else {
                        $_SESSION['user_id'] = $result['ID'];
                        $_SESSION['user_email'] = $result['Email'];
                        echo "Success logged in";

                        header("location: typing.php?");
                    }
                } catch (Exception $ex) {
                    echo ("Error: $ex");
                } finally {
                    unset($query);
                    unset($connection);
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - TypePro.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link href="src/css/course.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="authentication">

    <div class="container-fluid login-wrapper">
        <div class="row">
            <div class="col-md-5 left-accent">
                <header>
                    <a href="index.html" class="logo">
                        <p>TypePro.</p>
                    </a>
                </header>

                <img class="left-accent-bg" src="src/assets/typing.jpg" alt="accent-bg" />
            </div>
            <div class="col-md-7 auth-wrapper">


                <form method="POST" action="">
                    <img src="src/assets/ic_login.svg" alt="logo" />
                    <h1>Login</h1>
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="Email" id="email" placeholder="Email">


                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="Password" id="password" placeholder="Password">
                    <a href="createaccount.php" class="create-account">
                        Create account?
                    </a>
                    <input class="btn btn-primary" type="submit" value="Login" id="login" name="Login">
                </form>
            </div>
        </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>

<script src="https://kit.fontawesome.com/1cbd0d9b07.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js">
    AOS.init({
        once: tue
    });
</script>

<script type="module" src="src/js/script.js"></script>

</html>