<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "msykt");
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->responseMsg();
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
				$type = $postObj->MsgType;
				$customevent = $postObj->Event;
				$latitude  = $postObj->Location_X;
				$longitude = $postObj->Location_Y;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
				 $imageTpl = "<xml>
				              <ToUserName><![CDATA[%s]]></ToUserName>
				              <FromUserName><![CDATA[%s]]></FromUserName>
				              <CreateTime>%s</CreateTime>
				              <MsgType><![CDATA[news]]></MsgType>//消息类型为news（图文）
				              <ArticleCount>1</ArticleCount>//图文数量为1（单图文）
				              <Articles>
				              <item>//第一张图文消息
				              <Title><![CDATA[%s]]></Title> //标题
				              <Description><![CDATA[%s]]></Description>//描述为空（懒得描述）
				              <PicUrl><![CDATA[%s]]></PicUrl>//打开前的图片链接地址
				              <Url><![CDATA[%s]]></Url>//点击进入后显示的图片链接地址
				              </item>
				              </Articles>
				              </xml> ";
				switch ($type)
			{   case "event";
				if ($customevent=="subscribe")
				    {$contentStr = "感谢您关注《每十云课堂》微课学习\n回复\"网站首页\"或者回复\"每十云课堂\"查看平台首页\n";}
				break;
				case "image";
				$contentStr = "您的图片很棒！";
				break;
				case "location";
				$contentStr = "您的纬度是{$latitude},经度是{$longitude},我已经锁定！";
				break;
				case "link" ;
				$contentStr = "您的链接没有通过安全检查，可能存在安全隐患！";
				break;
				case "text";
				  switch($keyword)
				  {
                    case "网站首页";
				    $title = "每十云课堂";//标题
		            $PicUrl = "http://1.cxmeishimeike.sinaapp.com/index.jpg";//图片链接
		            $Url = "http://1.cxmeishimeike.sinaapp.com/msykt/index.php";//打开后的图片链接
                    $Description ="感谢您关注《每十云课堂》\n我们将会给您带来更优质，更细心的服务！";
		            $resultStr = sprintf($imageTpl, $fromUsername, $toUsername, $time, $title, $Description,$PicUrl,$Url);
		            echo $resultStr;
                    break;
					case "每十云课堂";
				    $title = "每十云课堂";//标题
		            $PicUrl = "http://1.cxmeishimeike.sinaapp.com/index.jpg";//图片链接
		            $Url = "http://1.cxmeishimeike.sinaapp.com/msykt/index.php";//打开后的图片链接
                    $Description ="感谢您关注《每十云课堂》\n我们将会给您带来更优质，更细心的服务！";
		            $resultStr = sprintf($imageTpl, $fromUsername, $toUsername, $time, $title, $Description,$PicUrl,$Url);
		            echo $resultStr;
                    break;
					default:
					$contentStr ="hi";
				 }
				 break;
			default:
			$contentStr ="此项功能尚未开发";
			}
				$msgType="text";
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;

        }else {
        	echo "";
        	exit;
        }
    }

	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>