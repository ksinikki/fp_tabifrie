<?php
// 【問題❹】データ取得（ログインユーザでない）
// profile.phpよりコピー、修正要
session_start();
require_once 'funcs.php';
loginCheck();

//1. データ取得
$email = $_SESSION['user_id'];

//2. DB接続します 
$pdo = db_conn();

//３．SQL作成、実行、格納
$stmt = $pdo->prepare('SELECT * FROM tabifrie_user WHERE email = :email');
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$status = $stmt->execute();
if($status === false) {
    sql_error($stmt);
}
$val = $stmt->fetch();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/profile.css" />
    <title>旅ふれ‐旅ふれんど・プロフィール</title>
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
    <section class="container profile">
        <h2>旅ふれんど‐プロフィール</h2>
        <form action="signup_act.php" method="post">
            <div>
                <h3>基本情報</h3>
                <div class="info">
                    <p>ニックネーム</p><p><?= $val['name'] ?></p>
                    <p>年齢</p><p><?= $val['age']  ?></p>
                    <p>性別</p><p><?= $val['gender'] ?></p>
                </div>
                <div class="info">
                    <p>メールアドレス</p><p><?= $val['email']?></p>
                </div><br>
            </div><br>
            <div>
                <h3>旅行の好み</h3>
                <div class="prefer">
                    <p>Q. 一泊の予算は？</p>
                    <p>A. <?= $val['hotel'] ?></p>
                </div>
                <div class="prefer">
                    <p>Q. 航空券の予算は？</p>
                    <p>A. <?= $val['flight'] ?></p>
                </div>
                <div class="prefer">
                    <p>Q. 一緒の行動時間は？</p>
                    <p>A. <?= $val['engaging'] ?></p>
                </div>
                <div class="prefer">
                    <p>Q. ホテルの部屋タイプは？</p>
                    <p>A. <?= $val['smoking'] ?></p>
                </div>
                <div class="prefer">
                    <p>Q. お酒は飲む？</p>
                    <p>A. <?= $val['drinking'] ?></p>
                </div>
                <div class="prefer">
                    <p>Q. 食事の好みは？</p>
                    <p>A. <?= $val['eating'] ?></p>
                </div><br>
            </div><br>
            <!-- <div>
                <h3>旅プラン</h3>
            </div><br><br> -->
            <div>
                <!-- <button class="btn_s" onclick="document.location='offer.php'">旅ふれオファー</button> -->
                <button class="btn" onclick="document.location='message.php'">メッセージ</button>
            </div>
        </form>
    </section>
</body>

</html>