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
		var_dump($_GET);
		echo "welcome!!!!";
		var_dump($_POST);
	}
}