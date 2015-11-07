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
<h1><a href="#">Online Yellow Pages</a></h1>
<h2>Contact any one, any where, any how</h2>
</div>

<div id="menu">
<ul>
<li><a href="index.php?op=in">Home</a></li>
<li><a href="index.php?op=search">Search a Contact</a></li>
<li><a href="index.php?op=list">View All Contacts</a></li>
<li><a href="index.php?op=out">Logout</a></li>
<li style="float:right;color:black;"><b>Hi <?php echo $name;?>!!</b></li>
</ul>
</div>

<div id="content">
<div class="left"> 
<h2 style="color:#336699;">Hi <?php echo $name;?>!!</h2>
Address:&nbsp;<?php echo $address;?><br/>
Email:&nbsp;<?php echo $email;?><br/>
Phone:&nbsp;<?php echo $phone;?><br/>
<a href="index.php?op=edit">Edit Details</a>
</div>
</div>
</body>
</html>

