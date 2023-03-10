<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>character insert</title>
</head>
<body>
<?php

  $character_image = $_FILES["character_image"]["name"]; // 이미지 이름
  $image_save_path = "images/".$character_image;
  $character_image_type = $_FILES["character_image"]["type"];
  $character_image_size = $_FILES["character_image"]["size"];
  $tmp_image_save_path = $_FILES["character_image"]["tmp_image_save_path"];
  $error = $_FILES["character_image"]["error"];

  move_uploaded_file($tmp_image_save_path, $image_save_path);

  $name = $_POST["name"];
  $gender = $_POST["gender"];
  $theme_color = $_POST["theme_color"];
  $character_image_url = $_POST["character_image_url"];
  $eyes = $_POST["eyes"];
  $skin = $_POST["skin"];
  $hair = $_POST["hair"];
  $etc = $_POST["etc"];
  // $weather_conditions = $_POST["weather_conditions"];
  
  echo "insert 1";

  $con = mysqli_connect("localhost", "user1", "12345", "sample");
  echo "insert 2";

  $sql = "insert into character_information(name, gender, theme_color, character_image_url, eyes, skin, hair, clothing, etc) ";
  $sql .= "values('$name', '$gender', '$theme_color', '$image_save_path', '$eyes', '$skin', '$hair', '$clothing', '$etc')";
  echo "insert 3";

  mysqli_query($con, $sql);
  mysqli_close($con);
  echo "insert 4";
  
  echo "
    <script>
      window.opener.location.reload(); // 부모창을 새로고침합니다.
      location.href = 'character_form.php';
    </script>
  ";

?>
</body>
</html>