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
        <th>Biopsy Number</th><td><?php echo $this->biopsy_number ?></td>
    </tr>
        <tr>
            <th>Collected From</th><td><?php echo $this->collected_from ?></td>
        </tr>
        <tr>
            <th>Examination Details</th><td><?php echo $this->details ?></td>
        </tr>
        <tr>
            <th>Treatment Details</th><td><?php echo $this->gis_details ?></td>
        </tr>
    
</table>
<?php
}

function editExam(){
     ?>
<form class="form-horizontal" role="form">
    <legend>Edit Patient Examination Details</legend>
  
  <!--Biops Number-->
  <div class="form-group">
    <label for="Biops_Number" class="col-md-2 control-label">Biops Number</label>
    <div class="col-md-4">
        <input type="text" disabled="disabled" name="Biops_Number" id="Biops_Number" class="form-control validate[required]" value="<?php echo $this->biopsy_number ?>">
    </div>
  </div>
    
  <!--Basis_Of_Diagnosis-->
  <div class="form-group">
    <label for="Biops_collected" class="col-md-2 control-label">Biops Collected From</label>
    <div class="col-md-4">
      <input type="text" name="Biops_collected" id="Biops_collected" class="form-control validate[required]"  value="<?php echo $this->collected_from ?>">
    </div>
  </div>
 
  <!--Examination Details-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Examination Details</label>
    <div class="col-md-4">
      <textarea rows="5" name="Examination_Details" id="Examination_Details" class="form-control validate[required]"><?php echo $this->details ?></textarea>
    </div>
  </div>
    
   <!--Treatment Details-->
   <div class="form-group">
    <label for="Diagnosis_Done_Before" class="col-md-2 control-label">Treatment Details</label>
    <div class="col-md-4">
      <textarea rows="5" name="Treatment_Details" id="Treatment_Details" class="form-control validate[required]"  ><?php echo $this->gis_details ?></textarea>
    </div>
  </div>
   
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 pull-right">
        <button type="button" class="btn btn-primary" id="submitbtn">Submit Changes</button>
    </div>
  </div>
</form>
       <?php
}
}

?>
