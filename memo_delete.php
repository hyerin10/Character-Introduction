<meta charset="utf-8">
<?php
  $num = $_POST["num"];

  $con = mysqli_connect("localhost", "user1", "12345", "sample");
  $sql = "delete from memo where num='$num'";
  mysqli_query($con, $sql);
  mysqli_close($con);
  
  echo "
    <script>
      location.href = 'character_page.php?num=1';
    </script>
  ";
?>