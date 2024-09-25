<?php
// 【問題❸】マッチング度計算（未着手）
// 条件１、時間、目的地一致の場合、
// 条件２、旅の好み計算で5/6以上の人を表示

session_start();
require_once 'funcs.php';
loginCheck();

// ユーザデータ取得ー条件１【要確認】
$marea = $_GET['my_area']; 
$mcountry = $_GET['my_country'];
$mstart = $_GET['my_start'];
$mend = $_GET['my_end'];

// ユーザデータ取得ー条件２【要確認】
$mhotel = $_GET['my_hotel'];
$mfligh = $_GET['my_flight'];
$mengaging = $_GET['my_hotel'];
$msmoking = $_GET['my_hotel'];
$mdrinking = $_GET['my_hotel'];
$meating = $_GET['my_hotel'];


// DBから一致したデータ取得ー条件１【要確認】
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM tabifrie_plan WHERE area = :my_area AND country = :my_country AND start <= :my_start AND end >= :my_end;');
$stmt->bindValue(':my_area', $marea, PDO::PARAM_STR);
$stmt->bindValue(':my_country', $mcountry, PDO::PARAM_STR);
$stmt->bindValue(':my_start', $mstart, PDO::PARAM_STR);
$stmt->bindValue(':my_end', $mend, PDO::PARAM_STR);
$status = $stmt->execute();
if($status === false) {
    sql_error($stmt);
}
$val = $stmt->fetch();

//マッチング度計算、ー条件２【要確認】  0をiに
$fhotel = $val[0]['hotel'];
$fflight = $val[0]['flight'];
$fengaging = $val[0]['engaging'];
$fsmoking = $val[0]['smoking'];
$fdrinking = $val[0]['drinking'];
$feating = $val[0]['eating'];

$fpref = [$fhotel, $fflight,  $fengaging, $fsmoking, $fdrinking, $feating,];
$mpref = [$mhotel, $mflight,  $mengaging, $msmoking, $mdrinking, $meating,];

matching($result){ 
   if ($fpref == $mpref){ $result = 1}  else $result = 0;
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
        <div>
            <h2>旅プラン‐マッチング結果</h2>
            <h3>マッチング度80%以上の旅ふれんど</h3>
            <div>
                <table class="">
                    <thead>
                        <tr>
                            <th class="">旅ふれ</th>
                            <th class="">マッチング度</th>
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
                            <!-- 抽出されたデータrowごとに表示【要確認】 $result >=5のみ 0をiに?-->
                            <td class=""><?= $val[0]['name'] ?></td>
                            <td class=""><?= $result ?></td>
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
