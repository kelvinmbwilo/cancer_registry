<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author kelvin
 */
class user {
    //instance values
    private $first_name;
    private $middle_name;
    private $last_name;
    private $email;
    private $gender;
    private $level;
    private $phone;
    private $password;
    
    //constroctur
    function __construct($email) 
    {
        $query = mysql_query("SELECT * FROM user WHERE email='{$email}'");
        while ($row = mysql_fetch_array($query)) 
            {
                extract($row);
                $this->first_name = $first_name;
                $this->middle_name = $middle_name;
                $this->last_name = $last_name;
                $this->email = $email;
                $this->gender = $gender;
                $this->level = $level;
                $this->phone = $phone;
                $this->password = $password;
            }
    }
    
//    setters and getters
    function setFirst_name($value){
        $query = mysql_query("UPDATE user SET first_name='{$value}' WHERE email='{$this->email}'") or die(mysql_error());
    }
    
    function  getFirst_name(){
        return $this->first_name;
    }
    
    function setMiddle_name($value){
        $query = mysql_query("UPDATE user SET middle_name='{$value}' WHERE email='{$this->email}'") or die(mysql_error());
    }
    
    function  getMiddle_name(){
        return $this->middle_name;
    }
    
    function setLast_name($value){
        $query = mysql_query("UPDATE user SET last_name='{$value}' WHERE email='{$this->email}'") or die(mysql_error());
    }
    
    function  getLast_name(){
        return $this->last_name;
    }
    
    function setEmail($value){
        $query = mysql_query("UPDATE user SET email='{$value}' WHERE email='{$this->email}'") or die(mysql_error());
    }
    
    function  getEmail(){
        return $this->email;
    }
    
    function setGender($value){
        $query = mysql_query("UPDATE user SET gender='{$value}' WHERE email='{$this->email}'") or die(mysql_error());
    }
    
    function  getGender(){
        return $this->gender;
    }
    
    function setLevel($value){
        $query = mysql_query("UPDATE user SET level='{$value}' WHERE email='{$this->email}'") or die(mysql_error());
    }
    
    function  getLevel(){
        return $this->level;
    }
    
    function setPhone($value){
        $query = mysql_query("UPDATE user SET phone='{$value}' WHERE email='{$this->email}'") or die(mysql_error());
    }
    
    function  getPhone(){
        return $this->phone;
    }
    
     function setPassword($value){
        $query = mysql_query("UPDATE user SET password='{$value}' WHERE email='{$this->email}'") or die(mysql_error());
    }
    
    function  getPassword(){
        return $this->password;
    }
}

?>
