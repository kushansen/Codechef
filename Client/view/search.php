<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Yellow Pages</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<script>
function validateForm() {
var email = document.getElementById("email").value;
var fname = document.getElementById("name").value;
var phone = document.getElementById("phone").value;

fname = fname.trim();
phone = phone.trim();
email = email.trim();

document.getElementById("name").value = fname;
document.getElementById("email").value = email;
document.getElementById("phone").value = phone;
}
</script>
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
<h2 style="color:#336699;">Search a Contact</h2>
<form action = "" method = "POST"  name = "search"  onsubmit="return validateForm()"/>
<table>
<tr>
<td><h2>Name:</h2></td>
<td><input type = "text" name = "name" id="name" /></td>
</tr>
<tr>
<td><h2>Email:</h2></td>
<td><input type = "text" name = "email" id="email" /></td>
</tr>
</tr>
<tr>
<td><h2>Phone</h2></td>
<td><input type = "text" name = "phone" id="phone" /></td>
</tr>
<tr>
<td><input type="submit" name="Submit" value="Search" style="width:100px;height:25px;background-color:#336699;color:white;"/></td>
</tr>
</table>
<input type="hidden" name="form-submitted" value="1" />
</form>
</div>
</div>
</body>
</html>
