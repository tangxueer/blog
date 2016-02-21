<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>用户个人中心</title>
</head>
<body>
<a href="/codeigniter/index.php/blog_content_c/index" >返回首页</a>
<br>
用户名：<?php echo $uname['uname'];?>
<br>

<form action="<?php echo "/codeigniter/index.php/blog_content_c/user/".$uid;?>" method="post" enctype="multipart/form-data">

昵称：<?php echo $lastnickname['nickname'];?>
<br>
修改昵称：
<input type="text" name="nickname" value="<?php echo $nickname['nickname'];?>" />
<input type="submit" name="sub_n" value="修改昵称" />
<br>
<!--
头像：<br><img src="localhost:8080/codeigniter/upload_head/caj1455859648.jpg" />
<br>
上传头像：<input type="file" name="userfile"/>
<input type="submit" name="sub_i" value="上传头像" />
<br>upload_head/<?php echo $upload_data['file_name'];?>
<br>
-->
<br>

更改密码：
<br>
请输入旧密码：<input type="password" name="oldpass" /><br>
请输入新密码：<input type="password" name="newpass" /><br>
请再次输入新密码：<input type="password" name="newpassagain" /><br>
<input type="submit" name="sub_p" value="更改密码" /><br>


</form>
</body>
</html>