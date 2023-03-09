<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <link rel="stylesheet" href="css/character_page.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400&display=swap" rel="stylesheet">
  <title></title>
  <script type="text/javascript">
        
        function memoDelete(chracter_num, memo_num) {
          var form = document.memo_delete;
          form.character_num.value = character_num;
          form.memo_num.value = memo_num;
          form.submit();
          alert('삭제되었습니다.');
        }

        function addMemoForm() {
            
            var form = document.createElement("form");
            
            form.setAttribute("action", "#");

            var titleInput = document.createElement("input");
            var contentInput = document.createElement("input");

            titleInput.type = "text";
            titleInput.name = "titleInput";

            contentInput.type = "text";
            contentInput.name = "contentInput";
            
            form.appendChild(titleInput);
            form.appendChild(contentInput);

            document.body.appendChild(form);
        }

        function addCharacterSheet(event) {
          event.preventDefault(); // 기본 동작 방지

          // 이미지 경로와 캐릭터 이름을 변수로 지정합니다.
          const imagePath = "images/sheet_blue.png";
          const characterName = "캐릭터 이름";

          // li 요소를 생성합니다.
          const li = document.createElement("li");
          li.className = "sheet";

          // a 요소를 생성하고 href 속성과 img 요소를 추가합니다.
          const a = document.createElement("a");
          a.href = "http://localhost/Character%20Introduction/character_page.php?num=2";
          const img = document.createElement("img");
          img.src = imagePath;
          img.alt = "";
          a.appendChild(img);
          li.appendChild(a);

          // div 요소를 생성하고 캐릭터 이름을 추가합니다.
          const div = document.createElement("div");
          div.className = "character_name";
          div.textContent = characterName;
          li.appendChild(div);

          // 페이지에 li 요소를 추가합니다.
          const ul = document.querySelector("ul"); // ul 요소를 선택합니다.
          ul.appendChild(li); // li 요소를 ul 요소의 자식 요소로 추가합니다.
          
          // 마지막 li 요소를 마지막에서 두번째로 보냅니다.
          const lastItem = ul.lastChild.previousElementSibling;
          ul.insertBefore(li, lastItem);

          window.open("character_form.php", "Character Form", "width=400,height=650");
        }

        function openMemoForm(character_num) {
          window.open("memo_form.php?character_num="+character_num, "Memo Form", "width=500,height=350");
        }

        function openMemoFormForUpdate(memo_num, character_num) {
          window.open("memo_update_form.php?memo_num="+memo_num+"&character_num="+character_num, "Memo Update Form", "width=500,height=350");
        }
    </script>
</head>
<body>
  
  <div class="container">
      
  </div>
  
  <div class="root">
    <div class="container_top">
        <ul class="sheets">
  <?php
    $num = $_GET["num"];

    // 모든 데이터 가져오기 구현

    // 데이터 가져오기
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from character_information";

    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result);
    for($i=0; $i<$total_record;$i++) {
      mysqli_data_seek($result, $i);
      $row = mysqli_fetch_array($result);

      $character_num = $row["num"];
      $name = $row["name"];
      $gender = $row["gender"];
      $theme_color = $row["theme_color"];
      $character_image_url = $row["character_image_url"];
      $eyes = $row["eyes"];
      $skin = $row["skin"];
      $hair = $row["hair"];
      $clothing = $row["clothing"];
      $etc = $row["etc"];
    
  ?>
          <li class="sheet">
            <a href="character_page.php?num=<?=$character_num?>"><img src="images/sheet_blue.png" alt=""></a>
            <div class="character_name"><?=$name?></div>
          </li>
  <?php

    }
    mysqli_close($con);
  ?>
          <li class="sheet">
            <a href="" onclick="addCharacterSheet(event)"><img src="images/sheet_gray1.png" alt=""></a>
            <div class="character_name">ADD+</div>
          </li>
        </ul>
        
        <ul class="weather_conditions">
          <li class="weather_condition">
            <a href=""><img src="images/rain.png" alt=""></a>
            <span>Rainy</span>
          </li>
          <li class="weather_condition">
            <a href=""><img src="images/sunny.png" alt=""></a>
            <span>Sunny</span>
          </li>
          <li class="weather_condition">
            <a href=""><img src="images/snow.png" alt=""></a>
            <span>Snowy</span>
          </li>
        </ul>

        <div class="character_main">
          <span>Character profile</span>
          <div class="character_main_line">
            <a href=""><img src="images/boy_blue.png" alt=""></a>
          </div>
          
        </div>

    </div>
  
    <form action="memo_delete.php" name="memo_delete" method="post" enctype="multipart/form-data">
      <div class="container_bottom">
          <div class="left_btn">
            <a href=""><img src="images/memo_left.png" alt=""></a>
          </div>

            <ul class="memos">
    <?php
      $num = $_GET["num"];

      // 모든 데이터 가져오기 구현
      $con = mysqli_connect("localhost", "user1", "12345", "sample");
      $sql = "select * from memo where character_num=$num";

      $result = mysqli_query($con, $sql);
      $total_record = mysqli_num_rows($result);

      // 총 데이터가 1개, 2개, 3개, 4개, 4개 이상인 경우

      // 현재 선택되어 있는 페이지의 num가져오기
      // $character_num = isset($_GET['num']) ? $_GET['num'] : null;
      
      for($i=0; $i<$total_record;$i++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);

        $memo_num = $row["memo_num"];
        $memo_title = $row["memo_title"];
        $memo_content = $row["memo_content"];


    ?>
              <li class="memo">
                  <div class="memo_title">
                    <span class="memo_title_letter"><?=$memo_title?><?=$memo_num?></span>
                    <a href="memo_delete.php?character_num=<?=isset($_GET['num']) ? $_GET['num'] : null?>&memo_num=<?=$memo_num?>"><img src="images/memo_close.png" onclick="memoDelete(<?=$character_num?>, 1)" alt="" class="memo_close"></a>
                  </div>
                  <!-- 메모수정 -->
                  <!-- <h1><?=isset($_GET['num']) ? $_GET['num'] : null?></h1> -->
                  <a href="" onclick="openMemoFormForUpdate(<?=$memo_num?>, <?=isset($_GET['num']) ? $_GET['num'] : null?>);">
                    <div class="memo_content">
                      <span class="memo_content_letter"><?=$memo_content?></span>
                    </div>
                  </a>
              </li>
    <?php
        $character_num++;
      }
      mysqli_close($con);

      if($total_record<=4) {
        
        for($i=0;$i<4-$total_record;$i++) {
    ?>
    <!-- <h1>hhhh</h1> -->
              <li class="memo_empty">
                  <div class="memo_title_empty">
                    <span class="memo_title_empty_letter">메모추가</span>
                    <a href=""><img src="images/memo_close.png" onclick="" alt="" class="memo_close"></a>
                  </div>

                  <a href="" onclick="openMemoForm(<?=isset($_GET['num']) ? $_GET['num'] : null?>)">

                  <div class="memo_content_empty">
                    </div>
                  </a>
              </li>
    <?php
          $character_num++;
        }

      }
    ?>
            </ul>
          

          <div class="right_btn">
            <a href=""><img src="images/memo_right.png" alt=""></a>
          </div>
          
      </div>
    </form>
  </div>


</body>
</html>