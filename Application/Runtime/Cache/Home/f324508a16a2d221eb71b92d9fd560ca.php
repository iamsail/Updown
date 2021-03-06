<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>文件上传</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" media="screen" href="Application/Home/Common/css/style.css">
</head>
<body>

<!-- count particles -->
<div class="count-particles">
  <span class="js-count-particles">--</span> particles
</div>

<!-- particles.js container -->
<div id="particles-js" >
  <section  class="sail">
    <!--<h3>此处上传文件orz</h3>-->
    <form action="/updown/Home/Index/upload" method="post" enctype="multipart/form-data">
      <!--<img src="Application/Home/Common/img/exam-2017.png" alt="" >-->
      <a  class="common_button choose"  href=""><input type="file"name="photo"  />上传</a>
      <input type="submit" class="common_button submit" id="submit" value="提交"> <br>
      <!--<input type="submit" class="common_button submit" id="submit" value="提交"> <br>-->
    </form>
    <!--<a href="Home/Index/download" id="download" class="common_button">下载文件</a>-->
    <a href="Home/Index/download" id="download" class="common_button">下载文件</a>
    <?php if(null != $_SESSION['name'] ): ?><li><a href="#" class="common_button info_name"><?php echo $_SESSION['name'] ?></a></li>
      <li><a href="#" class="common_button info_id"><?php echo $_SESSION['usrid'] ?></a></li>
      <li><a href="Home/Index/logout" class="common_button logout">注销</a></li>
      <?php else: ?>
      <a href="http://f.yiban.cn/iapp94779" id="login" class="common_button">登录</a>
      <!--<li><a href="Home/Index/register" ><i>注册</i></a></li>--><?php endif; ?>
  </section>
</div>

<!-- scripts -->
<script src="Application/Home/Common/particles.min.js"></script>
<script src="Application/Home/Common/js/app.js"></script>

<!-- stats.js -->
<script src="Application/Home/Common/js/lib/stats.js"></script>
<script>
  var download = document.getElementById("download");
  var login = document.getElementById("login");
  var submit = document.getElementById("submit");
  var text = document.getElementById("login").innerHTML;
  download.onclick = function (){
    if(text ==="登录"){
      alert('请先登录');
      return false;
    }
  }
  submit.onclick = function (){
    if(text ==="登录"){
      alert('请先登录');
      return false;
    }
  }
  //        alert(text); history.go(-1);
</script>
<script>
  var count_particles, stats, update;
//  stats = new Stats;
//  stats.setMode(0);
//  stats.domElement.style.position = 'absolute';
//  stats.domElement.style.left = '0px';
//  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script>

</body>
</html>