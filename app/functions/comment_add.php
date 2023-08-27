<?php
$error_message = array();


if(isset($_POST["submitButton"])) {

  if(empty($_POST["username"])) {
    $error_message["username"] = "お名前を入力してください";
  } else {
    // エスケープ処理
    $escaped["username"] =  htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
    $_SESSION["username"] = $escaped["username"];
  }

  if(empty($_POST["body"])) {
    $error_message["body"] = "コメントを入力してください";
  } else {
    // エスケープ処理
    $escaped["body"] =  htmlspecialchars($_POST["body"], ENT_QUOTES, "UTF-8");
  }

  if(empty($error_message)) {

      // formの値を取得
  $name = $escaped['username'];
  // var_dump($name);
  $body = $escaped['body'];
  // var_dump($body);
  $post_date = date("Y-m-d H:i:s");
  // var_dump($post_date);
  $thread_id = $_POST["threadID"];

  // トランザクション開始
  $pdo->beginTransaction();

  try {
          //書き込むボタンを押したら設定された値をSQLに保存
      $sql = "INSERT INTO `comment` (`id`, `username`, `body`, `post_date`, `thread_id`) VALUES (NULL, '$name', '$body', '$post_date', '$thread_id');";
      $statement = $pdo->prepare($sql);

      $statement->execute();

      $pdo->commit();
    } catch (Exception $error) {
      $pdo->rollback();
    }
  }

  $pdo = null;
  $statement = null;

  //掲示板にページを移動する
  header("Location: http://localhost:8080/2ch-bbs");
}