<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CallbackController extends Controller
{
    public function getIndex()
    {
        $echoStr = $_GET["echostr"];
        if ($this->checkSignature()) {
            echo $echoStr;
            exit;
        }
        echo "Hello";
    }


    public function postIndex()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if  (!empty($postStr)) {
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl ="<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <ArticleCount>2</ArticleCount>
                            <Articles>
                            <item>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[hello world]]></Description>
                            <PicUrl><![CDATA[http://img.getit.in/TCJXIHB41767495Imagelogo_vtc.jpg]]></PicUrl>
                            <Url><![CDATA[http://intern.ico.com.hk/~iapgp04/hello]]></Url>
                            </item>
                            <item>
                            <Title><![CDATA[message]]></Title>
                            <Description><![CDATA[hello world]]></Description>
                            <PicUrl><![CDATA[http://img.getit.in/TCJXIHB41767495Imagelogo_vtc.jpg]]></PicUrl>
                            <Url><![CDATA[http://lc01.edmundhk.com/hello]]></Url>
                            </item>
                            </Articles>
                            </xml>";
            if(!empty($keyword)){
                $msgType = "news";
                $contentStr ="Welcome to wechat world!";
                $resultStr = sprintf($textTpl,$fromUsername,$toUsername,$time,$msgType,"HELLO");
                echo $resultStr;
            }else{
                echo "Input something...";
            }
        }else{
            echo "";
            exit;
        }
    }

    private function checkSignature(){
        if(!env('TOKEN')){
            throw new Exception('TOKEN is not defined!');
        }
        $signature = $_GET["signature"];
        $timestamp =$_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = env('TOKEN');
        $tmpArr = array($token,$timestamp,$nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if($tmpStr == $signature){
            return true;
        }else{
            return false;
        }
    }
}
