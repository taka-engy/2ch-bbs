<?php
$error_message = array();


if(isset($_POST["submitButton"])) {

  if(empty($_POST["username"])) {
    $error_message["username"] = "お名前を入力してください";
  } else {
    // エスケープ処理
    $escaped["username"] =  htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
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
  
  //書き込むボタンを押したら設定された値をSQLに保存

  $sql = "INSERT INTO `comment` (`id`, `username`, `body`, `post_date`, `thread_id`) VALUES (NULL, '$name', '$body', '$post_date', 1);";
  $statement = $pdo->prepare($sql);

  // --------------------ここから↓は未設定------------

  // $sql = 'INSERT INTO comment (id, username, body, post_date) VALUES (:id, :username, :body, :post_date)'; // テーブルに登録するINSERT INTO文を変数に格納 VALUESはプレースフォルダーで空の値を入れとく
  // $statement = $pdo->prepare($sql);

  // $params = array(':id => $id,' :name => $name, :body => $body, :post_date => $post_date);

  // var_dump($statement);

  //値をセットする。
  // $statement->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
  // $statement->bindParam(":body", $_POST["body"], PDO::PARAM_STR);
  // $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);

  $statement->execute();

  }

  //掲示板にページを移動する
  header("Location: http://localhost:8080/2ch-bbs");
}