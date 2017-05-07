<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//如果检查请求是否是post请求的方法不存在,则定义
if (!function_exists("is_post_method"))
{
	function is_post_method()
	{
		if (isset($_SERVER["REQUEST_METHOD"]) && !strcasecmp($_SERVER['REQUEST_METHOD'], 'POST'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}