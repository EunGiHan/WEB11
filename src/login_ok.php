<meta charset="utf-8">
<?php 
    $conn = mysqli_connect(
        'localhost',
        'inhapot',
        'inha8302#11',
        'inhapot'
      );
      session_start();
      
      /* 아이디랑 비밀번호가 없으면 알림창 띄우고 다시 index.php로 간다 */
      if($_POST['userid']=="" || $_POST['userpw']==""){
          echo "<script charset=\"utf-8\">alert('아이디나 패스워드를 입력하세요'); history.back();</script>";
      }else{
        $id = $_POST['userid'];
        $pw = $_POST['userpw'];

        $sql = "select * from member where userid='".$_POST['userid']."'";
        $result = mysqli_query($conn, $sql);

        while($member = mysqli_fetch_array($result)){
            /* 받아온 아이디에 해당하는 DB에서의 비밀번호를 hash_pw에 저장한다 */
            $hash_pw = $member['userpw'];
            }

        if(password_verify($pw, $hash_pw)){/* 만약 비밀번호가 같으면 */
            $_SESSION['userid'] = $member["userid"];
            $_SESSION['userpw'] = $member["userpw"];
            $_SESSION['name'] = $member["name"];
            $_SESSION['email'] = $member["email"];
            
            echo "<script >alert('로그인되었습니다.'); location.href='../index.php';</script>";
        }else {
            echo "<script >alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
        }
      }
?>