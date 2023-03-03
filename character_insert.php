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
  $name = $_POST["name"];
  $gender = $_POST["gender"];
  $theme_color = $_POST["theme_color"];
  $character_image_url = $_POST["character_image_url"];
  $eyes = $_POST["eyes"];
  $skin = $_POST["skin"];
  $hair = $_POST["hair"];
  $etc = $_POST["etc"];
  $weather_conditions = $_POST["weather_conditions"];
  
  $con = mysqli_connect("localhost", "user1", "12345", "sample");
  $sql = "insert into character_information(name, gender, theme_color, character_image_url, eyes, skin, hair, clothing, etc, weather_conditions) ";
  $sql .= "values('$name', '$gender', '$theme_color', '$character_image_url', '$eyes', '$skin', '$hair', '$clothing', '$etc', '$weather_conditions')";

  mysqli_query($con, $sql);
  mysqli_close($con);

  echo "
    <script>
      location.href = 'character_page.php?num=1';
    </script>
  ";

?>
</body>
</html>