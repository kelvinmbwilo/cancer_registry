<?php
include '../includes/connection.php';
function __autoload($class_name) {
    include_once '../class/'. $class_name . '.php';
}

///////////////////////////////////////////////////////////
//////////// Patient Registration Form ///////////////////
//////////////////////////////////////////////////////////
if(isset($_GET['page'])){
    if($_GET['page'] == "userRegistration"){
        ?>
<form class="form-horizontal" role="form">
    <legend>Patient Registration</legend>
  <!--Patient_id-->
  <div class="form-group">
    <label for="Patient_id" class="col-md-2 control-label">Patient_id</label>
    <div class="col-md-4">
      <input type="text" name="Patient_id" id="Patient_id" class="form-control validate[required]" placeholder="Patient_id">
    </div>
  </div>
    
  <!--First Name-->
  <div class="form-group">
    <label for="First_Name" class="col-md-2 control-label">First Name</label>
    <div class="col-md-4">
      <input type="text" name="First_Name" id="First_Name" class="form-control validate[required]"  placeholder="First Name">
    </div>
  </div>
 
  <!--Middle Name-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Middle Name</label>
    <div class="col-md-4">
      <input type="text" name="Middle_Name" id="Middle_Name" class="form-control"  placeholder="Middle Name">
    </div>
  </div>
    
   <!--Last Name-->
   <div class="form-group">
    <label for="Last_Name" class="col-md-2 control-label">Last Name</label>
    <div class="col-md-4">
      <input type="text" name="Last_Name" id="Last_Name" class="form-control validate[required]"  placeholder="Last Name">
    </div>
  </div>
   
   <!--Last Name-->
   <div class="form-group">
    <label for="Birth_Date" class="col-md-2 control-label">Birth Date</label>
    <div class="col-md-4">
      <input type="text" name="Birth_Date" id="Birth_Date" class="form-control validate[required]"  placeholder="Birth Date">
    </div>
  </div>
   
 <!--Sex-->
 <div class="form-group">
    <label for="Sex" class="col-md-2 control-label">Sex</label>
    <div class="col-md-4">
      <!--<input type="text" name="Sex" id="Sex" class="form-control validate[required]"  placeholder="Sex">-->
      <?php echo form::genderDropdown(""); ?>
    </div>
  </div>
 <!--phone number-->
   <div class="form-group">
    <label for="phone_number" class="col-md-2 control-label">Phone Number</label>
    <div class="col-md-4">
      <input type="text" name="phone_number" id="phone_number" class="form-control"  placeholder="Phone Number">
    </div>
  </div>
 <!--Occupation-->
 <div class="form-group">
    <label for="Occupation" class="col-md-2 control-label">Occupation</label>
    <div class="col-md-4">
      <!--<input type="text" name="Occupation" id="Occupation" class="form-control validate[required]"  placeholder="Occupation">-->
      <?php echo form::categoryDropdown("Occupation",""); ?>
    </div>
  </div>
 
 <!--Tribe-->
 <div class="form-group">
    <label for="Tribe" class="col-md-2 control-label">Tribe</label>
    <div class="col-md-4">
      <!--<input type="text" name="Tribe" id="Tribe" class="form-control validate[required]"  placeholder="Tribe">-->
      <?php echo form::tribesList(); ?>
    </div>
  </div>
 
 <!--Name of Ten cell Leader-->
 <div class="form-group">
    <label for="Cell_leader" class="col-md-2 control-label">Name of Ten cell Leader</label>
    <div class="col-md-4">
      <input type="text" name="Cell_leader" id="Cell_leader" class="form-control"  placeholder="Name of Ten cell Leader">
    </div>
  </div>
 <hr />
 <h3>Patient Resident</h3>
 
 <div class="form-group">
     <div class="col-md-2">
        <?php echo form::countryList(); ?>
    </div>
    <div class="col-md-2">
        <?php echo form::regionalDropWithDefault1(); ?>
    </div>
     
     <div class="col-md-2" id="districtarea">
        <?php echo form::districtDropdown1("all"); ?>
    </div>
     
     <div class="col-md-2">
        ward:<input type="text" name="ward" id="ward" class="form-control"  placeholder="Ward">
    </div>
     
     <div class="col-md-2">
       Village <input type="text" name="village" id="village" class="form-control"  placeholder="Village">
    </div>
     
  </div>
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 pull-right">
        <button type="reset" class="btn btn-warning">Reset</button>
        <button type="button" class="btn btn-primary" id="submitbtn">Submit</button>
    </div>
  </div>
</form>
       <?php
    }


///////////////////////////////////////////////////////////
//////////// Patient Diagnosis Form //////////////////////
//////////////////////////////////////////////////////////

    if($_GET['page'] == "patDiagnosis"){
        ?>
<h3 class="text-center">Patient Diagnosis</h3>
<hr/>
<form class="form-horizontal" role="form">
    <!--Patient_id-->
<div class="form-group">
    <label for="Patient_id" class="col-md-2 control-label">Patient_id</label>
    <div class="col-md-4">
      <input type="text" name="Patient_id" id="Patient_id" class="form-control validate[required]" placeholder="Patient_id">
    </div>
  </div>
    
  <!--Date Of Incidence-->
  <div class="form-group">
    <label for="Date_Of_Incidence" class="col-md-2 control-label">Date Of Incidence</label>
    <div class="col-md-4">
      <input type="Date_Of_Incidence" name="Date_Of_Incidence" id="Date_Of_Incidence" class="form-control validate[required]" placeholder="Date Of Incidence">
    </div>
  </div>
    
  <!--Basis_Of_Diagnosis-->
  <div class="form-group">
    <label for="Basis_Of_Diagnosis" class="col-md-2 control-label">Basis Of Diagnosis</label>
    <div class="col-md-4">
      <input type="text" name="Basis_Of_Diagnosis" id="Basis_Of_Diagnosis" class="form-control validate[required]"  placeholder="Basis Of Diagnosis">
    </div>
  </div>
 
  <!--Site Of Disease-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Site Of Disease</label>
    <div class="col-md-4">
      <input type="text" name="Site_Of_Disease" id="Site_Of_Disease" class="form-control validate[required]"  placeholder="Site_Of_Disease">
    </div>
  </div>
    
   <!--Any Diagnosis Done Before-->
   <div class="form-group">
    <label for="Diagnosis_Done_Before" class="col-md-2 control-label">Any Diagnosis Done Before</label>
    <div class="col-md-4">
      <input type="text" name="Diagnosis_Done_Before" id="Diagnosis_Done_Before" class="form-control validate[required]"  placeholder="Any Diagnosis Done Before">
    </div>
  </div>
   
   <!--Other Explanation-->
   <div class="form-group">
    <label for="Other_Explanation" class="col-md-2 control-label">Other Explanation</label>
    <div class="col-md-4">
        <textarea rows="5" name="Other_Explanation" id="Other_Explanation" class="form-control validate[required]"  placeholder="Other Explanation"></textarea>
    </div>
  </div>
   
 
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 pull-right">
        <button type="reset" class="btn btn-warning" id="loginbtn">Reset</button>
        <button type="button" class="btn btn-info" id="loginbtn">Done</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>
       <?php
    }

    
    ///////////////////////////////////////////////////////////
    //////////// Tumor Record //////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "Tumor"){
        ?>

<form class="form-horizontal" role="form">
    <legend>Tumor Record</legend>
     <!--Date Of Incidence-->
  <div class="form-group">
    <label for="Incidence_Date" class="col-md-2 control-label">Date Of Incidence</label>
    <div class="col-md-4">
      <input type="Incidence_Date" name="Incidence_Date" id="Incidence_Date" class="form-control validate[required]" placeholder="Date Of Incidence">
    </div>
  </div>
    
    
    <!--Topography-->
<div class="form-group">
    <label for="Topography" class="col-md-2 control-label">Topography</label>
    <div class="col-md-4">
        
        <?php 
      $query1 = mysql_query("SELECT * FROM site_of_tumor");
      $arr1 = array();
      while ($row = mysql_fetch_array($query1)) {
          $arr1["{$row['id']}"] = $row['value'];
      }
     // $arr = array("Death certificate only","Histology of metastasis","Clinical only ","Cytology / Haematology","Specific tumour markers","Histology of primary","Clinical investigations","Unknown");
      echo form::generalDropdown("Topography", "Topography", $arr1, ""); 
      ?>
      <!--<input type="text" name="Topography" id="Topography" class="form-control validate[required]" placeholder="Topography">-->
      <input type="hidden" name="pid" id="pid" value="<?php echo $_POST['id'] ?>">
    </div>
  </div>
    
 
  <!--Morphology-->
  <div class="form-group">
    <label for="Morphology" class="col-md-2 control-label">Morphology</label>
    <div class="col-md-4">
      <?php 
      $query2 = mysql_query("SELECT DISTINCT COL_3,COL_4 FROM TABLE_18");
      $arr2 = array();
      while ($row = mysql_fetch_array($query2)) {
          $arr2["{$row['COL_3']}"] = $row['COL_4'];
      }
     // $arr = array("Death certificate only","Histology of metastasis","Clinical only ","Cytology / Haematology","Specific tumour markers","Histology of primary","Clinical investigations","Unknown");
      echo form::generalDropdown1("Morphology", "Morphology", $arr2, ""); 
      ?>
    </div>
  </div>
 
  <!--Behavior-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Behavior</label>
    <div class="col-md-4" id="behaviorarea">
      <?php echo form::generalDropdown1("Behevior","Behevior",array()); ?></div>
    <script>
    $(document).ready(function(){
        
     })
    </script>
    </div>
  </div>
    
  
   <!--Basis Diagnosis-->
   <div class="form-group">
    <label for="Basis_Diagnosis" class="col-md-2 control-label">Basis Diagnosis</label>
    <div class="col-md-4">
      <!--<input type="text" name="Basis_Diagnosis" id="Basis_Diagnosis" class="form-control validate[required]"  placeholder="Basis Diagnosis">-->
      <?php 
      $query = mysql_query("SELECT * FROM basis_diagnosis");
      $arr = array();
      while ($row = mysql_fetch_array($query)) {
          $arr["{$row['id']}"] = $row['value'];
      }
     // $arr = array("Death certificate only","Histology of metastasis","Clinical only ","Cytology / Haematology","Specific tumour markers","Histology of primary","Clinical investigations","Unknown");
      echo form::generalDropdown("Basis_Diagnosis", "Basis Of Diagnosis", $arr, ""); 
      ?>
    </div>
  </div>
   
   <!--ICD-10-->
   <div class="form-group">
    <label for="ICD_10" class="col-md-2 control-label">Stage</label>
    <div class="col-md-4">
      <?php 
      $query = mysql_query("SELECT * FROM stages");
      $arr = array();
      while ($row = mysql_fetch_array($query)) {
          $arr["{$row['code']}"] = $row['stage'];
      }
      echo form::generalDropdown("ICD_10", "Stage", $arr, ""); 
      ?>
      <!--<input type="text" name="ICD_10" id="ICD_10" class="form-control validate[required]"  placeholder="ICD-10">-->
    </div>
  </div>
   
   <!--ICCC code-->
   <div class="form-group">
    <!--<label for="ICCC_code" class="col-md-2 control-label">ICCC code</label>-->
    <div class="col-md-4">
      <input type="hidden" name="ICCC_code" id="ICCC_code" class="form-control validate[required]"  placeholder="ICCC code">
    </div>
  </div>
   <legend>Treatment</legend>
   <label>
      <input type="checkbox" name="treat[]" value="Surgery"> Surgery
    </label>
   <label>
       <input type="checkbox" name="treat[]" value="Radiotherapy"> Radiotherapy
    </label>
   <label>
      <input type="checkbox" name="treat[]" value="Chemotherapy"> Chemotherapy
    </label>
   <label>
      <input type="checkbox" name="treat[]" value="Hormone therapy "> Hormone therapy 
    </label>
   <label>
      <input type="checkbox" name="treat[]" value="Other"> Other
    </label>
   <legend>Source</legend>
   <!--Hospital-->
   <div class="form-group">
    <label for="Hospital" class="col-md-2 control-label">Hospital</label>
    <div class="col-md-4">
      <input type="text" name="Hospital" id="Hospital" class="form-control validate[required]"  placeholder="Hospital">
    </div>
  </div>
   
   <!--Path_lab_no-->
   <div class="form-group">
    <label for="Path_lab_no" class="col-md-2 control-label">Path_lab_no</label>
    <div class="col-md-4">
      <input type="text" name="Path_lab_no" id="Path_lab_no" class="form-control validate[required]"  placeholder="Path_lab_no">
    </div>
  </div>
   
   <!--Unit-->
   <div class="form-group">
    <label for="Unit" class="col-md-2 control-label">Unit</label>
    <div class="col-md-4">
      <input type="text" name="Unit" id="Unit" class="form-control validate[required]"  placeholder="Unit">
    </div>
  </div>
   
   <!--Case_no-->
   <div class="form-group">
    <label for="Case_no" class="col-md-2 control-label">Case_no</label>
    <div class="col-md-4">
      <input type="text" name="Case_no" id="Case_no" class="form-control validate[required]"  placeholder="Case_no">
    </div>
  </div>
   
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 pull-right">
        <button type="reset" class="btn btn-warning">Reset</button>
        <button type="button" class="btn btn-info" id="submitbtn1">Add Another</button>
        <button type="button" class="btn btn-primary" id="submitbtn">Submit</button>
    </div>
  </div>
</form>
       <?php
    }
    
 ///////////////////////////////////////////////////////////
