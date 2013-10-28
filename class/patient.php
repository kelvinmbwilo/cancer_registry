<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of patient
 *
 * @author kelvin
 */
class patient {
    //instance variables here
    private $id;
    private $patient_id;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $gender;
    private $date_of_birth;
    private $tribe;
    private $occupation;
    private $country;
    private $region;
    private $district;
    private $ward;
    private $village;
    private $ten_cell_leder;
    private $patient_status;
    
    //constroctur
    function __construct($pid) 
    {
        $query = mysql_query("SELECT * FROM patient WHERE id='{$pid}'");
        while ($row = mysql_fetch_array($query)) 
            {
                extract($row);
                $this->id = $id;
                $this->patient_id =  $patient_id;
                $this->first_name = $first_name;
                $this->middle_name =  $middle_name;
                $this->last_name =  $last_name;
                $this->gender =  $gender;
                $this->date_of_birth =  $date_of_birth;
                $this->tribe =  $tribe;
                $this->occupation =  $occupation;
                $this->country =  $country;
                $this->region =  $region;
                $this->district =  $district;
                $this->ward =  $ward;
                $this->village =  $village;
                $this->ten_cell_leder =  $ten_cell_leder;
                $this->patient_status =  $patient_status;
            }
    }
    
//    setters and getters
    function getId()
        {
            return $this->id;
        }

    function setId($value)
        {
            $query = mysql_query("UPDATE patient SET id='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getPatient_id()
        {
            return $this->patient_id;
        }

    function setPatient_id($value)
        {
            $query = mysql_query("UPDATE patient SET patient_id='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
     function setFirst_name($value){
        $query = mysql_query("UPDATE patient SET first_name='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
    }
    
    function  getFirst_name(){
        return $this->first_name;
    }
    
    function setMiddle_name($value){
        $query = mysql_query("UPDATE patient SET middle_name='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
    }
    
    function  getMiddle_name(){
        return $this->middle_name;
    }
    
    function setLast_name($value){
        $query = mysql_query("UPDATE patient SET last_name='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
    }
    
    function  getLast_name(){
        return $this->last_name;
    }

   
        function getGender()
        {
            return $this->gender;
        }

    function setGender($value)
        {
            $query = mysql_query("UPDATE patient SET gender='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getDate_of_birth()
        {
            return $this->date_of_birth;
        }

    function setDate_of_birth($value)
        {
            $query = mysql_query("UPDATE patient SET date_of_birth='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getTribe()
        {
            return $this->tribe;
        }

    function setTribe($value)
        {
            $query = mysql_query("UPDATE patient SET tribe='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getOccupation()
        {
            return $this->occupation;
        }

    function setOccupation($value)
        {
            $query = mysql_query("UPDATE patient SET occupation='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getRegion()
        {
            return $this->region;
        }

    function setRegion($value)
        {
            $query = mysql_query("UPDATE patient SET region='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getDistrict()
        {
            return $this->district;
        }

    function setDistrict($value)
        {
            $query = mysql_query("UPDATE patient SET district='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getWard()
        {
            return $this->ward;
        }

    function setWard($value)
        {
            $query = mysql_query("UPDATE patient SET ward='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getVillage()
        {
            return $this->village;
        }

    function setVillage($value)
        {
            $query = mysql_query("UPDATE patient SET village='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getTen_cell_leder()
        {
            return $this->ten_cell_leder;
        }

    function setTen_cell_leder($value)
        {
            $query = mysql_query("UPDATE patient SET ten_cell_leder='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getPatient_status()
        {
            return $this->patient_status;
        }

    function setPatient_status($value)
        {
            $query = mysql_query("UPDATE patient SET patient_status='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
}

?>
