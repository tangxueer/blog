<?php
header("Content-type: text/html; charset=utf-8");
class Upload extends CI_Controller
{
	function index()
	{
		$this->load->view('up');
		
	}
	
	function up()
	{
		$config['upload_path']='./upload';
		$config['allowed_types']='gif|jpg|png';
		$config['max_size']='1024*1024';	
		$this->load->library('upload',$config);
		if($this->upload->do_upload('upfile'))
		{
			$data=array('upload_data'=>$this->upload->data());
			var_dump($data);
		}else
		{
			$error=array('error'=>$this->upload->display_errors());
			var_dump($error);
		}
	}
}
?>