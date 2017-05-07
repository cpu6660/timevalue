<?php
/**
 * 用户模块
 * Created by PhpStorm.
 * User: pengchen
 * Date: 17/5/6
 * Time: 23:45
 */

namespace app\api\controller;

class User {

	public function index() {
		var_dump(\think\config::get("_de_msg"));
		$res = array(
			"code" => "123",
			"msg"  => "错误验证",
		);
		\think\config::set("_E_JSON",$res);
	}
}