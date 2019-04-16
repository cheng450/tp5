<?php
namespace app\index\controller;

use app\common\controller\IndexBase;

class Index extends IndexBase {
	/**
	 * 首页
	 */
	public function index() {
		// application/common.php
		// psd1803(); // 调用公共文件中的公共函数
		// 带图片的,上线的,推荐的,最新的5条新闻

		$slide = model('news')->getSlide();
		$recommend = model('news')->getRecommend();

		// 首页查询一级分类
		$subs = model('category')
			->where('pid', 0)
			->select();

		$subnews = [];
		foreach ($subs as $c) {
			// $c第一次遍历是体育
			// $c第二次遍历是娱乐
			$subids = [];
			$subids = model('category')->getChildrenIds($c->id);
			$subids[] = $c->id;
			// 根据分类id数组,查看新闻
			// $c是体育,则取体育分类下的新闻
			// $c是娱乐,则取娱乐分类下的新闻
			$subnews[$c->id] = model('news')->getNewsByCids($subids);
		}

		$this->assign([
			'slide' => $slide,
			'recommend' => $recommend,
			'subs' => $subs,
			'subnews' => $subnews,
		]);

		// 模板路径: view/index/index.html
		return $this->fetch();
	}

	/**
	 * 访问路径: public/index.php/index/index/hello
	 *
	 * @return [type] [description]
	 */
	public function hello() {
		return "<h1>你好TP</h1>";
	}

	/**
	 * 输出常用路径的常量
	 *
	 * 访问路径:public/index.php/index/index/path
	 */
	public function path() {
		echo 'APP_PATH:' . APP_PATH . '<br />';
		echo 'THINK_PATH:' . THINK_PATH . '<br />';
		echo 'CORE_PATH:' . CORE_PATH . '<br />';
		echo 'VENDOR_PATH:' . VENDOR_PATH . '<br />';
	}

	/**
	 * 验证Think模板引擎
	 *
	 * 访问路径: public/index.php/index/index/tpl
	 */
	public function tpl() {
		$hi = "hello, World";
		$user = db('user')->find(8);
		// print_r($user);
		$obj = json_decode(json_encode($user));

		$blogs = db('blog')
			->field('id,title')
			->order('created DESC')
			->limit(10)
			->select();

		// 将PHP变量绑定到模板上
		// $this->assign('hi', $hi);
		$this->assign([
			'hi' => $hi,
			'user' => $user,
			'obj' => $obj,
			'blogs' => $blogs,
		]);

		// 渲染模板(模板输出)
		// 模板路径: index/view/index/tpl.html
		return $this->fetch();
	}
}
