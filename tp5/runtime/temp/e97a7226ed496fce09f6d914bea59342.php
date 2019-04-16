<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"D:\www\18_News\Day_06\code\tp5\public/../application/admin\view\user\index.html";i:1529976615;s:70:"D:\www\18_News\Day_06\code\tp5\application\admin\view\public\base.html";i:1529551765;s:72:"D:\www\18_News\Day_06\code\tp5\application\admin\view\public\topnav.html";i:1529568368;s:73:"D:\www\18_News\Day_06\code\tp5\application\admin\view\public\leftnav.html";i:1530153683;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>模板</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="/18_News/Day_06/code/tp5/public/static/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/18_News/Day_06/code/tp5/public/static/css/dashboard.css" />
    
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">新闻视界管理后台</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">控制面板</a></li>
        <li><a href="#">Help</a></li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span>
              <span class="caret"></span>
            </a>
            <!-- 下拉菜单的内容 -->
            <ul class="dropdown-menu">
              <?php if(session('?admin')): ?>
              <li><a href="#"><?php echo session('admin.username'); ?></a></li>
              <li><a href="<?php echo url('admin/user/logout'); ?>">退出</a></li>
              <?php endif; ?>
            </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" style="padding: 0;">
            <div class="panel-group" id="group">

  <div class="panel <?php if(\think\Request::instance()->controller() == 'Blog'): ?>panel-success<?php else: ?>panel-default<?php endif; ?>">
    <div class="panel-heading">
      <a href="#blog" data-toggle="collapse" data-parent="#group">
        <h4 class="panel-title">博客管理</h4>
      </a>
    </div>
    <div class="collapse <?php if(\think\Request::instance()->controller() == 'Blog'): ?>in<?php endif; ?> panel-collapse" id="blog">
      <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item">
            <a href="<?php echo url('admin/blog/index'); ?>">博客列表</a>
          </li>
          <li class="list-group-item">
            <a href="<?php echo url('admin/blog/add'); ?>">添加博客</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="panel <?php if(\think\Request::instance()->controller() == 'Category'): ?>panel-success<?php else: ?>panel-default<?php endif; ?>">
    <div class="panel-heading">
      <a href="#category" data-toggle="collapse" data-parent="#group">
      <h4 class="panel-title">分类管理</h4>
      </a>
    </div>
    <div class="collapse <?php if(\think\Request::instance()->controller() == 'Category'): ?>in<?php endif; ?> panel-collapse" id="category">
      <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item">
            <a href="<?php echo url('admin/category/index'); ?>">分类列表</a>
          </li>
          <li class="list-group-item">
            <a href="<?php echo url('admin/category/add'); ?>">添加分类</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="panel <?php if(\think\Request::instance()->controller() == 'News'): ?>panel-success<?php else: ?>panel-default<?php endif; ?>">
    <div class="panel-heading">
      <a href="#news" data-toggle="collapse" data-parent="#group">
      <h4 class="panel-title">新闻管理</h4>
      </a>
    </div>
    <div class="collapse <?php if(\think\Request::instance()->controller() == 'News'): ?>in<?php endif; ?> panel-collapse" id="news">
      <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item">
            <a href="<?php echo url('admin/news/index'); ?>">新闻列表</a>
          </li>
          <li class="list-group-item">
            <a href="<?php echo url('admin/news/add'); ?>">添加新闻</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="panel <?php if(\think\Request::instance()->controller() == 'User'): ?>panel-success<?php else: ?>panel-default<?php endif; ?>">
    <div class="panel-heading">
      <a href="#user" data-toggle="collapse" data-parent="#group">
      <h4 class="panel-title">用户管理</h4>
      </a>
    </div>
    <div class="collapse <?php if(\think\Request::instance()->controller() == 'User'): ?>in<?php endif; ?> panel-collapse" id="user">
      <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item">
            <a href="<?php echo url('admin/user/index'); ?>">用户列表</a>
          </li>
          <li class="list-group-item">
            <a href="<?php echo url('admin/user/add'); ?>">添加管理员</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="panel <?php if(\think\Request::instance()->controller() == 'Comment'): ?>panel-success<?php else: ?>panel-default<?php endif; ?>">
    <div class="panel-heading">
      <a href="#comment" data-toggle="collapse" data-parent="#group">
      <h4 class="panel-title">评论管理</h4>
      </a>
    </div>
    <div class="collapse <?php if(\think\Request::instance()->controller() == 'Comment'): ?>in<?php endif; ?> panel-collapse" id="comment">
      <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item">
            <a href="<?php echo url('admin/comment/index'); ?>">评论列表</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            
<div class="row">
<h2 class="page-header">用户列表</h2>

<form action="#" id="searchForm" class="form-inline">
    <input type="text" name="username" value="<?php echo \think\Request::instance()->get('username')?\think\Request::instance()->get('username') : ''; ?>" class="form-control" placeholder="用户名">
    <input type="text" name="phone" value="<?php echo \think\Request::instance()->get('phone')?\think\Request::instance()->get('phone') : ''; ?>" class="form-control" placeholder="手机号">
    <input type="text" name="email" value="<?php echo \think\Request::instance()->get('email')?\think\Request::instance()->get('email') : ''; ?>" class="form-control" placeholder="邮箱">
    <button class="btn btn-primary" id="doSearch"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div>

<div class="row table-responsive">
	<table class="table table-condensed table-hover table-bordered table-striped">
		<tr>
			<th>ID</th>
			<th>用户名</th>
			<th>邮箱</th>
			<th>手机号</th>
			<th>余额</th>
			<th>创建时间</th>
			<th>操作菜单</th>
		</tr>
		<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<tr>
			<td><?php echo $vo['id']; ?></td>
			<td><?php echo $vo['username']; ?></td>
			<td><?php echo $vo['email']; ?></td>
			<td><?php echo $vo['phone']; ?></td>
			<td><?php echo $vo['balance']; ?></td>
			<td><?php echo $vo['created']; ?></td>
			<td>
				<a href="#" class="btn btn-success" target="_blank">查看</a>
				<a href="#" class="btn btn-primary">编辑</a>
				<a href="#" class="btn btn-danger">删除</a>
			</td>
		</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		
	</table>
	<?php echo $list->render(); ?>
</div>

        </div>
      </div>
    </div>

    <script type="text/javascript" src="/18_News/Day_06/code/tp5/public/static/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="/18_News/Day_06/code/tp5/public/static/bootstrap/js/bootstrap.js"></script>
    
<script type="text/javascript">
	$('#doSearch').click(function(){
		var query = $('#searchForm').serialize();
		console.log(query);
		location.href = location.pathname+'?'+query;
	});

</script>

  </body>
</html>