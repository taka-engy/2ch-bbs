<!-- localhost:8080/2ch-bbs -->
<!DOCTYPE html>
<html lang="en">
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
        <article>
          <div class="wrapper">
            <div class="nameArea">
              <span>名前：</span>
              <p class="username">sakevelo</p>
              <time>：2022/7/16 14:20</time>
            </div>
          </div>
          <p class="comment">手書きのコメントです。</p>
        </article>
      </section>
      <form class="formWrapper">
        <div>
          <input type="submit" value="書き込む">
          <label>名前：</label>
          <input type="text">
        </div>
        <div>
          <textarea class="commnetTextArea"></textarea>
        </div>
      </form>
    </div>
  </div>
  
</body>
</html>