//////////// Patient Examination //////////////////////
//////////////////////////////////////////////////////////
     if($_GET['page'] == "Examination"){
         echo $_POST['id'];
        ?>
<form class="form-horizontal" role="form">
    <legend>Patient Examination</legend>
  
  <!--Biops Number-->
  <div class="form-group">
    <label for="Biops_Number" class="col-md-2 control-label">Biops Number</label>
    <div class="col-md-4">
        <input type="text" name="Biops_Number" id="Biops_Number" class="form-control validate[required]" placeholder="Enter Biops Number">
    </div>
  </div>
    
  <!--Basis_Of_Diagnosis-->
  <div class="form-group">
    <label for="Biops_collected" class="col-md-2 control-label">Biops Collected From</label>
    <div class="col-md-4">
      <input type="text" name="Biops_collected" id="Biops_collected" class="form-control validate[required]"  placeholder="Biops Collected From">
    </div>
  </div>
 
  <!--Examination Details-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Examination Details</label>
    <div class="col-md-4">
      <textarea rows="5" name="Examination_Details" id="Examination_Details" class="form-control validate[required]"  placeholder="Examination Details"></textarea>
    </div>
  </div>
    
   <!--Treatment Details-->
   <div class="form-group">
    <label for="Diagnosis_Done_Before" class="col-md-2 control-label">Treatment Details</label>
    <div class="col-md-4">
      <textarea rows="5" name="Treatment_Details" id="Treatment_Details" class="form-control validate[required]"  placeholder="Treatment Details"></textarea>
    </div>
  </div>
   
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 pull-right">
        <button type="reset" class="btn btn-warning">Reset</button>
        <button type="button" class="btn btn-info" id="submitbtn1">Add Another</button>
        <button type="button" class="btn btn-primary" id="submitbtn">Submit</button>
    </div>
  </div>
</form>
       <?php
    }
    
    
    
    ///////////////////////////////////////////////////////////
    ////////////patient Followup /////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "follow_up"){
        ?>
