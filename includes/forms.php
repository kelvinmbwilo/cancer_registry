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
<h3 class="text-center">Patient Registration</h3>
<hr/>
<form class="form-horizontal" role="form">
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
   
 <!--Sex-->
 <div class="form-group">
    <label for="Sex" class="col-md-2 control-label">Sex</label>
    <div class="col-md-4">
      <!--<input type="text" name="Sex" id="Sex" class="form-control validate[required]"  placeholder="Sex">-->
      <?php echo form::genderDropdown(""); ?>
    </div>
  </div>
 
 <!--Occupation-->
 <div class="form-group">
    <label for="Occupation" class="col-md-2 control-label">Occupation</label>
    <div class="col-md-4">
      <!--<input type="text" name="Occupation" id="Occupation" class="form-control validate[required]"  placeholder="Occupation">-->
      <?php echo form::categoryDropdown("Occupation"); ?>
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
      <input type="text" name="Cell_leader" id="Cell_leader" class="form-control validate[required]"  placeholder="Name of Ten cell Leader">
    </div>
  </div>
 <hr />
 <h3>Patient Resident</h3>
 
 <div class="form-group">
     <div class="col-md-2">
        <?php echo form::countryList(); ?>
    </div>
    <div class="col-md-2">
        <?php echo form::regionalDropWithDefault(); ?>
    </div>
     
     <div class="col-md-2">
        <?php echo form::districtDropdown("all"); ?>
    </div>
     
     <div class="col-md-2">
        <?php echo form::wardDropdown("all"); ?>
    </div>
     
     <div class="col-md-2">
        <?php echo form::villageDropdown("all"); ?>
    </div>
     
  </div>
   <div class="form-group">
    <div class="col-md-offset-2 col-md-10 pull-right">
        <button type="reset" class="btn btn-warning" id="loginbtn">Reset</button>
        <button type="button" class="btn btn-info" id="loginbtn">Register</button>
    </div>
  </div>
    <h3 id="output" ></h3>
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
      <input type="Date_Of_Incidence" name="Date_Of_Incidence" id="Patient_id" class="form-control validate[required]" placeholder="Date Of Incidence">
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
//////////// Patient Examination //////////////////////
//////////////////////////////////////////////////////////
     if($_GET['page'] == "Examination"){
        ?>
<h3 class="text-center">Patient Examination</h3>
<hr/>
<form class="form-horizontal" role="form">
    <!--Patient_id-->
<div class="form-group">
    <label for="Patient_id" class="col-md-2 control-label">Patient_id</label>
    <div class="col-md-4">
      <input type="text" name="Patient_id" id="Patient_id" class="form-control validate[required]" placeholder="Patient_id">
    </div>
  </div>
    
  <!--Biops Number-->
  <div class="form-group">
    <label for="Biops_Number" class="col-md-2 control-label">Biops Number</label>
    <div class="col-md-4">
        <input type="text" name="Biops_Number" id="Biops_Number" class="form-control validate[required]" placeholder="Enter Biops Number">
    </div>
  </div>
    
  <!--Basis_Of_Diagnosis-->
  <div class="form-group">
    <label for="Basis_Of_Diagnosis" class="col-md-2 control-label">Biops Collected From</label>
    <div class="col-md-4">
      <input type="text" name="Basis_Of_Diagnosis" id="Basis_Of_Diagnosis" class="form-control validate[required]"  placeholder="Basis Of Diagnosis">
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
        <button type="reset" class="btn btn-warning" id="loginbtn">Reset</button>
        <button type="button" class="btn btn-info" id="loginbtn">Done</button>
    </div>
  </div>
    <h3 id="output" ></h3>
</form>
       <?php
    }
    
    
    ///////////////////////////////////////////////////////////
    ////////////patient Followup /////////////////////////////
    //////////////////////////////////////////////////////////
    if($_GET['page'] == "follow_up"){
        ?>
<h3 class="text-center">Patient Follow Up</h3>
<hr/>
<form class="form-horizontal" role="form">
    <!--Patient_id-->
<div class="form-group">
    <label for="Patient_id" class="col-md-2 control-label">Patient_id</label>
    <div class="col-md-4">
      <input type="text" name="Patient_id" id="Patient_id" class="form-control validate[required]" placeholder="Patient_id">
    </div>
  </div>
    
   <div class="form-group">
    <div class="col-md-offset-2 col-md-8">
        <button type="button" class="btn btn-warning" id="loginbtn">View Follow Up status</button>
        <button type="button" class="btn btn-info" id="loginbtn">Start Examination</button>
    </div>
  </div>
</form>
<hr />
<div class="row">
    <div class="col-md-4">Total Follow Ups Done To Date</div><div class="col-md-8 text-left"><b>6</b></div>
</div>
<div class="row">
    <div class="col-md-4">Date Of Last Follow UP</div><div class="col-md-8 text-left"><b>12 june 2009</b></div>
</div>
<div class="row">
    <div class="col-md-4">Area Of Diagnosis</div><div class="col-md-8 text-left"><b>Left Leg</b></div>
</div>
    <form class="form-horizontal" role="form">
  
  <!--Diagnosis Details-->
  <div class="form-group">
    <label for="Middle_Name" class="col-md-2 control-label">Diagnosis Details</label>
    <div class="col-md-4">
      <textarea rows="5" name="Diagnosis_Details" id="Diagnosis_Details" class="form-control validate[required]"  placeholder="Diagnosis Details"></textarea>
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
        <button type="reset" class="btn btn-warning" id="loginbtn">Reset</button>
        <button type="button" class="btn btn-info" id="loginbtn">Done</button>
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
<h3 class="text-center">Add User</h3>
<hr/>
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
      <?php echo form::categoryDropdown("Role"); ?>
    </div>
  </div>
  <!--Email-->
  <div class="form-group">
    <label for="Email" class="col-md-2 control-label" >Email</label>
    <div class="col-md-4">
      <input type="text" name="Email" id="Email" class="form-control validate[required]"  placeholder="Email">
    </div>
  </div>
 
  <!--Phone Number-->
  <div class="form-group">
    <label for="Phone_Number" class="col-md-2 control-label">Phone Number</label>
    <div class="col-md-4">
      <input type="text" name="Phone_Number" id="Phone_Number" class="form-control validate[required]"  placeholder="Phone Number">
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
    <div class="col-md-2 btn btn-default"><i class="fa fa-pencil"></i> Edit User</div>
    <div class="col-md-2 btn btn-default"><i class="fa fa-trash-o"></i> Remove User</div>
    <div class="col-md-2 btn btn-default">Done</div>
</div>
       <?php
    }
}
?>
