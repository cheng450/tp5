<?php
namespace app\ni\model;

use think\Model;

/**
 * 后台新闻模型
 */
class News extends Model {
	// 时间字段的自动完成
	protected $autoWriteTimestamp = true;
	protected $updateTime = 'updated';
	protected $createTime = "created";

	protected $auto = []; // 添加+更新
	protected $update = []; // 更新
	protected $insert = ['views' => 1, 'uid']; // 添加

	/**
	 * 通过修改器给uid设置默认值
	 */
	protected function setUidAttr() {
		return session('admin.id');
	}

	/**
	 * 根据博客的uid查询作者信息
	 *
	 * 本地是通过uid做关联查询 user.id = news.uid
	 * 可能出现的问题:
	 * 1) news表中的uid不存在(null)
	 * 2) news表中的uid存在(假定是10000),但是
	 *    news表中id=10000的用户并不存在
	 */
	public function author() {
		return $this->belongsTo('User', 'uid');
	}

	/**
	 * 当前模式是News
	 * 通过相对关联关系查询分类信息
	 */
	public function category() {
		return $this->belongsTo('Category', 'cid');
	}

	/**
	 * 获取新闻列表
	 *
	 * @return array 新闻列表数组
	 */
	public function getList() {
		$where = [];

		// 获取URL地址后面的参数,相当于$_GET
		$cond = request()->param();
		if (isset($cond['title']) && !empty($cond['title'])) {
			$where['title'] = ['like', '%' . $cond['title'] . '%'];
		}

		$list = $this->where($where)
			->order('created DESC')
			->paginate();

		return $list;
	}
}