<h3 class="text-center">Patient Follow Up</h3>

<hr />

    <form class="form-horizontal" role="form">
  
  <!--Diagnosis Details-->
  <div class="form-group">
    <label for="Date" class="col-md-2 control-label">Date of last contact</label>
    <div class="col-md-4">
      <input type="text" id="last_date" name="last_date" id="last_date" class="form-control validate[required]" placeholder="Date of last contact">
    </div>
  </div>
 
  <!--Examination Details-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Status at last contact</label>
    <div class="col-md-4">
      <?php
     $statusarr = array("Alive","Dead","Not Known ");
      echo form::generalDropdown("status", "Status at last contact", $statusarr, ""); 
      ?>
    </div>
  </div>
   <!--Treatment Details-->
   <div class="form-group">
    <label for="Diagnosis_Done_Before" class="col-md-2 control-label">Cause of death <br>(Leave if not applicable)</label>
    <div class="col-md-4">
     <?php
     $causearr = array("This cancer","0ther cause","Not Known ");
      echo form::generalDropdown("deathcause", "Cause of death", $causearr, ""); 
      ?>
        
    </div>
  </div>
   
   <!--Treatment Details-->
   <div class="form-group">
    <label for="data_enter" class="col-md-2 control-label">Data entered by</label>
    <div class="col-md-4">
      <input type="text" name="drname" id="drname" class="form-control validate[required]" placeholder="Data entered by">
    </div>
  </div>
  
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 pull-right">
        <button type="reset" class="btn btn-warning" id="loginbtn">Reset</button>
        <button type="button" class="btn btn-info followbtn" id="followbtn">Done</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>
       <?php
    }
    
    
    ///////////////////////////////////////////////////////////
    ////////////patient add User /////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "addUser"){
        ?>
