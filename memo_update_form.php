<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/memo_form.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400&display=swap" rel="stylesheet">
  <script>
    function check_input() {
      
      if(!document.memo_update_form.memo_title.value)
      {
        alert('메모 제목을 입력하세요.');
        document.memo_update_form.memo_title.focus();
        return;
      }
      if(!document.memo_update_form.memo_content.value)
      {
        alert('메모 내용을 입력하세요.');
        document.memo_update_form.memo_content.focus();
        return;
      }
      document.memo_update_form.submit();
      alert('메모가 수정되었습니다.');
    }

    
  </script>
</head>
<body>
  <form action="memo_update.php" name="memo_update_form" class="memo_form" method="post" enctype="multipart/form-data">

    <div class="memo_container">
    <input type="hidden" name="memo_num" value="<?php echo $_GET['memo_num']; ?>">
    <input type="hidden" name="character_num" value="<?php echo $_GET['character_num']; ?>">
    
      <div class="titles">
        <span>Title: </span>
        <span>Content: </span>
        
      </div>
      <div class="inputs">
        <input type="text" name="memo_title">
        <input type="text" name="memo_content" class="memo_content_input">
      </div>
    </div>

    <div class="buttons">
      <button type="button" onclick="check_input()">확인</button>

      <!-- 창 꺼지게 하기 -->
      <button type="button" onclick="window.close()">취소</button>
    </div>
  </form>
</body>
</html>