<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/character_form.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400&display=swap" rel="stylesheet">

  <script>
    let theme_color = "";

    function check_input() {
      
      if(!document.character_update_form.name.value)
      {
        alert('이름을 입력하세요.');
        document.character_update_form.name.focus();
        return;
      }
      if(!document.character_update_form.hair.value)
      {
        alert('hair를 입력하세요.');
        document.character_update_form.hair.focus();
        return;
      }
      if(!document.character_update_form.eyes.value)
      {
        alert('eyes를 입력하세요.');
        document.character_update_form.eyes.focus();
        return;
      }
      if(!document.character_update_form.skin.value)
      {
        alert('skin을 입력하세요.');
        document.character_update_form.skin.focus();
        return;
      }
      if(!document.character_update_form.clothing.value)
      {
        alert('clothing을 입력하세요.');
        document.character_update_form.clothing.focus();
        return;
      }
      if(!document.character_update_form.etc.value)
      {
        alert('etc를 입력하세요.');
        document.character_update_form.etc.focus();
        return;
      }

      document.character_update_form.submit();
      alert('수정되었습니다.');
    }

    function onClickUpload() {
        let myInput = document.getElementById("select_img");
        myInput.click();
    }


  </script>
</head>
<body>
<?php
  $character_num = $_GET["character_num"];
?>

  <form action="character_update.php" name="character_update_form" method="post" enctype="multipart/form-data">
  <input type="hidden" name="character_num" value="<?php echo $character_num ?>">
    <div class="character_content">

      <!-- 파일 선택 창 뜨게하기  -->
      <input type="file" name="character_image" id="select_img" accept="image/*">

      <!-- 테마 컬러 선택 / 라디오 이미지 버튼 가능? -->
      <div class="theme_container">
        <span>Theme Color</span>
        <ul class="theme_colors">
        <li>
          <input type="radio" name="theme_color" id="blue" value="blue">
          <label for="blue"><img src="images/theme_blue.png" alt="Blue Theme"></label>
        </li>
        <li>
          <input type="radio" name="theme_color" id="green" value="green">
          <label for="green"><img src="images/theme_green.png" alt="Green Theme"></label>
        </li>
        <li>
          <input type="radio" name="theme_color" id="red" value="red">
          <label for="red"><img src="images/theme_red.png" alt="Red Theme"></label>
        </li>
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
    </div>
  </form>

  <!-- 휴지통 이미지 버튼 만들기(삭제) -->
  <form action="character_delete.php" name="character_delete_form" method="post" enctype="multipart/form-data">
    <div class="bin_button">
      <label for="bin">
        <img src="images/bin.png" alt="">
      </label>
      <input type="hidden" name="character_num" value="<?php echo $character_num ?>">
      <input type="submit" name="image" id="bin" style="display: none;">
    </div>
  </form>
</body>
</html>