<form class="form-horizontal" role="form">
    <legend>Add User</legend>
     <!--First Name-->
  <div class="form-group">
    <label for="First_Name" class="col-md-2 control-label">First Name</label>
    <div class="col-md-4">
      <input type="text" name="First_Name" id="First_Name" class="form-control validate[required]"  placeholder="First Name">
    </div>
  </div>
 
  <!--Middle Name-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Middle Name</label>
    <div class="col-md-4">
      <input type="text" name="Middle_Name" id="Middle_Name" class="form-control"  placeholder="Middle Name">
    </div>
  </div>
    
   <!--Last Name-->
   <div class="form-group">
    <label for="Last_Name" class="col-md-2 control-label">Last Name</label>
    <div class="col-md-4">
      <input type="text" name="Last_Name" id="Last_Name" class="form-control validate[required]"  placeholder="Last Name">
    </div>
  </div>
   
  <!--Sex-->
 <div class="form-group">
    <label for="Sex" class="col-md-2 control-label">Sex</label>
    <div class="col-md-4">
      <!--<input type="text" name="Sex" id="Sex" class="form-control validate[required]"  placeholder="Sex">-->
      <?php echo form::genderDropdown(""); ?>
    </div>
  </div>
 
 <!--Role-->
 <div class="form-group">
    <label for="Role" class="col-md-2 control-label">Role</label>
    <div class="col-md-4">
      <!--<input type="text" name="Occupation" id="Occupation" class="form-control validate[required]"  placeholder="Occupation">-->
      <?php echo form::generalDropdown("role", "Role", array("Admin","Doctor"), ""); ?>
    </div>
  </div>
  <!--Email-->
  <div class="form-group">
    <label for="Email" class="col-md-2 control-label" >Email</label>
    <div class="col-md-4">
      <input type="text" name="Email" id="Email" class="form-control validate[required,custom[email]]"  placeholder="Email">
    </div>
  </div>
 
  <!--Phone Number-->
  <div class="form-group">
    <label for="Phone_Number" class="col-md-2 control-label">Phone Number</label>
    <div class="col-md-4">
      <input type="text" name="Phone_Number" id="Phone_Number" class="form-control validate[required]"  placeholder="Phone Number">
    </div>
  </div>
    
  <!--Phone Number-->
  <div class="form-group">
    <label for="Password" class="col-md-2 control-label">Password</label>
    <div class="col-md-4">
        <input type="password" name="Password" id="Password" class="form-control validate[required]"  placeholder="Password">
    </div>
  </div>
    
  <!--Phone Number-->
  <div class="form-group">
    <label for="Repassword" class="col-md-2 control-label">Password Again</label>
    <div class="col-md-4">
        <input type="password" name="Repassword" id="Repassword" class="form-control validate[required]"  placeholder="Password Again">
    </div>
  </div>
    
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 pull-right">
        <button type="reset" class="btn btn-warning" >Reset</button>
        <button type="button" class="btn btn-info" id="submitbtn">Done</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>
       <?php
    }
    
    
    ///////////////////////////////////////////////////////////
    //////////// add lo /////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "Edit_User"){
        ?>
