<html lang="zh-CN">
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!-- Bootstarp-css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("Public/css/bootstrap.min.css");?>">
	<!-- Flat UI-css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("Public/css/flat-ui.min.css");?>">
	<!-- Mycss -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("Public/css/style.css");?>">
<title>博客主页</title>
</head>
<body>
	<base href="<?php echo base_url();?>">
     <!-- 导航栏 -->
      <nav class="navbar navbar-default" role="navigation">
        <!--首页-->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"></button>
          <a class="navbar-brand" href="/codeigniter/index.php/blog_index/index">博客首页</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <!--个人-->
            <li><a href="/codeigniter/index.php/blog_user/user/<?php echo $session; ?>">个人</a></li>
          </ul>

	    <?php if($uname['uname']=="admin"){?>
          <!--后台管理按钮-->
          <ul class="nav navbar-nav navbar-right">              
            <li><a href="#"><span class="visible-sm visible-xs">后台管理<span class="fui-gear"></span></span><span class="visible-md visible-lg"><span class="fui-gear"></span></span></a></li>
          </ul>
	    <?php }?>

		<?php if(!$session){?>          
		          <div class="nav-login">
			          <ul class="nav navbar-nav navbar-right">              
			            <button type="button" class="btn btn-success"><a href="/codeigniter/index.php/blog_login/login" class="co-white">登陆</a></button>
			            <button type="button" class="btn btn-success"><a href="/codeigniter/index.php/blog_register/register" class="co-white">注册</a></button>
			          </ul>
		          </div>

		<?php }else{?>          
		          <div class="nav-login">
			          <ul class="nav navbar-nav navbar-right">              
				          <?php echo "您好，:".$uname['uname'];?>
			          <button type="button" class="btn btn-success"><a href="/codeigniter/index.php/blog_loginout/loginout" class="co-white">退出</a></button>
		              </ul>
		          </div>
		<?php }?>
		
        </div>
      </nav>
     <!-- 导航栏 -->


<br/><br/>

<?php if($uname['uname']=="admin"){?>
<div class="containter">
	<div>博主您好！</div><br/><br/>
	<button class="btn btn-success col-md-1"><a href="/codeigniter/index.php/blog_content/content_index" class="b-tag">发布博客</a></button>
	<button class="btn btn-success col-md-1"><a href="/codeigniter/index.php/blog_b/b_blog" class="b-tag">后台管理</a></button>
</div><br/>
<?php }?>



<br/>
<div class="tag">
	分类目录：<br/>
	<?php foreach($allcaname as $caname){;?>	
	
<a href="<?php echo "/codeigniter/index.php/blog_category/category/".$caname['caname'];?>" ><?php echo $caname['caname']."<br/>";?></a>
	<?php } ?>
</div>
	<?php foreach($list as $item){?>
<h2>
<hr>

	<a href=" <?php echo "/codeigniter/index.php/blog_view/view/".$item['cid']; ?>">
	<?php echo $item['title'];?></a>

</h2>

<p>
	<?php echo $item['date']."<br/>";?>
点击:<?php echo $item['hit']."<br/>";?>
评论:<?php echo $item['comment_num']."<br/>";?>
类别:<?php echo $item['ca_name']."<br/>";?>

</p>

<div>	
<hr>
	<?php echo substr($item['content'],0,150)."<br/>";
	//一个中文字是一个英文字的三倍，所以第三个参数该是3的倍数，否则乱码
	?>
<?php }?>

</div>

<br/><br/>
	<?php echo $this->pagination->create_links();//翻页	?>
		<!--jquery2.1.4-->
		<script type="text/javascript" src="<?php echo base_url("Public/js/jquery.min.js");?>"></script>
		<!--bootstrap-->
		<script type="text/javascript" src="<?php echo base_url("Public/js/bootstrap.min.js");?>"></script>
		<!--flat-ui-->
		<script type="text/javascript" src="<?php echo base_url("Public/js/flat-ui.min.js");?>"></script>
		<!-- MyJS -->
		<script type="text/javascript" src="<?php echo base_url("Public/js/main.js");?>"></script>
</body>
</html>