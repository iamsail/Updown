<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display('/index');
    }

//    upload方法的实现
    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类

        if(!$_SESSION['usrid']){
            echo "<script>alert('请先登录！'); history.go(-1);</script>";
//            echo "<script>alert('请先登录！');  return false;</script>";
            exit();
        }
//        $this->show("444");
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('md','doc','pdf','docx','txt');// 设置附件上传类型
        $upload->rootPath  =     './Application/Common/Common/Uploads/'; // 设置附件上传根目录
//        $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
//        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
//        $upload->rootPath  =     THEME_PATH.'./Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
//        $upload->savePath  =     'image'; // 设置附件上传（子）目录
        // 上传文件
//        $info =  $upload->getUploadFileInfo();
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
//            $this->show("555");
            $this->error($upload->getError());
//            $this->error("hahh");
        }else{// 上传成功
//            $this->show("666");
//====================================================other
            $text = M('text');
            $data['name'] = $info['photo']['name'];//这个是文件名
            $data['savename'] = $info['photo']['savename'];//这个是文件名被处理后的名字，上传的文件的保存名称
            $data['time'] = date('Y-m-d H:i:s');
            $data['path'] = $info['photo']['savepath'];
            $right = $text->add($data);
            if($right){
                echo "添加到数据库成功";
                echo "<br>";
//                echo $_SESSION['name'];
                $client = M('client');
                $map['uid'] = $_SESSION['usrid'];
                $client->where($map)->setInc('score',2);


//                $link=mysqli_connect("localhost","root","sail","",3306);	//连接数据库
//                //连接错误时的提示
//                if(mysqli_connect_errno())
//                {
//                    exit(mysqli_connect_error());
//                }
//                mysqli_select_db($link,"updown");	//选择数据库
//                mysqli_set_charset($link,'utf8');	//设定字符集
//                $sql = "UPDATE md_client SET score = score + 1 WHERE '$_SESSION[usrid]'";
//                $result = mysqli_query($link,$sql);	//执行SQL语句
//                $num = mysqli_num_rows($result);	//统计执行结果影响的行数
//                if($num){
//                    echo "失败";
//                }


            }else{
                echo "添加到数据库失败";
            }
            // 保存当前数据对象
//====================================================other
            $this->success('上传成功~');
        }
    }

    public function download(){
        $text = M('text');
        $textinfo = $text ->select();
        $this->assign('textinfo',$textinfo );
        $this->display('/download');
    }

    public function logout(){
        $_SESSION = array(null); // 把session清空。
        session_destroy();   // 彻底销毁session
        echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['name']."&nbsp;&nbsp;"."注销成功"."<br>";
        echo  "<a href='http://123.207.83.243/updown/index.php'>点此返回主页</a>";
    }


    public function sendRequest($uri){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Yi OAuth2 v0.1');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array());
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        $response = curl_exec($ch);
        return $response;
    }
}