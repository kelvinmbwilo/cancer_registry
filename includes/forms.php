<?php
if(isset($_GET['page'])){
    if($_GET['page'] == "userRegistration"){
        ?>
<h3>Patient Registration</h3>
<form class="form-horizontal" action="uploader.php" id="FileUploader" enctype="multipart/form-data" method="post">
  
  <!--Patient_id-->
  <div class="control-group">
    <label class="control-label" for="Patient_id">Patient_id</label>
    <div class="controls text-left">
        <input type="text" name="Patient_id" id="Patient_id" placeholder="Patient_id" class="span12"/>
    </div>
  </div>
    
  <!--First Name-->
  <div class="control-group">
    <label class="control-label" for="First_Name">First Name</label>
    <div class="controls text-left">
        <input type="text" name="First_Name" id="First_Name" placeholder="First Name" class="span12"/>
    </div>
  </div>
    
  <!--Middle Name-->
  <div class="control-group">
    <label class="control-label" for="Middle_Name">Middle Name</label>
    <div class="controls text-left">
        <input type="text" name="Middle_Name" id="Middle_Name" placeholder="MiddleName" class="span12"/>
    </div>
  </div>
    
   <!--Last Name-->
  <div class="control-group text-left">
    <label class="control-label" for="Last_Name">Last Name</label>
    <div class="controls">
      <input type="text" name="Last_Name" id="Last_Name" placeholder="Last Name" class="span12">
    </div>
  </div>
   
 <!--Sex-->
 <div class="control-group text-left">
    <label class="control-label" for="Sex">Sex</label>
    <div class="controls">
      <input type="text" name="Sex" id="Sex" placeholder="Sex" class="span12">
    </div>
  </div>
 
 <!--Occupation-->
 <div class="control-group text-left">
    <label class="control-label" for="Occupation">Occupation</label>
    <div class="controls">
      <input type="text" name="Occupation" id="Occupation" placeholder="Occupation" class="span12">
    </div>
  </div>
 
 <!--Tribe-->
 <div class="control-group text-left">
    <label class="control-label" for="Tribe">Tribe</label>
    <div class="controls">
      <input type="text" name="Tribe" id="Tribe" placeholder="Tribe" class="span12">
    </div>
  </div>
 
 <!--Name of Ten cell Leader-->
 <div class="control-group text-left">
    <label class="control-label" for="Cell_leader">Name of Ten cell Leader</label>
    <div class="controls">
      <input type="text" name="Cell_leader" id="Cell_leader" placeholder="Name of Ten cell Leader" class="span12">
    </div>
  </div>
    <div class="control-group text-left">
    <div class="controls">
      <button type="submit" class="btn btn-primary" id="uploadButton">Add Event</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>
       <?php
    }
}
?>
