<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Yellow Pages</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
<script>
function validateForm() {
    var email = document.forms["login"]["email"].value;
    var password = document.forms["login"]["password"].value;
    if (email == null || email == "") {
        alert("Email must be filled out");
        return false;
    }
     if (!validateEmail(email)) {
        alert("Email format incorrect");
        return false;
    }
     if (password == null || password == "") {
        alert("Password must be filled out");
        return false;
    }
    if (password.length<6) {
        alert("Password must be atleast 6 characters long");
        return false;
    }
   
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
</script>
<div id="wrap">

<div id="header">
<h1><a href="index.php">Online Yellow Pages</a></h1>
<h2>Contact any one, any where, any how</h2>
</div>

<div id="menu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="index.php?op=new">Register</a></li>
</ul>
</div>

<div id="content">
<div class="left"> 
<h2 style="color:#336699;">Login</h2>
<form action = "" method = "POST" name="login" onsubmit="return validateForm()"/>
<table>
<tr>
<td><h2>Email:</h2></td>
<td><input type = "text" name = "email"  /></td>
</tr>
<tr>
<td><h2>Password:&nbsp;</h2></td>
<td><input type = "password" name = "password" /></td>
</tr>
<tr>
<td><input type="submit" name="Submit" value="Login" style="width:100px;height:25px;background-color:#336699;color:white;"/></td>
</tr>
</table>
<input type="hidden" name="form-submitted" value="1" />
</form>
<br/>
<a href="index.php?op=new">Not Registered Yet?</a>
<br/>
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Foyp15&send=false&layout=button_count&width=450&show_faces=false&action=like&colorscheme=light&font&height=21" scrolling="no" frameborder="0" style="border:none;overflow:hidden;width:450px;height:21px;" allowTransparency="true"></iframe>
</div>
</div>
</body>
</html>



