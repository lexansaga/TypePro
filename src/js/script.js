const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
var isTest = false;
var practice_letters = '';
var totalSeconds = 0;
var wordIndex = 0,
    letterIndex = 0;
var right = 0,
    wrong = 0,
    accuracy_score = 0,
    WPM_score = 0,
    Net_WPM_Score;
var currentTyping = getCurrentTypeLetters();

var lessons_titles = [];
// Global variables
var games = [{
    Title: 'Fast Typer',
    Location: 'games/Fast Typer 1/index.html'
}, {
    Title: 'Speed Type',
    Location: 'games/Speed Type/index.html'
}, {
    Title: 'Typing Battle',
    Location: 'games/Typing Battle/index.html'
}, {
    Title: 'Letters Dash',
    Location: 'games/Letters Dash Web 1 Landscape/index.html'
}, {
    Title: 'Letters Popping ',
    Location: 'games/Letters popping Web1/index.html'
}]
const KEYCODE = {
    8: "Delete",
    9: "Tab",
    13: "Enter",
    16: "Shift",
    17: "Ctrl",
    18: "Alt",
    20: "Capslock",
    32: "Space",
    48: "0",
    49: "1",
    50: "2",
    51: "3",
    52: "4",
    53: "5",
    54: "6",
    55: "7",
    56: "8",
    57: "9",
    65: "A",
    66: "B",
    67: "C",
    68: "D",
    69: "E",
    70: "F",
    71: "G",
    72: "H",
    73: "I",
    74: "J",
    75: "K",
    76: "L",
    77: "M",
    78: "N",
    79: "O",
    80: "P",
    81: "Q",
    82: "R",
    83: "S",
    84: "T",
    85: "U",
    86: "V",
    87: "W",
    88: "X",
    89: "Y",
    90: "Z",
    183: ",",
    186: ";",
    187: "+",
    188: ",",
    189: "-",
    190: ".",
    191: "/",
    192: "~",
    219: "[",
    220: "\\",
    221: "]",
    222: "'",
    "": "Fn",
};


function getKeyByValue(object, value) {
    return Object.keys(object).find((key) => object[key] === value);
}

function capitalize(text) {
    return text.toLowerCase().replace(/(?<= )[^\s]|^./g, (a) => a.toUpperCase());
}

