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
    function __construct($id,$pid) 
    {
        $squery =($id == "")?"SELECT * FROM patient WHERE patient_id='{$pid}'":"SELECT * FROM patient WHERE id='{$id}'";
        $query = mysql_query($squery);
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
        
     function viewBasicInfo(){
         ?>
<h3 class="text-center text-info"><?php echo strtoupper( $this->first_name." ".$this->middle_name." ".$this->last_name) ?></h3>
<h3>Basic Information <button class="btn btn-default btn-xs editbasic" title="edit patient basic info" id="<?php echo $this->id; ?>"><i class="fa fa-pencil"></i></button></h3>
<table class="table table-condensed table-bordered table-hover">
    <tr>
        <td><b>Patient_id</b></td>
        <td><?php echo $this->patient_id ?></td>
        <td><b>Name</b></td>
        <td><?php echo $this->first_name." ".$this->middle_name." ".$this->last_name ?></td>
    </tr>
    <tr>
        <td><b>Date Of Birth</b></td>
        <td><?php echo date("j,M Y",  strtotime($this->date_of_birth)) ?></td>
        <td><b>Gender</b></td>
        <td><?php echo $this->gender ?></td>
    </tr>
    <tr>
        <td><b>Occupation</b></td>
        <td><?php echo $this->occupation ?></td>
        <td><b>Tribe</b></td>
        <td><?php echo $this->tribe ?></td>
    </tr>
    <tr>
        <td><b>Country</b></td>
        <td><?php echo $this->country ?></td>
        <td><b>Region</b></td>
        <td><?php echo $this->region ?></td>
    </tr>
    <tr>
        <td><b>District</b></td>
        <td><?php echo $this->district ?></td>
        <td><b>Ward</b></td>
        <td><?php echo $this->ward ?></td>
    </tr>
    <tr>
        <td><b>Village</b></td>
        <td><?php echo $this->village ?></td>
        <td><b>Ten Cell Leader</b></td>
        <td><?php echo $this->ten_cell_leder ?></td>
    </tr>
    
</table>
<h3>Tumor Record(s) <a href="#s" class="btn btn-info btn-xs addtumorrec" id="<?php echo $this->patient_id ?>"><i class="fa fa-plus"></i> </a> </h3>
<div class="accordion" id="accordion2">
    <?php 
    $query1 = mysql_query("SELECT * FROM tumor WHERE patient_id='{$this->patient_id}'");
    $count= 0;
    while ($row = mysql_fetch_array($query1)) {
        $count++;
    ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $count ?>">
          <strong>Tumor Record #<?php echo $count ?> <i class="fa fa-angle-double-down fa-lg pull-left"></i></strong>
      </a><button class="btn btn-xs edittumor" id="<?php echo $row['id'] ?>"><i class="fa fa-pencil"></i></button>
    </div>
    <div id="collapse<?php echo $count ?>" class="accordion-body collapse">
      <div class="accordion-inner">
        <?php $tumor = new tumor($row['id']);
        echo $tumor->viewBasicInfo();
        ?>
      </div>
    </div>
  </div>
    <?php  } ?>
</div>

<h3 id="addexamerec">Examination Record(s) <a href="#s" class="btn btn-info btn-xs addex" id="<?php echo $this->patient_id ?>"><i class="fa fa-plus"></i> </a></h3> 
<div class="accordion" id="accordion3">
    <?php 
    $query1 = mysql_query("SELECT * FROM examination WHERE patient_id='{$this->patient_id}'");
    $count= 0;
    while ($row1 = mysql_fetch_array($query1)) {
        $count++;
    ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collaps<?php echo $count ?>">
          <strong>Examination Record #<?php echo $count ?>  <i class="fa fa-angle-double-down fa-lg pull-left"></i></strong>
      </a><button class="btn btn-xs editExam" id="<?php echo $row1['biopsy_number'] ?>"><i class="fa fa-pencil"></i></button>
    </div>
    <div id="collaps<?php echo $count ?>" class="accordion-body collapse">
      <div class="accordion-inner">
        <?php $exam = new examination($row1['biopsy_number']);
        echo $exam->viewBasicInfo();
        ?>
      </div>
    </div>
  </div>
    <?php  } ?>
</div>
<?php
     }

     function editPatient(){
         ?>
<form class="form-horizontal" role="form">
    <legend>Edit Patient Information</legend>
  
  <!--First Name-->
  <div class="form-group">
    <label for="First_Name" class="col-md-2 control-label">First Name</label>
    <div class="col-md-4">
      <input type="text" name="First_Name" id="First_Name" class="form-control validate[required]" value="<?php echo $this->first_name; ?>">
    </div>
  </div>
 
  <!--Middle Name-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Middle Name</label>
    <div class="col-md-4">
      <input type="text" name="Middle_Name" id="Middle_Name" class="form-control validate[required]"  value="<?php echo $this->middle_name; ?>">
    </div>
  </div>
    
   <!--Last Name-->
   <div class="form-group">
    <label for="Last_Name" class="col-md-2 control-label">Last Name</label>
    <div class="col-md-4">
      <input type="text" name="Last_Name" id="Last_Name" class="form-control validate[required]"  value="<?php echo $this->last_name; ?>">
    </div>
  </div>
   
   <!--Last Name-->
   <div class="form-group">
    <label for="Birth_Date" class="col-md-2 control-label">Birth Date</label>
    <div class="col-md-4">
      <input type="text" name="Birth_Date" id="Birth_Date" class="form-control validate[required]"  value="<?php echo $this->date_of_birth; ?>">
    </div>
  </div>
   
 <!--Sex-->
 <div class="form-group">
    <label for="Sex" class="col-md-2 control-label">Sex</label>
    <div class="col-md-4">
      <!--<input type="text" name="Sex" id="Sex" class="form-control validate[required]"  placeholder="Sex">-->
      <?php echo form::genderDropdown($this->gender); ?>
    </div>
  </div>
 <!--phone number-->
   <div class="form-group">
    <label for="phone_number" class="col-md-2 control-label">Phone Number</label>
    <div class="col-md-4">
      <input type="text" name="phone_number" id="phone_number" class="form-control validate[required]"  placeholder="Phone Number">
    </div>
  </div>
 <!--Occupation-->
 <div class="form-group">
    <label for="Occupation" class="col-md-2 control-label">Occupation</label>
    <div class="col-md-4">
      <!--<input type="text" name="Occupation" id="Occupation" class="form-control validate[required]"  placeholder="Occupation">-->
      <?php echo form::categoryDropdown("Occupation",  $this->occupation); ?>
    </div>
  </div>
 
 <!--Name of Ten cell Leader-->
 <div class="form-group">
    <label for="Cell_leader" class="col-md-2 control-label">Name of Ten cell Leader</label>
    <div class="col-md-4">
      <input type="text" name="Cell_leader" id="Cell_leader" class="form-control validate[required]"  value="<?php echo $this->ten_cell_leder; ?>">
    </div>
  </div>
 <hr />
 <h3>Patient Resident</h3>
 
 <div class="form-group">
    <div class="col-md-2">
        <?php echo form::regionalDropWithDefault($this->region); ?>
    </div>
     
     <div class="col-md-2">
        <?php echo form::districtDropdown("all",$this->district); ?>
    </div>
     
     <div class="col-md-2">
        ward:<input type="text" name="ward" id="ward" class="form-control validate[required]"  value="<?php echo $this->ward; ?>">
    </div>
     
     <div class="col-md-2">
       Village <input type="text" name="village" id="village" class="form-control validate[required]" value="<?php echo $this->village; ?>">
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