<h3 class="text-center">Edit User</h3>
<hr/>
<form class="form-horizontal" role="form">
     <!--First Name-->
  <div class="form-group">
    <label for="First_Name" class="col-md-2 control-label">First Name</label>
    <div class="col-md-4">
      <input type="text" name="First_Name" id="First_Name" class="form-control validate[required]"  value="First Name">
    </div>
  </div>
 
  <!--Middle Name-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Middle Name</label>
    <div class="col-md-4">
      <input type="text" name="Middle_Name" id="Middle_Name" class="form-control validate[required]"  value="Middle Name">
    </div>
  </div>
    
   <!--Last Name-->
   <div class="form-group">
    <label for="Last_Name" class="col-md-2 control-label">Last Name</label>
    <div class="col-md-4">
      <input type="text" name="Last_Name" id="Last_Name" class="form-control validate[required]"  value="Last Name">
    </div>
  </div>
   
  <!--Sex-->
 <div class="form-group">
    <label for="Sex" class="col-md-2 control-label">Sex</label>
    <div class="col-md-4">
      <!--<input type="text" name="Sex" id="Sex" class="form-control validate[required]"  value="Sex">-->
      <?php echo form::genderDropdown(""); ?>
    </div>
  </div>
 
 <!--Role-->
 <div class="form-group">
    <label for="Role" class="col-md-2 control-label">Role</label>
    <div class="col-md-4">
      <!--<input type="text" name="Occupation" id="Occupation" class="form-control validate[required]"  value="Occupation">-->
      <?php echo form::categoryDropdown("Role"); ?>
    </div>
  </div>
  <!--Email-->
  <div class="form-group">
    <label for="Email" class="col-md-2 control-label" >Email</label>
    <div class="col-md-4">
      <input type="text" name="Email" id="Email" class="form-control validate[required]"  value="Email">
    </div>
  </div>
 
  <!--Phone Number-->
  <div class="form-group">
    <label for="Phone_Number" class="col-md-2 control-label">Phone Number</label>
    <div class="col-md-4">
      <input type="text" name="Phone_Number" id="Phone_Number" class="form-control validate[required]"  value="Phone Number">
    </div>
  </div>
    
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 pull-right">
        <button type="reset" class="btn btn-warning" id="loginbtn">Cancel</button>
        <button type="button" class="btn btn-info" id="loginbtn">Submit</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>
       <?php
    }
    
    ///////////////////////////////////////////////////////////
    /////////////////Search User /////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "SearchUser"){
        ?>
