<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\www\18_News\Day_05\code\tp5\public/../application/admin\view\user\login.html";i:1529567221;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>新闻视界后台登录</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="/18_News/Day_05/code/tp5/public/static/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/18_News/Day_05/code/tp5/public/static/css/signin.css" />
  </head>

  <body>

    <div class="container">

      <form action="<?php echo url('admin/user/login'); ?>" method="post" class="form-signin">
        <h2 class="form-signin-heading">新闻视界后台登录</h2>
        <label class="sr-only">用户名</label>
        <input type="text" name="username" class="form-control" placeholder="用户名" required autofocus>
        <label class="sr-only">密码</label>
        <input type="password" name="password" class="form-control" placeholder="密码" required>
        <label class="sr-only">验证码</label>
        <input type="text" name="captcha" class="form-control" placeholder="验证码" required>
        <img src="<?php echo captcha_src(); ?>" id="captcha">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 记住我
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
      </form>

    </div> <!-- /container -->

    <script type="text/javascript">
      // 1. 获取验证码元素对象
      var c = document.getElementById('captcha');
      // 2. 对象触发单击事件
      c.onclick = function(){
        // 3. 设置对象的属性
        this.src = "<?php echo captcha_src(); ?>?rand="+Math.random();
      }
    </script>
  </body>
</html>