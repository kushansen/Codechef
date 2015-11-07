<?php

class ContactsGateway {
	
	 public function openDb() {
       $con = mysqli_connect("p:localhost","root","password","CM");

				if (mysqli_connect_errno())
  			{
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
 			  }
 			  
 			  return $con;
    }
    
    public function closeDb($con) {
        mysqli_close($con);
    }
    
    public function selectAll($con) {
        $dbres = mysqli_query($con,"SELECT * FROM contacts");
        
        $contacts = array();
        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $contacts[] = $obj;
        }
        
        return $contacts;
    }
    
    public function search($con,$name,$phone,$email) {
        $dbres = mysqli_query($con,"SELECT * FROM contacts where LOWER(name) like '$name"."%' and phone like '$phone"."%' and email like '$email"."%'");
        
        $contacts = array();
        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $contacts[] = $obj;
        }
        
        return $contacts;
    }
    
    public function selectById($con,$id) {
        $dbId = mysqli_real_escape_string($con,$id);
        
        $dbres = mysqli_query($con,"SELECT * FROM contacts WHERE id=$dbId");
        $contacts = array();
        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $contacts[] = $obj;
        }
        return $contacts;
		
    }
    
    public function login($con,$email,$password) {
    	  $dbEmail = mysqli_real_escape_string($con,$email);
    	  $dbPassword = mysqli_real_escape_string($con,$password);
        $dbres = mysqli_query($con,"SELECT * FROM contacts WHERE email='$dbEmail' and password='$dbPassword'");
        $contacts = array();
        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $contacts[] = $obj;
        }
        return $contacts;
		
    }
    
    public function insert($con,$contact ) {
        $name = $contact['name'];
        $phone = $contact['phone'];
        $email = $contact['email'];
        $address = $contact['address'];
        $password = $contact['password'];
        mysqli_query($con,"INSERT INTO contacts(id,name,phone,email,address,password) VALUES(default,'$name','$phone','$email','$address','$password')");
        return $this->selectById($con,mysqli_insert_id($con));
    }
    
     public function update($con,$contact) {
     	  $id = $contact['id'];
			  $name = $contact['name'];
        $phone = $contact['phone'];
        $email = $contact['email'];
        $address = $contact['address'];
        $password = $contact['password'];
        mysqli_query($con,"UPDATE contacts SET name='$name',phone='$phone',email='$email',address='$address',password='$password' WHERE id=$id");
				return $this->selectById($con,$id);
			
    }
    
    public function delete($con,$id) {
        $dbId = mysqli_real_escape_string($con,$id);
        $contacts = $this->selectById($con,$dbId);
        mysqli_query($con,"DELETE FROM contacts WHERE id=$dbId");
        return $contacts;
        
    }
    
}

?>
