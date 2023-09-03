<?php

include('config.php');
if (isset($_SESSION['user_id'])) {
    header("location: typing.php?");
} else {
    if (isset($_POST['Signin'])) {
        $email = $_POST['Email'];
        $fullname = $_POST['Fullname'];
        $password = $_POST['Password'];
        $confirmpassword = $_POST['Confirm-password'];

        if ($password == $confirmpassword) {
            if (empty(trim($email)) || empty(trim($fullname)) || empty(trim($password)) || empty(trim($confirmpassword))) {
                echo "Please fill up all the information";
            } else {

                try {
                    $val_email = $connection->prepare("SELECT * FROM tbl_users WHERE Email=:checkemail");
                    $val_email->bindParam("checkemail", $email, PDO::PARAM_STR);
                    $val_email->execute();
                    $result = $val_email->fetch(PDO::FETCH_ASSOC);
                    if (count($result) > 0) {
                        echo ("Email Already exists!");
                    } else {
                        //Email Doesnt exists, Enter account
                        $query = $connection->prepare("INSERT INTO tbl_users(Email,FullName,Password) values (:email,:fullname,:password)");
                        $query->bindParam("email", $email, PDO::PARAM_STR);
                        $query->bindParam("fullname", $fullname, PDO::PARAM_STR);
                        $query->bindParam("password", $password, PDO::PARAM_STR);


                        echo ("Data inserted successfully!");
                    }
                } catch (Exception $ex) {
                    echo ("An error occcured $ex");
                }
            }
        } else {
            echo "Password didn't match!";
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
    <title>Create Account - TypePro.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link href="src/css/course.css" rel="stylesheet" />
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


                <form action="" method="POST">
                    <img src="src/assets/ic_account.svg" alt="logo" />
                    <h1>Create Account</h1>

                    <label for="Fullname">Fullname</label>
                    <input class="form-control" type="text" name="Fullname" id="fullname" placeholder="Full Name">


                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="Email" id="email" placeholder="Email">


                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="Password" id="password" placeholder="Password">

                    <label for="confirm-password">Confirm Password</label>
                    <input class="form-control" type="password" name="Confirm-password" id="confirm-password" placeholder="Confirm Password">


                    <a href="login.html" class="create-account">
                        Already have account?
                    </a>
                    <input class="btn btn-primary create-button" type="submit" value="Create Account" name="Signin" id="createaccount">
                </form>
            </div>
        </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/1cbd0d9b07.js" crossorigin="anonymous"></script>


<script type="module" src="src/js/script.js"></script>

</html>