<?php
/**
 * Created by PhpStorm.
 * User: pengchen
 * Date: 17/5/7
 * Time: 12:04
 */
namespace think\org\util;

class Encrypt {
	public static $key = "9daluqp9xm2kw6zs1htb";

	public static function decode($string){

		$crypt = new Crypt3Des(Encrypt::$key);
		$decryptStr = $crypt->decrypt($string);
		return $decryptStr;
	}

	public static function encode($string){
		$crypt = new Crypt3Des(Encrypt::$key);
		$encryptStr = $crypt->encrypt($string);
		return $encryptStr;
	}
}