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
<a href="/codeigniter/index.php/blog_content_c/content_index" >发表一条新博客</a>

<div class="login" >
<a href="/codeigniter/index.php/blog_content_c/login" >登录</a>
<a href="/codeigniter/index.php/blog_content_c/register" >注册</a>


<a href="/codeigniter/index.php/blog_content_c/loginout" >退出</a>
</div>


<div class="tag">
	分类目录：<br>
	

</div>


	<?php foreach($list as $item){?>	

<h2>
<hr>
	<a href=" <?php echo "/codeigniter/index.php/blog_content_c/view/".$item['cid']; ?>">
	<?php echo $item['title'];?></a>

</h2>

<p>
	<?php echo $item['date']."<br>";?>
	<?php echo $item['hit']."<br>";?>

</p>


<div>	
<hr>
	<?php echo substr($item['content'],0,150)."<br>";
	//一个中文字是一个英文字的三倍，所以第三个参数该是3的倍数，否则乱码
	}?>
</div>

<br><br>
	<?php echo $this->pagination->create_links();//翻页	?>

</body>
</html>