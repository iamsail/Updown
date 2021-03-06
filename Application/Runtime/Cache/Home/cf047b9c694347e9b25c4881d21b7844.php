<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件下载</title>
    <link rel="stylesheet" type="text/css" href="/updown/Application/Home/Common/down.css">
    <!------------ other -------------->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/updown/Application/Home/Common/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/updown/Application/Home/Common/css/default.css">
    <!------------ other -------------->
    <style type="text/css">
        #gallery-wrapper {
            position: relative;
            max-width: 75%;
            width: 75%;
            margin:50px auto;
        }
        img.thumb {
            width: 100%;
            max-width: 100%;
            height: auto;
        }

       .thumb {
            width: 100%;
            max-width: 100%;
            height: auto;
        }
        .white-panel {
            position: absolute;
            background: white;
            border-radius: 5px;
            box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
            padding: 10px;
        }
        .white-panel h1 {
            font-size: 1em;
        }
        .white-panel h1 a {
            color: #A92733;
        }
        .white-panel:hover {
            box-shadow: 1px 1px 10px rgba(0,0,0,0.5);
            margin-top: -5px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body>
<!--考虑文件名和文件保存名-->
    <h3>下载文件</h3>
<section id="gallery-wrapper">
    <?php if(is_array($textinfo)): $k = 0; $__LIST__ = array_slice($textinfo,0,null,true);if( count($__LIST__)==0 ) : echo "没有文件可下载" ;else: foreach($__LIST__ as $key=>$water): $mod = ($k % 2 );++$k;?><article class="white-panel">
                <!--<img src="/updown/Application/Home/Common/img/<?php echo ($k%16); ?>.jpg" class="thumb">-->
                <!--<img src="/updown/Application/Home/Common/img/<?php echo ($k%16); ?>.jpg" class="thumb">-->
                <embed src="/updown/Application/Home/Common/img/<?php echo ($k%16); ?>.svg"  type="image/svg+xml"  class="thumb"/>
                <!--<img src="/updown/Application/Home/Common/img/1.jpg" class="thumb">-->
                <h1><a href="#">文件名:<?php echo ($water["name"]); ?></a></h1>
                <p><a href="/updown/Application/Common/Common/Uploads/<?php echo ($water["path"]); echo ($water["savename"]); ?>" id="down">下载</a></p>
            </article><?php endforeach; endif; else: echo "没有文件可下载" ;endif; ?>
</section>

<script src="http://libs.useso.com/js/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="/updown/Application/Home/Common/js/jquery-1.11.0.min.js"><\/script>')</script>
<script src="/updown/Application/Home/Common/js/pinterest_grid.js"></script>
<script type="text/javascript">
    $(function(){
        $("#gallery-wrapper").pinterest_grid({
            no_columns: 4,
            padding_x: 10,
            padding_y: 10,
            margin_bottom: 50,
            single_column_breakpoint: 700
        });
    });
</script>

</body>
</html>