var apps = {
    initToggleClass: function () {
        var isTrigger = false;
        $(".menu").on("click", (e) => {
            e.stopPropagation();
            if (isTrigger == true) {
                $(".top-nav").slideUp();
                isTrigger = false;
            } else {
                $(".top-nav").slideDown();
                isTrigger = true;
            }
            $(".top-nav").toggleClass("active");
        });
    },

    initToggleCourseDropdown: function () {
        $(document).on("click", `.course-sidebar >  h3`, function () {
            console.log(`clicked  ${$(this).html()}`);

            $(this).parent().find(".lessons-list").toggleClass("active");
            var LIST_IS_SHOWN = $(this).parent().find("ul").attr("class") == "active";
            if (LIST_IS_SHOWN) {
                $(this).parent().find(".fa-caret-down").css({
                    transform: "rotate(180deg)",
                });
            } else {
                $(this).parent().find(".fa-caret-down").css({
                    transform: "rotate(0deg)",
                });
            }
        });
    },
    initKeyboardPress: function () {
        $(window).on("keydown", function (key) {
            var pressedKey = $(`.keyboard-base #${key.keyCode}`);
            var code = key.keyCode;

            pressedKey.each(function (i, e) {
                pressedKey.addClass("active");
            });
            if (
                code == 9 ||
                code == 20 ||
                code == 13 ||
                code == 16 ||
                (key.ctrlKey && code == 65)
            ) {
                event.preventDefault();
            }

            // if (key.shiftKeys && code == 65) {
            //     alert("Shift A");
            // }

            $("#gameframe").focus();
        });
        $(window).on("keyup", function (key) {
            var pressedKey = $(`.keyboard-base #${key.keyCode}`);
            pressedKey.each(function () {
                pressedKey.removeClass("active");
            });
        });
    },

    initSetResizeViewPort: function () {
        var range = 1 / 400;
        var vw = range * Math.min(window.innerWidth, window.innerHeight);

        document.documentElement.style.setProperty("--vw-scale", `${vw}`);

        window.addEventListener("resize", () => {
            document.documentElement.style.setProperty(
                "--vw-scale",
                `${range * Math.min(window.innerWidth, window.innerHeight)}`
            );
        });
    },
    initTimer: function (display, duration) {
        var timer = duration * 60,
            minutes, seconds;
        var interval = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);
            var percentage = parseInt((seconds / 60) * 100, 10)
            percentage = percentage == 0 ? 100 : percentage
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            totalSeconds = (minutes * 60) + seconds
            display.html(minutes + ":" + seconds);
            // console.log(totalSeconds)

            $('.timer > div').attr('style', `--value:${percentage}`)
            if (timer-- < 0) {
                // timer = duration;
                clearInterval(interval)
                GenerateScore();
                display.html("00:00");
                // alert('Time runout')
            }
        }, 1000);
    },
    initStopWatch: function (display) {
        // alert('Stopwatch!')
        $('.timer').css({
            'display': 'block'
        })
        var minutes = 0,
            seconds = 0,
            percentage = 0;
        setInterval(function () {
            minutes = parseInt(minutes, 10)
            seconds = parseInt(seconds, 10)

            seconds = seconds++ >= 59 ? 0 : seconds
            if (seconds == 59) {
                minutes++
            }
            console.log(minutes)
            percentage = parseInt((seconds / 60) * 100, 10)
            $('.timer > div').attr('style', `--value:${percentage}`)

            display.html(`${addLeadingZeros(minutes, 2)}:${addLeadingZeros(seconds, 2)}`)

            totalSeconds = (minutes * 60) + seconds;


        }, 1000)

        function addLeadingZeros(num, totalLength) {
            return String(num).padStart(totalLength, '0');
        }
    },

    initStartTypings: function () {
        var currentLetterIndex = 1;

        var hasStart = false;
        var isTestHTML = $('body').hasClass('test') ? 'keydown' : 'keypress'


        window.onkeypress = function (key) {

            // $('body').hasClass('thistyping') && 
            if ($('body').hasClass('thistyping') && hasStart == false && isTest == true) {
                $('.timer').css({
                    'display': 'block'
                })
                apps.initStopWatch($('.timer-text'));
                hasStart = true
            }
            // if ($('body').hasClass('test') && isTest == true && hasStart == false) {

            //     apps.initStopWatch($('.timer-text'))
            //     hasStart = true
            // }

            var typeLetterSize = $(".type-letter").children().length;
            var currentLetter = $(
                `.type-letter > a:nth-child(${currentLetterIndex})`
            );
            console.log(currentLetterIndex + ":" + typeLetterSize);
            var pressedKey = $(`.keyboard-base #${key.keyCode}`);
            var currentLetterKeyCode = currentLetter.attr("data-keycode");
            // var currentLetterValue = currentLetter.html().trim()
            // console.log(currentLetterValue)
            $(
                `.type-letter > a:nth-child(${currentLetterIndex + 1})`
            ).focus()
            console.log(key.keyCode);
            if (key.keyCode == 32) {
                key.preventDefault();
            }
            if (key.keyCode == currentLetterKeyCode) {
                currentLetter.addClass("right");
                right++;
                letterIndex++;

            } else {
                currentLetter.addClass("wrong");
                wrong++;
                letterIndex++;
            }




            if (currentLetterIndex == typeLetterSize) {
                if (wordIndex < currentTyping.Length) {

                    setTimeout(function () {
                        // Whatever you want to do after the wait
                        console.log(
                            "Still has words" + wordIndex + " : " + currentTyping.Length
                        );
                        wordIndex++;
                        apps.initIndividualGenerate(currentTyping.Word, wordIndex);
                        currentLetterIndex = 1;
                    }, 500);
                } else {
                    GenerateScore();
                }
            }
            currentLetterIndex++;



        };
    },

    initGenerateLetters: function (letters) {
        var i = 0;
        for (var letter of letters) {
            letter = letter == " " ? " " : letter;


            $(`.type-letter`).append(`
            <a href="#${i++}" id="${i++}" class="v2" data-keycode="${letter.charCodeAt(0)}">
           ${letter}
            </a>
            `);
        }
    },
    initIndividualGenerate: function (sentence, index) {
        $(`.type-letter`).html("");
        console.log(sentence)
        sentence = sentence.split(" ");
        console.log(sentence);
        var word = sentence[index];
        for (var letter of word) {
            // letter = capitalize(letter);
            // var lowercase_leter = letter.toLowerCase()
            $(`.type-letter`).append(`
            <a class="v1" data-keycode="${letter.charCodeAt(0)}">
           ${letter}
            </a>
            `);
        }
    },

    initCreateAccount: function (email, password) {
        createUserWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                // Signed in
                const user = userCredential.user;
                var uid = credential.uid;
                console.log(user);
                window.location.href = "login.html";
                // ...
            })
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
                // ..
                console.log(`Code : ${errorCode} \n Message : ${errorMessage}`);
            });
    },
    initSignIn: function (email, password) {
        signInWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                // Signed in
                const user = userCredential.user;
                var uid = credential.uid;
                console.log(user);
                window.location.href = "login.html";
                // ...
            })
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message; // ..
                console.log(`Code : ${errorCode} \n Message : ${errorMessage}`);
            });
    },
    initSignOut: function () {
        firebase
            .auth()
            .signOut()
            .then(() => {
                // Sign-out successful.
            })
            .catch((error) => {
                // An error happened.
                var errorCode = error.errorCode;
                var errorMessage = error.errorMessage;
                console.log(`Code : ${errorCode} \n Message : ${errorMessage}`);
            });
    },


    initFireSignIn: async function (email, password) {
        const docRef = doc(firestore, "Credentials", email);
        const docSnap = await getDoc(docRef);

        if (docSnap.exists()) {
            var docData = docSnap.data();
            var fPassword = docData.Password;
            //   console.log(fPassword)
            if (fPassword === password) {
                window.location.href = "typing.html?lesson_title=1_Home%20Row&content_title=1_The%20Right%20Hand&data-id=1";
            } else {
                alert("Incorrect email or password");
            }
            //   console.log("Document data:", docSnap.data());
        } else {
            // doc.data() will be undefined in this case
            console.log("No such document!");
        }
    },
    initFireCreateAccount: async function (email, password) {
        const credential = collection(firestore, "Credentials");
        await setDoc(doc(credential, email), {
            Email: email,
            Password: password,
        });
    },
    initParseCourseFromFile: function () {
        var course_icon = ['<i class="fa-solid fa-lock"></i>', '<i class="fa-solid fa-keyboard"></i>']
        $.getJSON("course.json", function (json) {
            var data_id = ``,
                title = ``,
                list = ``;
            var lesson_id = urlParams.get('data-id')
            var courses = json.Courses;
            //   console.log(courses)
            var gameIndex = 0;
            var courseIndex = 0;
            var courseCount = 0;
            for (var course in courses) {
                var lessons = courses[course];
                var course_title = course.split("_")[1];
                var course_introduction = lessons["Introduction"];
                var course_objective = lessons["Objective"];
                data_id = course;
                title = course_title;
                courseCount++;
                for (var lesson in lessons) {
                    var lesson_introduction = lessons["Introduction"];
                    var lesson_objective = lessons["Objective"];
                    var contents = lessons[lesson];
                    //   console.log(lessons)
                    if (typeof contents == "object") {
                        var content_title = contents["Title"];
                        var content_lesson = contents["Lesson"];
                        var content_level = contents["Level"];
                        var content_content = contents["Content"];
                        var content_week = contents["Week"];
                        var content_practice = contents["Practice"];
                        var content_courseID = contents["CourseID"];

                        lessons_titles.push({
                            [`${content_courseID}`]: content_title,
                            Week: content_week,
                            Lesson: content_lesson,
                            Level: content_level
                        })
                        courseIndex++
                        list += `<a class="${lesson_id == courseIndex ? 'active' : ''}" href="typing.php?lesson_title=${course}&content_title=${lesson}&data-id=${courseIndex}&course-code=${content_courseID}" data-id="${courseIndex}">
                        ${content_title}
                        <div>${course_icon[1]}
                            </div>
                    </a>`;
                    }
                }

                var side_bar = `<div class="course-sidebar">
                  <h3 data-id='${data_id}'>Module ${courseCount} -  
                  ${title}
                      <div class="course-dropdown-btn">
                          <i class="fa-solid fa-caret-down"></i>
                      </div>
                  </h3>
                  <div class="lessons-list">
                     
                    ${list}

                    
                    <a href="play.html?game_index=${gameIndex}" data-title="${games[gameIndex].Title}" >
                        ${games[gameIndex].Title}
                        <div><i class="fa-solid fa-gamepad"></i>
                           </div>
                    </a>
                  </div>
              </div>`;
                $(".course-outline").append(side_bar);
                gameIndex++;
                list = "";
            }
        });


    },
};



