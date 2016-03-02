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

<title>注册页面</title>
</head>

<body class="green-back">

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


<div class="containter">	
<center><h1 class="register-title" id="register-main">用户注册</h1></center>
	</div>
</div>

<form action="/codeigniter/index.php/blog_register/register" method="post">
        <div class="container">
          <center>
          <div class="login-form">

            <div class="form-group">
              <input type="text" class="form-control login-field" value="" placeholder="账号" id="login-name" name="uname"/>
              <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="form-group">
              <input type="password" class="form-control login-field" value="" placeholder="密码" id="login-pass" name="upass"/>
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>
			<input class="btn btn-primary btn-lg btn-block" name="submit" type="submit" value="完成注册" />
            <a class="login-link" href="/codeigniter/index.php/blog_login/login">已有账号 ? 登陆</a>
          </div>
          </center>
        </div>
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