<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>登录页面</title>
</head>
<body>
<center><h1>用户登录</h1></center>
<form action="/codeigniter/index.php/blog_content_c/checklogin" method="post">
	<center>
	用户名:
	<input name="uname" type="text" /><br><br>

	密码:
	<input name="upass" type="password" /><br><br>

	<input type="checkbox" value="auto" name="auto"/>下次自动登录<br><br>
	<input name="submit" type="submit" value="登录" /><br><br>

	<a href="/codeigniter/index.php/blog_content_c/register" >注册</a>

	</center>
</form>
</body>
</html>