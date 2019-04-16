<?php
namespace app\ni\model;

use think\Model;

/**
 * 后台评论模型
 */
class Comment extends Model {
	// 时间自动完成
	protected $autoWriteTimestamp = true;
	protected $updateTime = false;
	protected $createTime = "created";

	/**
	 * 后台评论列表
	 * @return array 评论数组
	 */
	public function getList() {
		$where = [];
		$cond = request()->param();
		// 评论内容搜索
		if (isset($cond['content']) && !empty($cond['content'])) {
			$where['content'] = ['like', "%" . $cond['content'] . "%"];
		}

		// 评论类型搜索
		if (isset($cond['comment_type']) && !empty($cond['comment_type'])) {
			$where['comment_type'] = ['like', "%" . $cond['comment_type'] . "%"];
		}

		$list = $this->where($where)
			->order('created DESC')
			->paginate();

		return $list;
	}

	/**
	 * 获取评论作者信息(当前模型是Comment)
	 *
	 * @return object 用户模型对象
	 */
	public function author() {
		return $this->belongsTo('User', 'uid');
	}
}