function setTitle() {
    if ($('body').hasClass('thistyping')) {
        $('.title > h2').html(`<span>${urlParams.get('content_title').split('_')[1].replaceAll('\'', '')}</span>`);
    }
}

function setGame() {
    if ($('body').hasClass('body-play')) {
        let game_index = urlParams.get('game_index')
        console.log(games[game_index].Location)
        $('.media-player iframe').attr('src', games[game_index].Location);
    }
}


function getTest() {
    var json = $.ajax({
        url: 'test.json',
        async: false
    }).responseText;
    var parseJson = JSON.parse(json)
    var words = parseJson.Test.Words

    var word = words[0]
    words.forEach(w => {
        word += w + " "
    });
    console.log(word)


    return {
        Word: word,
        Length: word.length - 1,
        LetterLength: word.replace(" ", "").length - 1
    }
}

function getCurrentTypeLetters() {
    var lesson_title = urlParams.get('lesson_title')
    var content_title = urlParams.get('content_title')
    var word = ''
    if (lesson_title != null || content_title != null) {
        var json = $.ajax({
            url: 'course.json',
            async: false
        }).responseText;
        var parseJson = JSON.parse(json)
        var words = parseJson.Courses[lesson_title][content_title].Practice

        word = words[0]
        // words.forEach(w => {
        //     word += w
        // });
        // console.log(words)

    }
    return {
        Word: word,
        Length: word.split(" ").length - 1,
        LetterLength: word.replace(" ", "").length - 1
    };
    // $.getJSON("course.json", function (json) {
    //     var lesson_title = urlParams.get('lesson_title')
    //     var content_title = urlParams.get('content_title').replaceAll('\'', '')
    //     var words = json.Courses[lesson_title][content_title].Practice

    //     words.forEach(w => {
    //         word += w
    //     });

    //     typings.Word = word;
    //     typings.Length = word.split(" ").length - 1;
    //     typings.LetterLength = word.replace(" ", "").length - 1


    // })

}

