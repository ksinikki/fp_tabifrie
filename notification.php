<?php
// 条件１、時間、目的地一致の場合、plan
// 条件２、旅の好み完全一致の人を表示 user

session_start();
require_once 'funcs.php';
loginCheck();

// ユーザデータ取得ー条件１【要確認】
$marea = $_GET['area']; 
$mcountry = $_GET['country'];
$mstart = $_GET['start'];
$mend = $_GET['end'];

// ユーザデータ取得ー条件２【要確認】
$mhotel = $_GET['hotel'];
$mfligh = $_GET['flight'];
$mengaging = $_GET['engaging'];
$msmoking = $_GET['smoking'];
$mdrinking = $_GET['drinking'];
$meating = $_GET['eating'];


// DBから一致したデータ取得ー条件１【要確認】plan
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT 
    tabifrie_plan.name as name,
    tabifrie_plan.email as email,
    tabifrie_plan.start as start,
    tabifrie_plan.end as end,

    tabifrie_user.gender as gender,
    tabifrie_user.age as age,
    tabifrie_user.hotel as hotel,
    tabifrie_user.flight as flight,
    tabifrie_user.engaging as engaging,
    tabifrie_user.smoking as smoking,
    tabifrie_user.drinking as drinking,
    tabifrie_user.eating as eating,
    tabifrie_area.area as area,
    tabifrie_country.country as country
FROM tabifrie_plan
INNER JOIN tabifrie_user
ON tabifrie_plan.email = tabifrie_user.email

INNER JOIN tabifrie_area
ON tabifrie_plan.area = tabifrie_area.id

INNER JOIN tabifrie_country
ON tabifrie_plan.country = tabifrie_country.id WHERE tabifrie_plan.area = :area AND tabifrie_plan.country = :country AND tabifrie_plan.start = :start AND tabifrie_plan.end = :end ;'); // phpの日付比較
$stmt->bindValue(':area', $marea, PDO::PARAM_STR);
$stmt->bindValue(':country', $mcountry, PDO::PARAM_STR);
$stmt->bindValue(':start', $mstart, PDO::PARAM_STR);
$stmt->bindValue(':end', $mend, PDO::PARAM_STR);
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
                   <?= $view = array();

foreach( $val as $plan) {
    $count = 0;
    
    if($plan['hotel'] == $mhotel){ // 修正済
        $count++;
    }
    if($plan['flight'] == $mflight){ // 修正済
        $count++;
    }
    if($plan['engaging'] == $mengaging){ // 修正済
        $count++;
    }
    if($plan['smoking'] == $msmoking){ // 修正済
        $count++;
    }
    if($plan['drinking'] == $mdrinking){ // 修正済
        $count++;
    }
    /* 中略 */
    if($plan['eating'] == $meating){
        $count++;
    }
    //もしカウントが5以上なら
    if($count >= 5) {
        //表示する配列に追加?>
        <tr>  
            <td class=""><?= $plan['name'] ?></td>
            <td class="">><button class="btn_s" onclick="document.location='profile_tabifrie.php?user_id=<?= $plan['email'] ?>'">詳細</button></td>
            <td class=""><?= $plan['area'] ?></td>
            <td class=""><?= $plan['country'] ?></td>
            <td class=""><?= $plan['start'] ?></td>
            <td class=""><?= $plan['end'] ?></td>
        </tr>
        <?=
        $view[] = $plan;
    } 
} ?>
                    </tbody>
                </table>
            </div>           
        </div>
    </section>
</body>

</html>
