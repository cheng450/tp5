<?php
namespace app\ni\controller;

use app\common\controller\Admin;
use app\ni\model\News as NewsModel;

/**
 * 后台新闻控制器
 */
class News extends Admin {
	/**
	 * 初始化函数
	 * @return void
	 */
	public function _initialize() {
		parent::_initialize();
		// 获取分类的树形结构
		$cs = model('category')->getTree();
		$this->assign('cs', $cs);
	}
	/**
	 * 新闻列表
	 */
	public function index() {
		$list = model('news')->getList();
		$this->assign('list', $list);
		return $this->fetch();
	}

	/**
	 * 添加新闻表单展示页面
	 */
	public function add() {
		// 模板路径: admin/view/news/add.html
		return $this->fetch();
	}

	/**
	 * 添加新闻表单执行方法
	 */
	public function doAdd() {
		$data = input('post.');

		if ($data['cid'] == 0) {
			$this->error('请选择所属分类');
		}

		$file = request()->file('image');
		if (!empty($file)) {
			$info = $file->move(ROOT_PATH . 'public/static/upload');
			if ($info) {
				$data['image'] = $info->getSaveName();
			} else {
				$this->error($file->getError(), url('ni/news/add'));
			}
		}

		if (!isset($data['recommend'])) {
			$data['recommend'] = 0;
		}

		if (!isset($data['online'])) {
			$data['online'] = 0;
		}

		$res = model('news')->save($data);
		if ($res) {
			$this->success('添加成功', url('ni/news/index'));
		} else {
			$this->error('添加失败', url('ni/news/add'));
		}
	}

	/**
	 * 新闻编辑展示页
	 * @param  int $id 新闻ID
	 */
	public function edit($id) {
		$data = model('news')->find($id);
		$this->assign('data', $data);
		return $this->fetch();
	}

	/**
	 * 新闻编辑的执行函数
	 */
	public function doEdit() {
		$data = input('post.');
		$id = $data['id'];

		// 图片上传
		$file = request()->file('image');
		if (!empty($file)) {
			$info = $file
				->validate([
					'size' => 2048000, // 2M
					'ext' => 'jpg,png,gif',
				])
				->move(ROOT_PATH . 'public/static/upload');
			if ($info) {
				$data['image'] = $info->getSaveName();
			} else {
				$this->error($file->getError(), url('ni/news/edit', ['id' => $id]));
			}
		}

		// checkbox判断
		if (!isset($data['recommend'])) {
			$data['recommend'] = 0;
		}

		if (!isset($data['online'])) {
			$data['online'] = 0;
		}

		$c = NewsModel::get($id);
		$res = $c->allowField(true)->update($data);
		if ($res) {
			$this->success('保存成功', url('ni/news/index'));
		} else {
			$this->error('保存失败', url('ni/news/edit', ['id' => $id]));
		}
	}

	/**
	 * 删除新闻
	 *
	 * @param  int $id 新闻的id
	 */
	public function delete($id) {
		$res = db('news')->delete($id);
		if ($res) {
			$this->success('删除成功');
		} else {
			$this->error('删除失败');
		}
	}
}