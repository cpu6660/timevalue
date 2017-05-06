<?php
/**
 * Created by PhpStorm.
 * User: pengchen
 * Date: 17/5/6
 * Time: 23:47
 */
namespace app\api\behavior;

class EncryptBehavior {

	/**
	 * 功能:加密
	 */
	public function appInit(&$params) {
		echo "加密成功\n";
	}

	/**
	 * 功能:解密
	 *
	 */
	public function appEnd(&$params) {
		echo "解密成功\n";
	}
}