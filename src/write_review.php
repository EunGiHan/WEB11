<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$sql = "SELECT * FROM stores WHERE id={$_GET['store_id']}";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($result)){
  $name = $row['name'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/topbar.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
    <title>리뷰 작성</title>
</head>

<body>
    <h1><?=$name?></h1>
    <p>별점 선택(별로 라디오버튼 / php로 $star 변수 만들어 넣기)</p>
    <p>별점을 선택하세요.</p>
    <p>
      <form action="process_create.php" method="POST">
          <input type="hidden" name="store_id" value="<?=$_GET['store_id']?>">
          <!--<input type="hidden" name="star" value="<$row['star']?>">-->
          <p><textarea name="review" cols="30" rows="10" placeholder="리뷰를 입력하세요."></textarea></p>
          <p><input type="submit" name="리뷰 등록"></p>
      </form>
    </p>

</body>

</html>
