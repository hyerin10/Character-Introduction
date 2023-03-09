<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/memo_form.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400&display=swap" rel="stylesheet">
</head>
<body>
  <?php
    $character_num = $_POST["character_num"];
    $memo_num = $_POST["memo_num"];
    $memo_title = $_POST["memo_title"];
    $memo_content = $_POST["memo_content"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "UPDATE memo SET memo_title='$memo_title', memo_content='$memo_content' WHERE memo_num=$memo_num";

  mysqli_query($con, $sql);
  mysqli_close($con);

  echo "
    <script>
      window.opener.location.reload(); // 부모창을 새로고침합니다.
      location.href = 'memo_form.php?character_num='+'$character_num';
    </script>
  ";
  ?>

  
</body>
</html>