function generateParagraph() {

    $.getJSON("course.json", function (json) {
        var lesson_title = urlParams.get('lesson_title')
        var content_title = urlParams.get('content_title').replaceAll('\'', '')
        var contents = json.Courses[lesson_title][content_title].Content

        contents.forEach(content => {
            console.log(content)
            $('.lesson-paragraph').append(`<p>${content}</p>`)
        });



    })
}

$(".close").on("click", function () {
    $(".score.modal").toggleClass("active");
});

function StartNumberAnimation(classes) {
    jQuery(classes).each(function () {
        jQuery(this)
            .prop("Counter", 0)
            .animate({
                Counter: jQuery(this).text(),
            }, {
                duration: 2000,
                easing: "swing",
                step: function (now) {
                    jQuery(this).text(Math.ceil(now));
                },
            });
    });
}

function isCourseSelected() {
    var lesson_id = urlParams.get('data-id')

}

function GenerateScore() {
    console.log(`Wrong : ${wrong}, LetterLength : ${letterIndex}`)
    let minutes = totalSeconds / 60
    accuracy_score = 100 - ((wrong / letterIndex) * 100)
    accuracy_score = accuracy_score < 0 ? 0 : accuracy_score
    console.log(`Letter Index ${letterIndex} ,  Wrong : ${wrong} , Total Seconds ${totalSeconds}`)
    WPM_score = (letterIndex / 5) / minutes
    WPM_score = WPM_score < 0 ? 0 : WPM_score
    Net_WPM_Score = WPM_score * (accuracy_score / 100);
    Net_WPM_Score = Net_WPM_Score < 0 ? 0 : Net_WPM_Score
    $(window).off("keydown");
    $('.accuracy_score > span').html(accuracy_score)
    $('.speed_score > span').html(WPM_score)
    $('.netspeed_score > span').html(Net_WPM_Score)
    clearInterval(this)
    setTimeout(function () {

        $(".score.modal").toggleClass("active");
        StartNumberAnimation('.speed_score > span,.accuracy_score > span,.netspeed_score > span')
    }, 1000);

    $.ajax({
        url: 'sql.php',
        type: 'POST',
        data: {
            'add_wpm': 1,
            'User_ID': getSession('user_id'),
            'WPM': parseInt(WPM_score, 10),
            'Accuracy': parseInt(accuracy_score, 10),
            'Net_WPM': parseInt(Net_WPM_Score, 10),
            'Course_Code': urlParams.get('course-code')
        },
        success: function (response) {
            alert(response)
        },
        fail: function (xhr, textStatus, errorThrown) {
            console.log(xhr + textStatus + errorThrown)
        }
    })

    // for (var i = 1; i < 10; i++)
    //     window.clearInterval(i);
    $('.timer').css({
        'display': 'none'
    })
}


