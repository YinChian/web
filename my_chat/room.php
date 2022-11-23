<!DOCTYPE html>
<html>
<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Room</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="styles/main.css?v=<?php echo time(); ?>">

    <link rel='stylesheet' type='text/css' media='screen' href="styles/room.css?v=<?php echo time(); ?>">

    <script src="https://unpkg.com/rabbit-lyrics" type="text/javascript"></script>
    
</head>
<body>

    <header id="nav">
       <div class="nav--list">
            <button id="members__button">
               <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 18v1h-24v-1h24zm0-6v1h-24v-1h24zm0-6v1h-24v-1h24z" fill="#ede0e0"><path d="M24 19h-24v-1h24v1zm0-6h-24v-1h24v1zm0-6h-24v-1h24v1z"/></svg>
            </button>
            <a href="lobby.php">
                <h3 id="logo">
                    <img src="./images/logo.png" alt="Site Logo">
                    <span>NTUST Live</span>
                </h3>
            </a>
            <!-- <form method="post" action="get_donate.php">
                <input type="submit" name="animation_button" value="toggle" />
            </form> -->
            <button id="donate_button" onclick="donate_btn_handler()">donate</button>
            <button id="music_button"onclick="play_music();">play music</button>
            <!-- <button id="donate_button" onclick='javascript:loadXMLDoc()'>toggle</button> -->
       </div>

       <p id="donate_value" style="/*font-size:14px;*/ z-index: 99999;"></p>
       <audio style="display:none;"id="audio-1" controls>
            <source src="..." type="audio/ogg">
            <source src="song.mp3" type="audio/mpeg">
        </audio>

    <div style="color:black;height:10px;overflow: hidden;"id="lyrics"class="rabbit-lyrics" data-media="#audio-1">
    [00:00.00][01:37.00]你說你愛了不該愛的人
    [00:23.00][01:41.00]你的心中滿是傷痕
    [00:27.00][01:45.00]你說你犯了不該犯的錯
    [00:30.00][01:49.00]心中滿是悔恨
    [00:34.00][01:51.00]你說你嚐盡了生活的苦
    [00:38.00][01:56.00]找不到可以相信的人
    [00:41.00][02:00.00]你說你感到萬分沮喪
    [00:45.04][02:03.00]甚至開始懷疑人生
    [00:51.00][02:08.00][02:52.00]早知道傷心總是難免的
    [00:55.00][02:12.00][02:56.00]你又何苦一往情深
    [00:58.00][02:16.00][03:00.00]因為愛情總是難捨難分
    [01:02.00][02:20.00][03:03.00]何必在意那一點點溫存
    [01:05.00][02:23.00][03:07.00]要知道傷心總是難免的
    [01:09.00][02:27.00][03:10.00]在每一個夢醒時分
    [01:12.00][02:30.00][03:14.00]有些事情你現在不必問
    [01:15.00][02:34.00][03:18.00]有些人你永遠不必等
    </div>
        <!-- <audio src='song.mp3' controls=""></audio> -->
        <div id="nav__links">
            <button id="chat__button"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="#ede0e0" clip-rule="evenodd"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-15.667-6l-5.333 4v-4h-3v-14.001l18 .001v14h-9.667zm-6.333-2h3v2l2.667-2h8.333v-10l-14-.001v10.001z"/></svg></button>
            <!-- <a class="nav__link" href="/">
                Lobby
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ede0e0" viewBox="0 0 24 24"><path d="M20 7.093v-5.093h-3v2.093l3 3zm4 5.907l-12-12-12 12h3v10h7v-5h4v5h7v-10h3zm-5 8h-3v-5h-8v5h-3v-10.26l7-6.912 7 6.99v10.182z"/></svg>
            </a> -->
            <a class="nav__link" id="create__room__btn" href="lobby.php">
                Create Room
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ede0e0" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
            </a>
        </div>
    </header>
    
    <div class="play-box" id="play-box">
        <div class="firework" id="firework1">
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
        </div>
        <div class="firework" id="firework2">
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
        </div>
        <div class="firework" id="firework3">
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
            <div class="explosion"></div>
        </div>
        <div class="text-inside-animation-box" id="animate_text">
            簡應謙<br>給你一千元
        </div>
    </div>

    <main class="container">
        <div id="room__container">
            <section id="members__container">

            <div id="members__header">
                <p>Participants</p>
                <strong id="members__count">0</strong>
            </div>

            <div id="member__list">
                <!-- <div class="member__wrapper" id="member__1__wrapper">
                    <span class="green__icon"></span>
                    <p class="member_name">Sulammita</p>
                </div> -->

            </div>

            </section>
            <section id="stream__container">

                <div id="stream__box"></div>

                <div id="streams__container">


                </div>

                <div class="stream__actions">
                    <button id="camera-btn" class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 4h-3v-1h3v1zm10.93 0l.812 1.219c.743 1.115 1.987 1.781 3.328 1.781h1.93v13h-20v-13h3.93c1.341 0 2.585-.666 3.328-1.781l.812-1.219h5.86zm1.07-2h-8l-1.406 2.109c-.371.557-.995.891-1.664.891h-5.93v17h24v-17h-3.93c-.669 0-1.293-.334-1.664-.891l-1.406-2.109zm-11 8c0-.552-.447-1-1-1s-1 .448-1 1 .447 1 1 1 1-.448 1-1zm7 0c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0-2c-2.761 0-5 2.239-5 5s2.239 5 5 5 5-2.239 5-5-2.239-5-5-5z"/></svg>
                    </button>
                    <button id="mic-btn" class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c1.103 0 2 .897 2 2v7c0 1.103-.897 2-2 2s-2-.897-2-2v-7c0-1.103.897-2 2-2zm0-2c-2.209 0-4 1.791-4 4v7c0 2.209 1.791 4 4 4s4-1.791 4-4v-7c0-2.209-1.791-4-4-4zm8 9v2c0 4.418-3.582 8-8 8s-8-3.582-8-8v-2h2v2c0 3.309 2.691 6 6 6s6-2.691 6-6v-2h2zm-7 13v-2h-2v2h-4v2h10v-2h-4z"/></svg>
                    </button>
                    <button id="screen-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 1v17h24v-17h-24zm22 15h-20v-13h20v13zm-6.599 4l2.599 3h-12l2.599-3h6.802z"/></svg>
                    </button>
                    <button id="leave-btn" style="background-color: #FF5050 ;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 10v-5l8 7-8 7v-5h-8v-4h8zm-16-8v20h14v-2h-12v-16h12v-2h-14z"/></svg>
                    </button>
                </div>

                <button id="join-btn">Join Stream</button>

            </section>

            <section id="messages__container">

                <div id="messages">

                </div>

                <form id="message__form">
                    <input type="text" name="message" placeholder="Send a message...." />
                </form>

            </section>
        </div>
    </main>

    <script>
        
        var play_box = document.getElementById("play-box");
        var php_data;
        get_donate();

        function showAnimate(username,money) 
        {
            // document.getElementById('animate_text').innerHTML=`${php_return["username"]}<br>給你 ${php_return["donate"]} 元`;
            document.getElementById('animate_text').innerHTML=`${username}<br>給你 ${money} 元`;

            play_box.classList.remove("paused-box");
            play_box.classList.add("play-box");
            play_box.style.animationPlayState = 'running';
        };

        play_box.addEventListener("animationend", function () {  
            // y.style.animationPlayState = 'paused';
            play_box.classList.remove("play-box");
            play_box.classList.add("paused-box");
        
        })

        async function donate_btn_handler(){
            let money = prompt('how much do you want to donate ?');
            if(money === null || money==="")
            {
                return;
            } 

            get_donate();
            // console.log(php_data)
            php_data=JSON.parse(php_data);
            // console.log(php_data)
            // let username=php_data["username"];
            // let money=php_data["donate"];
            showAnimate(php_data["username"],money);

            money=parseInt(php_data["donate"])+parseInt(money);
            post_donate(php_data["username"],money);

            get_donate();
        }


        function get_donate() {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
                    if (xmlhttp.status == 200) {
                        php_data=xmlhttp.responseText;
                        let php_data_parse=JSON.parse(php_data);
                        var donateValue = document.getElementById("donate_value");
                        donateValue.innerHTML=`斗內總金額為${php_data_parse["donate"]}`;
                    }
                    else if (xmlhttp.status == 400) {
                        alert('There was an error 400');
                    }
                    else {
                        alert('something else other than 200 was returned');
                    }
                }
            };

            xmlhttp.open("GET", "get_donate.php", true);
            xmlhttp.send();
        }

        function post_donate(username,money){
            var http = new XMLHttpRequest();
            var url = 'post_donate.php';
            var params = `money=${money}&username=${username}`;

            http.open('POST', url, true);

            //Send the proper header information along with the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            http.onreadystatechange = function() {//Call a function when the state changes.
                if(http.readyState == 4 && http.status == 200) {
                    // alert(http.responseText);
                }
            }
            http.send(params);
        }
    </script>
    <script>
        let play_flag=0;
        const audio = document.getElementById("audio-1");
        
        // audio.innerHTML='<source src="..." type="audio/ogg"><source src="song.mp3" type="audio/mpeg">';

        function play_music(){
            if(play_flag==0)
            {
                audio.play();
                play_flag=1;
                var musicBtn = document.getElementById("music_button");
                musicBtn.innerHTML="stop music";
            }
            else
            {
                audio.pause();
                audio.currentTime = 0;
                play_flag=0;
                var musicBtn = document.getElementById("music_button");
                musicBtn.innerHTML="play music";
            }
        }
    </script>
</body>
<script type="text/javascript" src="js/AgoraRTC_N-4.14.1.js"></script>
<script type="text/javascript" src="js/agora-rtm-sdk-1.5.1.js"></script>
<script type="text/javascript" src="js/room.js"></script>
<script type="text/javascript" src="js/room_rtc.js"></script>
<script type="text/javascript" src="js/room_rtm.js"></script>

</html>



