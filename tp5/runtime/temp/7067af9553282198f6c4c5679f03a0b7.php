<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"D:\www\18_News\Day_06\code\tp5\public/../application/admin\view\comment\index.html";i:1530171505;s:70:"D:\www\18_News\Day_06\code\tp5\application\admin\view\public\base.html";i:1529551765;s:72:"D:\www\18_News\Day_06\code\tp5\application\admin\view\public\topnav.html";i:1529568368;s:73:"D:\www\18_News\Day_06\code\tp5\application\admin\view\public\leftnav.html";i:1530153683;}*/ ?>
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
            
<h2 class="page-header">评论列表</h2>

<div id="searchForm" class="form-inline">
    <input type="text" name="content" value="<?php echo input('param.content'); ?>" class="form-control" placeholder="评论内容">
    <input type="text" name="comment_type" value="<?php echo input('param.comment_type'); ?>" class="form-control" placeholder="评论类型">

    <button class="btn btn-primary" id="doSearch"><span class="glyphicon glyphicon-search"></span></button>
</div>

<div class="row table-responsive">
	<table class="table table-condensed table-hover table-bordered table-striped">
		<tr>
			<th>ID</th>
			<th>作者</th>
			<th>评论内容</th>
			<th>评论主体</th>
			<th>评论类型</th>
			<th>创建时间</th>
			<th>操作菜单</th>
		</tr>
		<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<tr>
			<td><?php echo $vo['id']; ?></td>
			<td><?php echo $vo->author->username; ?></td>
			<td><?php echo $vo['content']; ?></td>
			<td><?php echo $vo['comment_id']; ?></td>
			<td><?php echo $vo['comment_type']; ?></td>
			<td><?php echo $vo['created']; ?></td>
			<td>
				<a href="<?php echo url('admin/comment/delete',['id'=>$vo['id']]); ?>" class="btn btn-danger" onclick="return confirm('是否确认删除');">删除</a>
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
		var query = $('#searchForm').find("input").serialize();

		// $("#comment_type").val();

		var args = query.split("&");
		// console.log(args);
		var target = "";
		for (var i=0; i<args.length; i++) {
			var arg = args[i].split("=");
			if (arg[1] != "") {
				target += "/"+arg[0]+"/"+arg[1];
			}
		}
		// console.log(target);

		location.href = "<?php echo url('admin/comment/index'); ?>".replace(".html","")+target;


		// console.log(query.replace("=","/"));
		// console.log(query.replace(/=|&/g,"/"));

		// content/2/comment_type/e
		// var args = query.replace(/=|&/g,"/");

		// admin/comment/index.html
		// admin/comment/index/content/2/....
        // var path = "<?php echo url('admin/comment/index'); ?>".replace(".html","");
        // console.log(path+"/"+args);
		// 将当前加上查询参数,然后执行跳转
		// console.log(location.pathname+"?"+query);
		// admin/news/index.html?title=体育
		// location.href = path+"/"+args;
	});
</script>

  </body>
</html>