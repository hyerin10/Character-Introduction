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

    $character_image = $_FILES["character_image"]["name"]; // 이미지 이름
    $image_save_path = "character_images/{$character_image}";
    $character_image_type = $_FILES["character_image"]["type"];
    $character_image_size = $_FILES["character_image"]["size"];
    $tmp_name = $_FILES["character_image"]["tmp_name"];
    $error = $_FILES["character_image"]["error"];
  
    $imageUpload = move_uploaded_file($tmp_name, $image_save_path);
  
    // 업로드 성공 여부 확인
    // if ($imageUpload == true) {
    //   echo "파일이 정상적으로 업로드 되었습니다. <br>";
    //   echo "<img src='{$image_save_path}' width='200' />";
    // }
    // else {
    //   echo "업로드 실패. <br>";
    // }
  
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $theme_color = $_POST["theme_color"];
    $character_image_url = $image_save_path;
    $eyes = $_POST["eyes"];
    $skin = $_POST["skin"];
    $clothing = $_POST["clothing"];
    $hair = $_POST["hair"];
    $etc = $_POST["etc"];

    echo "
      <script>
      console.log('$character_num');
      </script>
    ";
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "UPDATE character_information SET name='$name', gender='$gender', theme_color='$theme_color', character_image_url='$character_image_url', eyes='$eyes', skin='$skin', hair='$hair', clothing='$clothing', etc='$etc' WHERE num='$character_num'";

    mysqli_query($con, $sql);
    mysqli_close($con);
    
    echo "
      <script>
        alert('캐릭터가 수정되었습니다.');
        window.opener.location.href='character_page.php?num='+character_num;
        window.close();
      </script>
    ";
  ?>
</body>
</html>
