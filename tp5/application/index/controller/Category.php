<?php
namespace app\index\controller;

use app\common\controller\IndexBase;

/**
 * 前台分类控制器
 */
class Category extends IndexBase {
	/**
	 * 分类详情页面
	 * 访问路径: index/category/index/cid/xxx
	 *
	 * 展示该分类下的新闻
	 */
	public function index($cid) {
		// 获取推荐的分类列表

		// 获取当前分类下的子分类
		// 比如:当前分类是体育 id=1
		// 应该查询出 NBA(id=3)和世界杯(id=4)
		$subs = model('category')
			->where('pid', $cid)
			->select();

		// 查询当前分类下的所有的后代分类id
		$cids = model('category')->getChildrenIds($cid);
		$cids[] = $cid;
		// array_push($cids,$cid);
		// array_unshift($cids,$cid);
		// print_r($cids);

		// SELECT * FORM tedu_news
		// WHERE cid IN (1,3,4,5,6)
		// AND recommend=1 // 推荐
		// AND online=1 // 上线
		// ORDER BY created DESC
		// LIMTI 10
		$recommend = model('news')->getRecommend($cids);

		$news = [];
		foreach ($subs as $c) {
			// 假定$c是NBA,现在取NBA下的后代分类ids
			$subids = [];
			$subids = model('category')->getChildrenIds($c->id);
			$subids[] = $c->id;
			// print_r($subids);
			$news[$c->id] = model('news')->getNewsByCids($subids);
		}
		// print_r($news);
		//
		// 获取当前分类下的轮播图
		// 根据当前分类下的id数组查询轮播
		// 带图片的, 推荐的,上线的,最新的,5条记录
		$slide = model('news')->getSlide($cids);

		// $this->assign('subs', $subs);
		// $this->assign('recommend', $recommend);
		// $this->assign('news', $news);
		$this->assign([
			'subs' => $subs,
			'recommend' => $recommend,
			'news' => $news,
			'slide' => $slide,
		]);

		return $this->fetch();
	}
}