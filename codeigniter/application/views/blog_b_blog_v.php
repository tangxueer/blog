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
<title>后台管理-博客页面</title>
<!-- 
<style type="text/css">
#customers
  {
  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
  width:100%;
  border-collapse:collapse;
  }

#customers td, #customers th 
  {
  font-size:1em;
  border:1px solid #98bf21;
  padding:3px 7px 2px 7px;
  }

#customers th 
  {
  font-size:1.1em;
  text-align:left;
  padding-top:5px;
  padding-bottom:4px;
  background-color:#A7C942;
  color:#ffffff;
  }

  #customers tr.alt td 
  {
  color:#000000;
  background-color:#EAF2D3;
  } -->
</style>
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
              <button type="button" class="btn btn-success active">管理博客</button>
              <button type="button" class="btn btn-success"><a href="/codeigniter/index.php/blog_b/b_comment" class="b-tag">管理评论</a></button>
              <button type="button" class="btn btn-success"><a href="/codeigniter/index.php/blog_b/b_user" class="b-tag">管理用户</a></button>
            </div>
          </p>
        </div>
     </div>



<!-- <table id="customers">
	<tr>
		<th>博客id</th>
		<th>博客标题</th>
		<th>博客类别</th>
		<th>发博日期</th>
		<th>点击数</th>
		<th>评论数</th>
		<th>博客内容</th>
		<th>删除博客</th>
		<th>更改博客分类</th>
	</tr>

	<?php for($id=0;$id<$allid;$id++){?>
	<tr class="alt">
		<td><?php echo $blog[$id]['cid'];?></td>
		<td><?php echo $blog[$id]['title'];?></td>		
		<td><?php echo $blog[$id]['ca_name'];?></td>
		<td><?php echo $blog[$id]['date'];?></td>
		<td><?php echo $blog[$id]['hit'];?></td>
		<td><?php echo $blog[$id]['comment_num'];?></td>
		<td><?php echo substr($blog[$id]['content'],0,150);?></td>
		<td><form action="<?php echo "/codeigniter/index.php/blog_b/delete_blog/".$blog[$id]['cid'];?>" method="post">
		<input type="submit" name="sub_del" value="删除" /></form></td>
		<td><form action="<?php echo "/codeigniter/index.php/blog_b/ca_change/".$blog[$id]['cid'];?>" method="post">
		<input type="text" name="category" /><input type="submit" name="sub_ch" value="更改" /></form></td>
	</tr>	
	<?php }?>	
</table> -->



<div class="container-fluid">
	<table id="customers" class="table table-bordered table-hover">
	<tbody>
		<tr class="active">
			<th class="col-md-1">博客id</th>
			<th class="col-md-2">博客标题</th>
			<th class="col-md-1">博客类别</th>
			<th class="col-md-1">发博日期</th>
			<th class="col-md-1">点击数</th>
			<th class="col-md-1">评论数</th>
			<th class="col-md-2">博客内容</th>
			<th class="col-md-1">删除博客</th>
			<th class="col-md-2">更改博客分类</th>
		</tr>

		<?php for($id=0;$id<$allid;$id++){?>
		<tr class="alt">
			<td class="col-md-1"><?php echo $blog[$id]['cid'];?></td>
			<td class="col-md-2"><?php echo $blog[$id]['title'];?></td>		
			<td class="col-md-1"><?php echo $blog[$id]['ca_name'];?></td>
			<td class="col-md-1"><?php echo $blog[$id]['date'];?></td>
			<td class="col-md-1"><?php echo $blog[$id]['hit'];?></td>
			<td class="col-md-1"><?php echo $blog[$id]['comment_num'];?></td>
			<td class="col-md-2"><?php echo substr($blog[$id]['content'],0,150);?></td>
			<td class="col-md-1"><form action="<?php echo "/codeigniter/index.php/blog_b/delete_blog/".$blog[$id]['cid'];?>" method="post">
			<input class="btn btn-danger" data-placement="top" data-toggle="tooltip" title="确定删除这条博客?" name="sub_del" type="submit" value="删除" /></form></td>
			<td><form action="<?php echo "/codeigniter/index.php/blog_b/ca_change/".$blog[$id]['cid'];?>" method="post">
			<input type="text" name="category" class="form-control" /><br/><input class="btn btn-info" name="sub_ch" type="submit" value="更改类别" /></form></td>


           <!--           这里是更改类别的框(弃)
<td class="col-md-2"><form action="<?php echo "/codeigniter/index.php/blog_b/ca_change/".$blog[$id]['cid'];?>" method="post">
<div class="tagsinput-primary">
<input name="category" class="tagsinput" value="热血,技术,MOE" />     value里是类别的字符串，用逗号隔开(可以用回传)
  <br/>
  <button type="submit" name="sub_ch" class="btn btn-danger">更改类别</button>
</div></form></td>
             -->

		</tr>	
		<?php }?>	
		</tbody>
	</table>
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