function setCourseTaken(user_id, course_taken) {

    // alert(`${course_taken} by ${user_id}`)
    var checkIfCourseIsTaken = SELECT_QUERY(`SELECT ID FROM tbl_coursetaken WHERE User_ID = ${user_id}`)
    console.log(checkIfCourseIsTaken == null)
    $.ajax({
        url: 'sql.php',
        type: 'POST',
        data: {
            "Insert_CourseTaken": 1,
            "User_ID": user_id,
            "Course_Code": course_taken

        },
        success: function (response) {
            console.log(response)
        },
        failure: function (data) {
            console.log(data)
        },
        error: function (error) {
            console.log(error)
        }
    })


}



function iFrameResizer(id) {
    var doc = document.getElementById(id).contentWindow.document;
    var body_ = doc.body;
    var html_ = doc.documentElement;

    var height = Math.max(
        body_.scrollHeight,
        body_.offsetHeight,
        html_.clientHeight,
        html_.scrollHeight,
        html_.offsetHeight
    );
    var width = Math.max(
        body_.scrollWidth,
        body_.offsetWidth,
        html_.clientWidth,
        html_.scrollWidth,
        html_.offsetWidth
    );

    document.getElementById(id).height = height;
    document.getElementById(id).width = width;
}

function getCourse() {
    var json = ''
    $.ajax({
        url: "course.json",
        dataType: 'json',
        async: false,
        success: function (response) {
            json = response
        }
    });

    return json;
}

function getSession(session) {
    return $(`#session_${session}`).html()
}


function getCourseTakenOfUsers() {
    var data = jsonToArray(SELECT_QUERY(`SELECT User_ID,Course_Code FROM tbl_coursetaken WHERE User_ID = ${urlParams.get('User_ID')}`));

    function jsonToArray(json) {
        var values = []
        var i = 0;

        json.forEach((key, val) => {
            //  getName(key.User_ID),
            values[i] = [getCourseData(key.Course_Code, "key"), getCourseData(key.Course_Code, "lesson"), getCourseData(key.Course_Code, "lesson"), getCourseData(key.Course_Code, "title"), getCourseData(key.Course_Code, "week"), getCourseData(key.Course_Code, "level")];
            i++
        });
        return values;
    }
    return data;

}

