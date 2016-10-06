<?php
	class TaskAction extends Action{

		//构造器
		public function __construct(){
			parent::__construct();
		}

		//调用
		public function __call($url,$value)
		{
			var_dump($_REQUEST);
		}

		public function search(){
			echo file_get_contents("https://www.google.co.jp/");
		}

		//路由
		public function index(){
			require_once DIR_VIEW.'password.php';
			require_once DIR_VIEW.'header.php';

			echo '
<br>目前的接口
<br>
<br>1.查看队列长度
<br>http://littlesmallsu.applinzi.com/public/DownloadACGPicture.php
<br>
<br>2.开始任务
<br>http://littlesmallsu.applinzi.com/public/DownloadACGPicture.php?action=start
<br>
<br>3.下载专辑数据
<br>http://littlesmallsu.applinzi.com/public/DownloadACGPicture.<br>php?action=GetAlbum&index=notice1233
<br>
<br>4.上传图片到存储
<br>http://littlesmallsu.applinzi.com/public/DownloadACGPicture.php?action=UploadToSCS&id=25838
<br>
			';

			require_once DIR_VIEW.'footer.php';
		}
	}
?>