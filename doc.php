<?php
$host = 'http://' . $_SERVER['HTTP_HOST'];
if ($_SERVER['SERVER_PORT'] != 80) {
  $host .= ':' . $_SERVER['SERVER_PORT'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>placehold</title>
  <style>
  *{margin:0;padding:0}
  header{margin-bottom:20px;padding:62px;background-color:#f4645f;color:#fff;text-align:center}
  header h1{font-size:3em}
  h2{font-size:1.7em;line-height:2}
  article{overflow:hidden;margin:auto;margin-bottom:20px;width:980px}
  footer{padding:40px 0 20px 0;background-color:#111;color:#666;text-align:center;font-size:12px}
  .info{float:left;width:470px;height:415px;overflow:auto}
  .case{float:right;width:490px;font-size:0}
  .demo{margin:1em 0;padding:1.3em 1em;border:1px dotted #aaa;line-height:1.2}
  a{color:#428bca;text-decoration:none}
  a:focus,a:hover{color:#2a6496;text-decoration:underline}
  a:focus{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}
  </style>
</head>
<body>
<header>
  <h1>Welcome to PLACEHOLD!</h1>
  <h2>A quick and simple image placeholder service.</h3>
</header>

<article>
  <div class="info">
    <p>How does it work? Just put your image size after our URL and you'll get a placeholder.</p>
    <div class="demo">
      Like this: <a href="<?= $host ?>/490x160" target="_blank"><?= $host ?>/490x160</a>
    </div>

    <p>You can also use it in your code, like this:</p>
    <div class="demo">
      &lt;img src="<?= $host ?>/490x160"&gt;
    </div>

    <p>You can also set the color as well as the text:</p>
    <div class="demo">
      bgcolor: <a href="<?= $host ?>/300/ddd" target="_blank"><?= $host ?>/300/ddd</a>
      <br>
      color: <a href="<?= $host ?>/300/ddd/fff" target="_blank"><?= $host ?>/300/ddd/fff</a>
      <br>
      text: <a href="<?= $host ?>/300/ddd/fff?text=hello world" target="_blank"><?= $host ?>/300/ddd/fff?text=hello world</a>
    </div>

    <p>The following are all supported formats:</p>
    <pre class="demo">
    <a href="/1" target="_blank">/1</a>
    <a href="/100" target="_blank">/100</a>
    <a href="/200x200" target="_blank">/200x200</a>
    <a href="/800x320" target="_blank">/800x320</a>

    <a href="/111/aaa" target="_blank">/111/aaa</a>
    <a href="/222/aaa/FFF" target="_blank">/222/aaa/FFF</a>
    <a href="/333/a1a1a1/b2b2b2" target="_blank">/333/a1a1a1/b2b2b2</a>

    <a href="/111x222/333" target="_blank">/111x222/333</a>
    <a href="/111x222/aaa/BBB" target="_blank">/111x222/aaa/BBB</a>
    <a href="/111x222/a1a1a1/b2b2b2" target="_blank">/111x222/a1a1a1/b2b2b2</a>

    <a href="/200.jpg" target="_blank">/200.jpg</a>
    <a href="/200/aaa.gif" target="_blank">/200/aaa.gif</a>
    <a href="/200/aaa/bbb.png" target="_blank">/200/aaa/bbb.png</a>
    <a href="/200x200.jpg" target="_blank">/200x200.jpg</a>
    <a href="/200x200/aaa.gif" target="_blank">/200x200/aaa.gif</a>
    <a href="/200x200/aaa/bbb.png" target="_blank">/200x200/aaa/bbb.png</a>

    <a href="/200?text=hello%20world" target="_blank">/200?text=hello%20world</a>
    <a href="/200/aaa?text=hello%20world" target="_blank">/200/aaa?text=hello%20world</a>
    <a href="/200/aaa/bbb?text=hello%20world" target="_blank">/200/aaa/bbb?text=hello%20world</a>
    <a href="/200/aaa/bbb.jpg?text=hello%20world" target="_blank">/200/aaa/bbb.jpg?text=hello%20world</a>
    <a href="/300x200/369/fff.png?text=你好世界" target="_blank">/300x200/369/fff.png?text=你好世界</a>
    </pre>
  </div>
  <div class="case">
    <img src="/490x160">
    <img src="/280x120/360/fff" style="margin:10px 0">
    <img src="/200x120/336699/ffcc99" style="margin:10px 0 10px 10px">
    <img src="/490x90/f4645f/fff?text=hello world">
  </div>
</article>

<footer>
  php-placehold@0.1.0 MIT
</footer>
</body>
</html>
