<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>博客具体内容页面</title>
</head>
<body>
<a href="/codeigniter/index.php/blog_content_c/index" >返回首页</a>

<h2>
<hr>
	<?php echo $single['title'];?>

</h2>

<p>
	<?php echo $single['date'];?>
	<?php echo $single['hit'];?>
	
<form action="<?php echo "/codeigniter/index.php/blog_content_c/view/".$single['cid'];?>" method="post">
	<input type="submit" name="sub_del" value="删除"/>
</form>

</p>

<div>
<hr>
	<?php echo $single['content'];?>
<hr>
</div>

<!--显示评论 -->




<!--用户发表新评论-->
<div>
发表评论：<br>

<?php if(!$session){?>请先<a href="/codeigniter/index.php/blog_content_c/login" >登录</a>后再发表评论
<?php }else{?><textarea rows="5" cols="100" name="comments" ></textarea>
<?php }?>

</div>


</body>
</html>