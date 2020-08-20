<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$sql = "SELECT * FROM reviews WHERE id={$_POST['id']}";  // 리뷰 선택 시 리뷰의 아이디로. POST방식임에 유의
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
$article = array('review'=>htmlspecialchars($row['review']));
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/topbar.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
    <title>리뷰 수정</title>
</head>

<body>
    <h1><?=$row['name']?></h1>
    <p>별점 선택(별로 라디오버튼 / php로 $star 변수 만들어 넣기 / 기존에 있던 별점도 불러와야)</p>
    <p>별점을 선택하세요.</p>
    <p>
      <form action="process_update_review.php" method="POST">
          <input type="hidden" name="store_id" value="<?=$_GET['store_id']?>">
          <input type="hidden" name="id" value="기존의 사용자가 쓰던 리뷰의 id값">
          <input type="hidden" name="star" value="<?=$row['star']?>">
          <p><textarea name="review" cols="30" rows="10"><?= $article['review']?></textarea></p>
          <p><input type="submit" name="리뷰 수정"></p>
      </form>
    </p>

</body>

</html>
