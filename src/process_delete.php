<meta charset="utf-8">
<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$article = array(
  'id' => htmlspecialchars($_POST['id']),
  'store_id' => htmlspecialchars($_POST['store_id'])
);

$sql = "DELETE FROM reviews WHERE id = {$article['id']}";
$result = mysqli_query($conn, $sql);

$sql_num_reviews = "SELECT * FROM reviews WHERE store_id={$article['store_id']}";
$result_num_reviews = mysqli_query($conn, $sql_num_reviews);
$row_num_reviews = mysqli_num_rows($result_num_reviews);

$sql2 = "UPDATE stores SET review_amount = '{$row_num_reviews}' WHERE id={$article['store_id']}"; // 리뷰 수 갱신
$result2 = mysqli_query($conn, $sql2);

//별점 점수 평균 내서 계산, 1점 단위로
$sql3 = "SELECT star FROM reviews WHERE store_id={$article['store_id']}";
$result3 = mysqli_query($conn, $sql3);

$star_sum = 0;
$review_amount = 0;
while($row=mysqli_fetch_array($result3)){
  $star_sum = $star_sum + $row['star'];
  $review_amount = $review_amount + 1;
}
$star_avg = $star_sum/$review_amount;
settype($star_avg, "int");
$sql4 = "UPDATE stores SET star = $star_avg WHERE id={$article['store_id']}";
mysqli_query($conn, $sql4);

if($result === false){
  echo "리뷰를 수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  error_log(mysqli_error($conn));
}else if($result2 === false){
  echo "업데이트 오류";
}else{
  header("Location: ../index.php");
}
?>
