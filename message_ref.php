<?php
session_start();
require_once 'funcs.php';
loginCheck();

// $name = $_SESSION['user_name'];
// $email = $_SESSION['user_id'];
// $content = $_GET['content'];

$pdo = db_conn();
// 【問題：同時に二人のデータ取得、表示ができていない】
$stmt = $pdo->prepare('SELECT
tabifrie_message as content,
tabifrie_user.name as name
tabifrie_user.email as email
FROM
    tabifrie_message, tabifrie_user
JOIN tabifrie_massage
ON tabifrie_user.email = tabifrie_message.email');

$status = $stmt->execute();


if (!$status) {
    sql_error($stmt);
} else {
        while ($messages = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $view = '
            <div class="message msg_right">
                <div class="message_box">
                    <div class="message_content">
                    <div class="message_text">'
                            + $message + '
                        </div>
                    </div>
                </div>
            </div>'
        }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/plan.css" />
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
                <li><a href="login.php">マッチング通知</a></li>
                <li><a href="notification.php">マッチング通知</a></li>
                <li><a href="message.php">メッセージ</a></li>
            </ul>
        </nav>
        <p><?= $_SESSION['user_name'] ?>さん、こんにちは！</p>
        <button class="btn" onclick="document.location='logout.php'">ログアウト</button>
    </header>
    <section class="container">
        <div class="tabifrie_name">
            <!-- <p><?= $val['name'] ?>さん</p> -->
        </div>
<!-- 【問題：旅ふれの名前GET？】 -->
<!-- 【問題：message表示スタート】 -->
        <div class="messages"><?= $view ?></div>

        
<!-- 【問題：message表示エンド】 -->
<!-- 【要修正】 -->
        <!-- <div class="messages">
            
            <div class="message msg_left">
                <div class="message_box">
                    <div class="message_content">
                        <div class="message_text">
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>

           
            <div class="message msg_right">
                <div class="message_box">
                    <div class="message_content">
                    <div class="message_text">
                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>  -->
<!-- 【要修正エンド】 -->
        <div>
            <form action="message_act.php" method="post">
                <div>
                  <textarea name=content class="send_message"></textarea> 
                </div>
                <button class="btn_s">送信</button>
            </form>
        </div>
        <div class="offer_choice">
            <form action="offer.php" method="post">
                <button class="btn_s" onclick="" type="submit" name="invitation" value="1">旅ふれとしてオファー</button>
                <button class="btn" onclick="" type="submit" name="invitation" value="0">旅ふれとして保留</button>
            </form>
        </div>
    </section>
</body>

</html>
