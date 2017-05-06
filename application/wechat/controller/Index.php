<?php
namespace app\wechat\controller;

class Index
{

	public $token = "timevalues";
	public function index()
	{
		//验证消息是否来自于微信
		$this->valid();
	}


	//微信首次接入的判断
	public function valid()
	{
		//如果没有定义微信后台的token,则
		if (!$this->token)
		{
			return false;
		}

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
}
