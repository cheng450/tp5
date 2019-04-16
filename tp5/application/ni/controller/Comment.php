<?php
namespace app\ni\controller;

use app\common\controller\Admin;

/**
 * 后台评论控制器
 */
class Comment extends Admin {

	/**
	 * 后台评论列表
	 */
	public function index() {
		$list = model('comment')->getList();
		$this->assign('list', $list);

		return $this->fetch();
	}

	/**
	 * 删除评论
	 */
	public function delete($id) {
		$res = db('comment')->delete($id);
		if ($res) {
			$this->success("删除成功");
		} else {
			$this->error("删除失败");
		}
	}
}