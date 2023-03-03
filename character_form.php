<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script>
    function check_input() {
      
      if(!document.character_form.name.value)
      {
        alert('이름을 입력하세요.');
        document.character_form.name.focus();
        return;
      }
      if(!document.character_form.hair.value)
      {
        alert('hair를 입력하세요.');
        document.character_form.hair.focus();
        return;
      }
      if(!document.character_form.eyes.value)
      {
        alert('eyes를 입력하세요.');
        document.character_form.eyes.focus();
        return;
      }
      if(!document.character_form.skin.value)
      {
        alert('skin을 입력하세요.');
        document.character_form.skin.focus();
        return;
      }
      if(!document.character_form.clothing.value)
      {
        alert('clothing을 입력하세요.');
        document.character_form.clothing.focus();
        return;
      }
      if(!document.character_form.etc.value)
      {
        alert('etc를 입력하세요.');
        document.character_form.etc.focus();
        return;
      }
      document.character_form.submit();
    }
  </script>
</head>
<body>
  <form action="character_insert.php" name="character_form" method="post" enctype="multipart/form-data">
  <div class="character_content">

    <!-- 파일 선택 창 뜨게하기  -->
    <a href=""><img src="" alt=""></a>

    <!-- 테마 컬러 선택 / 라디오 이미지 버튼 가능? -->
    <ul>
      <li><a href=""><img src="" alt=""></a></li>
      <li><a href=""><img src="" alt=""></a></li>
      <li><a href=""><img src="" alt=""></a></li>
    </ul>

    <!-- 라디오 버튼으로 바꾸기(모양은 체크)-->
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female

    <span>name: </span>
    <input type="text" name="name">

    <span>hair: </span>
    <input type="text" name="hair">
    
    <span>eyes: </span>
    <input type="text" name="eyes">

    <span>skin: </span>
    <input type="text" name="skin">

    <span>clothing: </span>
    <input type="text" name="clothing">

    <span>etc: </span>
    <input type="text" name="etc">

    <button type="button" onclick="check_input()">확인</button>

    <!-- 창 꺼지게 하기 -->
    <button type="button">취소</button>

    <!-- 휴지통 이미지 버튼 만들기(삭제) -->
    <button type="button" onclick="check_input()">휴지통 이미지 버튼</button>
    
  </div>
  </form>
</body>
</html>