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
<title>博客具体内容页面</title>
</head>

<body>
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

<div class="container-fluid">
<h2>
<hr>
	<?php echo $single['title'];?>

</h2>

<p class="view-data">
	<?php echo $single['date'];?>
阅读:	<?php echo $single['hit'];?>&nbsp;&nbsp;
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

<div class="form-group">
<textarea rows="5" cols="2" name="comment" class="form-control"></textarea> 
</div>
<br/>
<button type="submit" name="submit" class="btn btn-primary view-submit">发表评论</button>
</form>

</div>
</div>
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