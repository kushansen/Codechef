<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Yellow Pages</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
 <style type="text/css">
            table.contacts {
                width: 100%;
            }
            
            table.contacts thead {
                background-color: #3069AE;
                text-align: left;
            }
            
            table.contacts thead th {
                border: solid 1px #fff;
                padding: 3px;
                color: white;
            }
            
            table.contacts tbody td {
                border: solid 1px #eee;
                padding: 3px;
            }
            
            a, a:hover, a:active, a:visited {
                color: blue;
                text-decoration: underline;
            }
</style>
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
<h2 style="color:#336699;">All Contacts</h2>
<table class="contacts" border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody class="tweets">
            <script id = "tweets-template" type="text/x-handlebars-template">
            {{#each this}}
                <tr>
                    <td>{{name}}</td>
                    <td>{{phone}}</td>
                    <td>{{email}}</td>
                    <td>{{address}}</td>
                </tr>
            {{/each}}
            </script>
            </tbody>
 </table>
    
</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/handlebars-1.0.0.beta.6.js"></script>
	
	
<script>
(function() {

var REST = {
init: function( config ) {
this.url = 'http://localhost/RC/contacts';
this.template = config.template;
this.container = config.container;
this.fetch();

},

attachTemplate: function() {
var template = Handlebars.compile(this.template);
this.container.append(template(this.contacts));
},

fetch: function() {
var self = this;
$.getJSON(this.url, function ( data ) {
self.contacts = $.map(data, function( contact ){
return {
name : contact.name,
email : contact.email,
phone : contact.phone,
address : contact.address
};

});

self.attachTemplate();
});

}

};

REST.init({
template: $('#tweets-template').html(),
container : $('tbody.tweets')
});

})();
</script>
</body>
</html>

