<?php
namespace app\index\controller;

use app\common\controller\IndexBase;

/**
 * 前台新闻控制器
 */
class News extends IndexBase {
	/**
	 * 新闻详情页面
	 */
	public function view($id) {
		// 查看新闻详情
		$data = model('news')->find($id);

		// 查看最新新闻
		$newest = model('news')->getHotest();

		// 查看最热新闻
		$hotest = model('news')->getHotest();

		// 更新新闻的浏览量
		db('news')->where('id', $id)
			->setInc('views');
		$this->assign('data', $data);
		$this->assign('comments', $data->comments());
		$this->assign('newest', $newest);
		$this->assign('hotest', $hotest);

		return $this->fetch();
	}
}