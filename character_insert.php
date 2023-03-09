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
  // $weather_conditions = $_POST["weather_conditions"];
  
  echo "insert 1";

  $con = mysqli_connect("localhost", "user1", "12345", "sample");
  echo "insert 2";

  $sql = "insert into character_information(name, gender, theme_color, character_image_url, eyes, skin, hair, clothing, etc) ";
  $sql .= "values('$name', '$gender', '$theme_color', '$character_image_url', '$eyes', '$skin', '$hair', '$clothing', '$etc')";
  echo "insert 3";

  mysqli_query($con, $sql);
  mysqli_close($con);
  echo "insert 4";
  echo "
    <script>
      location.href = 'character_form.php';
    </script>
  ";

?>
</body>
</html>