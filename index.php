<!-- localhost:8080/2ch-bbs -->
<?php

include_once("./app/database/connect.php");


if(isset($_POST["submitButton"])) {

  // formの値を取得
  $name = $_POST['username'];
  var_dump($name);
  $body = $_POST['body'];
  var_dump($body);
  $post_date = date("Y-m-d H:i:s");
  var_dump($post_date);

  //書き込むボタンを押したら設定された値をSQLに保存

  $sql = "INSERT INTO `comment` (`id`, `username`, `body`, `post_date`) VALUES (NULL, '$name', '$body', '$post_date');";
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

$comment_array = array();

// コメントデータをテーブルから取得してくる
$sql = "SELECT * FROM comment";
$statement = $pdo->prepare($sql);
$statement->execute();

$comment_array = $statement;

// var_dump($comment_array->fetchAll());

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>２ちゃんねる掲示板</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <header>
    <h1 class="title">２ちゃんねる掲示板</h1>
    <hr>
  </header>

  <!-- スレッドエリア -->
  <div class="treadWrapper">
    <div class="childWrapper">
      <div class="treadTitle">
        <span> 【タイトル】 </span>
        <h1>２ちゃんねる掲示板を作ってみた</h1>
      </div>
      <section>
        <?php foreach($comment_array as $comment) :?>
        <article>
          <div class="wrapper">
            <div class="nameArea">
              <span>名前：</span>
              <p class="username"><?php echo $comment["username"] ?></p>
              <time>：<?php echo $comment["post_date"] ?></time>
            </div>
          </div>
          <p class="comment"><?php echo $comment["body"] ?></p>
        </article>
        <?php endforeach ?>
      </section>
      <form class="formWrapper" method="POST" autocomplete="off">
        <div>
          <input type="submit" value="書き込む" name="submitButton">
          <label>名前：</label>
          <input type="text" name="username">
        </div>
        <div>
          <textarea class="commentTextArea" name="body"></textarea>
        </div>
      </form>
    </div>
  </div>
  
</body>
</html>