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
    VALUES('{$_GET['store_id']}', 'author(로그인 따라 수정 필요)', NOW(), {$_POST['star']}, '{$_POST['review']}');"; // POST이렇게 받지 말고 별도의 배열 선언 하기
$result = mysqli_query($conn, $sql);

if($result === false){
  echo "리뷰를 남기는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  error_log(mysqli_error($conn));
}else{
  header('Location: store_list?id='."{$_GET['store_id']}");
}
?>
