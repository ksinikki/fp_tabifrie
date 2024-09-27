<?php
session_start();
require_once 'funcs.php';
loginCheck();
db_conn();
// $pdo = db_conn();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/preference.css" />
    <title>旅フレ‐旅行の好み</title>
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
            <img src="./img/banner.png" alt="トップページバナー" width="640px" class=""> 
        </div>
        <div>
            <!-- <h2>旅行の好み</h2> -->
            <h3>旅行の好み</h3>
            <form action="preference_act.php" method="post">
                <div><p>Q. 一泊の予算は？</p>A.
                    <label><input type="radio" name="hotel" value="1">1万円以下</label>
                    <label><input type="radio" name="hotel" value="2">1万円から2万5千円まで</label>
                    <label><input type="radio" name="hotel" value="3">2万5千円以上</label>
                </div><br>
                <div><p>Q. 航空券の予算は？</p>A.
                    <label><input type="radio" name="flight" value="1">激安</label>
                    <label><input type="radio" name="flight" value="2">普通</label>
                    <label><input type="radio" name="flight" value="3">プレミアム</label>
                </div><br>
                <div><p>Q. 一緒の行動時間は？</p>A.
                <select name="engaging">
                    <option value=""></option>
                    <option value="1">フライトとホテルのみ</option>
                    <option value="2">フライト、ホテルと食事</option>
                    <option value="3">フライト、ホテル、食事と観光</option>
                </select>
                </div><br>
                <div><p>Q. ホテルの部屋タイプは？</p>A.
                    <label><input type="radio" name="smoking" value="1">禁煙</label>
                    <label><input type="radio" name="smoking" value="3">喫煙</label>
                    <label><input type="radio" name="smoking" value="2">どちらでもよい</label>
                </div><br>
                <div><p>Q. お酒は飲む？</p>A.
                    <label><input type="radio" name="drinking" value="3">飲む</label>
                    <label><input type="radio" name="drinking" value="1">飲まない</label>
                    <label><input type="radio" name="drinking" value="2">どちらでもよい</label>
                </div><br>
                <div><p>Q. 食事の好みは？</p>A.
                <select name="eating">
                    <option value=""></option>
                    <option value="3">なんでも食べれる</option>
                    <option value="2">食べれないものがある</option>
                    <option value="1">ベジタリアン</option>
                </select>
                </div><br><br>
                <button class="btn_s">保存</button>
                <button class="btn" onclick="document.location='plan.php'">破棄</button>
            </form>
            
        </div>
        
    </section>
</body>

</html>
