<?php
session_start();
require_once 'funcs.php';
loginCheck();

$email = $_SESSION['user_id'];

// 重複のないメッセージやり取りを取得
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT DISTINCT `to_name`, `to_email` FROM `tabifrie_message` WHERE email = :email ;'); // phpの日付比較
$stmt->bindValue(':email', $email, PDO::PARAM_STR);

$status = $stmt->execute();
if($status === false) {
    sql_error($stmt);
}
$vals = $stmt->fetchAll();

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
        <div>
            <h2>メッセージリスト</h2>
            <div>
                <table class="">
                    <thead>
                        <tr>
                            <th class="">旅ふれ</th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody> 
                    <?php foreach( $vals as $message) { ?>
                    <tr>  
                        <td class=""><?= $message['to_name'] ?></td>
                        <td class=""><button class="btn_s" onclick="document.location='message_detail.php?user_id=<?= $message['to_email'] ?>'">メッセージへ</button></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>           
        </div>
    </section>
</body>

</html>
