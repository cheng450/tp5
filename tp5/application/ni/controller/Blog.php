<?php
namespace app\ni\controller;

use app\common\controller\Admin;
use app\ni\model\Blog as BlogModel;

/**
 * 后台博客控制器
 */
class Blog extends Admin {

	/**
	 * 访问路径 public/admin/blog/index
	 */
	public function index() {
		$list = model('Blog')
			->field('id,uid,title,views,created')
			->order('created DESC')
			->paginate();

		$this->assign('list', $list);
		// 模板文件: admin/view/blog/index.html
		return $this->fetch();
	}

	/**
	 * 添加博客
	 */
	public function add() {
		if (request()->isGet()) {
			return $this->fetch();
		} else if (request()->isPost()) {
			// $data = input('post.');
			$data = input('param.');
			// print_r($data);
			$file = request()->file('image');
			if ($file) {
				$info = $file
					->validate([
						'size' => 2048000,
						'ext' => 'jpg,png,gif',
					])
					->move(ROOT_PATH . 'public/static/upload');
				if ($info) {
					$data['image'] = $info->getSaveName();
				} else {
					$this->error($file->getError(), url('ni/blog/add'));
				}
			}

			$res = model('Blog')->save($data);
			if ($res) {
				$this->success('添加成功', url('ni/blog/index'));
			} else {
				$this->error('添加失败', url('ni/blog/add'));
			}
		}
	}

	/**
	 * 博客编辑
	 */
	public function edit() {
		$id = request()->param()['id'];
		if (request()->isGet()) {
			$data = model('Blog')->find($id);
			$this->assign('data', $data);
			return $this->fetch();
		} else if (request()->isPost()) {
			$data = request()->param();

			// $res = model('blog')->save($data);
			// print_r($_FILES);
			$file = request()->file('image');
			if ($file) {
				$info = $file->move(ROOT_PATH . 'public/static/upload');
				if ($info) {
					$data['image'] = $info->getSaveName();
				} else {
					$this->error($file->getError(), url('ni/blog/edit', ['id' => $id]));
				}
			}
			// print_r($data);exit;
			$c = BlogModel::get($id);
			$res = $c->allowField(true)->update($data);
			if ($res) {
				$this->success('保存成功', url('ni/blog/index'));
			} else {
				$this->error('保存失败', url('ni/blog/edit', ['id' => $id]));
			}
		}
	}
}
