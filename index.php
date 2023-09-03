<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TypePro.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link href="src/css/course.css" rel="stylesheet" />
</head>

<body>
    <header>
        <a href="index.html" class="logo">
            <p>TypePro.</p>
        </a>
        <nav class="top-nav">
            <ul class="nav-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="login.html">Lesson</a></li>
                <li><a href="playlist.html">Play</a></li>
                <li><a href="test.php">Test</a></li>
                <li class="lang-selector">
                    <div class="lang">
                        <img src="src/assets/ic_lang.png" alt="flag" loading="lazy" />
                        <p class="lang-code">EN</p>
                    </div>
                    <ul class="avail-languages">
                        <li>
                            <a href="#?lang">
                                <img src="src/assets/ic_lang.png" alt="flag" loading="lazy" />
                                <p class="lang-code">EN</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="src/assets/ic_lang.png" alt="flag" loading="lazy" />
                                <p class="lang-code">FR</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="src/assets/ic_lang.png" alt="flag" loading="lazy" />
                                <p class="lang-code">TL</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="src/assets/ic_lang.png" alt="flag" loading="lazy" />
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
    <div class="container-fluid landing">
        <div class="row">
            <div class="col-md-6 landing-image-wrapper">
                <img class="landing-image" src="src/assets/ic_landing.svg" alt="landing" loading="lazy" />
            </div>
            <div class="col-md-6 landing-text-wrapper">
                <div>
                    <h1>
                        TypePro.
                    </h1>
                    <h4>
                        Start your keyboard lessons with <br>
                        us. Learn how to type properly.
                    </h4>
                    <ul class="benefits">
                        <li><i class="fa-solid fa-check"></i>Interactive Test</li>
                        <li><i class="fa-solid fa-check"></i>Keyboard Literacy</li>
                        <li><i class="fa-solid fa-check"></i>Free Lessons</li>
                    </ul>
                    <div class="landing-buttons">
                        <a href="login.php" class="btn btn-primary">Begin Lesson</a>
                        <a href="playlist.html" class="btn btn-primary">Play Games</a>
                    </div>
                </div>

            </div>
        </div>



        <div class="row learn-with-wrapper">
            <img class="learn-with-accent" src="src/assets/typing.jpg" alt="accent" loading="lazy" />
            <div class="learn-with-card">
                <h2>Learn Keyboard With.</h2>
                <div class="row learn-with-content">
                    <div class="col-md-4">
                        <i class="fa-solid fa-bolt"></i>
                        <h3>Speed</h3>
                        <p>Speed is the number of words someone can accurately type in one minute.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fa-solid fa-bullseye"></i>
                        <h3>Accuracy</h3>
                        <p>Accuracy refers to a lack of mistakes or errors.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fa-solid fa-anchor"></i>
                        <h3>Confidence</h3>
                        <p>Type with confidence, with less mistakes and improve typing skills</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row whylove-wrapper">
                <h2>Why you'll love TypePro.</h2>
                <div class="col-md-6">
                    <ul class="list-reasons">
                        <li>
                            <div class="reason-grid">
                                <div class="reason-icon">
                                    <i class="fa-solid fa-lightbulb"></i>
                                </div>
                                <div class="reason-title">
                                    Interactive Lessons
                                </div>
                                <div class="reason-content">
                                    TypePro. provide interactive lessons to play with
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="reason-grid">
                                <div class="reason-icon">
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="reason-title">
                                    Learn like a professional
                                </div>
                                <div class="reason-content">
                                    TypePro. content are compiled by our professional typist
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="reason-grid">
                                <div class="reason-icon">
                                    <i class="fa-solid fa-chess-board"></i>
                                </div>
                                <div class="reason-title">
                                    Free interactive material
                                </div>
                                <div class="reason-content">
                                    Keyboard response has a unique functions to play with
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="reason-grid">
                                <div class="reason-icon">
                                    <i class="fa-solid fa-language"></i>
                                </div>
                                <div class="reason-title">
                                    Game Section
                                </div>
                                <div class="reason-content">
                                    TypePro. includes games to play with for entertainment purposes and learn at the
                                    same time.
                                </div>
                            </div>
                        </li>


                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="media-container">
                        <img src="src/assets/typing.jpg" alt="media" loading="lazy" />
                    </div>
                </div>
            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/1cbd0d9b07.js" crossorigin="anonymous"></script>

<script type="module">
    // Import the functions you need from the SDKs you need
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-app.js";
    import {
        getAnalytics
    } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyBwMdO9DztcUWigPkQDStW6CE-YiuVszzQ",
        authDomain: "typepro-29d6f.firebaseapp.com",
        projectId: "typepro-29d6f",
        storageBucket: "typepro-29d6f.appspot.com",
        messagingSenderId: "602258840688",
        appId: "1:602258840688:web:b99e0179a346fce564e8b5",
        measurementId: "G-SQYP27N7L0"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
</script>

<script type="module" src="src/js/script.js"></script>


</html>