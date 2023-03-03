<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <title></title>
  <script type="text/javascript">
        // Create a function to add a form to the page
        function addMemoForm() {
            // Create a form element
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

        function addCharacterSheet() {
            // Create a form element
            var form = document.createElement("form");
            
            // DB에서 데이터 불러오기
            // 메인 화면에 띄워주기

            document.body.appendChild(form);
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
  <input type="button" value="메모 추가" onclick="addMemoForm()" />
  <input type="button" value="캐릭터 시트 추가" onclick="addCharacterSheet()" />
  <input type="button" value="데이터 저장" onclick="addCharacterSheet()" />
  
</body>
</html>