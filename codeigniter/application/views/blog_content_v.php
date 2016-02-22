<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>博主发表新博客页面</title>
</head>
<body>
<a href="/codeigniter/index.php/blog_index/index" >返回首页</a>
<form action="/codeigniter/index.php/blog_content/addcontent" method="post" >
发布博客：<br>
	标题:<input type="text" name="title" /><br><hr>
	分类:<input type="text" name="category" /><br><hr>
	内容:<textarea rows="5" cols="50" name="content" ></textarea><hr>
	<br><input type="submit" name="submit" value="发布" /><br><br>	
</form>


</body>
</html>