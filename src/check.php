<!--<meta charset="utf-8">
<?/*php
	$conn = mysqli_connect(
        'localhost',
        'inhapot',
        'inha8302#11',
        'inhapot'
    );

    $sql = "select * from member where id={$_GET['userid']}";
	if(!$member = mysqli_query($conn, $sql))
	{
?>
<div><?php echo $_GET['userid']; ?>는 사용가능한 아이디입니다.</div>
<?php
	}else{
        ?>
<div><?php echo $_GET['userid']; ?>는 중복된아이디입니다.<div>
        <?php
			}*/
        ?>
        <button value="닫기" onclick="window.close()">닫기</button>
        <script>
        </script>-->



<meta charset="utf-8">
<?php
	$conn = mysqli_connect(
        'localhost',
        'inhapot',
        'inha8302#11',
        'inhapot'
    );

    $sql = "SELECT * FROM member WHERE userid={$_GET['userid']}";
		$result = mysqli_query($conn, $sql);
		//echo "{$result}";
		//$row = mysqli_fetch_array($result);$row[0]==""
		$num = mysql_num_rows($result);
		if ($num > 0) {
			echo "<div>{$_GET['userid']}는 중복된 아이디입니다.</div>";
		} else {
			echo "<div>{$_GET['userid']}는 사용 가능한 아이디입니다.</div>";
		}
	if($result==FALSE)	{
		//echo "<div>{$_GET['userid']}는 사용 가능한 아이디입니다.</div>";
	} else{
		//echo "<div>{$_GET['userid']}는 중복된 아이디입니다.</div>";

	}
?>
<button value="닫기" onclick="window.close()">닫기</button>
<script>
</script>
