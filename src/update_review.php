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

$sql2 = "SELECT * FROM reviews WHERE author={$_SESSION['name']} AND id={$_POST['id']}";
$result2 = mysqli_query($conn, $sql);
$row2 = mysqli_fetch_array($result2);
$article = array(
  'review' => htmlspecialchars($row2['review']),
  'id' => $_GET['id']
);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/review.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <title>리뷰 수정</title>
</head>

<body>
    <div class="container">
        <div class="top">
            <input type="button" class="btn" onclick="location.href='javascript:history.back()';" value="back">
            <input type="button" class="btn1" onclick="location.href='../index.php';" value="home">
        </div>
        <div>
            <h1><?=$name?></h1>
        </div><br>
        <div style="text-align: center; border-top: 1px solid gainsboro;">별점을 선택하세요.</div><br>
        <form action="process_update_review.php" method="POST">
            <div class="rating">
                <fieldset>
                    <span class="star-cb-group">
                        <!-- 아직 별점 가져오기 성공 못함 -->
                        <?php 
                        $star_origin = $_REQUEST['star_count'];
                        echo "<h2>$star_origin</h2>";
                        for($i=5; $i>0; $i--){
                          // 기존 별점수와 현재 $i가 같다면
                          if($star_origin == $i){
                            echo "<input type='radio' id='rating-{$i}' name='rating' value='{$i}' checked>
                            <label for='rating-{$i}'>{$i}</label>";
                          } else{
                            echo "<input type='radio' id='rating-{$i}' name='rating' value='{$i}'>
                            <label for=\"rating-{$i}\">{$i}</label>";
                          }
                        }
                        ?>
                        <!--   <input type="radio" id="rating-5" name="rating" value="5" checked />
                        <label for="rating-5">5</label>
                        <input type="radio" id="rating-4" name="rating" value="4" />
                        <label for="rating-4">4</label>
                        <input type="radio" id="rating-3" name="rating" value="3" />
                        <label for="rating-3">3</label>
                        <input type="radio" id="rating-2" name="rating" value="2" />
                        <label for="rating-2">2</label>
                        <input type="radio" id="rating-1" name="rating" value="1" />
                        <label for="rating-1">1</label>
                        <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" />
                        <label for="rating-0">0</label> -->

                    </span>
                </fieldset>
            </div>
            <div>
                <input type="hidden" name="store_id" value="<?=$_GET['store_id']?>">
                <input type="hidden" name="author" value="<?=$_SESSION['name']?>">
                <input type="hidden" name="id" value="<?=$article['id']?>">
                <p><textarea name="review" rows="10" style="font-size:15pt"
                        value="<?=$_REQUEST['comment']?>"></textarea>
                </p>
                <!-- <p><input type="submit" name="리뷰 수정"></p> -->
                <div style="text-align: right; margin: 20px;"><input type="submit" name="리뷰 등록"></div>
        </form>
    </div>
    </div>

</body>

</html>