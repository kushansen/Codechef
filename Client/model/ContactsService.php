<?php

class ContactsService {
   
    public function getAllContacts() {
     $url =  "http://localhost/RC/contacts";
     $client = curl_init($url);
     curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
     $response = curl_exec($client); 
     $result = json_decode($response);
     curl_close($client);
     return $result;
    }
    
     public function searchContacts($name,$phone,$email) {
     $url =  "http://localhost/RC/search?name=$name&phone=$phone&email=$email";
     $client = curl_init($url);
     curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
     $response = curl_exec($client); 
     $result = json_decode($response);
     curl_close($client);
     return $result;
    }
    
    public function getContact($id) {
     $url =  "http://localhost/RC/contact?id=$id";
     $client = curl_init($url);
     curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
     $response = curl_exec($client); 
     $result = json_decode($response,true);
     curl_close($client);
     if(is_array($result))
     	return reset($result);
     else
     	return null;
      
    }
    
    public function login($email,$password) {
     $url =  "http://localhost/RC/login?email=$email&password=$password";
     $client = curl_init($url);
     curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
     $response = curl_exec($client); 
     $result = json_decode($response,true);
     curl_close($client);
     if(is_array($result))
     	return reset($result);
     else
     	return null;
    }

	  public function deleteContact($id) {
     $url =  "http://localhost/RC/deleteContact?id=$id";
     $client = curl_init($url);
     curl_setopt($client, CURLOPT_CUSTOMREQUEST, 'DELETE');
     curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
     $response = curl_exec($client); 
     $result = json_decode($response,true);
     curl_close($client);
     return $result;
    }    
   
    public function createNewContact( $name, $phone, $email, $address, $password) {
    	$arr = array('id' => 0 ,'name' => $name, 'phone' => $phone, 'email' => $email, 'address' => $address, 'password' => $password);
      $data = json_encode($arr);
      $url =  "http://localhost/RC/addContact";
      $client = curl_init($url);
      curl_setopt($client, CURLOPT_POST, 1);
			curl_setopt($client, CURLOPT_POSTFIELDS, $data);
			curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
      $response = curl_exec($client); 
      $result = json_decode($response,true);
      curl_close($client);
      return $result;
    }
    
    public function updateContact($id, $name, $phone, $email, $address, $password) {
    	$arr = array('id' => $id ,'name' => $name, 'phone' => $phone, 'email' => $email, 'address' => $address, 'password' => $password);
      $data = json_encode($arr);
      $url =  "http://localhost/RC/updateContact";
      $client = curl_init($url);
      curl_setopt($client, CURLOPT_POST, 1);
      curl_setopt($client, CURLOPT_CUSTOMREQUEST, 'PUT');
			curl_setopt($client, CURLOPT_POSTFIELDS, $data);
			curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
      $response = curl_exec($client);
      $result = json_decode($response,true); 
      curl_close($client);
      if(is_array($result))
     	return reset($result);
      else
     	return null;
    }
   
    
    
}

?>
