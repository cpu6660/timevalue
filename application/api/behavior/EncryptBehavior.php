<?php
/**
 * 目前统一接口get post 传回接口的数据的key设置为_E_JSON,
 * 通过_E_JSON传递加密后的数据
 * Created by PhpStorm.
 * User: pengchen
 * Date: 17/5/6
 * Time: 23:47
 */
namespace app\api\behavior;

class EncryptBehavior {

	/**
	 * 功能:解密
	 */
	public function appInit(&$params) {
		if(\is_post_method()){
			echo "post请求";
		}else{
			echo "非post请求";
		}
	}

	/**
	 * 功能:加密
	 *
	 */
	public function appEnd(&$params) {
		echo "加密成功\n";
	}
}