<h4>Please Specify The Following Details</h4>
<form class="form-horizontal" role="form">
     <!--First Name-->
  <div class="form-group">
    <label for="First_Name" class="col-md-2 control-label">First Name</label>
    <div class="col-md-4">
      <input type="text" name="First_Name" id="First_Name" class="form-control validate[required]"  placeholder="First Name">
    </div>
  </div>
 
  <!--Middle Name-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Middle Name</label>
    <div class="col-md-4">
      <input type="text" name="Middle_Name" id="Middle_Name" class="form-control validate[required]"  placeholder="Middle Name">
    </div>
  </div>
    
   <!--Last Name-->
   <div class="form-group">
    <label for="Last_Name" class="col-md-2 control-label">Last Name</label>
    <div class="col-md-4">
      <input type="text" name="Last_Name" id="Last_Name" class="form-control validate[required]"  placeholder="Last Name">
    </div>
  </div>
   
  <!--Filter -->
 <div class="form-group">
    <label for="Sex" class="col-md-2 control-label">Add Filter</label>
    <div class="col-md-4">
      <!--<input type="text" name="Sex" id="Sex" class="form-control validate[required]"  placeholder="Sex">-->
        &nbsp;<?php echo form::generalDropdown("","select Category"); ?>
    </div>
    <div class="col-md-4">
      <!--<input type="text" name="Sex" id="Sex" class="form-control validate[required]"  placeholder="Sex">-->
      Value: <?php echo form::generalDropdown("","value"); ?>
    </div>
  </div>
 
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 pull-right">
        <button type="reset" class="btn btn-warning" id="loginbtn">Clear</button>
        <button type="button" class="btn btn-info" id="loginbtn">Cancel</button>
        <button type="reset" class="btn btn-success" id="loginbtn">Search</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>

<h3>Search Results</h3>
<table id="myTable" class="tablesorter"> 
<thead> 
<tr> 
    <th>Last Name</th> 
    <th>First Name</th> 
    <th>Middle Name</th> 
    <th>Due</th> 
    <th>Web Site</th> 
</tr> 
</thead> 
<tbody> 
<tr> 
    <td>Smith</td> 
    <td>John</td> 
    <td>jsmith@gmail.com</td> 
    <td>$50.00</td> 
    <td>http://www.jsmith.com</td> 
</tr> 
<tr> 
    <td>Bach</td> 
    <td>Frank</td> 
    <td>fbach@yahoo.com</td> 
    <td>$50.00</td> 
    <td>http://www.frank.com</td> 
</tr> 
<tr> 
    <td>Doe</td> 
    <td>Jason</td> 
    <td>jdoe@hotmail.com</td> 
    <td>$100.00</td> 
    <td>http://www.jdoe.com</td> 
</tr> 
<tr> 
    <td>Conway</td> 
    <td>Tim</td> 
    <td>tconway@earthlink.net</td> 
    <td>$50.00</td> 
    <td>http://www.timconway.com</td> 
</tr> 
</tbody> 
</table> 
<div class="row">
    <div class="col-md-2 btn btn-warning" id="edit_user"><i class="fa fa-pencil"></i> Edit User</div>
    <div class="col-md-2 btn btn-danger"><i class="fa fa-trash-o"></i> Remove User</div>
    <div class="col-md-2 btn btn-primary">Done</div>
</div>
       <?php
    }

    
   ///////////////////////////////////////////////////////////
    ////////////Add Location /////////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "addLocation"){
        ?>
