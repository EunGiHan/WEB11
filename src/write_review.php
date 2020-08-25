<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$sql = "SELECT * FROM stores WHERE id={$_GET['store_id']}";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
$name = $row['name'];
$star = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/review.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <title>리뷰 작성</title>
</head>

<body>
  <div class="container">
      <div class="top">
          <input type="button" class="btn" onclick="location.href='javascript:history.back()';" value="back">
          <input type="button" class="btn1" onclick="location.href='../index.php';" value="home" >
      </div>
      <div><h1><?=$name?></h1></div><br>
      <div style="text-align: center; border-top: 1px solid gainsboro ;">별점을 선택하세요.</div><br>
      <form action="process_create.php" method="POST">
      <div class="rating">
          <fieldset>
              <span class="star-cb-group">

                  <input type="radio" id="rating-5" name="rating" value="5"/>
                  <label for="rating-5">5</label>
                  <input type="radio" id="rating-4" name="rating" value="4"/>
                  <label for="rating-4">4</label>
                  <input type="radio" id="rating-3" name="rating" value="3"/>
                  <label for="rating-3">3</label>
                  <input type="radio" id="rating-2" name="rating" value="2"/>
                  <label for="rating-2">2</label>
                  <input type="radio" id="rating-1" name="rating" value="1"/>
                  <label for="rating-1">1</label>
                  <input type="radio" id="rating-0" name="rating" value="0" checked="checked" class="star-cb-clear"/> <!--checked넣긴 했는데 얘 뭔 뜻이지>>-->
                  <label for="rating-0">0</label>

              </span>
          </fieldset>
      </div>
      <div>
          <input type="hidden" name="store_id" value="<?=$_GET['store_id']?>">
          <?php
          if(isset($_SESSION['name'])){
            $author = $_SESSION['name'];
          }else {
            $author = "미확인 사용자";
          }
          ?>
          <input type="hidden" name="author" value="<?=$author?>">
          <div style="margin: 10px;"><textarea name="review" rows="10" style="font-size:15pt" placeholder="리뷰를 입력하세요."></textarea></div>
          <div style="text-align: right;margin: 20px;"><input type="submit" name="리뷰 등록"></div>
        </form>
      </div>
  </div>

</body>

</html>
