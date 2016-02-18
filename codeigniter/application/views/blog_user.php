<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>用户个人中心</title>
</head>
<body>

用户名：<?php echo $uname['uname'];?>
<br>
个人头像：
<?php echo $i;?>
<img src="upload_head/<?php echo $uname['uname']."1.jpg";?>"/>
<img src="upload_head/caj.jpg"/>
<br>
<form action="<?php echo "/codeigniter/index.php/blog_content_c/user/".$uid;?>" method="post" enctype="multipart/form-data">

<input type="file" name="userfile"/>
<input type="submit" name="submit" value="上传头像" />
</form>
</body>
</html>