<?php
include_once("Constants.php");
class Account {
     private $errorArray = array();
     private $con;
     public function __construct($con) {
         $this->con = $con;
     }

     public function register($fn, $ln, $un, $em, $em2, $pw, $pw2){
           $this->validateFirstName($fn);
           $this->validateLastName($ln);
           $this->validateUserName($un);
           $this->validateUserName($un);
           $this->validateEmail($em, $em2);
           $this->validatePassword($pw, $pw2);
     }

     public function validateFirstName($fn){
         if(strlen($fn) > 25 || strlen($fn) < 2) {
              array_push($this->errorArray, Constants::$firstNameChars);
         }
     }

     public function displayError($error) {
         if(in_array($error, $this->errorArray)){
             return "<span class='text-danger'>$error</span>";
         }

     }

    public function validateLastName($ln) {
        if(strlen($ln) > 25 || strlen($ln) < 2) {
              array_push($this->errorArray, Constants::$lastNameChars);
         }

    }

    public function validateEmail($em, $em2) {
        if($em != $em2) {
            array_push($this->errorArray, Constants::$emailNotMatch);
            return;
        }

        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->con->prepare("SELECT email FROM user WHERE email=:em");
        $query->bindParam(":em", $em);
        $query->execute();

        if($query->rowCount != 0){
            array_push($this->errorArray, Constants::$emailTaken);
        }
    }

    public function validatePassword($pw, $pw2) {
        if($pw != pw2) {
            array_push($this->errorArray, Constants::$passwordNotMatch);
            return;
        }

        if(preg_match("/[^A-Za-z0-9]/", $pw)){
            array_push($this->errorArray, Constants::$passwordNotAlphaNumeric);
            return;
        }

        if(strlen($pw) < 5 || strlen($pw) > 30){
            array_push($this->errorArray, Constants::$passwordLength);
        }

    }

    public function validateUserName($un) {
        if(strlen($un) > 25 || strlen($un) < 5) {
            array_push($this->errorArray, Constants::$userNameChars);
            return;
        }

        $query = $this->con->prepare("SELECT userName FROM user WHERE userName=:un");
        $query->bindParam(":un", $un);
        $query->execute();

        if($query->rowCount != 0){
            array_push($this->errorArray, Constants::$userNameTaken);
        }

    }

}