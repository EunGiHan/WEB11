<meta charset="utf-8">
<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$article = array(
  'id' => $_POST['id'],
  'star' => $_POST['star'],
  'review' => htmlspecialchars($_POST['review']),
  'store_id' => $_POST['store_id'],
  'star'=> $_POST['rating']
);

$sql = "
    UPDATE reviews SET created = NOW(), star = '{$article['star']}', review = '{$article['review']}' WHERE id = {$article['id']}";
$result = mysqli_query($conn, $sql);

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
$sql4 = "UPDATE stores SET star = $star_avg WHERE id={$_POST['store_id']}";
mysqli_query($conn, $sql4);

if($result === false){
  echo "리뷰를 수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  error_log(mysqli_error($conn));
}else{
  $url = 'store_page.php?store_id='.$filtered['store_id'];
  header("Location: ".$url);
}
?>
