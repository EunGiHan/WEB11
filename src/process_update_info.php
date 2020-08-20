<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$article = array(
  'store_id' => $_POST['store_id'],
  'address' => htmlspecialchars($_POST['address']),
  'hour' => htmlspecialchars($_POST['hour']),
  'tel' => htmlspecialchars($_POST['tel']),
)

$sql = "
    UPDATE stores SET address={$article['address']}, hour={$article['hour']}, tel={$article['tel']} WHERE id = {$article['store_id']}";
$result = mysqli_query($conn, $sql);

if($result === false){
  echo "정보를 수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  error_log(mysqli_error($conn));
}else{
  header('Location: store_page?store_id='."{$article['store_id']}");
}
?>