<h3 class="text-center">Add Location</h3>
<hr/>
<form class="form-horizontal" role="form">
     <!--First Name-->
  <div class="form-group">
    <label for="Name" class="col-md-2 control-label">Name</label>
    <div class="col-md-4">
      <input type="text" name="Name" id="Name" class="form-control validate[required]"  placeholder="Name">
    </div>
  </div>
 
  <!--Middle Name-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Level</label>
    <div class="col-md-4">
      <!--<input type="text" name="Middle_Name" id="Middle_Name" class="form-control validate[required]"  placeholder="Middle Name">-->
      <?php echo form::generalDropdown("level","Level",array("Ward","Village"),""); ?>
    </div>
  </div>
    
   <!--Last Name-->
   <div class="form-group">
    <label for="Code" class="col-md-2 control-label">Code</label>
    <div class="col-md-4">
      <input type="text" name="Code" id="Code" class="form-control validate[required]"  placeholder="Code">
    </div>
  </div>
   
  <!--Sex-->
 <div class="form-group">
    <label for="Parent Node" class="col-md-2 control-label">Parent Node</label>
    <div class="col-md-4">
      <!--<input type="text" name="Sex" id="Sex" class="form-control validate[required]"  placeholder="Sex">-->
       <?php echo form::generalDropdown("Parent Level","parent",array("Region","District","Ward"),""); ?>
    </div>
  </div>
 
 
    
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 ">
        <button type="reset" class="btn btn-warning" id="loginbtn">Clear</button>
        <button type="button" class="btn btn-info" id="loginbtn">Cancel</button>
        <button type="button" class="btn btn-success" id="loginbtn">Submit</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>
       <?php
    }
    
    ///////////////////////////////////////////////////////////
    /////////////////Search Location /////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "SearchLocation"){
        ?>
<h4>Please Specify The Following Details</h4>
<form class="form-horizontal" role="form">
     <!--First Name-->
  <div class="form-group">
    <label for="First_Name" class="col-md-2 control-label">Name</label>
    <div class="col-md-4">
      <input type="text" name="First_Name" id="First_Name" class="form-control validate[required]"  placeholder="Name">
    </div>
  </div>
 
  
  <!--Filter -->
 <div class="form-group">
    <label for="Sex" class="col-md-2 control-label">Add Filter</label>
    <div class="col-md-4">
      <!--<input type="text" name="Sex" id="Sex" class="form-control validate[required]"  placeholder="Sex">-->
        <?php echo form::generalDropdown("","Level"); ?>
    </div>
    <div class="col-md-4">
      <!--<input type="text" name="Sex" id="Sex" class="form-control validate[required]"  placeholder="Sex">-->
      <?php echo form::generalDropdown("","Ward"); ?>
    </div>
  </div>
 
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 pull-right">
        <button type="reset" class="btn btn-warning" id="loginbtn">Clear</button>
        <button type="button" class="btn btn-info" id="loginbtn">Cancel</button>
        <button type="reset" class="btn btn-success" id="loginbtn">Search</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>

<h3>Search Results</h3>
<table id="myTable" class="tablesorter"> 
<thead> 
<tr> 
    <th>Location Level</th>
    <th>Name</th>
    <th>Code</th> 
    <th>Node</th> 
     
</tr> 
</thead> 
<tbody> 
<tr> 
    <td>District</td> 
    <td>John</td> 
    <td>jsmith@gmail.com</td> 
    <td>$50.00</td> 
</tr> 
<tr> 
    <td>Ward</td> 
    <td>Frank</td> 
    <td>fbach@yahoo.com</td> 
    <td>$50.00</td> 
</tr> 
<tr> 
    <td>Village</td> 
    <td>Jason</td> 
    <td>jdoe@hotmail.com</td> 
    <td>$100.00</td> 
</tr> 
<tr> 
    <td>Village</td> 
    <td>Tim</td> 
    <td>tconway@earthlink.net</td> 
    <td>$50.00</td> 
</tr> 
</tbody> 
</table> 
<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>
<div class="row">
    <div class="col-md-2 btn btn-warning" id="edit_user"><i class="fa fa-pencil"></i> Edit Location</div>
    <div class="col-md-2 btn btn-danger"><i class="fa fa-trash-o"></i> Remove Location</div>
</div>
       <?php
    }

    
    ///////////////////////////////////////////////////////////
    ////////////Edit Location /////////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "Edit_Location"){
        ?>
<h3 class="text-center">Edit Locationn</h3>
<hr/>
<form class="form-horizontal" role="form">
     <!--First Name-->
  <div class="form-group">
    <label for="Name" class="col-md-2 control-label">Name</label>
    <div class="col-md-4">
      <input type="text" name="Name" id="Name" class="form-control validate[required]"  value="Name">
    </div>
  </div>
 
  <!--Middle Name-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Level</label>
    <div class="col-md-4">
      <!--<input type="text" name="Middle_Name" id="Middle_Name" class="form-control validate[required]"  value="Middle Name">-->
      <?php echo form::generalDropdown("","Level"); ?>
    </div>
  </div>
    
   <!--Last Name-->
   <div class="form-group">
    <label for="Code" class="col-md-2 control-label">Code</label>
    <div class="col-md-4">
      <input type="text" name="Code" id="Code" class="form-control validate[required]"  value="Code">
    </div>
  </div>
   
  <!--Sex-->
 <div class="form-group">
    <label for="Parent Node" class="col-md-2 control-label">Parent Node</label>
    <div class="col-md-4">
      <!--<input type="text" name="Sex" id="Sex" class="form-control validate[required]"  placeholder="Sex">-->
      <?php echo form::generalDropdown("","Parent Node"); ?>
    </div>
  </div>
 
 
    
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 ">
        <button type="button" class="btn btn-info" id="loginbtn">Cancel</button>
        <button type="button" class="btn btn-success" id="loginbtn">Submit</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>
       <?php
    }
    
    ///////////////////////////////////////////////////////////
    ////////////Add Occupation /////////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "addOccupation"){
        ?>
