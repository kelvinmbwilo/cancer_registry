<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of examination
 *
 * @author kelvin
 */
class examination {
    //intance variable
    private $patient_id;
    private $biopsy_number;
    private $collected_from;
    private $details;
    private $gis_details;
    
    //constroctur
    function __construct($biopsy_no) 
    {
        $query = mysql_query("SELECT * FROM examination WHERE biopsy_number='{$biopsy_no}'");
        while ($row = mysql_fetch_array($query)) 
            {
                extract($row);
                $this->patient_id = $patient_id;
                $this->biopsy_number = $biopsy_number;
                $this->details = $details;
                $this->collected_from= $collected_from;
                $this->gis_details = $gis_details;
            }
    }
    
//    setters and getters
    function getBiopsy_number()
        {
            return $this->biopsy_number;
        }

    function setBiopsy_number($value)
        {
            $query = mysql_query("UPDATE examination SET biopsy_number='{$value}' WHERE biopsy_number='{$this->biopsy_number}'") or die(mysql_error());
        }
        
        function getPatient_id()
        {
            return $this->patient_id;
        }

    function setPatient_id($value)
        {
            $query = mysql_query("UPDATE examination SET patient_id='{$value}' WHERE biopsy_number='{$this->biopsy_number}'") or die(mysql_error());
        }
        
        function getDetails()
        {
            return $this->details;
        }

    function setDetails($value)
        {
            $query = mysql_query("UPDATE examination SET details='{$value}' WHERE biopsy_number='{$this->biopsy_number}'") or die(mysql_error());
        }
        
        function getGis_details()
        {
            return $this->gis_details;
        }

    function setGis_details($value)
        {
            $query = mysql_query("UPDATE examination SET gis_details='{$value}' WHERE biopsy_number='{$this->biopsy_number}'") or die(mysql_error());
        }
        function viewBasicInfo(){
            ?>
<table class="table table-bordered table-hover table-responsive">
    <tr>
        <th>Biopsy Number</th><th>Collected From</th><th>Examination Details</th>
        <th>Treatment Details</th>
    </tr>
    <tr>
        <td><?php echo $this->biopsy_number ?></td>
        <td><?php echo $this->collected_from ?></td>
        <td><?php echo $this->details ?></td>
        <td><?php echo $this->gis_details ?></td>
    </tr>
</table>
<?php
}
}

?>
