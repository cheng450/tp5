<?php
namespace app\ni\model;

use think\Model;

/**
 * 后台博客模型
 */
class Blog extends Model {
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
	 * 本地是通过uid做关联查询 user.id = blog.uid
	 * 可能出现的问题:
	 * 1) blog表中的uid不存在(null)
	 * 2) blog表中的uid存在(假定是10000),但是
	 *    user表中id=10000的用户并不存在
	 */
	public function author() {
		return $this->belongsTo('User', 'uid');
	}
}