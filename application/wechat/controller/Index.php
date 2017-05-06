<?php
namespace app\wechat\controller;

class Index
{

	public $token = "timevalues";
	public function index()
	{
		file_put_contents("/home/ubuntu/log/token.txt", $this->token);
		//验证消息是否来自于微信
		$this->valid();

		$this->responseMsg();
	}


	//微信首次接入的判断
	public function valid()
	{
		file_put_contents("/home/ubuntu/log/step.txt", "1");
		//如果没有定义微信后台的token,则
		if (!$this->token)
		{
			return false;
		}

		file_put_contents("/home/ubuntu/log/step.txt", "2");

		//获取微信请求中以get方式传递的echostr
		$echo_str = $_GET["echostr"];
		$unsortArray = array($_GET["timestamp"], $_GET["nonce"], $this->token);
		sort($unsortArray, SORT_STRING);
		$calSig = sha1(implode($unsortArray));

		//如果确定是微信传过来的消息,就返回true
		if ($calSig == $_GET["signature"])
		{
			file_put_contents("/home/ubuntu/log/log.txt", "weixinnews");
			echo $echo_str;
		}else
		{
			file_put_contents("/home/ubuntu/log/error.txt", "error");
		}
	}


	//相应公众号的信息
	public function responseMsg() {
		$rawMessage = file_get_contents("php://input");
		if(!empty($rawMessage)){
			$postObj = simplexml_load_string($rawMessage,'SimpleXMLElement', LIBXML_NOCDATA);
			//消息类型
			$RX_TYPE = trim($postObj->MsgType);
			//关注事件
			if($RX_TYPE == "event" && $postObj->Event == "subscribe"){
				echo $this->transmitText($postObj,"欢迎关注");
			}else {
				echo $this->transmitText($postObj,"其他事件");
			}



		}else {
			//如果微信服务器没有传回内容
			echo "";
			exit;
		}
	}


	private function transmitText($object, $content){
		if (!isset($content) || empty($content)){
			            return "";
        }

        $xmlTpl = "<xml>
     		<ToUserName><![CDATA[%s]]></ToUserName>
     		<FromUserName><![CDATA[%s]]></FromUserName>
     		<CreateTime>%s</CreateTime>
    		<MsgType><![CDATA[text]]></MsgType>
    		<Content><![CDATA[%s]]></Content>
 			</xml>";
         $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), $content);

         return $result;
	}
}
