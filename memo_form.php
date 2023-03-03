<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script>
    function check_input() {
      
      if(!document.memo_form.memo_title.value)
      {
        alert('메모 제목을 입력하세요.');
        document.memo_form.memo_title.focus();
        return;
      }
      if(!document.memo_form.memo_content.value)
      {
        alert('메모 내용을 입력하세요.');
        document.memo_form.memo_content.focus();
        return;
      }
      document.memo_form.submit();
    }
  </script>
</head>
<body>
  <form action="memo_insert.php" name="memo_form" method="post" enctype="multipart/form-data">
  <div class="memo_content">
    <span>Title: </span>
    <input type="text" name="memo_title">

    <span>Content: </span>
    <input type="text" name="memo_content">


    <button type="button" onclick="check_input()">확인</button>

    <!-- 창 꺼지게 하기 -->
    <button type="button">취소</button>
    
  </div>
  </form>
</body>
</html>