<form class="formWrapper" method="POST" autocomplete="off">
  <div>
    <input type="submit" value="書き込む" name="submitButton">
    <label>名前：</label>
    <input type="text" name="username">
    <input type="hidden" name="threadID" value="<?php echo $thread["id"]; ?>">
  </div>
  <div>
    <textarea class="commentTextArea" name="body"></textarea>
  </div>
</form>