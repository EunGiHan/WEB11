<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$filtered = array(
  'category'=>htmlspecialchars($_POST['category']),
  'name'=>mysqli_real_escape_string($conn, $_POST['name']),
  'main_menu'=>mysqli_real_escape_string($conn, $_POST['main_menu']),
  'main_menu_price'=>mysqli_real_escape_string($conn, $_POST['main_menu_price']),
  'address'=>mysqli_real_escape_string($conn, $_POST['address']),
  'hour'=>mysqli_real_escape_string($conn, $_POST['hour']),
  'tel'=>mysqli_real_escape_string($conn, $_POST['tel'])
);

// 입력받은 식당 정보를 DB에 저장
$sql = "
    INSERT INTO stores (category, name, main_menu, main_menu_price, address, hour, tel)
    VALUES('{$filtered['category']}', '{$filtered['name']}', '{$filtered['main_menu']}',
     '{$filtered['main_menu_price']}', '{$filtered['address']}', '{$filtered['hour']}', '{$filtered['tel']}')";
$result = mysqli_query($conn, $sql);

if($result === false){
  echo "식당을 추가하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
  error_log(mysqli_error($conn));
}else{
  $url = 'store_list.php?id='.$_POST['category'];
  header("Location: ".$url);
}
?>
