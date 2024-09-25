<?php
session_start();
require_once 'funcs.php';
loginCheck();

$name = $val['name'];
$email = $val['email'];
$context = $_POST['context'];

$pdo = db_conn();

$stmt = $pdo->prepare('INSERT INTO tabifrie_message(id, name, email, context, date_submit) VALUES(NULL, :name, :email, :context,  NOW())');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':context', $context, PDO::PARAM_STR);

$status = $stmt->execute();

// SQL実行時にエラーがある場合STOP
if($status === false) {
    sql_error($stmt);
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/plan.css" />
    <title>旅フレ‐マッチング結果</title>
</head>

<body>
    <header class="container">
        <h1> 
            <img src="./img/logo2.png" alt="旅フレロゴ" width="232px" class=""> 
        </h1>
        <nav class="nav">
            <ul>
                <li><a href="profile.php">プロフィール</a></li>
                <li><a href="plansearch.php">旅検索</a></li>
                <li><a href="notification.php">マッチング通知</a></li>
                <li><a href="message.php">メッセージ</a></li>
            </ul>
        </nav>
        <p><?= $_SESSION['user_name'] ?>さん、こんにちは！</p>
        <button class="btn" onclick="document.location='logout.php'">ログアウト</button>
    </header>
    <section class="container">
        <div class="conversation">
        <!-- 【問題】今までの会話をすべて抽出して、（時間順で？）表示 -->
        </div>
        <div class="message">
            <form action="message_act" method="post">
                <div>
                <textarea name="context"></textarea>
                </div>
                <button class="btn_s">送信</button>
            </form>
        </div>
        <div class="offer_choice">
            <button class="btn_s" onclick="">旅ふれとしてオファー</button>
            <button class="btn" onclick="">旅ふれとして保留</button>
        </div>
    </section>
    <script>
        // オファーイベント
        // 保留イベント
    </script>
</body>

</html>
