<?php
include 'config.php';
echo ($_SESSION['isadmin']);
if ($_SESSION['isadmin'] == 1) {
    header('location: index.php?');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - TypePro.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <link href="src/css/course.css" rel="stylesheet" />
</head>

<body class="admin">
    <span id="session_user_id" style="display:none"><?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?></span>
    <header>
        <a href="index.html" class="logo">
            <p>TypePro.</p>
        </a>
        <nav class="top-nav">
            <ul class="nav-menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="login.html">Lesson</a></li>
                <li><a href="playlist.html">Play</a></li>
                <li><a href="test.html">Test</a></li>
                <li class="lang-selector">
                    <div class="lang">
                        <img src="src/assets/ic_lang.png" alt="flag" />
                        <p class="lang-code">EN</p>
                    </div>
                    <ul class="avail-languages">
                        <li>
                            <a href="#?lang">
                                <img src="src/assets/ic_lang.png" alt="flag" />
                                <p class="lang-code">EN</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="src/assets/ic_lang.png" alt="flag" />
                                <p class="lang-code">FR</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="src/assets/ic_lang.png" alt="flag" />
                                <p class="lang-code">TL</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="src/assets/ic_lang.png" alt="flag" />
                                <p class="lang-code">IND</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="menu">
            <i class="fa-solid fa-bars"></i>
        </div>
    </header>
    <div class="container-fluid">
        <div class="admin-wrapper row">
            <h2>Users</h2>
            <table id="user-table" class="display table-striped ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>

    <footer>
        <div class="container-fluid">

            <h2>TypePro.</h2>
            <h5><a class="creator-name" href="https://alexandersaga.web.app/" target="_blank">Alexander
                    Saga</a> is committed to providing an accessible website.If you are having trouble accessing
                content, reading a file on the website, or noticing any
                accessibility issues, please call 310.993.8730 and describe the nature of the accessibility issue as
                well as any assistive technology you are using. We make every effort to deliver the information you
                seek in the manner you prefer.</h5>
            <p>Copyright © 2021. <span class="owner">TypingPro.
                </span> All rights Reserved | <a href="#">Terms & Conditions</a> | <a href="https://www.disclaimergenerator.net/live.php?token=oEV5trdeR1CsHWnDcx9nrRArVzlVxe9u">Disclaimer</a>.
                Website
                created by <a class="creator-name" href="https://alexandersaga.web.app/" target="_blank">Alexander
                    Saga</a></p>

        </div>
    </footer>
</body>


<!-- JQUERY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- BOOSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>

<!-- FONT AWESOME -->
<script src="https://kit.fontawesome.com/1cbd0d9b07.js" crossorigin="anonymous"></script>


<!-- DATATABLE JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
</script>
<!-- SCRIPT -->
<script type="module" src="src/js/script.js"></script>

</html>