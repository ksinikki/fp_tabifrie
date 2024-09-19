<?php
session_start();
require_once 'funcs.php';
loginCheck();

//1. POSTデータ取得
// **********
//2. DB接続します 
$pdo = db_conn();

//３．SQL作成、実行、格納
// $stmt = $pdo->prepare('SELECT * FROM tabifrie_user WHERE email = :email AND password = :password');
// $stmt->bindValue(':email', $email, PDO::PARAM_STR);
// $status = $stmt->execute();
// if($status === false) {
//     sql_error($stmt);
// }
// $val = $stmt->fetch();

//４．データ登録処理後
// if($status === false){
//     $error = $stmt->errorInfo();
//     exit('ErrorMessage:'.$error[2]);
//   }else{
//     //５．成功時、リダイレクト
//     header('Location: profile.php');
//   }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/preference.css" />
    <title>旅フレ‐新規登録</title>
</head>

<body>
    <header class="container">
        <h1> 
            <img src="./img/logo2.png" alt="旅フレロゴ" width="232px" class=""> 
        <!--imgのwidthとheightは画像サイズを確認して比例で調整する-->
        </h1>
        <nav class="nav">
            <ul>
                <li><a href="profile.php">プロフィール</a></li>
                <li><a href="plan.php">旅検索</a></li>
                <li><a href="notification.php">通知</a></li>
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
                <div><p>1. 一泊の予算は？</p>
                    <label><input type="radio" name="hotel" value="1万円以下">1万円以下</label>
                    <label><input type="radio" name="hotel" value="1万円から2万5千円まで">1万円から2万5千円まで</label>
                    <label><input type="radio" name="hotel" value="2万5千円以上">2万5千円以上</label>
                </div>
                <!-- <div><p>2. 航空券の予算は？</p>
                    <label><input type="radio" name="flight" value="激安">激安</label>
                    <label><input type="radio" name="flight" value="普通">普通</label>
                    <label><input type="radio" name="flight" value="プレミアム">プレミアム</label>
                </div>
                <div><p>3. 一緒の行動時間は？</p>
                <select name="engaging">
                    <option value=""></option>
                    <option value="フライトとホテルのみ">フライトとホテルのみ</option>
                    <option value="フライト、ホテルと食事">フライト、ホテルと食事</option>
                    <option value="フライト、ホテル、食事と観光">フライト、ホテル、食事と観光</option>
                </select>
                </div>
                <div><p>4. ホテルの部屋タイプは？</p>
                    <label><input type="radio" name="smoking" value="禁煙">禁煙</label>
                    <label><input type="radio" name="smoking" value="喫煙">喫煙</label>
                    <label><input type="radio" name="smoking" value="どちらでもよい">どちらでもよい</label>
                </div>
                <div><p>5. お酒は飲む？</p>
                    <label><input type="radio" name="drinking" value="飲む">飲む</label>
                    <label><input type="radio" name="drinking" value="飲まない">飲まない</label>
                    <label><input type="radio" name="drinking" value="どちらでもよい">どちらでもよい</label>
                </div>
                <div><p>6. 食事の好みは？</p>
                <select name="eating">
                    <option value=""></option>
                    <option value="なんでも食べれる">なんでも食べれる</option>
                    <option value="食べれないものが結構ある">食べれないものが結構ある</option>
                    <option value="ベジタリアン">ベジタリアン</option>
                </select> -->
                </div><br><br>
                <button class="btn_s">保存</button>
                
            </form>
            <button class="btn" onclick="document.location='profile.php'">破棄</button>
        </div>
        
    </section>
    <!-- <footer>
        <small>(c) tabifriend.com</small>
    </footer> -->
</body>

</html>
