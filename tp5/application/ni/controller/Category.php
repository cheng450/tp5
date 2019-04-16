<?php
namespace app\ni\controller;

use app\common\controller\Admin;
use app\ni\model\Category as CategoryModel;

/**
 * 后台分类控制器
 */
class Category extends Admin {
	/**
	 * 初始化函数
	 */
	public function _initialize() {
		// 显式调用父类中的初始化方法
		parent::_initialize();
		$cs = model('category')->getTree();
		// print_r($cs);
		$this->assign('cs', $cs);
	}
	/**
	 * 添加分类展示页
	 */
	public function add() {
		return $this->fetch();
	}

	/**
	 * 添加分类表达执行函数
	 */
	public function doAdd() {
		// $data = $_POST;
		// $data = request()->post();
		// $data = request()->param();
		// $data = input('post.');
		$data = input('param.');
		// $data['pid'] = 0;
		print_r($data);

		$res = model('category')->save($data);
		if ($res) {
			$this->success('添加成功');
		} else {
			$this->error('添加失败');
		}
	}

	/**
	 * 分类列表
	 */
	public function index() {
		return $this->fetch();
	}

	public function edit() {
		$id = request()->param()['id'];
		// request()->get()['id']; // URL上的参数
		// request()->post()['id']; // 表单中的数据
		// echo $id;
		if (request()->isGet()) {
			$data = model('category')->find($id);
			$this->assign('data', $data);
			// 展示编辑表单
			// admin/view/category/edit.html
			return $this->fetch();
		} else if (request()->isPost()) {
			// 处理表单提交
			$data = input('post.');

			// checkbox未选中时,recommend字段
			// 不会出现在post提交当中,所以,未选中时
			// 需要手动将其设置为0
			if (!isset($data['recommend'])) {
				$data['recommend'] = 0;
			}

			// print_r($data);exit;
			// unset($data['id']);
			// $res = model('category')->save($data, ['id' => $id]);
			// $res = model('category')
			// 	->where('id', $id)
			// 	->save($data);
			$c = CategoryModel::get($id);
			$res = $c->allowField(true)->update($data);
			if ($res) {
				$this->success('保存成功', url('ni/category/index'));
			} else {
				$this->error('保存失败', url('ni/category/edit', ['id' => $id]));
			}
		}
	}
}