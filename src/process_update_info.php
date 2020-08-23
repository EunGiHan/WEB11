<meta charset="utf-8">
<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$article = array(
  'store_id' => mysqli_real_escape_string($conn, $_POST['store_id']),
  'address' => htmlspecialchars($_POST['address']),
  'hour' => htmlspecialchars($_POST['hour']),
  'tel' => htmlspecialchars($_POST['tel'])
);

$sql = "
    UPDATE stores SET address='{$article['address']}', hour='{$article['hour']}', tel='{$article['tel']}' WHERE id = {$article['store_id']}";
$result = mysqli_query($conn, $sql);

if($result === false){
  echo "정보를 수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  echo mysqli_error($conn);
}else{
  $url = 'store_page.php?store_id='.$filtered['store_id'];
  header("Location: ".$url);
}
?>
