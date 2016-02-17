<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>发布博客页面</title>
</head>
<body>

<form action="/codeigniter/index.php/blog_content_c/addcontent" method="post" >
	标题:<input type="text" name="title" /><br>
	<textarea rows="5" cols="50" name="content" ></textarea>
	<br><input type="submit" name="submit" value="发布" />
</form>

</body>
</html>