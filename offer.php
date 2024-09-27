<?php
session_start();
require_once 'funcs.php';
loginCheck();

$sender = $_SESSION['user_id']; //email
$receiver = $_GET['receiver']; //【問題】 旅ふれemail取得
$result = $_POST['result'];

$pdo = db_conn();

$stmt = $pdo->prepare('INSERT INTO tabifrie_plan (id, sender, receiver, offer_date, result) VALUES (NULL, :sender, :receiver, :NOW(), :result)');

$stmt->bindValue(':sender', $sender, PDO::PARAM_STR);
$stmt->bindValue(':receiver', $receiver, PDO::PARAM_STR);
$stmt->bindValue(':result', $result, PDO::PARAM_INT);

// $stmt = $pdo->prepare('SELECT tabifrie_offer.sender
//                 FROM tabifrie_offfer
//                 WHERE tabifrie_plan.sender = :receiver

// ');

$status = $stmt->execute();

// $val = $stmt->fetch();

if (!$status) {
    sql_error($stmt);
} else {
        if ($result == 1 & $val['result'] == 1 ) {
            $view = 'ペア成立、おめでとうございます！';
            
        } else if ($val == NULL ) {
            $view = '回答をおまちください。';
            
        }else {
            $view ='ペア不成立...' ;
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
                <li><a href="offer.php">オファー</a></li>
                <li><a href="notification.php">マッチング通知</a></li>
                <li><a href="message.php">メッセージ</a></li>
            </ul>
        </nav>
        <p><?= $_SESSION['user_name'] ?>さん、こんにちは！</p>
        <button class="btn" onclick="document.location='logout.php'">ログアウト</button>
    </header>
    <section class="container">
        <div class="offer_msg">
            <p><?= $view ?></p>
        </div>
    </section>
</body>

</html>
