<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <link rel="stylesheet" href="css/character_page.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        function addCharacterSheet(event, character_num) {
          event.preventDefault(); // 기본 동작 방지

          // 이미지 경로와 캐릭터 이름을 변수로 지정합니다.
          const imagePath = "images/sheet_blue.png";
          const characterName = "캐릭터 이름";

          // li 요소를 생성합니다.
          const li = document.createElement("li");
          li.className = "sheet";

          // a 요소를 생성하고 href 속성과 img 요소를 추가합니다.
          const a = document.createElement("a");
          a.href = "http://localhost/Character%20Introduction/character_page.php?num="+(character_num+1);
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
          
          window.open("character_form.php?character_num="+character_num, "Character Form", "width=400,height=650");
          
        }

        function openCharacterDeleteAndUpdateForm(character_num) {
          window.open("character_delete_update_form.php?character_num="+character_num, "Character Delete Form", "width=400,height=650");
        }

        function openMemoForm(character_num) {
          window.open("memo_form.php?character_num="+character_num, "Memo Form", "width=500,height=350");
        }

        function openMemoFormForUpdate(memo_num, character_num) {
          window.open("memo_update_form.php?memo_num="+memo_num+"&character_num="+character_num, "Memo Update Form", "width=500,height=350");
        }


  

        $(document).ready(function() {
          $('.rain_btn').click(function() {
            event.preventDefault(); // 기본 동작 제거
            $('.character_main_line .weather_condition_rain').toggleClass('active');
            $('.character_main_line .weather_condition_snow.active').removeClass('active');
          });
        });

        $(document).ready(function() {
          $('.snow_btn').click(function() {
            event.preventDefault(); // 기본 동작 제거
            $('.character_main_line .weather_condition_snow').toggleClass('active');
            $('.character_main_line .weather_condition_rain.active').removeClass('active');

          });
        });

        $(document).ready(function() {
          $('.snnuy_btn').click(function() {
            event.preventDefault(); // 기본 동작 제거
            $('.character_main_line .weather_condition_snow.active').removeClass('active');
            $('.character_main_line .weather_condition_rain.active').removeClass('active');

          });
        });

        function setLineColor(theme_color) {
          const ulElement = document.querySelector('.sheets');
          if(theme_color == "blue") {
            ulElement.style.borderBottomColor = '#b1b8ed';
          } else if(theme_color == "green") {
            ulElement.style.borderBottomColor = '#beeeb8';
          } else if(theme_color == "red") {
            ulElement.style.borderBottomColor = '#fad5c6';
          } else {
            ulElement.style.borderBottomColor = '#b1b8ed';
          }
        }
    </script>
