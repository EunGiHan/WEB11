<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$article = array(
  'id' = $_POST['id'],
  'star' => $_POST['star'],
  'review' => htmlspecialchars($_POST['review']),
  'store_id' => $_POST['store_id']
);

$sql = "
    UPDATE reviews SET created = NOW(), star = '{$article['star']}', review = '{$article['review']}' WHERE id = {$article['id']}";
$result = mysqli_query($conn, $sql);

if($result === false){
  echo "리뷰를 수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  error_log(mysqli_error($conn));
}else{
  header('Location: store_page?store_id='."{$article['store_id']}");
}
?>
