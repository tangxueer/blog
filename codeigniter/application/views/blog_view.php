<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>博客具体内容页面</title>
</head>
<body>

<h2>
<hr>
	<?php echo $single[0]['title'];?>

</h2>

<p>
	<?php echo $single[0]['date'];?>
	
<form action="<?php echo "/codeigniter/index.php/blog_content_c/view/".$single[0]['cid'];?>" method="post">
	<input type="submit" name="submit" value="删除"/>
</form>

</p>

<div>
<hr>
	<?php echo $single[0]['content'];?>
</div>

</body>
</html>