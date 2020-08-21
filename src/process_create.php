<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);
$filtered = array(
  'store_id'=>$_POST['store_id'],
  'author'=>"author",
  'review'=>mysqli_real_escape_string($conn, $_POST['review'])
);
$sql1 = "
    INSERT INTO reviews (store_id, author, created, star, review)
    VALUES('{$filtered['store_id']}', '{$filtered['author']}', NOW(), 3, '{$filtered['review']}')"; // star수정
$result1 = mysqli_query($conn, $sql1);

$sql2 = "UPDATE stores SET review_amount = review_amount + 1 WHERE id={$filtered['store_id']}"; // 리뷰 수 갱신
$result2 = mysqli_query($conn, $sql2);

//별점 점수 평균 내서 계산, 1점 단위로
$sql3 = "SELECT star FROM reviews WHERE store_id={$_POST['store_id']}";
$result3 = mysqli_query($conn, $sql3);
$star_sum = 0;
$review_amount = 0;
while($row=mysqli_fetch_array($result3)){
  $star_sum = $star_sum + $row['star'];
  $review_amount = $review_amount + 1;
}
$star_avg = $star_sum/$review_amount;
settype($star_avg, "integer"); // 여기 맞나 확인
$sql4 = "UPDATE stores SET star = $star_avg WHERE id={$_POST['store_id']}";
$result4 = mysqli_query($conn, $sql4);



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if($result1 === false){
      echo "리뷰를 남기는 과정에서 문제1가 생겼습니다. 관리자에게 문의해주세요";
      error_log(mysqli_error($conn));
    }elseif ($result2 === false) {
      echo "리뷰를 남기는 과정에서 문제2가 생겼습니다. 관리자에게 문의해주세요";
      error_log(mysqli_error($conn));
    }elseif ($result3 === false) {
      echo "리뷰를 남기는 과정에서 문제3가 생겼습니다. 관리자에게 문의해주세요";
      error_log(mysqli_error($conn));
    }elseif ($result4 === false) {
      echo "리뷰를 남기는 과정에서 문제4가 생겼습니다. 관리자에게 문의해주세요";
      error_log(mysqli_error($conn));
    } else{
      header("Location: ../index.php");
    }
     ?>
  </body>
</html>
