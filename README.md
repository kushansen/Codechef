# Codechef
Codechef

System implemented is ONLINE YELLOW PAGES.
One can search for contact details of any other individual.
One must register first in order to use the system.
Then, login to use system functionalities.

Functionalities include:
1) Register.
2) Login.
1) Edit own contact details.
2) See the whole contact details.
3) Search contact db based on his contact knowledge.

RC is the PHP REST Server project. It includes Model and Controller. No Views used as it is the RESTful web service.
It connects to mySQL database with persistence.

Client is the PHP REST Client project. It includes web pages, client controllers and REST client with handlebars templating.

RESTful web services have been tested on Advanced REST Client of Chrome.

Client pages have been made considering Chrome into consideration.

Templating with jQuery and AJAX has been used to view All Contacts. Handlebars has been used for templating.

Breaking of CSS has been checked on IE. The break was bare minimum.

Facebook integration with website has been done using iframe.
I created a page for my app on facebook. I have added the 'like' functionality to my facebook page on my web app.

Few extra REST Service endpoints that have been provided have also been tested on Advanced REST Client of Chrome.

Database creation and loading script is provided as contacts.sql.

Out of all requirements asked, everything is covered in my point of view.

MVC architecture [DONE]
DB persistence [DONE] - mysqli_connect("p:localhost...) for persistent connections.
Sessions [DONE]
REST API (++) [DONE]
Templating [DONE] - Handlebars has been used to template view all contacts page.
HTML/CSS [DONE]
Some Javascript [DONE] - Form validations have been done using javascript. jQuery and AJAX for viewing all contacts.
Integrate Facebook/Twitter/Openid. (for some bonus points) [DONE] - Facebook page like button.

It would be a plus if you could implement this using REST API so that if required you can create an APP for other platforms(Android etc.)
[JAVA RESTClient.java HAS BEEN MADE TO DEMONSTRATE THIS FUNCTIONALITY.]

Tools Used:
WAMPServer 2.4 (WINDOWS + PHP + MYSQL + APACHE HTTP SERVER)

Special PHP extensions to be enabled :
php_curl,
php_mysqli
