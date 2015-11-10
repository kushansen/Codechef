<?php

require_once 'model/ContactsService.php';

class ContactsController {
    
    private $contactsService = NULL;
    
    public function __construct() {
        $this->contactsService = new ContactsService();
    }
    
    public function redirect($location) {
        header('Location: '.$location);
    }
    
    public function handleRequest() {
        $op = isset($_GET['op'])?$_GET['op']:NULL;
        try {
            if ( !$op ) {
                  $this->goHome();
            }
            elseif ( $op == 'list' ) {
                $this->listContacts();
            } 
            elseif ( $op == 'new' ) {
                $this->saveContact();
            } 
            elseif ( $op == 'show' ) {
                $this->showContact();
            } 
            elseif ( $op == 'out' ) {
                $this->logOut();
            }
            elseif ( $op == 'in' ) {
                $this->loggedIn();
            }
             elseif ( $op == 'edit' ) {
                $this->editContact();
            }
             elseif ( $op == 'search' ) {
                $this->searchContact();
            }
            elseif ( $op == 'lf' ) {
                $this->showError("Invalid login credentials", "Invalid Email and Password Combination.");
            }
            elseif ( $op == 'rs' ) {
                $this->showSuccess("Registration successful.", "Login with registered email and password.");
            }
            elseif ( $op == 'rf' ) {
                $this->showError("Registration failed", "Service Not Available. Try again later.");
            }
             elseif ( $op == 'es' ) {
                $this->showSuccess("Details updated successfully.", "Details updated successfully.");
            }
            elseif ( $op == 'ef' ) {
                $this->showError("Details could not be updated.", "Service Not Available. Try again later.");
            }
            elseif ( $op == 'cf' ) {
                $this->showError("Catastrophic failure.", "System is down. Try again later.");
            }
            else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } catch ( Exception $e ) {
            $this->showError("Application error", $e->getMessage());
        }
    }
    
    public function searchContact() {
    	  $email = '';
        $name = '';
        $phone = '';
        $errors = array();
        
        if ( isset($_POST['form-submitted']) ) {
            
            $email   = isset($_POST['email'])?   $_POST['email'] :"";
            $name    = isset($_POST['name'])? $_POST['name']:"";
            $phone    = isset($_POST['phone'])? $_POST['phone']:"";
            
            try {
            	  $name = str_replace(' ', '%20', $name);
                $contacts = $this->contactsService->searchContacts(strtolower($name),$phone,$email);
                if(sizeOf($contacts)>0)
                {
                	$this->showResults($contacts);
                }
                else{
                	$this->showNoResults($contacts);
                }
                return;
            } catch (Exception $e) {
                $this->redirect('index.php?op=cf');
            }
        }
       
        session_start();
        if(!isset($_SESSION['name']))
        {
               $this->redirect("index.php");
        }
        else
        {
    	  $name=$_SESSION['name'];
        $phone=$_SESSION['phone'];
        $address=$_SESSION['address'];
        $email=$_SESSION['email'];
        $id=$_SESSION['id'];
        $password=$_SESSION['password'];
    	  include 'view/search.php';
    	  }
    	
    }
    
    public function showResults($contacts) {
       	session_start();
       	if(!isset($_SESSION['name']))
        {
               $this->redirect("index.php");
        }
       	$name=$_SESSION['name'];
        $phone=$_SESSION['phone'];
        $address=$_SESSION['address'];
        $email=$_SESSION['email'];
        $id=$_SESSION['id'];
        $password=$_SESSION['password'];
        $title = "Search Results";
        include 'view/view.php';
    }
    
    public function showNoResults($contacts) {
    	  session_start();
    	  if(!isset($_SESSION['name']))
        {
              $this->redirect("index.php");
        }
    	  $name=$_SESSION['name'];
        $phone=$_SESSION['phone'];
        $address=$_SESSION['address'];
        $email=$_SESSION['email'];
        $id=$_SESSION['id'];
        $password=$_SESSION['password'];
        $title = "No Results Found";
        include 'view/view.php';
    }
    
     public function goHome() {
        session_start();
    	  if(isset($_SESSION['name']))
       	{
                $this->loggedIn();
       	}
       	else
       	{
        $email = '';
        $password = '';
        $errors = array();
        
        if ( isset($_POST['form-submitted']) ) {
            
            $email      = isset($_POST['email'])?   $_POST['email'] :NULL;
            $password    = isset($_POST['password'])? $_POST['password']:NULL;
            
            try {
                $contact = $this->contactsService->login($email,$password);
                if(sizeOf($contact)>0)
                {
                	if(!isset($_SESSION)) 
                	session_start();
                	$_SESSION['email']=$contact['email'];
                	$_SESSION['name']=$contact['name'];
                	$_SESSION['phone']=$contact['phone'];
                	$_SESSION['address']=$contact['address'];
                	$_SESSION['id']=$contact['id'];
                  $_SESSION['password']=$contact['password'];
                	$this->loggedIn();
                }
                else{
                	$this->redirect('index.php?op=lf');
                }
                return;
            } catch (Exception $e) {
									$this->redirect('index.php?op=cf');
            }
        }       
        include 'view/main.php';
      }  
       
    }
    
