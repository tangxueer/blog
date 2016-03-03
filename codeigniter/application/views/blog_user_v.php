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
<title>用户个人中心</title>
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
	 
<?php if(!$session){?>请先<a href="/codeigniter/index.php/blog_login/login" >登录</a>,登录后才能有效地更改用户信息。
<?php }else{?>
<br>
<br>
<p>用户名：<?php echo $uname['uname'];?></p>
<form action="<?php echo "/codeigniter/index.php/blog_user/user/".$uid;?>" method="post" enctype="multipart/form-data">

<div class="containter">
昵称：<?php echo $lastnickname['nickname'];?>
<br>
<span><label for="nickname">修改昵称：
<input type="text" name="nickname" class="form-control" id="nickname" value="<?php echo $nickname['nickname'];?>" /></label></span>
<br/>
<input class="btn btn-success" name="sub_n" type="submit" value="修改昵称" />
<br/><br/>
<!--
头像：<br><img src="localhost:8080/codeigniter/upload_head/caj1455859648.jpg" />
<br>
上传头像：<input type="file" name="userfile"/>
<input type="submit" name="sub_i" value="上传头像" />
<br>upload_head/<?php //echo $upload_data['file_name'];?>
<br>
-->
<br>

<p>更改密码：</p>
<br>
<span><label for="oldpass">请输入旧密码：<input type="password" class="form-control" name="oldpass" id="oldpass" /></label></span><br>
<span><label for="newpass">请输入新密码：<input type="password" class="form-control" name="newpass" id="newpass" /></label></span><br>
<span><label for="newpassagain">请再次输入新密码：<input type="password" class="form-control" name="newpassagain" id="newpassagain" /></label></span><br>
<input class="btn btn-success" name="sub_p" type="submit" value="更改密码" />
</div>
<?php }?>
</form>
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