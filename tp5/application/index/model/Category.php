<?php
namespace app\index\model;

use think\Model;

/**
 * 前台分类模型
 */
class Category extends Model {

	/**
	 * 根据当前分类的id,查询所有的后代分类id
	 * 当前的模型是Category,
	 * 对应tedu_category数据表
	 *
	 * @return array 包含后代分类id的数组
	 */
	public function getChildrenIds($cid, $target = []) {
		// 假定$cid=1  当前分类是体育
		$cs = $this->field('id')
			->where('pid', 'eq', $cid)
			->select();

		// $cs包含"NBA"和"世界杯"两个子分类
		foreach ($cs as $c) {
			// $c第一次循环是NBA
			// $c是当前模型的对象
			//
			// 如何查询NBA下的子分类
			// pid=$c->id; // NBA的id

			// $target[] = $c->id;
			array_push($target, $c->id);

			$target = $this->getChildrenIds($c->id, $target);
			// $c第二次循环是世界杯
		}
		return $target;
	}
}
