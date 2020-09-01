<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$filtered = array(
  'store_id'=>htmlspecialchars($_POST['store_id']),
  'author'=>$_POST['author'],
  'review'=>mysqli_real_escape_string($conn, $_POST['review']),
  'star'=> $_POST['rating']
);

//입력받은 리뷰를 DB에 저장
$sql1 = "
    INSERT INTO reviews (store_id, author, created, star, review)
    VALUES('{$filtered['store_id']}', '{$filtered['author']}', NOW(),
          '{$filtered['star']}', '{$filtered['review']}')";
$result1 = mysqli_query($conn, $sql1);

//식당 목록 DB(stores)의 리뷰 수 갱신 : 해당 식당의 id로 등록된 리뷰의 개수를 계산해 넣음
$sql_num_reviews = "SELECT * FROM reviews WHERE store_id={$filtered['store_id']}";
$result_num_reviews = mysqli_query($conn, $sql_num_reviews);
$row_num_reviews = mysqli_num_rows($result_num_reviews);
$sql2 = "UPDATE stores SET review_amount = '{$row_num_reviews}' WHERE id={$filtered['store_id']}";
mysqli_query($conn, $sql2);

//식당 목록 DB(stores)의 별점 갱신 : 해당 식당의 id로 등록된 별점를 평균 계산해 넣음
$star_sum = 0;
while($row=mysqli_fetch_array($result_num_reviews)){
  $star_sum = $star_sum + $row['star'];
}
$star_avg = $star_sum/$row_num_reviews;
settype($star_avg, "integer");
$sql4 = "UPDATE stores SET star = '{$star_avg}' WHERE id={$_POST['store_id']}";
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
      $url = 'store_page.php?store_id='.$filtered['store_id'];
      header("Location: ".$url);
    }
    ?>
  </body>
  
</html>
