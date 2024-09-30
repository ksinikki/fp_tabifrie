<?php
session_start();
require_once 'funcs.php';
loginCheck();

$email = $_SESSION['user_id'];

$pdo = db_conn();
$stmt = $pdo->prepare('SELECT 
    tabifrie_offer.id as id,
    senduser.name as sendername,
    senduser.email as senderemail,
    receiveuser.name as receivername,
    receiveuser.email as receiveremail,
    tabifrie_offer.offer_date as offer_date,
    tabifrie_offer.result as result
FROM tabifrie_offer
INNER JOIN tabifrie_user as senduser
ON tabifrie_offer.sender = senduser.email
INNER JOIN tabifrie_user as receiveuser
ON tabifrie_offer.receiver = receiveuser.email
WHERE sender = :email OR receiver = :email ;'); // phpの日付比較
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
    <title>旅フレ‐マッチング一覧</title>
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
            <h2>マッチングリスト</h2>
            <div>
                <table class="">
                    <thead>
                        <tr>
                            <th class="">オファー日</th>
                            <th class="">旅ふれ</th>
                            <th class="">結果</th>
                        </tr>
                    </thead>
                    <tbody> 
                    <?php
                    foreach( $vals as $offer) {
                        if($offer['senderemail'] == $email){
                            $sender_flg = 1;
                            $to_name = $offer['receivername'];
                            $to_email = $offer['receiveremail'];
                        } else {
                            $sender_flg = 0;
                            $to_name = $offer['sendername'];
                            $to_email = $offer['senderemail'];
                        }
                    ?>
                    <tr>
                        <td class=""><?= $offer['offer_date'] ?></td>
                        <td class=""><?= $to_name ?></td>
                        <?php if($offer['result'] == 1){ ?>
                            <td class="">ペア成立、おめでとうございます！</td>
                        <?php } else if($offer['result'] == 2){ ?>
                            <td class="">ペア不成立...</td>
                        <?php } else {
                            if($sender_flg == 0){
                        ?>
                            <td class="">
                                <form action="offer_edit.php" method="post">
                                    <input type="hidden" name="id" value="<?= $offer['id'] ?>" />
                                    <button class="btn_s" type="submit" name="result" value="1">オファー受け入れ</button>
                                    <button class="btn_s" type="submit" name="result" value="2">拒否</button>
                                </form>
                            </td>
                            <?php } else { ?>
                            <td class="">回答をおまちください。</td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>           
        </div>
    </section>
</body>

</html>