</head>
<body>
  <?php
  $num = $_GET["num"];
  $con = mysqli_connect("localhost", "user1", "12345", "sample");

  // 테마 컬러 설정
  $theme_color_sql = "select theme_color from character_information where num=".$num;
  $result = mysqli_query($con, $theme_color_sql);
  $row = mysqli_fetch_array($result);
  $theme_color = $row["theme_color"];

  if($theme_color == "blue") {
    $float_image_right = 'line_right.png';
    $float_image_left = 'line_left.png';
  } else if($theme_color == "green") {
    $float_image_right = 'line_right_green.png';
    $float_image_left = 'line_left_green.png';
  } else if($theme_color == "red") {
    $float_image_right = 'line_right_red.png';
    $float_image_left = 'line_left_red.png';
  } else {
    $float_image_right = 'line_right.png';
    $float_image_left = 'line_left.png';
  }
  ?>

  <div class="float_container">
    <ul>
      <li>
        <img id="float_image_right_1" src="images/<?=$float_image_right?>" alt="">
        <span id="float_span_right_1">Clothing: </span>
      </li>
      <li>
        <img id="float_image_right_2" src="images/<?=$float_image_right?>" alt="">
        <span id="float_span_right_2">Skin: </span>
      </li>
      <li>
        <img id="float_image_left_1" src="images/<?=$float_image_left?>" alt="">
        <span id="float_span_left_1">Hair: </span>
      </li>
      <li>
        <img id="float_image_left_2" src="images/<?=$float_image_left?>" alt="">
        <span id="float_span_left_2">Eyes: </span>
      </li>
      <li>
        <img id="float_image_left_3" src="images/<?=$float_image_left?>" alt="">
        <span id="float_span_left_3">Etc: </span>
      </li>
    </ul>
      
  </div>
  
  <div class="root">
    <div class="container_top">
        <ul class="sheets">
  <?php
    $num = $_GET["num"];
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    // 모든 데이터 가져오기 구현

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $theme_color_sql = "select theme_color from character_information where num=".$num;
    $result = mysqli_query($con, $theme_color_sql);
    $row = mysqli_fetch_array($result);
    $theme_color = $row["theme_color"];

    if($theme_color == "blue") {
      $sheet_img = 'sheet_blue.png';
      echo "<script>setLineColor('$theme_color');</script>";
    } else if($theme_color == "green") {
      $sheet_img = 'sheet_green.png';
      echo "<script>setLineColor('$theme_color');</script>";
    } else if($theme_color == "red") {
      $sheet_img = 'sheet_red.png';
      echo "<script>setLineColor('$theme_color');</script>";
    } else {
      $sheet_img = 'sheet_blue.png';
      echo "<script>setLineColor('$theme_color');</script>";
    }

    // 모든 시트의 데이터 가져오기    
    $sql = "select * from character_information";

    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result);
    for($i=0; $i<$total_record;$i++) {
      mysqli_data_seek($result, $i);
      $row = mysqli_fetch_array($result);

      $character_num = $row["num"];
      $name = $row["name"];
      $gender = $row["gender"];
      $character_image_url = $row["character_image_url"];
      $eyes = $row["eyes"];
      $skin = $row["skin"];
      $hair = $row["hair"];
      $clothing = $row["clothing"];
      $etc = $row["etc"];
    
  ?>
          <li class="sheet">
            <a href="character_page.php?num=<?=$character_num?>"><img src="images/<?=$sheet_img?>" alt=""></a>
            <div class="character_name"><?=$name?></div>
          </li>
  <?php

    }
    mysqli_close($con);
  ?>
          <li class="sheet">
            <a href="" onclick="addCharacterSheet(event, <?=isset($_GET['num']) ? $_GET['num'] : null?>)"><img src="images/sheet_gray1.png" alt=""></a>
            <div class="character_name">ADD+</div>
          </li>
        </ul>
        
        <ul class="weather_conditions">
          <li class="weather_condition">
            <a href="" class="rain_btn"><img src="images/rain.png" alt=""></a>
            <span>Rainy</span>
          </li>
          <li class="weather_condition">
            <a href="" class="sunny_btn"><img src="images/sunny.png" alt=""></a>
            <span>Sunny</span>
          </li>
          <li class="weather_condition">
            <a href="" class="snow_btn"><img src="images/snow.png" alt=""></a>
            <span>Snowy</span>
          </li>
        </ul>

  <?php
    $num = $_GET["num"];

    // 모든 데이터 가져오기 구현

    // 데이터 가져오기
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select character_image_url from character_information where num=".$num;

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);

    $character_image_url = $row["character_image_url"];
  ?>

        <div class="character_main">
          <span>Character profile</span>
          <div class="character_main_line">
            <a href="#" onclick="openCharacterDeleteAndUpdateForm(<?=isset($_GET['num']) ? $_GET['num'] : null?>)">
              <img class="main_image" src="<?=$character_image_url?>" alt="">  
              <img class="weather_condition_rain" src="images/rain.gif" alt="">
              <img class="weather_condition_snow" src="images/snow.gif" alt="">
              
            </a>
          </div>
        </div>
  <?php


  mysqli_close($con);
  ?>
    </div>
  
    <form action="memo_delete.php" name="memo_delete" method="post" enctype="multipart/form-data">
      <div class="container_bottom">

      <?php
      $num = $_GET["num"];

      // 모든 데이터 가져오기 구현
      // $con = mysqli_connect("localhost", "user1", "12345", "sample");
      // $sql = "select * from memo where character_num=$num limit $start_index, $page_size";

      // 현재 페이지 구하기
      $page = isset($_GET['page']) ? $_GET['page'] : 1;

      // 이전 페이지 구하기
      $prev_page = $page - 1;

      // 다음 페이지 구하기
      $next_page = $page + 1;

      // 한 페이지에 보여줄 메모 개수
      $page_size = 4;

      // 시작 인덱스 구하기
      $start_index = ($page - 1) * $page_size;

      // 이전 페이지 URL
      $prev_url = isset($_GET['num']) ? "character_page.php?num={$_GET['num']}&page=$prev_page" : "character_page.php?page=$prev_page";

      // 다음 페이지 URL
      $next_url = isset($_GET['num']) ? "character_page.php?num={$_GET['num']}&page=$next_page" : "character_page.php?page=$next_page";
      ?>
          <div class="left_btn">
            <a href="<?=$prev_url?>"><img src="images/memo_left.png" alt=""></a>
          </div>

            <ul class="memos">
    
      <?php

      $con = mysqli_connect("localhost", "user1", "12345", "sample");

      // 테마 컬러 설정
      $theme_color_sql = "select theme_color from character_information where num=".$num;
      $result = mysqli_query($con, $theme_color_sql);
      $row = mysqli_fetch_array($result);
      $theme_color = $row["theme_color"];

      if($theme_color == "blue") {
        $memo_title_img = 'memo_blue_top.png';
        $memo_content_img = 'memo_blue.png';
      } else if($theme_color == "green") {
        $memo_title_img = 'memo_green_top.png';
        $memo_content_img = 'memo_green.png';
      } else if($theme_color == "red") {
        $memo_title_img = 'memo_red_top.png';
        $memo_content_img = 'memo_red.png';
      } else {
        $memo_title_img = 'memo_blue_top.png';
        $memo_content_img = 'memo_blue.png';
      }

      $sql = "select * from memo where character_num=$num limit $start_index, $page_size";
      
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result);
      $total_record = mysqli_num_rows($result);

      if($total_record!=0) {
      
        for($i=0; $i<($page_size-($page_size-$total_record));$i++) {
          mysqli_data_seek($result, $i);
          $row = mysqli_fetch_array($result);

          $memo_num = $row["memo_num"];
          $memo_title = $row["memo_title"];
          $memo_content = $row["memo_content"];

      ?>
              <li class="memo">
                  <div class="memo_title">
                    <span class="memo_title_letter"><?=$memo_title?></span>
                    <a href="memo_delete.php?character_num=<?=isset($_GET['num']) ? $_GET['num'] : null?>&memo_num=<?=$memo_num?>"><img src="images/memo_close.png" onclick="memoDelete(<?=$character_num?>, 1)" alt="" class="memo_close"></a>
                    <img class="memo_title_img" src="images/<?=$memo_title_img?>" alt="">
                  </div>
                  <!-- 메모수정 -->
                  <!-- <h1><?=isset($_GET['num']) ? $_GET['num'] : null?></h1> -->
                  <a href="" onclick="openMemoFormForUpdate(<?=$memo_num?>, <?=isset($_GET['num']) ? $_GET['num'] : null?>);">
                    <div class="memo_content">
                      <span class="memo_content_letter"><?=$memo_content?></span>
                      <img class="memo_content_img" src="images/<?=$memo_content_img?>" alt="">
                    </div>
                  </a>
              </li>
    <?php
        $character_num++;
      }
    }
      mysqli_close($con);

      if($total_record<=4) {
        
        for($i=0;$i<4-$total_record;$i++) {
    ?>
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
            <a href="<?=$next_url?>"><img src="images/memo_right.png" alt=""></a>
          </div>
          
      </div>
    </form>
  </div>


</body>
</html>