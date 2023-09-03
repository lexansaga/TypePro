<?php
include 'config.php';
if ($_SESSION['user_id'] == null) {
    header('location: index.php?');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Typing - TypePro.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link href="src/css/course.css" rel="stylesheet" />
</head>

<body class="thistyping">
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
        <div class="row">
            <div class="course-outline col-lg-3">
                <h2>Typing Lesson</h2>


            </div>
            <div class="typing-container col-lg-9">

                <div class="title">
                    <h2>
                        Typing
                    </h2>
                </div>
                <div class="timer">
                    <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="--value: 100">
                        <p class="timer-text">&nbsp</p>
                    </div>

                </div>
                <div class="lesson-paragraph">

                </div>
                <div class="keyboard-wrapper">

                    <div class="type-letter">

                    </div>

                    <div class="keyboard-base">
                        <div class="key" id="192">~</div>
                        <div class="key" id="49">1</div>
                        <div class="key" id="50">2</div>
                        <div class="key" id="51">3</div>
                        <div class="key" id="52">4</div>
                        <div class="key" id="53">5</div>
                        <div class="key" id="54">6</div>
                        <div class="key" id="55">7</div>
                        <div class="key" id="56">8</div>
                        <div class="key" id="57">9</div>
                        <div class="key" id="48">0</div>
                        <div class="key" id="189">-</div>
                        <div class="key" id="187">+</div>
                        <div class="key delete" id="8">Delete</div>
                        <div class="key tab" id="9">Tab</div>
                        <div class="key" id="81">Q</div>
                        <div class="key" id="87">W</div>
                        <div class="key" id="69">E</div>
                        <div class="key" id="82">R</div>
                        <div class="key" id="84">T</div>
                        <div class="key" id="89">Y</div>
                        <div class="key" id="85">U</div>
                        <div class="key" id="73">I</div>
                        <div class="key" id="79">O</div>
                        <div class="key" id="80">P</div>
                        <div class="key" id="219">[</div>
                        <div class="key" id="221">]</div>
                        <div class="key backslash" id="220">\</div>
                        <div class="key capslock" id="20">CapsLock</div>
                        <div class="key" id="65">A</div>
                        <div class="key" id="83">S</div>
                        <div class="key" id="68">D</div>
                        <div class="key" id="70">F</div>
                        <div class="key" id="71">G</div>
                        <div class="key" id="72">H</div>
                        <div class="key" id="74">J</div>
                        <div class="key" id="75">K</div>
                        <div class="key" id="76">L</div>
                        <div class="key" id="186">;</div>
                        <div class="key" id="222">'</div>
                        <div class="key return" id="13">Enter</div>
                        <div class="key leftshift" id="16">Shift</div>
                        <div class="key" id="90">Z</div>
                        <div class="key" id="88">X</div>
                        <div class="key" id="67">C</div>
                        <div class="key" id="86">V</div>
                        <div class="key" id="66">B</div>
                        <div class="key" id="78">N</div>
                        <div class="key" id="77">M</div>
                        <div class="key" id="188">,</div>
                        <div class="key" id="190">.</div>
                        <div class="key" id="191">/</div>
                        <div class="key rightshift" id="16">Shift</div>
                        <div class="key leftctrl" id="17">Ctrl</div>
                        <div class="key" id="18">Alt</div>
                        <div class="key command" id="cmd">Cmd</div>
                        <div class="key space" id="32">Space</div>
                        <div class="key command" id="cmd">Cmd</div>
                        <div class="key" id="18">Alt</div>
                        <div class="key" id="17">Ctrl</div>
                        <div class="key" id="">Fn</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="score modal">
        <div class="close"><i class="fa-solid fa-xmark"></i></div>
        <h2 class="title-letter">
            <div>YOUR SCORE</div>

        </h2>
        <div class="typing-score">
            <div class="speed">
                <i class="fa-solid fa-bolt-lightning"></i>
                <h2 class="speed_score"><span></span>WPM</h2>
                <h3>Typing Speed</h3>
            </div>
            <div class="accuracy">
                <i class="fa-solid fa-bullseye"></i>
                <h2 class="accuracy_score"><span></span>%</h2>
                <h3>Accuracy</h3>
            </div>
            <div class="netspeed">
                <i class="fa-solid fa-keyboard"></i>
                <h2 class="netspeed_score"><span></span>WPM</h2>
                <h3>Net Speed</h3>
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
<script type="module" src="src/js/script.js"></script>

</html>