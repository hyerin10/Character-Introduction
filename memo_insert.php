<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>memo insert</title>
</head>
<body>
<?php
  $character_num = $_POST["character_num"];
  $memo_title = $_POST["memo_title"];
  $memo_content = $_POST["memo_content"];
  
  $con = mysqli_connect("localhost", "user1", "12345", "sample");
  $sql = "insert into memo(character_num, memo_title, memo_content) ";
  $sql .= "values('$character_num', '$memo_title', '$memo_content')";

  mysqli_query($con, $sql);
  mysqli_close($con);

  echo "
    <script>
      location.href = 'drawings_list.php';
    </script>
  ";

?>
</body>
</html>