<?php
	$conn = mysqli_connect(
        'localhost',
        'inhapot',
        'inha8302#11',
        'inhapot'
    );
    
	$uid = $_GET["userid"];
	$sql = "select * from member where id='".$uid."'";
	$member = $sql->fetch_array();
	if($member==0)
	{
?>
<div><?php echo $uid; ?>는 사용가능한 아이디입니다.</div>
<?php 
	}else{
        ?>
<div><?php echo $uid; ?>중복된아이디입니다.<div>
        <?php
            }
        ?>
        <button value="닫기" onclick="window.close()">닫기</button>
        <script>
        </script>