    public function logOut(){
    	session_start();
    	if(isset($_SESSION['email']))
       {
          unset($_SESSION['email']);
          unset($_SESSION['name']);
          unset($_SESSION['phone']);
          unset($_SESSION['address']);
          unset($_SESSION['id']);
          unset($_SESSION['password']);
          session_destroy();
          
       }
    	$this->redirect("index.php");      
    }
    
    public function loggedIn(){
        
        if(!isset($_SESSION)) 
    		{  session_start();
    			 
    			   if(!isset($_SESSION['name']))
       			 {
                $this->redirect('index.php');
       			 }
    		}
        $name=$_SESSION['name'];
        $phone=$_SESSION['phone'];
        $address=$_SESSION['address'];
        $email=$_SESSION['email'];
        $id=$_SESSION['id'];
        $password=$_SESSION['password'];
    	  include 'view/home.php';
    }
    
    public function listContacts() {
    		session_start();
    		if(!isset($_SESSION['name']))
       	{
                $this->redirect('index.php');
       	}
       	else
       	{
    		$name=$_SESSION['name'];
        $phone=$_SESSION['phone'];
        $address=$_SESSION['address'];
        $email=$_SESSION['email'];
        $id=$_SESSION['id'];
        $password=$_SESSION['password'];

        include 'view/all.php';
      	}
    }
    
    public function saveContact() {
    	  session_start();
    	  if(isset($_SESSION['name']))
       	{
                $this->loggedIn();
       	}
       	else
       	{
       		include 'view/register.php';
       	}
        $name = '';
        $phone = '';
        $email = '';
        $address = '';
        $password = '';
        $errors = array();
        
        if ( isset($_POST['form-submitted']) ) {
            
            $name       = isset($_POST['name']) ?   $_POST['name']  :NULL;
            $phone      = isset($_POST['phone'])?   $_POST['phone'] :NULL;
            $email      = isset($_POST['email'])?   $_POST['email'] :NULL;
            $address    = isset($_POST['address'])? $_POST['address']:NULL;
            $password    = isset($_POST['password'])? $_POST['password']:NULL;
            
            try {
                $contact =$this->contactsService->createNewContact($name, $phone, $email, $address,$password);
                if(sizeOf($contact)>0)
                {
                	$this->redirect('index.php?op=rs');
                }
                else{
                	$this->redirect('index.php?op=rf');
                }
                return;
            } catch (Exception $e) {
                $this->redirect('index.php?op=cf');
            }
        }
        
        
    }
    
    public function showError($title, $message) {
        include 'view/error.php';
    }
    
    public function showSuccess($title, $message) {
        include 'view/success.php';
    }
    
    
    public function editContact() {
    	  $email = '';
        $name = '';
        $phone = '';
        $address = '';
        $id = '';
        $password = '';
        $errors = array();
        
        if ( isset($_POST['form-submitted']) ) {
            
            $email      = isset($_POST['email'])?   $_POST['email'] :"";
            $name    = isset($_POST['name'])? $_POST['name']:"";
            $phone    = isset($_POST['phone'])? $_POST['phone']:"";
            $password    = isset($_POST['password'])? $_POST['password']:"";
            $address    = isset($_POST['address'])? $_POST['address']:"";
            $id    = isset($_POST['id'])? $_POST['id']:"";
            
            try {
                $contact = $this->contactsService->updateContact($id, $name, $phone, $email, $address, $password);
                if(sizeOf($contact)>0)
                {
                	session_start();                	
                  session_unset();
                	$_SESSION['email']=$contact['email'];
                	$_SESSION['name']=$contact['name'];
                	$_SESSION['phone']=$contact['phone'];
                	$_SESSION['address']=$contact['address'];
                	$_SESSION['id']=$contact['id'];
                	$_SESSION['password']=$contact['password'];
                	
                	$this->redirect('index.php?op=es');
                }
                else{
                	$this->redirect('index.php?op=ef');
                }
                return;
            } catch (Exception $e) {
                $this->redirect('index.php?op=cf');
            }
        }
        
        session_start();
        if(!isset($_SESSION['name']))
       	{
                $this->redirect('index.php');
       	}
       	else{
        $name=$_SESSION['name'];
        $phone=$_SESSION['phone'];
        $address=$_SESSION['address'];
        $email=$_SESSION['email'];
        $id=$_SESSION['id'];
        $password=$_SESSION['password'];
    	  include 'view/edit.php';
    	}
    	
    }
    
}
?>
