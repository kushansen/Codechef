<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Yellow Pages</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
<div id="wrap">

<div id="header">
<h1><a href="index.php">Online Yellow Pages</a></h1>
<h2>Contact any one, any where, any how</h2>
</div>

<div id="menu">
<ul>
<li><a href="index.php">Home</a></li>
</ul>
</div>

<div id="content">
<div class="left"> 
<h2 style="color:green;"><?php print htmlentities($title) ?></h2>
<p>
<?php print htmlentities($message) ?>
</p>
<p>
	<br/>
Redirecting to home page......
</p>
<?php header( "refresh:2;url=index.php" ); ?>
</div>
</div>
</body>
</html>



