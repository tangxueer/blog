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
<title>后台管理-评论页面</title>

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
                  <?php echo "您好，:".$name['uname'];?>
                <button type="button" class="btn btn-success"><a href="/codeigniter/index.php/blog_loginout/loginout" class="co-white">退出</a></button>
                  </ul>
              </div>
    <?php }?>
    
        </div>
      </nav>
     <!-- 导航栏 -->




     <!--后台管理功能-->
      <div class="row">
        <div class="col-md-12">
          <p>
            <div class="btn-group">
              <button type="button" class="btn btn-success"><a href="/codeigniter/index.php/blog_b/b_blog" class="b-tag">管理博客</a></button>
              <button type="button" class="btn btn-success active">管理评论</button>
              <button type="button" class="btn btn-success"><a href="/codeigniter/index.php/blog_b/b_user" class="b-tag">管理用户</a></button>
            </div>
          </p>
        </div>
      </div>

<div class="container-fluid">
    <table id="customers" class="table table-bordered table-hover">
        <tbody>
            	<tr class="active">
            		<th class="col-md-1">评论id</th>
            		<th class="col-md-2">用户名</th>
            		<th class="col-md-2">评论日期</th>
            		<th class="col-md-1">所评论博客id</th>
            		<th class="col-md-2">评论内容</th>
            		<th class="col-md-1">删除评论</th>
            		<th class="col-md-3">修改评论</th>
            	</tr>

            	<?php for($id=0;$id<$allid;$id++){?>
            	<tr class="alt">
            		<td class="col-md-1"><?php echo $comment[$id]['id'];?></td>	
            		<td class="col-md-2"><?php echo $comment[$id]['c_name'];?></td>
            		<td class="col-md-2"><?php echo $comment[$id]['c_date'];?></td>
            		<td class="col-md-1"><?php echo $comment[$id]['c_id'];?></td>
            		<td class="col-md-2"><?php echo substr($comment[$id]['c_content'],0,150);?></td>
            		<td class="col-md-1"><form action="<?php echo "/codeigniter/index.php/blog_b/delete_comment/".$comment[$id]['id'];?>" method="post">
            		<input class="btn btn-danger" data-placement="top" data-toggle="tooltip" title="确定删除这条评论?" name="sub_del" type="submit" value="删除" /></form></td>
            		<td class="col-md-3"><form action="<?php echo "/codeigniter/index.php/blog_b/change_comment/".$comment[$id]['id'];?>" method="post">
            		<textarea name="comment" rows="3" cols="50" class="form-control"></textarea>
                <br/>
                <input class="btn btn-info" name="sub_ch" type="submit" value="修改评论" /></form></td>
            	</tr>	
            	<?php }?>	
        </tbody>
   </table>
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