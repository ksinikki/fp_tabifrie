<?php
session_start();
require_once 'funcs.php';
loginCheck();



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/message.css" />
    <title>旅フレ‐メッセージ</title>
</head>

<body>
    <header class="container">
        <h1> 
            <img src="./img/logo2.png" alt="旅フレロゴ" width="232px" class=""> 
        </h1>
        <nav class="nav">
            <ul>
                <li><a href="profile.php">プロフィール</a></li>
                <li><a href="offer.php">オファー</a></li>
                <li><a href="notification.php">マッチング通知</a></li>
                <li><a href="message.php">メッセージ</a></li>
            </ul>
        </nav>
        <p><?= $_SESSION['user_name'] ?>さん、こんにちは！</p>
        <button class="btn" onclick="document.location='logout.php'">ログアウト</button>
    </header>
    <section class="container">
        <div class="tabifrie_name">
            <!-- 【問題：旅ふれの名前取得】 -->
            <!-- <p><?= $val['name'] ?>さん</p> -->
        </div>
    
        <div class="messages">
            <!--メッセージ１（左側）-->
            <div class="message msg_left">
                <div class="message_box">
                    <div class="message_content">
                        <div class="message_text">
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div><!-- 回り込みを解除（スタイルはcssで充てる） -->

            <!--メッセージ２（右側）-->
            <div class="message msg_right">
                <div class="message_box">
                    <div class="message_content">
                    <div class="message_text">
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div><!-- 回り込みを解除（スタイルはcssで充てる） -->
        </div>
        <div>
            <form action="message_act.php" method="post">
                <div>
                  <textarea name=content class="send_message"></textarea> 
                </div>
                <button class="btn_s">送信</button>
            </form>
        </div>
    </section>
</body>

</html>