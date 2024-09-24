<?php
// 【問題❸】マッチング度計算（未着手）
// 条件１、時間、目的地一致の場合、
// 条件２、旅の好み計算で5/6以上の人を表示

session_start();
require_once 'funcs.php';
loginCheck();

// ユーザデータ取得【要確認】
$myArea = $_GET['myArea']; 
$myCountry = $_GET['myCountry'];
$myStart = $_GET['myStart'];
$myEnd = $_GET['myEnd'];

// DBから一致したデータ取得【要確認】
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM tabifrie_plan WHERE area = :myArea AND country = :myCountry AND start <= :myStart AND end >= :myEnd;');
$stmt->bindValue(':myarea', $myArea, PDO::PARAM_STR);
$stmt->bindValue(':mycountry', $myCountry, PDO::PARAM_STR);
$stmt->bindValue(':mystart', $myStart, PDO::PARAM_STR);
$stmt->bindValue(':myend', $myEnd, PDO::PARAM_STR);
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
        <div>
            <h2>旅プラン‐マッチング結果</h2>
            <h3>マッチング度80%以上の旅ふれんど</h3>
            <div>
                <table class="">
                    <thead>
                        <tr>
                            <th class="">旅ふれ</th>
                            <th class="">プロフィール</th>
                            <th class="">エリア</th>
                            <th class="">国</th>
                            <th class="">出発日</th>
                            <th class="">帰国日</th>
                            <th class="">詳細</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr> 
                            <!-- 【課題：抽出されたデータrowごとに表示】 -->
                            <td class=""><?= $val[0]['name'] ?></td>
                            <td class="">><button class="btn_s" onclick="document.location='profile_tabifrie.php'">詳細</button></td>
                            <td class=""><?= $val[0]['area'] ?></td>
                            <td class=""><?= $val[0]['country'] ?></td>
                            <td class=""><?= $val[0]['start'] ?></td>
                            <td class=""><?= $val[0]['end'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>           
        </div>
    </section>
</body>

</html>