function getWPMOfUsers() {
    var data = jsonToArray(SELECT_QUERY(`SELECT * FROM tbl_wpm WHERE User_ID = ${urlParams.get('User_ID')}`));

    function jsonToArray(json) {
        var values = []
        var i = 0;

        json.forEach((key, val) => {
            //  getName(key.User_ID),
            values[i] = [getCourseData(key.Course_Code, "key"), getCourseData(key.Course_Code, "lesson"), getCourseData(key.Course_Code, "title"), key.WPM, key.Accuracy, key.Net_WPM];
            i++
        });
        return values;
    }
    return data;

}

function getUsers() {
    var data = jsonToArray(SELECT_QUERY(`SELECT * FROM tbl_users`));

    function jsonToArray(json) {
        var values = []
        var i = 0;

        json.forEach((key, val) => {
            //  getName(key.User_ID),
            values[i] = [`<a href="admin.php?User_ID=${key.ID}">${key.ID}</a>`, `<a href="admin.php?User_ID=${key.ID}">${key.Fullname}</a>`];
            i++
        });
        return values;
    }
    return data;
}

function getName(user_id) {
    return SELECT_QUERY(`SELECT Fullname FROM tbl_users WHERE ID=${user_id}`)[0].Fullname
}

function SELECT_QUERY(query) {
    var data;
    // var query = `SELECT 
    // * FROM tbl_users users INNER JOIN tbl_coursetaken courses ON users.ID = courses.User_ID WHERE users.ID = 10002;`

    $.ajax({
        url: "sql.php",
        type: "GET",
        async: false,
        data: {
            "SELECT": 1,
            "query": query
        },
        success: function (response) {
            data = response
            console.log(data)
            // data = JSON.parse(response);
        },
        failure: function (data) {
            console.log(data)
        },
        error: function (error) {
            console.log(error)
        }
    })
    return JSON.parse(data);
}


function getCourseData(course_id, returns) {
    var data = "";
    for (const [keys, values] of Object.entries(lessons_titles)) {
        for (const [key, value] of Object.entries(values)) {
            if (key == course_id) {
                if (returns == "key") {
                    data = key
                }
                if (returns == "title") {
                    data = values[`${key}`]
                }
                if (returns == "week") {
                    data = values.Week
                }
                if (returns == "lesson") {
                    data = values.Lesson
                }
                if (returns == "level") {
                    data = values.Level
                }

            }

        }
    }
    console.log(data)
    return data;
}

function checkTakenCourse() {
    var course_taken = SELECT_QUERY(`SELECT * FROM tbl_coursetaken WHERE User_ID = ${getSession('user_id')}`)

    return course_taken;

}





$(window).on("load", function () {
    // console.log(getSession('user_id'))

    apps.initKeyboardPress();
    apps.initToggleClass();
    // apps.initStopWatch($('.timer-text'))
    $.ajaxSetup({
        async: false
    });
    if ($('body').hasClass('play')) {

    }

    if ($('body').hasClass('thistyping')) {
        console.log(lessons_titles)
        isTest = true;
        apps.initIndividualGenerate(getCurrentTypeLetters().Word, 0);
        apps.initStartTypings();
        apps.initToggleCourseDropdown();
        apps.initParseCourseFromFile();
        setCourseTaken();
        setTitle()
        generateParagraph()
        isCourseSelected()
        setGame();
        setCourseTaken(getSession('user_id'), urlParams.get('course-code'));
        console.log(checkTakenCourse())
    }
    if ($('body').hasClass('test')) {
        apps.initGenerateLetters(getTest().Word);
        apps.initStartTypings();
        isTest = true;
    }

    if ($('body').hasClass('admin')) {
        apps.initToggleCourseDropdown();
        apps.initParseCourseFromFile();
        $('#admin-table').DataTable({
            data: getCourseTakenOfUsers()
        })
        $('#wpm-table').DataTable({
            data: getWPMOfUsers()
        })
        $('#user-table').DataTable({
            data: getUsers()
        })
        $('.user-name').html(getName(urlParams.get("User_ID")))
        //console.log(getCourseTakenOfUsers())
    }

    // var keys = {}
    // $('.key').each(function () {
    //     // keys[`${$(this).html()}`] = `${$(this).attr(`id`)}`

    //     keys[`${$(this).attr(`id`)}`] = `${$(this).html()}` // For key Code
    // })
    // console.log(JSON.stringify(keys))
});