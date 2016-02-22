<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>后台管理-博客页面</title>
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
</table>

</div>

</body>
</html>