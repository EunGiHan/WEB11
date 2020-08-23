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

$arr_menu = isset($_POST['menu']) ? $_POST['menu'] : '';
$arr_price = isset($_POST['price']) ? $_POST['price'] : '';
$arr_id = isset($_POST['menu_id']) ? $_POST['menu_id'] : '';
$i = 0;
while($i<4){
  $sql2 = "UPDATE menus SET menu='{$arr_menu[$i]}', price='{$arr_price[$i]}' WHERE id = {$arr_id[$i]}";
  $result2 = mysqli_query($conn, $sql2);
  $i = $i + 1;
}

if($result === false){
  echo "메인메뉴를 수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  error_log(mysqli_error($conn));
} else if($result2 === false){
  echo "메뉴를 수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  error_log(mysqli_error($conn));
} else{
  // $url = 'store_page.php?store_id='.$filtered['store_id'];
  // header("Location: ".$url);
  header("Location: ../index.php");
}
?>
