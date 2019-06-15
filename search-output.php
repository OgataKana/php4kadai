<?php require 'header.php'; ?>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a><br>
      <form action="search-output.php" method="post">
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>



      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
<table>
<!-- <tr><th>   書籍名  </th><th>   著者</th><th>   感想</th></tr> -->
<?php
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
$sql=$pdo->prepare('select * from gs_bm_table where name like ? or sakusya like ? or comment like?');
    $sql->execute(['%'.$_REQUEST['keyword'].'%','%'.$_REQUEST['keyword'].'%','%'.$_REQUEST['keyword'].'%']);
    // var_dump($sql);
    // var_dump($_REQUEST['keyword']);
    foreach ($sql as $row) {
	echo '<tr>';
	echo '<td>','書籍名『', $row['name'], '』  </td>';
	echo '<td>', '著者 [', $row['sakusya'], ']  </td>';
	echo '<td>', '感想《',$row['comment'], '》  </td>';
	echo '</tr>';
	echo "\n";
}



?>



    <!-- <div class="container jumbotron"><?=$view?></div> -->
</div>
<!-- Main[End] -->

<?php require 'footer.php'; ?>

<!-- $sql = "select * from product where name like :keyword or sakusya like :keyword or comment like :keyword";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':keyword', $_REQUEST['keyword'], PDO::PARAM_STR);
$status = $stmt->execute(); -->
