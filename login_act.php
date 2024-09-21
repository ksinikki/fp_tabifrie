<?php

session_start();
$email = $_POST['email'];
$password = $_POST['password'];

require_once 'funcs.php';
$pdo = db_conn();

// tabifrie_userに、IDとWPがあるか確認する。
$stmt = $pdo->prepare('SELECT * FROM tabifrie_user WHERE email = :email AND password = :password');
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

// SQL実行時にエラーがある場合STOP
if($status === false) {
    sql_error($stmt);
}

// 一致する場合、データを抽出し$valに格納
$val = $stmt->fetch();
// var_dump($val);
// exit;


if($val['id']) { // if($val['id'] !== '') { 
    //Login成功時 該当レコードがあればSESSIONに値を代入
    $_SESSION['chk_ssid'] = session_id(); //chk_ssid 変数名
    $_SESSION['user_name'] = $val['name'];
    $_SESSION['user_id'] = $val['email'];
    // $_SESSION['user_id'] = $val['id'];
    header('Location: profile.php');
} else {
    //Login失敗時(Logout経由)
    header('Location: login.php');
}
exit();
