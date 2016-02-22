<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>后台管理-用户页面</title>
<style type="text/css">
ul
{
list-style-type:none;
margin:0;
padding:0;
overflow:hidden;
}
li
{
float:left;
}
a:link,a:visited
{
display:block;
width:120px;
font-weight:bold;
color:#FFFFFF;
background-color:#bebebe;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
}
a:hover,a:active
{
background-color:#cc0000;
}

</style>

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
  }
</style>
</head>
<body>
<a href="/codeigniter/index.php/blog_index/index" >返回首页</a><br>
<ul>
<li><a href="/codeigniter/index.php/blog_b/b_blog">管理博客</a></li>
<li><a href="/codeigniter/index.php/blog_b/b_comment">管理评论</a></li>
<li><a href="/codeigniter/index.php/blog_b/b_user">管理用户</a></li>
</ul>

<div>

<table id="customers">
	<tr>
		<th>用户id</th>
		<th>用户名</th>
		<th>用户密码</th>
		<th>用户注册时间</th>
		<th>用户昵称</th>
		<th>删除用户</th>
	</tr>

	<?php for($id=0;$id<$allid;$id++){?>
	<tr class="alt">
		<td><?php echo $user[$id]['uid'];?></td>	
		<td><?php echo $user[$id]['uname'];?></td>
		<td><?php echo $user[$id]['upass'];?></td>		
		<td><?php echo $user[$id]['udate'];?></td>
		<td><?php echo $user[$id]['nickname'];?></td>
		<td><form action="<?php echo "/codeigniter/index.php/blog_b/delete_user/".$user[$id]['uid'];?>" method="post">
		<input type="submit" name="sub_del" value="删除" /></form></td>
	</tr>	
	<?php }?>	
</table>

</div>

</body>
</html>