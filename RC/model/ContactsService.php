<?php

require_once 'model/ContactsGateway.php';

class ContactsService {
    
    private $contactsGateway = NULL;
    
    public function __construct() {
        $this->contactsGateway = new ContactsGateway();
    }
    
    public function getAllContacts() {
        try {
            $con = $this->contactsGateway->openDb();
            $res = $this->contactsGateway->selectAll($con);
            $this->contactsGateway->closeDb($con);
            return $res;
        } catch (Exception $e) {
            $this->contactsGateway->closeDb($con);
            throw $e;
        }
    }
    
    public function searchContacts($name,$phone,$email) {
        try {
            $con = $this->contactsGateway->openDb();
            $res = $this->contactsGateway->search($con,$name,$phone,$email);
            $this->contactsGateway->closeDb($con);
            return $res;
        } catch (Exception $e) {
            $this->contactsGateway->closeDb($con);
            throw $e;
        }
    }
    
    public function getContact($id) {
        try {
            $con = $this->contactsGateway->openDb();
            $res = $this->contactsGateway->selectById($con,$id);
            $this->contactsGateway->closeDb($con);
            return $res;
        } catch (Exception $e) {
            $this->contactsGateway->closeDb($con);
            throw $e;
        }
        //return $this->contactsGateway->find($id);
    }
    
    public function login($email,$password) {
        try {
            $con = $this->contactsGateway->openDb();
            $res = $this->contactsGateway->login($con,$email,$password);
            $this->contactsGateway->closeDb($con);
            return $res;
        } catch (Exception $e) {
            $this->contactsGateway->closeDb($con);
            throw $e;
        }
    }
    
    public function createNewContact( $contact ) {
        try {
            $con = $this->contactsGateway->openDb();
            $res = $this->contactsGateway->insert($con,$contact);
            $this->contactsGateway->closeDb($con);
            return $res;
        } catch (Exception $e) {
            $this->contactsGateway->closeDb($con);
            throw $e;
        }
    }
    
     public function updateContact( $contact ) {
        try {
            $con = $this->contactsGateway->openDb();
            $res = $this->contactsGateway->update($con,$contact);
            $this->contactsGateway->closeDb($con);
            return $res;
        } catch (Exception $e) {
            $this->contactsGateway->closeDb($con);
            throw $e;
        }
    }
    
    public function deleteContact( $id ) {
        try {
            $con = $this->contactsGateway->openDb();
            $res = $this->contactsGateway->delete($con,$id);
            $this->contactsGateway->closeDb($con);
            return $res;
        } catch (Exception $e) {
            $this->contactsGateway->closeDb($con);
            throw $e;
        }
    }
    
    
}

?>
