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
<h3>Basic Information</h3>
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
<h3>Tumor Record(s) <a href="#s" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> </a> </h3>
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
      </a><button class="btn btn-xs"><i class="fa fa-pencil"></i></button>
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

<h3>Examination Record(s) <a href="#s" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> </a></h3> 
<div class="accordion" id="accordion3">
    <?php 
    $query1 = mysql_query("SELECT * FROM examination WHERE patient_id='{$this->patient_id}'");
    $count= 0;
    while ($row = mysql_fetch_array($query1)) {
        $count++;
    ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collaps<?php echo $count ?>">
          <strong>Examination Record #<?php echo $count ?>  <i class="fa fa-angle-double-down fa-lg pull-left"></i></strong>
      </a><button class="btn btn-xs"><i class="fa fa-pencil"></i></button>
    </div>
    <div id="collaps<?php echo $count ?>" class="accordion-body collapse">
      <div class="accordion-inner">
        <?php $exam = new examination($row['biopsy_number']);
        echo $exam->viewBasicInfo();
        ?>
      </div>
    </div>
  </div>
    <?php  } ?>
</div>
<?php
     }
}

?>
