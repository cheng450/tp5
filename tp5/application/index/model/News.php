<?php
namespace app\index\model;

use think\Model;

/**
 * 前台新闻模型
 */
class News extends Model {
	// 时间字段的自动完成
	protected $autoWriteTimestamp = true;
	protected $updateTime = 'updated';
	protected $createTime = "created";

	/**
	 * 获取某些分类下的推荐新闻
	 *
	 * @param  array|null $cids 分类id数组
	 *                          null表示所有分类
	 * @param  integer    $num  返回结果的数量
	 *
	 * @return array      包含推荐新闻的数组
	 */
	public function getRecommend($cids = null, $num = 7) {
		if (is_null($cids)) {
			// 获取首页的推荐新闻
			$list = $this->field('id,title')
				->where('recommend=1')
				->where('online=1')
				->order('created DESC')
				->limit($num)
				->select();
		} else {
			// 获取某个分类页面的推荐新闻
			$list = $this->field('id,title')
				->where('cid', 'in', $cids)
				->where('recommend=1')
				->where('online=1')
				->order('created DESC')
				->limit($num)
				->select();
		}

		return $list;
	}

	/**
	 * 获取最新新闻
	 */
	public function getNewest($num = 5) {
		$newest = $this->field('id,title')
			->where('online=1')
			->order('created DESC')
			->limit($num)
			->select();
		return $newest;
	}

	/**
	 * 获取最热新闻
	 */
	public function getHotest($num = 5) {
		$hotest = $this->field('id,title,views')
			->where('online=1')
			->order('views DESC')
			->limit($num)
			->select();
		return $hotest;
	}

	/**
	 * 当前模型: News
	 *
	 * 查询新闻下的用户信息
	 */
	public function author() {
		// 相对关联模型是: User
		return $this->belongsTo('User', 'uid');
	}

	/**
	 * 当前模型: News
	 *
	 * 查询新闻下的分类信息
	 */
	public function category() {
		// 相对关联模型是: Category
		return $this->belongsTo('Category', 'cid');
	}

	/**
	 * 获取首页轮播图
	 *
	 * @param  array|null $cids 数组格式返回分类轮播
	 *                          null返回首页轮播
	 * @param  integer    $num  获取结果的数量
	 *
	 * @return array        结果数组
	 */
	public function getSlide($cids = null, $num = 5) {
		if (is_null($cids)) {
			// 首页轮播
			$res = $this->field('id,image,title')
				->where('image', 'neq', '')
				->where('online=1')
				->where('recommend=1')
				->order('created DESC')
				->limit($num)
				->select();
		} else {
			$res = $this->field('id,image,title')
				->where('image', 'neq', '')
				->where('online=1')
				->where('recommend=1')
				->where('cid', 'IN', $cids)
				->order('created DESC')
				->limit($num)
				->select();
		}

		return $res;
	}

	/**
	 * 根据分类id数组,获取上线的新闻
	 *
	 * @param  array   $cids 分类id数组
	 * @param  integer $num  返回结果数量
	 * @return array   结果数组
	 */
	public function getNewsByCids($cids, $num = 7) {
		$res = $this->field('id,title')
			->where('cid', 'IN', $cids)
			->where('online=1')
			->order('created DESC')
			->limit($num)
			->select();

		return $res;
	}

	public function getName() {
		// 父类Model中的属性,返回当前模型名称
		return $this->name;
	}

	/**
	 * 当前模型: News
	 *
	 * 查询新闻下的多个评论
	 */
	public function comments() {
		// 多态关联
		return $this->morphMany('comment', ['comment_type', 'comment_id'], $this->name)
			->order('created DESC')
			->paginate();
	}
}