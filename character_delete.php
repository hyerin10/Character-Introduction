<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $character_num = $_GET["character_num"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "delete from character_information where num='$num'";
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
