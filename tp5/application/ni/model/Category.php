<?php
namespace app\ni\model;

use think\Model;

class Category extends Model {
	// 开始时间字段自动完成
	protected $autoWriteTimestamp = true;
	protected $updateTime = false;
	protected $createTime = "created";

	/**
	 * 获取分类的树形结构
	 */
	public function getTree($pid = 0, $target = []) {
		// 返回结果是数组,数组元素是对象
		$cs = $this->field('*')
			->where('pid', $pid)
			->select();
		// print_r($cs);
		// pid=0 查询出来一级分类
		//       体育(id=1)
		//       娱乐(id=2)
		// 查询体育下的二级分类
		// pid=1 体育的id
		// 查询娱乐下的二级分类
		// pid=2 娱乐的id
		static $n = 1; // 初始分类级别是1
		foreach ($cs as $c) {
			// 第一次遍历
			// $c->id == 1;
			// $c->title == '体育';
			$c->level = $n; // 对象属性赋值
			$target[$c->id] = $c->toArray();
			$n++;
			$target = $this->getTree($c->id, $target);
			$n--;
		}

		return $target;
	}

}