<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>博客具体内容页面</title>
</head>
<body>
<a href="/codeigniter/index.php/blog_index/index" >返回首页</a>

<h2>
<hr>
	<?php echo $single['title'];?>

</h2>

<p>
	<?php echo $single['date'];?>
阅读:	<?php echo $single['hit'];?>
评论:	<?php echo $comment_row;?>

</p>

<div>
<hr>
正文：<br>
	<?php echo $single['content'];?>
<hr>
</div>

<!--显示评论 -->
<div>
评论区：<br><hr>
<?php foreach($allcomment as $comment){?>

<?php echo $comment['c_name'];?>:
<?php echo $comment['c_date'];?>
<br><br>
<?php echo $comment['c_content']."<br><hr>";?>
<?php }?>
<br><br>
</div>

<!--用户发表新评论-->
<div>


<form action="<?php echo "/codeigniter/index.php/blog_view/view/".$single['cid'];?>" method="post" >
<?php if(!$session){?>请先<a href="/codeigniter/index.php/blog_login/login" >登录</a>后再发表评论
<?php }?>
<textarea rows="5" cols="100" name="comment" ></textarea> 
<br><input type="submit" name="submit" value="发表评论" />
</form>

</div>


</body>
</html>