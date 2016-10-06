<?php
	class HcosAction extends Action{

		//构造器
		public function __construct(){
			parent::__construct();
		}

		//首页
		public function index(){
			require_once DIR_VIEW.'password.php';
			require_once DIR_VIEW.'header.php';

			$page_now = "http://" . $_SERVER['SERVER_NAME'] . "/hcos/album/";

			//存入数据
			$ka = new SaeKV();
			$ret = $ka->init();
			$res = $ka->get("cos_album_all_mainindex");

			echo '<div><div class="row">';
			//遍历返回值
			foreach ($res["indexes"] as $go) {
				//整合成html
				$pic1 = '<div class="col-sm-6 col-md-4"><a class="thumbnail" href="'.$page_now.$go['index'].'"  ><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>  专辑名称: '.$go['des'].'';
				$pic2 = '';
				$pic3 = '</a></div><p></p>';
				$context = $context.$pic1.$pic2.$pic3;
			}
			echo $context;
			echo '</div></div>';

			require_once DIR_VIEW.'footer.php';

		}
		//相册
		public function album($url){
			require_once DIR_VIEW.'password.php';
			require_once DIR_VIEW.'header.php';

			//存入数据
			$ka = new SaeKV();
			$ret = $ka->init();
			$res = $ka->get("cos_album_all_".$url);
			echo '<div><div class="row">';
			//遍历返回值
			foreach ($res["info"] as $go) {
				//整合成html
				$pic1 = '<div class="col-sm-6 col-md-4"><a class="thumbnail" href="http://sinacloud.net/cos-play/'.$go['tags'].'/'.$go['id'].'.JPG"><p>图片名称: '.$go['tags'].'</p>';
				$pic2 = '<img src="http://sinacloud.net/cos-play/'.$go['tags'].'/'.$go['id'].'.JPG" class="img-thumbnail" > </img>';
				$pic3 = '</a></div><p></p>';
				$context = $context.$pic1.$pic2.$pic3;
			}
			echo $context;
			echo '</div></div>';

			require_once DIR_VIEW.'footer.php';
		}
		//下载
		public function download($url){
			require_once DIR_VIEW.'password.php';
			require_once DIR_VIEW.'header.php';
			require_once DIR_VIEW.'footer.php';
		}
	}
?>