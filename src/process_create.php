<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$sql = "
    INSERT INTO reviews
    (store_id, author, created, star, review)
    VALUES('{$_POST['store_id']}', 'author(로그인 따라 수정 필요)', NOW(), {$_POST['star']}, '{$_POST['review']}');"; // POST이렇게 받지 말고 별도의 배열 선언 하기
$result = mysqli_query($conn, $sql);
$sql2 = "UPDATE stores SET review = review + 1 WHERE id=$_POST['store_id'] "; // 리뷰 수 갱신
mysqli_query($conn, $sql2);

//별점 점수 평균 내서 계산, 1점 단위로
$sql3 = "SELECT star FROM reviews WHERE store_id=$_POST['store_id']";
$result3 = mysqli_query($conn, $sql3);
$star_sum = 0;
$review_amount = 0;
while($row=mysqli_fetch_array($result3)){
  $star_sum = $star_sum + $row['star'];
  $review_amount = $review_amount + 1;
}
$star_avg = settype($star_sum/$review_amount, "integer"); // 여기 맞나 확인
$sql4 = "UPDATE stores SET star = $star_avg WHERE id=$_POST['store_id'] ";
mysqli_query($conn, $sql4);


if($result === false){
  echo "리뷰를 남기는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  error_log(mysqli_error($conn));
}else{
  header('Location: store_list?id='."{$_POST['store_id']}");
}
?>
