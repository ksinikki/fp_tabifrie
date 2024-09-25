<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

// 本番環境
// $prod_db = "gs-dev27-34_***";  
// $prod_host = "mysql647.db.sakura.ne.jp"; 
// $prod_id = "gs-dev27-34"; 
// $prod_pw = "sakura1234"; 

//DB接続
function db_conn()
{
    try {
        $db_name = 'tabifrie';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQL Error:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェク処理 
function loginCheck()
{       // ログイン失敗時、
    if (!isset($_SESSION['chk_ssid'])  ||  $_SESSION['chk_ssid']  !==  session_id()) {
        // redirect('login.php');
        // redirect('signup.php');
        exit("Login Error");
    } else {
        // ログイン成功時、新しいSession Keyを発行
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}

