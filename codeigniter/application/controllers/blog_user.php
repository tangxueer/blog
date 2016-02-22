<?php
header("Content-Type: text/html;charset=utf-8");
class Blog_user extends CI_Controller
{
/*用户个人中心*/
	function user($id)
	{
		$this->load->model('user_m');
		
		$this->load->library('session');
		$data['uid']=$this->session->userdata('uid');
		$id=$data['uid'];
		
		$data['uname']=$this->user_m->user_select_id($id);	
		$username=$data['uname']['uname'];
		
		/*上传头像(貌似电脑配置问题，问题无法解决，未完成)*/
		/*
		$config['upload_path']='./upload_head/';//相对index.php主入口文件
		$config['allowed_types']='gif|jpg|png';
		$config['max_size']='1024*1024';
		$config['file_name']=$username.time();
		
		$this->load->library('upload',$config);
		if($this->upload->do_upload('userfile'))
		{
			$data['upload_data']=$this->upload->data();
			var_dump($data['upload_data']);
			$imgname=$data['upload_data']['file_name'];
		
		}else
		{
			$error=$this->upload->display_errors();
			echo $error;
		}
		*/
		
		/*修改昵称*/			
		
		$data['lastnickname']=$this->user_m->user_select_nickname($id);
		$arr=array('nickname'=>$_POST['nickname']);
		if($_POST['sub_n'])
		{
			if($_POST['nickname']!=$data['lastnickname']['nickname'])
			{
				if(strlen($_POST['nickname'])<20)
				{
					$this->user_m->user_update($id,$arr);
					echo'
					<script language="javascript">
					alert("昵称修改成功！");
					window.location.href="http://localhost/codeigniter/index.php/blog_user/user/'.$id.'";
					</script> ';
				}else
				{
					echo'
					<script language="javascript">
					alert("昵称太长，请重新输入");
					window.location.href="http://localhost/codeigniter/index.php/blog_user/user/'.$id.'";
					</script> ';
				}
			}else
			{
				echo'
					<script language="javascript">
					alert("修改的新昵称与原昵称相同！请重新输入");
					window.location.href="http://localhost/codeigniter/index.php/blog_user/user/'.$id.'";
					</script> ';
			}
			
		}	
		$data['nickname']=$this->user_m->user_select_nickname($id);
		
		/*更改密码*/
		$oldpass=$this->user_m->user_select_pass($id);
		$arr_p=array('upass'=>md5($_POST['newpass']));
		if($_POST['sub_p'])
		{
			if(md5($_POST['oldpass'])==$oldpass['upass'])
			{
				if($_POST['newpass']==$_POST['newpassagain'])
				{
					if($_POST['newpass']!=$_POST['oldpass'])
					{
						if($_POST['newpass']!='')
						{
							$this->user_m->user_update($id,$arr_p);
							$arow=$this->user_m->affected_rows();
							if($arow=='1')
							{
								echo'
								<script language="javascript">
								alert("密码修改成功！");
								window.location.href="http://localhost/codeigniter/index.php/blog_user/user/'.$id.'";
								</script> ';
							}
						}else
						{
							echo'
								<script language="javascript">
								alert("密码不能为空！");
								window.location.href="http://localhost/codeigniter/index.php/blog_user/user/'.$id.'";
								</script> ';
						}
					}else
					{
						echo'
						<script language="javascript">
						alert("请不要把新密码设置为与原密码相同,请再次输入");
						window.location.href="http://localhost/codeigniter/index.php/blog_user/user/'.$id.'";
						</script> ';
					}
				}else
				{
					echo'
					<script language="javascript">
					alert("新密码二次确认时有误，请再次输入");
					window.location.href="http://localhost/codeigniter/index.php/blog_user/user/'.$id.'";
					</script> ';	
				}
			}else
			{
				echo'
				<script language="javascript">
				alert("旧密码输入有误，请再次输入");
				window.location.href="http://localhost/codeigniter/index.php/blog_user/user/'.$id.'";
				</script> ';	
			}
		}	
		$this->load->view('blog_user_v',$data);
	}
}
?>