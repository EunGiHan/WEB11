<meta charset="utf-8">
<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$article = array(
  'id' => mysqli_real_escape_string($conn, $_POST['store_id']),
  'main_menu' => htmlspecialchars($_POST['main_menu']),
  'main_menu_price' => htmlspecialchars($_POST['main_menu_price'])
);

$sql = "
  UPDATE stores
  SET main_menu='{$article['main_menu']}', main_menu_price='{$article['main_menu_price']}'
  WHERE id = {$article['id']}";
$result = mysqli_query($conn, $sql);

while($i<4){
  $sql2 = "UPDATE menus SET menu='{$_POST['menu[$i]']}', price='{$_POST['price[$i]']}' WHERE id = {$_POST['menu_id[$i]']}";
  $result2 = mysqli_query($conn, $sql2);
}

if($result === false){
  echo "메인메뉴를 수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  error_log(mysqli_error($conn));
} else if($result2 === false){
  echo "메뉴를 수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  error_log(mysqli_error($conn));
} else{
  //$location = 'Location: store_page?store_id='."{$article['store_id']}";
  header('Location: ../index.php');
}
?>
