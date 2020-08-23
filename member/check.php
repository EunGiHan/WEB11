<meta charset="utf-8">
<?php
	$conn = mysqli_connect(
        'localhost',
        'inhapot',
        'inha8302#11',
        'inhapot'
    );

    $sql = "SELECT * FROM member WHERE userid='{$_GET['userid']}'";
    $result = mysqli_query($conn, $sql);
    $member = mysqli_num_rows($result);
	if($member==0)
	{
?>
<div><?php echo $_GET['userid']; ?>는 사용가능한 아이디입니다.</div>
<?php
	}else{
        ?>
<div><?php echo $_GET['userid']; ?>는 중복된아이디입니다.<div>
        <?php
			}
        ?>
        <button value="닫기" onclick="window.close()">닫기</button>