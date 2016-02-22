<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>博客主页</title>
<style type="text/css">
.tag
{
	text-align:right;
	color:green;
}

.login
{
	text-align:right;
}
</style>
</head>
<body>
<br><br>

<?php if($uname['uname']=="admin"){?>
博主您好！<br><br>
<a href="/codeigniter/index.php/blog_content/content_index" >博主发布博客页面</a><br>
<a href="/codeigniter/index.php/blog_b/b_blog" >博主后台管理系统页面</a><br>
<?php }?>

<div class="login" >

<?php if(!$session){?><a href="/codeigniter/index.php/blog_login/login" >登录</a><a href="/codeigniter/index.php/blog_register/register" >注册</a>
<?php }else{echo "用户:".$uname['uname'];?><a href="/codeigniter/index.php/blog_user/user/<?php echo $session; ?>">个人中心</a><a href="/codeigniter/index.php/blog_loginout/loginout" >退出</a>
<?php }?>

</div>


<div class="tag">
	分类目录：<br>
	<?php foreach($allcaname as $caname){;?>	
	
<a href="<?php echo "/codeigniter/index.php/blog_category/category/".$caname['caname'];?>" ><?php echo $caname['caname']."<br>";?></a>
	<?php } ?>
</div>
	<?php foreach($list as $item){?>
<h2>
<hr>

	<a href=" <?php echo "/codeigniter/index.php/blog_view/view/".$item['cid']; ?>">
	<?php echo $item['title'];?></a>

</h2>

<p>
	<?php echo $item['date']."<br>";?>
点击:<?php echo $item['hit']."<br>";?>
评论:<?php echo $item['comment_num']."<br>";?>
类别:<?php echo $item['ca_name']."<br>";?>

</p>

<div>	
<hr>
	<?php echo substr($item['content'],0,150)."<br>";
	//一个中文字是一个英文字的三倍，所以第三个参数该是3的倍数，否则乱码
	?>
<?php }?>

</div>

<br><br>
	<?php echo $this->pagination->create_links();//翻页	?>

</body>
</html>