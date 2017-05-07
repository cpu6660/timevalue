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
			//如果客户端传来了加密数据的字段 en_msg(该字段可以调整,有客户端和服务端约定好就行)
			if(isset($_POST['_en_msg'])){
				//解密后的数据
				\think\config::set("_de_msg","post_jiamile");
			}
		}else{
			if(isset($_GET['_en_msg'])){
				//解密后的数据
				\think\config::set("_de_msg","get_jiamile");
			}
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