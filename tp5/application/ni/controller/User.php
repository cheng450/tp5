<?php
namespace app\ni\controller;

use think\Controller;

/**
 * 后台用户控制器
 */
class User extends Controller {
	/**
	 * 前置操作属性
	 *
	 * 除了login方法之外,都需要检测管理员登录状态
	 */
	protected $beforeActionList = [
		'checkLogin' => ['except' => 'login'],
	];

	/**
	 * 检测管理员的登录状态
	 */
	public function checkLogin() {
		if (!session('?admin')) {
			$this->redirect(url('ni/user/login'));
		}
	}

	/**
	 * 后台管理员登录页面
	 * 访问路径: admin/user/login
	 */
	public function login() {
		if (request()->isGet()) {
			// 展示登录表单
			// 模板路径: admin/view/user/login.html
			return $this->fetch();
		} else if (request()->isPost()) {
			// 处理登录表单(相当于doLogin)
			// 表单的action="{{:url('admin/user/login')}}"
			$username = input('post.username/s');
			$password = input('post.password/s');
			$captcha = input('post.captcha/s');
			if (!captcha_check($captcha)) {
				$this->error("验证码非法");
			}
			$admin = db('user')
				->field('id,username')
				->where('username', $username)
				->where('password', md5($password))
				->where('admin=1')
				->find();
			if ($admin) {
				// 将管理员信息赋值给session
				session('admin', $admin);
				// 跳转到控制面板
				$this->redirect(url('ni/index/index'));
			} else {
				// 登录失败跳回登录页面
				$this->error('登录失败', url('ni/user/login'));
			}
		}
	}

	/**
	 * 管理员退出
	 */
	public function logout() {
		// 将session中的admin清空
		session('admin', null);
		// 跳转到登录页面
		$this->redirect(url('ni/user/login'));
	}

	/**
	 * 用户列表
	 *
	 * 访问路径: admin/user/index
	 */
	public function index() {
		// $list = db('user')
		// 	->order('created DESC')
		// 	->paginate();

		$list = model('user')->getList();

		$this->assign('list', $list);
		return $this->fetch();
	}
}