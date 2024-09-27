<?php
session_start();
require_once 'funcs.php';
loginCheck();

$name = $_SESSION['user_name'];
$email = $_SESSION['user_id'];
$content = $_POST['content'];

$pdo = db_conn();
// 【問題】宛先の特定は必要？or NOW()で特定できる？
$stmt = $pdo->prepare('INSERT INTO tabifrie_message(id, name, email, content, date_submit) VALUES(NULL, :name, :email, :content,  NOW())');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);

$status = $stmt->execute();

// if($status === false) {
//     sql_error($stmt);
// };

if($status === false) {
  $error = $stmt->errorInfo();
  exit('Error Message:'.$error[2]);
}else{
  header('Location: message_ref.php'); 
}