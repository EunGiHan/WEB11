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

//해당 리뷰를 DB에서 삭제함
$sql = "DELETE FROM reviews WHERE id = {$article['id']}";
$result = mysqli_query($conn, $sql);

//식당 목록 DB(stores)의 리뷰 수 갱신 : 해당 식당의 id로 등록된 리뷰의 개수를 계산해 넣음
$sql_num_reviews = "SELECT * FROM reviews WHERE store_id={$article['store_id']}";
$result_num_reviews = mysqli_query($conn, $sql_num_reviews);
$row_num_reviews = mysqli_num_rows($result_num_reviews);
$sql2 = "UPDATE stores SET review_amount = '{$row_num_reviews}' WHERE id={$article['store_id']}";
$result2 = mysqli_query($conn, $sql2);

//식당 목록 DB(stores)의 별점 갱신 : 해당 식당의 id로 등록된 별점를 평균 계산해 넣음
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
  $url = 'store_page.php?store_id='.$article['store_id'];
  header("Location: ".$url);
}
?>
