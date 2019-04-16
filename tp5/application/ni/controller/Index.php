<?php
namespace app\ni\controller;

use app\common\controller\Admin;

/**
 * 后台控制器
 */
class Index extends Admin {

	/**
	 * 访问路径: public/admin/index/index
	 */
	public function index() {
		// return "<h1>这里是后台</h1>";
		// 模板文件: admin/view/index/index.html
		return $this->fetch();
	}

}