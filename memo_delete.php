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
  $memo_num = $_GET["memo_num"];

  // $num = $_POST["num"];

  $con = mysqli_connect("localhost", "user1", "12345", "sample");
  $sql = "delete from memo where memo_num='$memo_num'";
  mysqli_query($con, $sql);
  mysqli_close($con);
  
  

  echo "
    <script>
      alert('메모가 삭제되었습니다.');
      location.href='character_page.php?num='+$character_num;
    </script>
  ";
?>
</body>
</html>
<meta charset="utf-8">
