<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of diagnosis
 *
 * @author kelvin
 */
class diagnosis {
    //Instance Variables
    private $id;
    private $patient_id;
    private $Date_of_Incidence;
    private $Basis_of_Diagnosis;
    private $Site_of_Disease;
    private $Diagnosis_done_before;
    private $more_diagnosis;
    
    //constroctur
    function __construct($pid) 
    {
        $query = mysql_query("SELECT * FROM diagnosis WHERE id='{$pid}'");
        while ($row = mysql_fetch_array($query)) 
            {
                extract($row);
                $this->id = $id;
                $this->patient_id = $patient_id;
                $this->Date_of_Incidence = $Date_of_Incidence;
                $this->Basis_of_Diagnosis = $Basis_of_Diagnosis;
                $this->Site_of_Disease = $Site_of_Disease;
                $this->Diagnosis_done_before = $Diagnosis_done_before;
                $this->more_diagnosis = $more_diagnosis;
            }
    }
    
//    setters and getters
    function getId()
        {
            return $this->id;
        }

    function setId($value)
        {
            $query = mysql_query("UPDATE diagnosis SET id='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getPatient_id()
        {
            return $this->patient_id;
        }

    function setPatient_id($value)
        {
            $query = mysql_query("UPDATE diagnosis SET patient_id='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
         function getDate_of_Incidence()
        {
            return $this->Date_of_Incidence;
        }

    function setDate_of_Incidence($value)
        {
            $query = mysql_query("UPDATE diagnosis SET Date_of_Incidence='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getBasis_of_Diagnosis()
        {
            return $this->Basis_of_Diagnosis;
        }

    function setBasis_of_Diagnosis($value)
        {
            $query = mysql_query("UPDATE diagnosis SET Basis_of_Diagnosis='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getSite_of_Disease()
        {
            return $this->Site_of_Disease;
        }

    function setSite_of_Disease($value)
        {
            $query = mysql_query("UPDATE diagnosis SET Site_of_Disease='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getDiagnosis_done_before()
        {
            return $this->Diagnosis_done_before;
        }

    function setDiagnosis_done_before($value)
        {
            $query = mysql_query("UPDATE diagnosis SET Diagnosis_done_before='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getMore_diagnosis()
        {
            return $this->more_diagnosis;
        }

    function setMore_diagnosis($value)
        {
            $query = mysql_query("UPDATE diagnosis SET more_diagnosis='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
    
}

?>
