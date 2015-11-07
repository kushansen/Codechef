<?php
    
	require_once("Rest.inc.php");
	require_once 'model/ContactsService.php';
	
	class API extends REST {
	
		public $data = "";
		
		private $contactsService = NULL;
    
    public function __construct() {
    	parent::__construct();	
        $this->contactsService = new ContactsService();
    }
	
		
		public function processApi(){
			$func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
			if((int)method_exists($this,$func) > 0)
				$this->$func();
			else
				$this->response('',404);
		}
		
		
		private function contacts(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			 $contacts = $this->contactsService->getAllContacts();
			 if (sizeof($contacts) > 0) {
				$this->response($this->json($contacts), 200);
			 }
			 $this->response('',204);
		}
		
		private function search(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$name = $this->_request['name'];
			$phone = $this->_request['phone'];
			$email = $this->_request['email'];
			$contacts = $this->contactsService->searchContacts($name,$phone,$email);
			 if (sizeof($contacts) > 0) {
				$this->response($this->json($contacts), 200);
			 }
			 $this->response('',204);
		}
		
		private function contact(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			  $id = (int)$this->_request['id'];
			  $contact = $this->contactsService->getContact($id);
			 if (sizeof($contact) > 0) {
				$this->response($this->json($contact), 200);
			 }
			 $this->response('',204);
		}
		
		private function login(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			  $email = $this->_request['email'];
			  $password = $this->_request['password'];
			  $contact = $this->contactsService->login($email,$password);
			 if (sizeof($contact) > 0) {
				$this->response($this->json($contact), 200);
			 }
			 $this->response('',204);
		}
		
	
	private function deleteContact(){
			if($this->get_request_method() != "DELETE"){
				$this->response('',406);
			}
			  $id = (int)$this->_request['id'];
			  $contact = $this->contactsService->deleteContact($id);
			 if (sizeof($contact) > 0) {
				$this->response($this->json($contact), 200);
			 }
			 $this->response('',204);
	}
	
	private function addContact(){
		if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

			$contact = json_decode(file_get_contents("php://input"),true);
		
			if(!empty($contact)){
				 $contact = $this->contactsService->createNewContact($contact);
			   if (sizeof($contact) > 0) {
				 $this->response($this->json($contact), 200);
			   }
			   else
			  	$this->response('',204);
			}else
				$this->response('',204);
	}
	
	private function updateContact(){
			if($this->get_request_method() != "PUT"){
				$this->response('',406);
			}

			$contact = json_decode(file_get_contents("php://input"),true);
			if(!empty($contact)){
				 $contact = $this->contactsService->updateContact($contact);
			   if (sizeof($contact) > 0) {
				 $this->response($this->json($contact), 200);
			   }
			   else
			  	$this->response('',204);
			}else
				$this->response('',204);
	}
	
	private function json($data){
			if(is_array($data)){
				return json_encode($data);
			}
		}
	}
	
	$api = new API;
	$api->processApi();
?>