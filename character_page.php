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

        function openMemoForm() {
          window.open("memo_form.php", "Memo Form", "width=500,height=350");
        }
    </script>
</head>
<body>
  <?php
    $num = $_GET["num"];
    // $con = mysqli_connect("localhost", "user1", "12345", "sample");
    // $sql = "insert into character_information(name, gender, theme_color, character_image_url, eyes, skin, hair, clothing, etc) ";
    // $sql .= "values('wo', 'male', 'blue', 'https://drive.google.com/file/d/1d4n6J61GxRa0YthN1UI-nlLZAQJA8fJ6/view?usp=share_link', 'black', 'brwon', 'plain', 'test clothing', 'none')";

    // mysqli_query($con, $sql);
    // mysqli_close($con);

    // 데이터 가져오기
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from character_information where num=$num";

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);

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
  <button onclick="printCharacterName()">dd</button>
  <div class="container">
      <li class="content_list">
        <span class="content_item">이름: </span>
        <span class="content_item"><?=$name?></span>
        <span class="content_item">gender: </span>
        <span class="content_item"><?=$gender?></span>
        <span class="content_item">theme_color: </span>
        <span class="content_item"><?=$theme_color?></span>
        <span class="content_item"><img src='$character_image_url' alt=""></span>
        <span class="content_item">eyes: </span>
        <span class="content_item"><?=$eyes?></span>
        <span class="content_item">skin: </span>
        <span class="content_item"><?=$skin?></span>
        <span class="content_item">hair: </span>
        <span class="content_item"><?=$hair?></span>
        <span class="content_item">clothing: </span>
        <span class="content_item"><?=$clothing?></span>
        <span class="content_item">etc: </span>
        <span class="content_item"><?=$etc?></span>

      </li>
  </div>
  <input type="button" value="메모 추가" onclick="openMemoForm()" />
  <input type="button" value="캐릭터 시트 추가" onclick="addCharacterSheet()" />
  <input type="button" value="데이터 저장" onclick="addCharacterSheet()" />
  
  <div class="root">
    <div class="container_top">
        <ul class="sheets">
          <li class="sheet">
            <a href=""><img src="images/sheet_blue.png" alt=""></a>
            <div class="character_name"><?=$name?></div>
          </li>
          <li class="sheet">
            <a href="http://localhost/Character%20Introduction/character_page.php?num=2"><img src="images/sheet_blue.png" alt=""></a>
            <div class="character_name"><?=$name?></div>
          </li>
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
    <div class="container_bottom">
        <div class="left_btn">
          <a href=""><img src="images/memo_left.png" alt=""></a>
        </div>

        <ul class="memos">
          <li class="memo">
            <div class="memo_title">
              <a href=""><img src="images/memo_close.png" alt="" class="memo_close"></a>
            </div>
            <div class="memo_content"></div>
            
          </li>
          <li class="memo">
            <div class="memo_title">
              <a href=""><img src="images/memo_close.png" alt="" class="memo_close"></a>
            </div>
            <div class="memo_content"></div>
          </li>
          <li class="memo">
            <div class="memo_title">
              <a href=""><img src="images/memo_close.png" alt="" class="memo_close"></a>
            </div>
            <div class="memo_content"></div>
            <a href=""><img src="" alt=""></a>
          </li>
          <li class="memo">
            <div class="memo_title">
              <a href=""><img src="images/memo_close.png" alt="" class="memo_close"></a>
            </div>
            <div class="memo_content"></div>
            <a href=""><img src="" alt=""></a>
          </li>
        </ul>

        <div class="right_btn">
          <a href=""><img src="images/memo_right.png" alt=""></a>
        </div>
    </div>
  </div>


</body>
</html>