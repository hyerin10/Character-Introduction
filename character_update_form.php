<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/character_form.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400&display=swap" rel="stylesheet">

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
      alert('저장되었습니다.');
    }

    function onClickUpload() {
        let myInput = document.getElementById("select_img");
        myInput.click();
    }

  </script>
</head>
<body>
  <form action="character_insert.php" name="character_form" method="post" enctype="multipart/form-data">
  <div class="character_content">

    <!-- 파일 선택 창 뜨게하기  -->
    <input type="file" name="character_image" id="select_img" accept="image/*">

    <!-- 테마 컬러 선택 / 라디오 이미지 버튼 가능? -->
    <div class="theme_container">
      <span>Theme Color</span>
      <ul class="theme_colors">
        <li><a href=""><img src="images/theme_blue.png" alt=""></a></li>
        <li><a href=""><img src="images/theme_green.png" alt=""></a></li>
        <li><a href=""><img src="images/theme_red.png" alt=""></a></li>
      </ul>
    </div>


    <div class="radio_container">
      <!-- 라디오 버튼으로 바꾸기(모양은 체크)-->
      Male<input type="radio" name="gender" value="Male">
      Female<input type="radio" name="gender" value="Female">
    </div>
    

    <div class="input_container">
      <div class="titles">
        <span>name: </span>
        <span>hair: </span>
        <span>eyes: </span>
        <span>skin: </span>
        <span>clothing: </span>
        <span>etc: </span>
      </div>
      <div class="inputs">
        <input type="text" name="name">
        <input type="text" name="hair">
        <input type="text" name="eyes">
        <input type="text" name="skin">
        <input type="text" name="clothing">
        <input type="text" name="etc">
      </div>
    </div>
    
    
    <div class="buttons">
      <button type="button" onclick="check_input()">확인</button>
      <!-- 창 꺼지게 하기 -->
      <button type="button" onclick="window.close()">취소</button>

    </div>

    <!-- 휴지통 이미지 버튼 만들기(삭제) -->
    <div class="bin_button">
      <a href=""><img src="images/bin.png" alt=""></a>
    </div>
  </div>
  </form>
</body>
</html>