<?php
	class TasAction extends Action{

		//构造器
		public function __construct(){
			parent::__construct();
		}

		//调用
		public function __call($url,$value)
		{
			var_dump($_REQUEST);
		}

		//路由
		public function index(){
			require_once DIR_VIEW.'password.php';
			require_once DIR_VIEW.'header.php';

			echo '
<br>目前的接口">点击链接</a>
<br>
<br>1.查看队列长度 action=null
<a href = "http://littlesmallsu.applinzi.com/public/DownloadACGPicture.php">点击链接</a>
<br>
<br>2.开始任务 action=start
<a href = "http://littlesmallsu.applinzi.com/public/DownloadACGPicture.php?action=start">点击链接</a>
<br>
<br>3.下载专辑数据 action=GetAlbum
<a href = "http://littlesmallsu.applinzi.com/public/DownloadACGPicture.<br>php?action=GetAlbum&index=notice1233">点击链接</a>
<br>
<br>4.上传图片到存储 action=UploadToSCS
<a href = "http://littlesmallsu.applinzi.com/public/DownloadACGPicture.php?action=UploadToSCS&id=25838
<br>
			';

			require_once DIR_VIEW.'footer.php';
		}
	}
?>