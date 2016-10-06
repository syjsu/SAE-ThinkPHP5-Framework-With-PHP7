<?php
	class AcgAction extends Action{

		//构造器
		public function __construct(){
			parent::__construct();
		}

		//首页
		public function index($url ="mainindex"){
			require_once DIR_VIEW.'password.php';
			require_once DIR_VIEW.'header.php';

			//获取专辑信息
			function GetAlbum($index){
				//爬虫爬接口
				$url = file_get_contents("http://acgstay.mavericks.lol:8888/index?index=".$index."&mode=3");
				return $res = json_decode($url,JSON_UNESCAPED_UNICODE);
			}
			$page_now = "http://" . $_SERVER['SERVER_NAME'] . "/acg/album/";
			$res = GetAlbum($url);
			echo '<div><div class="row">';
			//遍历返回值
			foreach (array_reverse($res["indexes"]) as $go) {
				//整合成html
				$pic1 = '<div class="col-sm-6 col-md-4"><a class="thumbnail" href="'.$page_now.$go['index'].'"  ><p>专辑名称: '.$go['des'].'</p>';
				$pic2 = '<img src="'.$go['url'].'" class="img-thumbnail" > </img>';
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

			//获取专辑信息
			function GetAlbum($index){
				//爬虫爬接口
				$url = file_get_contents("http://acgstay.mavericks.lol:8888/index?index=".$index."&mode=3");
				return $res = json_decode($url,JSON_UNESCAPED_UNICODE);
			}

			$res = GetAlbum($url);
			echo '<div><div class="row">';
			//遍历返回值
			foreach (array_reverse($res["info"]) as $go) {
				//整合成html
				$pic1 = '<div class="col-sm-6 col-md-4"><a class="thumbnail" href="'.$go['url'].'"><p>图片名称: '.$go['tags'].'</p>';
				$pic2 = '<img src="'.$go['url'].'" class="img-thumbnail" > </img>';
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