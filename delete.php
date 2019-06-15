<!-- detailからコピペ -->

<?php
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
$id = $_GET["id"];

//select.phpの２〜１３行をコピペ
include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE  id=:id");//idに数字が入る,バインド変数
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
}else{
    redirect("select.php");

}

?>
