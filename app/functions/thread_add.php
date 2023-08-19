<?php
$error_message = array();


if(isset($_POST["threadSubmitButton"])) {

    if(empty($_POST["title"])) {
    $error_message["title"] = "お名前を入力してください";
  } else {
    // エスケープ処理
    $escaped["title"] =  htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
  }

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
    $title = $escaped['title'];
    var_dump($title);
    $name = $escaped['username'];
    var_dump($name);
    $body = $escaped['body'];
    var_dump($body);
    $post_date = date("Y-m-d H:i:s");
    var_dump($post_date);

    //スレッドを追加
    $sql = "INSERT INTO `thread` (`id`, `title`) VALUES (NULL, '$title');";
    $statement = $pdo->prepare($sql);

    $statement->execute();

    // コメントも追加
    $sql = "INSERT INTO `comment` (`id`, `username`, `body`, `post_date`, `thread_id`) 
    VALUES (NULL, '$name', '$body', '$post_date', (SELECT `id` FROM `thread` WHERE `title` = '$title'))";
    $statement = $pdo->prepare($sql);

    $statement->execute();

  }

  //掲示板にページを移動する
  header("Location: http://localhost:8080/2ch-bbs");
  
}