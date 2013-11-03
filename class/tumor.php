<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tumor
 *
 * @author kelvin
 */
class tumor {
    //instance variables
    private $id;
    private $patient_id;
    private $topograph;
    private $morphology;
    private $behavior;
    private $incidance_date;
    private $basis_diagnosis;
    private $ICD_10;
    private $ICCC_code;
    
     //constroctur
    function __construct($pid) 
    {
        $squery ="SELECT * FROM tumor WHERE id='{$pid}'";
        $query = mysql_query($squery);
        while ($row = mysql_fetch_array($query)) 
            {
                extract($row);
                $this->id = $id;
                $this->patient_id =  $patient_id;
                $this->topograph= $topograph;
                $this->morphology= $morphology;
                $this->behavior= $behavior;
                $this->incidance_date= $incidance_date;
                $this->basis_diagnosis = $basis_diagnosis;
                $this->ICD_10= $ICD_10;
                $this->ICCC_code= $ICCC_code;
            }
    }
    
    //    setters and getters
    function getId()
        {
            return $this->id;
        }

    function setId($value)
        {
            $query = mysql_query("UPDATE tumor SET id='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getPatient_id()
        {
            return $this->patient_id;
        }

    function setPatient_id($value)
        {
            $query = mysql_query("UPDATE tumor SET patient_id='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getTopograph()
        {
            return $this->topograph;
        }

    function setTopograph($value)
        {
            $query = mysql_query("UPDATE tumor SET topograph='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getMorphology()
        {
            return $this->morphology;
        }

    function setMorphology($value)
        {
            $query = mysql_query("UPDATE tumor SET morphology='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getBehavior()
        {
            return $this->behavior;
        }

    function setBehavior($value)
        {
            $query = mysql_query("UPDATE tumor SET behavior='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getIncidance_date()
        {
            return $this->incidance_date;
        }

    function setIncidance_date($value)
        {
            $query = mysql_query("UPDATE tumor SET incidance_date='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getBasis_diagnosis()
        {
            return $this->basis_diagnosis;
        }

    function setBasis_diagnosis($value)
        {
            $query = mysql_query("UPDATE tumor SET basis_diagnosis='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getICD_10()
        {
            return $this->ICD_10;
        }

    function setICD_10($value)
        {
            $query = mysql_query("UPDATE tumor SET ICD_10='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getICCC_code()
        {
            return $this->ICCC_code;
        }

    function setICCC_code($value)
        {
            $query = mysql_query("UPDATE tumor SET ICCC_code='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function viewBasicInfo(){
            ?>
<table class="table table-bordered table-hover table-responsive">
    <tr>
        <th>Topograph</th><th>Morphology</th><th>behavior</th>
        <th>incidance_date</th><th>basis_diagnosis</th><th>ICD_10</th><th>ICCC_code</th>
    </tr>
    <tr>
        <td><?php echo $this->topograph ?></td>
        <td><?php echo $this->morphology ?></td>
        <td><?php echo $this->behavior ?></td>
        <td><?php echo date("j,M Y",  strtotime($this->incidance_date)) ?></td>
        <td><?php echo $this->basis_diagnosis ?></td>
        <td><?php echo $this->ICD_10 ?></td>
        <td><?php echo $this->ICCC_code ?></td>
        
        
    </tr>
</table>
<h4>Source</h4>
            <?php
                        //echo "SELECT * FROM source WHERE tumor_id='{$this->id}'";
            $query = mysql_query("SELECT * FROM source WHERE tumor_id='{$this->id}'");
            while ($row = mysql_fetch_array($query)) {
                ?>
<table class="table table-bordered table-hover table-responsive">
    <tr>
        <th>Hospital</th><th>Path Lab No</th><th>Unit</th><th>Case No</th>
        
    </tr>
    <tr>
        <td><?php echo $row['hosptal'] ?></td>
        <td><?php echo $row['path_lab_no'] ?></td>
        <td><?php echo $row['unit'] ?></td>
        <td><?php echo $row['case_no'] ?></td>
        
    </tr>
</table>
            <?php
            }
        }

        function editTumor(){
            $source = new source("", $this->id);
            ?>
            <form class="form-horizontal" role="form">
                <legend>Edit Tumor Record</legend>
                <!--Topography-->
            <div class="form-group">
                <label for="Topography" class="col-md-2 control-label">Topography</label>
                <div class="col-md-4">
                    <input type="text" name="Topography" id="Topography" class="form-control validate[required]" value="<?php echo $this->topograph ?>">
                  <input type="hidden" name="pid" id="pid" value="<?php echo $_POST['id'] ?>">
                </div>
              </div>


              <!--Morphology-->
              <div class="form-group">
                <label for="Morphology" class="col-md-2 control-label">Morphology</label>
                <div class="col-md-4">
                  <input type="text" name="Morphology" id="Morphology" class="form-control validate[required]"  value="<?php echo $this->morphology?>">
                </div>
              </div>

              <!--Behavior-->
              <div class="form-group">
                <label for="Middle_Name" class="col-md-2 control-label">Behavior</label>
                <div class="col-md-4">
                  <input type="text" name="Behavior" id="Behavior" class="form-control validate[required]" value="<?php echo $this->behavior ?>">
                </div>
              </div>

               <!--Date Of Incidence-->
              <div class="form-group">
                <label for="Incidence_Date" class="col-md-2 control-label">Date Of Incidence</label>
                <div class="col-md-4">
                  <input type="Incidence_Date" name="Incidence_Date" id="Incidence_Date" class="form-control validate[required]" value="<?php echo $this->incidance_date ?>">
                </div>
              </div>

               <!--Basis Diagnosis-->
               <div class="form-group">
                <label for="Basis_Diagnosis" class="col-md-2 control-label">Basis Diagnosis</label>
                <div class="col-md-4">
                  <input type="text" name="Basis_Diagnosis" id="Basis_Diagnosis" class="form-control validate[required]"  value="<?php echo $this->basis_diagnosis ?>">
                </div>
              </div>

               <!--ICD-10-->
               <div class="form-group">
                <label for="ICD_10" class="col-md-2 control-label">ICD-10</label>
                <div class="col-md-4">
                  <input type="text" name="ICD_10" id="ICD_10" class="form-control validate[required]"  value="<?php echo $this->ICD_10 ?>">
                </div>
              </div>

               <!--ICCC code-->
               <div class="form-group">
                <label for="ICCC_code" class="col-md-2 control-label">ICCC code</label>
                <div class="col-md-4">
                  <input type="text" name="ICCC_code" id="ICCC_code" class="form-control validate[required]"  value="<?php echo $this->ICCC_code ?>">
                </div>
              </div>

               <legend>Source</legend>
               <!--Hospital-->
               <div class="form-group">
                <label for="Hospital" class="col-md-2 control-label">Hospital</label>
                <div class="col-md-4">
                    <input type="text" name="Hospital" id="Hospital" class="form-control validate[required]"  value="<?php echo $source->getHosptal() ?>">
                </div>
              </div>

               <!--Path_lab_no-->
               <div class="form-group">
                <label for="Path_lab_no" class="col-md-2 control-label">Path_lab_no</label>
                <div class="col-md-4">
                    <input type="text" name="Path_lab_no" id="Path_lab_no" class="form-control validate[required]"  value="<?php echo $source->getPathLab() ?>">
                </div>
              </div>

               <!--Unit-->
               <div class="form-group">
                <label for="Unit" class="col-md-2 control-label">Unit</label>
                <div class="col-md-4">
                    <input type="text" name="Unit" id="Unit" class="form-control validate[required]"  value="<?php echo $source->getUnit() ?>">
                </div>
              </div>

               <!--Case_no-->
               <div class="form-group">
                <label for="Case_no" class="col-md-2 control-label">Case_no</label>
                <div class="col-md-4">
                    <input type="text" name="Case_no" id="Case_no" class="form-control validate[required]"  value="<?php echo $source->getCaseNo()?>">
                </div>
              </div>

               <div class="form-group">
                <div class="col-md-offset-2 col-md-8 pull-right">
                    <button type="button" class="btn btn-primary" id="submitbtn">Submit</button>
                </div>
              </div>
            </form>
<?php
        }
}

?>
