<?php
//1. POSTデータ取得
$_co_name = $_POST["co_name"];
$_a_name = $_POST["a_name"];
$_co_tel = $_POST["co_tel"];
$_co_mail = $_POST["co_mail"];
$_co_addnum = $_POST["co_addnum"];
$_co_add = $_POST["co_add"];
$_co_type = $_POST["co_type"];
$_co_genre = $_POST["co_genre"];



//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_an_table(co_name,a_name,co_tel,co_mail,co_addnum,co_add,co_type,co_genre,co_pass)VALUES(:co_name,:a_name,:co_tel,:co_mail,:co_addnum,:co_add,:co_type,:co_genre,:co_pass)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':co_name', $co_name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a_name', $a_name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':co_tel', $co_tel, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':co_mail', $co_mail, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':co_addnum', $co_addnum, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':co_add', $co_add, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':co_type', $co_type, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':co_genre', $co_genre, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':co_pass', $co_pass, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();//実行

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    redirect("com_index.php");
}
