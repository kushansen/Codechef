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
var email = document.getElementById("email").value;
var password = document.getElementById("password").value;
var repassword = document.getElementById("repassword").value;
var fname = document.getElementById("name").value;
var phone = document.getElementById("phone").value;
var address = document.getElementById("address").value;

fname = fname.trim();
address = address.trim();
document.getElementById("name").value = fname;
document.getElementById("address").value = address;



    if (fname == null || fname == "") {
        alert("Name must be filled out");
        return false;
    } 
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
      if (password.indexOf(' ')> -1) {
        alert("Password should not have blank spaces");
        return false;
    }
     if (password != repassword) {
        alert("Passwords do not match");
        return false;
    }
    if (password.length<6) {
        alert("Password must be atleast 6 characters long");
        return false;
    }
    if(phone == null || phone == "") {
        alert("Phone must be filled out");
        return false;
     }
    if (!validatePhone(phone)) {
        alert("Phone must have 10 digits");
        return false;
    }
    if (address == null || address == "") {
        alert("Address must be filled out");
        return false;
    }
    
    //alert("Logging Out for the change to reflect.\nPlease login again.\nUse new email and password if in case you have changed them.");
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function validatePhone(phone)
{
  var phoneno = /^\d{10}$/;
  if(phone.match(phoneno))
      return true;
  else
  	return false;
}

</script>
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
<li style="float:right;color:black;"><b>Hi <?php echo $name;?>!!</b>!!</li>
</ul>
</div>

<div id="content">
<div class="left"> 
<h2 style="color:#336699;">Edit Details</h2>
<form action = "" name = "edit"  onsubmit="return validateForm()" method = "POST"/>
<table>
<tr>
<td><h2>Name:</h2></td>
<td><input type = "text" name = "name" id = "name" value="<?php echo $name;?>" /></td>
</tr>
<tr>
<td><h2>Email:</h2></td>
<td><input type = "text" name = "email" id = "email" value="<?php echo $email;?>" /></td>
</tr>
<tr>
<td><h2>Password:&nbsp;</h2></td>
<td><input type = "password" name = "password" id = "password" value="<?php echo $password;?>" /></td>
</tr>
<tr>
<td><h2>Re-type Password:&nbsp;</h2></td>
<td><input type = "password" name = "repassword" id = "repassword" value="<?php echo $password;?>" /></td>
</tr>
<tr>
<td><h2>Phone</h2></td>
<td><input type = "text" name = "phone" id = "phone" value="<?php echo $phone;?>" /></td>
</tr>
<tr>
<td><h2>Address:&nbsp;</h2></td>
<td><textarea name="address" id = "address"><?php echo $address;?></textarea></td>
</tr>
<tr>
<td><input type="submit" name="Submit" value="Update" style="width:100px;height:25px;background-color:#336699;color:white;"/></td>
</tr>
</table>
<input type="hidden" name="form-submitted" value="1" />
<input type="hidden" name="id" value="<?php echo $id;?>" />
</form>
</div>
</div>
</body>
</html>
