<?php
namespace app\ni\model;

use think\Model;

/**
 * 后台用户模型
 */
class User extends Model {
	// 时间字段的自动完成
	protected $autoWriteTimestamp = true;
	protected $updateTime = false;
	protected $createTime = "created";

	public function getList() {
		$where = [];

		$cond = request()->param();
		if (isset($cond['username']) && !empty($cond['username'])) {
			$where['username'] = ['like', '%' . $cond['username'] . '%'];
		}
		if (isset($cond['phone']) && !empty($cond['phone'])) {
			$where['phone'] = ['like', '%' . $cond['phone'] . '%'];
		}

		if (isset($cond['email']) && !empty($cond['email'])) {
			$where['email'] = ['like', '%' . $cond['email'] . '%'];
		}

		$list = $this->where($where)
			->order('created DESC')
			->paginate();
		return $list;
	}
}