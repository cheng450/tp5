<?php
namespace app\index\controller;

use app\common\controller\IndexBase;

/**
 * 前台评论控制器
 */
class Comment extends IndexBase {
	public function add() {
		// $data = input('post.');
		$data = input('param.');
		// print_r($data);

		// $res = CommentModel::create($data);
		$res = model('comment')->save($data);
		if ($res) {
			$this->success('添加成功');
		} else {
			$this->error('添加失败');
		}
	}
}