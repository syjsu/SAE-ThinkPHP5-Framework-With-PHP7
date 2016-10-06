<?php
class FileAction extends Action{

    //构造器
    public function __construct(){
        parent::__construct();
    }

    //调用
    public function __call($url,$value)
    {
        if($_REQUEST['act'] == 'set'){
            $k = new SaeKV();
            $k->init();
            $file['name'] = $_REQUEST['name'];
            $file['url'] = $_REQUEST['url'];
            $file['uid'] = $date('yyyy-MM-dd HH:mm:ss');
            $ret = $k->set("App_".$_REQUEST['appname']."_Platform_".$_REQUEST['platform']."_Name_".$_REQUEST['name'],$file);
            var_dump($ret);
            die();
        }

        if($_REQUEST['act'] == 'del'){
            $k = new SaeKV();
            $k->init();
            $ret = $k->delete("App_".$_REQUEST['appname']."_Platform_".$_REQUEST['platform']."_Name_".$_REQUEST['name']);
            var_dump($ret);
            die();
        }
/*
        $res['code']="401";
        $res['tag']="没有找到你要请求的数据,请求链接:".$url;
        $res['files']= array();

        $res = json_decode($res,JSON_UNESCAPED_UNICODE);
        echo $res;*/
    }

    public function index(){
       // require_once DIR_VIEW.'password.php';
        require_once DIR_VIEW.'header.php';

echo '
  <form action="/file/index/" method="get">
        <label>上传文件</label>
        <br>
        <div class="form-group">
            <label>请输入App的名字 appname</label>
             <input type="text" name="appname"/>
        </div>
        <div class="form-group">
            <label>请输入App的版本 platform</label>
             <input type="text" name="platform"/>
        </div>
        <div class="form-group">
            <label>请输入文件的代号名 name</label>
             <input type="text" name="name"/>
        </div>
        <div class="form-group">
            <label>请输入文件的外链 url</label>
             <input type="text" name="url"/>
        </div>
         <div class="form-group">
             <input type="hidden" name="act" value="set"/>
        </div>
        <button type="submit" class="btn btn-default">确认上传</button>
</form>
<br><br>
  <form action="/file/index/" method="get">
        <label>删除文件</label>
        <br>
        <div class="form-group">
            <label>请输入App的名字</label>
             <input type="text" name="appname"/>
        </div>
        <div class="form-group">
            <label>请输入App的版本</label>
             <input type="text" name="platform"/>
        </div>
        <div class="form-group">
            <label>请输入文件的代号名 name</label>
             <input type="text" name="name"/>
        </div>
         <div class="form-group">
             <input type="hidden" name="act" value="set"/>
        </div>
        <button type="submit" class="btn btn-default">确认删除</button>
</form>
<br><br>
';

        $k = new SaeKV();
        $k->init();
        $res = $k->pkrget("App_",100);

        foreach($res as $key => $value){
            echo json_encode($key,JSON_UNESCAPED_UNICODE);
            echo json_encode($value,JSON_UNESCAPED_UNICODE);
        }

        require_once DIR_VIEW.'footer.php';
    }

    //路由
    public function get($appname,$platform){
        $k = new SaeKV();
        $k->init();
        $files = $k->pkrget("App_".$appname."_Platform_".$platform,100);

        if(count($files)>0){
            $res['code']="200";
            $res['tag']="获取数据成功,请求名称:".$appname.",请求平台:".$platform;
            $res['files']= $files;

        }else{
            $res['code']="404";
            $res['tag']="没有找到你要请求的数据,请求名称:".$appname.",请求平台:".$platform;
            $res['files']= $files;
        }

        $res = json_encode($res,JSON_UNESCAPED_UNICODE);
        echo $res;
    }

    //查询
    public function FindAll(){




    }
}
?>