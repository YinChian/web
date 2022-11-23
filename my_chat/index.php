<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}
?>
<!-- <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>登入介面</title>
</head>
<body>
    <h1>Log In</h1>
    <h2>你可以選擇登入或是註冊帳號~</h2>
<form method="post" action="login.php">
帳號：
<input type="text" name="username"><br/><br/>
密碼：
<input type="password" name="password"><br><br>
<input type="submit" value="登入" name="submit"><br><br>
<a href="register.html">還沒有帳號？現在就註冊！</a>
</form>
</body>
</html> -->

<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Room</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/lobby.css'>
</head>
<body>

        <header id="nav">
       <div class="nav--list">
            <a href="lobby.html"/>
                <h3 id="logo">
                    <img src="./images/logo.png" alt="Site Logo">
                    <span>NTUST Live</span>
                </h3>
            </a>
       </div>

        <div id="nav__links">
            <a class="nav__link" href="/">
                Lobby
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ede0e0" viewBox="0 0 24 24"><path d="M20 7.093v-5.093h-3v2.093l3 3zm4 5.907l-12-12-12 12h3v10h7v-5h4v5h7v-10h3zm-5 8h-3v-5h-8v5h-3v-10.26l7-6.912 7 6.99v10.182z"/></svg>
            </a>
            <a class="nav__link" id="create__room__btn" href="lobby.html">
                Create Room
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ede0e0" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
            </a>
        </div>
    </header>

    <main id="room__lobby__container">
        <div id="form__container">
             <div id="form__container__header">
                 <p size="1">👋 Login or Register !</p>
             </div>
 
 
            <form method="post" action="login.php" id="lobby__form">
 
                 <div class="form__field__wrapper">
                     <label>帳號：</label>
                     <input type="text" name="username" placeholder="Enter account...">
                     <!-- <input type="text" name="name" value="<?php echo $username; ?>"/>  -->
                 </div>
 
                 <div class="form__field__wrapper">
                     <label>密碼：</label>
                     <input type="password" name="password" placeholder="Enter password..." />
                 </div>

                 <div class="form__field__wrapper">
                     <button type="submit" value="登入" name="submit">登入
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                    </button>
                    <a name="register" href="register.html">註冊
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                    </a>
                 </div>
            </form>
        </div>
     </main>
    
</body>
<!-- <script type="text/javascript" src="js/index.js"></script> -->
</html> 



