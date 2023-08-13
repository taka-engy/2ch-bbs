<?php
// エラーを出力する
ini_set('display_errors', "On");
?>
<!-- localhost:8080/2ch-bbs -->
<?php
include_once("../database/connect.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規スレッド作成ページ</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
  <?php include("../parts/header.php"); ?>
  <?php include("../parts/validation.php"); ?>
</body>
</html>