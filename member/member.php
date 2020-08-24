<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <script>
    function checkid() {
        document.getElementById("chk_id2").value = 0;
        var userid = document.getElementById("chk_id1").value;
        if (userid) {
            url = "check.php?userid=" + userid;
            window.open(url, "chkid", "width=300,height=100");
        } else {
            alert("아이디를 입력하세요");
        }
    }
    </script>
    <link rel="stylesheet" href="../css/member.css">
</head>

<body>
    <form action="./member_ok.php" method="POST">
        <a href="../index.php">
            <h1 style="font-size:50px;">INHA-POT</h1>
        </a>
        <h2>회원가입</h2>
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" placeholder="이름"></td>
            </tr>
            <tr>
                <td>ID</td>
                <td><input type="text" name="userid" placeholder="아이디" id="chk_id1"></td>
                <td><input type="hidden" value="1" name="chs" id="chk_id2"></td>
                <td><input type="button" value="중복검사" onclick="checkid();"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="userpw" placeholder="비밀번호"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" name="email" placeholder="이메일">@
                    <select name="emailaddress">
                        <option value="naver.com">naver.com</option>
                        <option value="gmail.com">gmail.com</option>
                        <option value="daum.net">daum.net</option>
                        <option value="hanmail.com">hanmail.com</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" id="btn">회원가입</button>
    </form>
    <iframe src="" id="ifrm1" scrolling=no frameborder=no width=0 height=0 name="ifrm1"></iframe>
</body>

</html>