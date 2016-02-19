<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>博主后台管理页面</title>
</head>
<body>

<form action="/codeigniter/index.php/blog_content_c/addcontent" method="post" >
发布博客：<br>
	标题:<input type="text" name="title" /><br><hr>
	分类:<input type="text" name="category" /><br><hr>
	内容:<textarea rows="5" cols="50" name="content" ></textarea><hr>
	<br><input type="submit" name="submit" value="发布" /><br><br>	
</form>


</body>
</html>