<h3 class="text-center">Add Occupation</h3>
<hr/>
<form class="form-horizontal" role="form">
     <!--First Name-->
  <div class="form-group">
    <label for="Name" class="col-md-2 control-label">Occupation Name</label>
    <div class="col-md-4">
      <input type="text" name="Name" id="Name" class="form-control validate[required]"  placeholder="Occupation Name">
    </div>
  </div>
     
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 ">
        <button type="button" class="btn btn-success" id="submitbtn">Add</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>
       <?php
    }
    
    ///////////////////////////////////////////////////////////
    /////////////////Search Occupation /////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "SearchOccupation"){
        ?>
<h4>Please Specify The Following Details</h4>
<form class="form-horizontal" role="form">
     <!--First Name-->
  <div class="form-group">
    <label for="First_Name" class="col-md-2 control-label">Name</label>
    <div class="col-md-4">
      <input type="text" name="First_Name" id="First_Name" class="form-control validate[required]"  placeholder="Name">
      <button type="reset" class="btn btn-success" id="loginbtn">Search</button>
    </div>
  </div>
 
  

<table id="myTable" class="tablesorter"> 
<thead> 
<tr> 
    <th>#No</th>
    <th>Occupation Name</th> 
     
</tr> 
</thead> 
<tbody> 
<tr> 
    <td>1</td> 
    <td>John</td> 
</tr> 
<tr> 
    <td>2</td> 
    <td>Frank</td> 
</tr> 
<tr> 
    <td>3</td> 
    <td>Jason</td> 
<tr> 
    <td>4</td> 
    <td>Tim</td> 
</tr> 
</tbody> 
</table> 
<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>
<div class="row">
    <div class="col-md-1 btn btn-warning" id="edit_user"><i class="fa fa-pencil"></i> Edit</div>
    <div class="col-md-1 btn btn-danger"><i class="fa fa-trash-o"></i> Remove</div>
</div>
       <?php
    }
    
    ///////////////////////////////////////////////////////////
    ////////////Add Report /////////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "addReport"){
        ?>
<h3 class="text-center">Add Report</h3>
<hr/>
<form class="form-horizontal" role="form">
     <!--First Name-->
  <div class="form-group">
    <label for="Name" class="col-md-2 control-label">Type Identifier</label>
    <div class="col-md-4">
      <input type="text" name="Name" id="Name" class="form-control validate[required]"  placeholder="Report Type Identifier">
    </div>
  </div>
     
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8 ">
        <button type="button" class="btn btn-success" id="loginbtn">Add</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>
       <?php
    }
    
    ///////////////////////////////////////////////////////////
    /////////////////Search Occupation /////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "SearchReport"){
        ?>
<h4>Please Specify The Following Details</h4>
<form class="form-horizontal" role="form">
     <!--First Name-->
  <div class="form-group">
    <label for="First_Name" class="col-md-2 control-label">Report Type</label>
    <div class="col-md-4">
      <input type="text" name="First_Name" id="First_Name" class="form-control validate[required]"  placeholder="Report Type">
      <button type="reset" class="btn btn-success" id="loginbtn">Search</button>
    </div>
  </div>
 
  

<table id="myTable" class="tablesorter"> 
<thead> 
<tr> 
    <th>#No</th>
    <th>Report Type</th> 
     
</tr> 
</thead> 
<tbody> 
<tr> 
    <td>1</td> 
    <td>John</td> 
</tr> 
<tr> 
    <td>2</td> 
    <td>Frank</td> 
</tr> 
<tr> 
    <td>3</td> 
    <td>Jason</td> 
<tr> 
    <td>4</td> 
    <td>Tim</td> 
</tr> 
</tbody> 
</table> 
<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>
<div class="row">
    <div class="col-md-1 btn btn-warning" id="edit_user"><i class="fa fa-pencil"></i> Edit</div>
    <div class="col-md-1 btn btn-danger"><i class="fa fa-trash-o"></i> Remove</div>
</div>
       <?php
    }
    
}


?>
