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
    $character_num = $_POST["character_num"];
    var_dump($character_num);
    echo "
      <script>
      console.log('$character_num');
      </script>
    ";
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "delete from character_information where num='$character_num'";
    mysqli_query($con, $sql);
    mysqli_close($con);
    
    echo "
      <script>
        alert('캐릭터가 삭제되었습니다.');
        window.opener.location.href='character_page.php?num=1';
        window.close();
      </script>
    ";
  ?>
</body>
</html>
