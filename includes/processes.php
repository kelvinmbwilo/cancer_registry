<?php
include '../includes/connection.php';
function __autoload($class_name) {
    include_once '../class/'. $class_name . '.php';
}
if(isset($_GET['page'])){
    if($_GET['page'] == "list_user"){
        $query = mysql_query("SELECT * FROM user");
        ?>
<h3>System Users </h3>
<table id="myTable" class="display tablesorter"> 
<thead> 
<tr> 
    <th>First Name</th>
     <th>Last Name</th>
    <th>Email</th> 
    <th>Cell Phone</th> 
    <th>Role</th> 
</tr> 
</thead> 
<tbody>
    <?php while ($row = mysql_fetch_array($query)) {
                
             ?>
<tr> 
    <td><?php echo $row['first_name'] ?></td> 
    <td><?php echo $row['last_name'] ?></td> 
    <td><?php echo $row['email'] ?></td> 
    <td><?php echo $row['phone'] ?></td> 
    <td><?php echo $row['level'] ?></td> 
</tr> 

<?php } ?>
</tbody> 

<tfoot> 
<tr> 
    <th>First Name</th>
     <th>Last Name</th>
    <th>Email</th> 
    <th>Cell Phone</th> 
    <th>Role</th> 
</tr> 
</tfoot> 
</table> 

        <?php
    }
    
    if($_GET['page'] == "list_patient"){
        $query = mysql_query("SELECT * FROM patient");
        ?>
<table id="myTable" class="display tablesorter table-bordered"> 
<thead> 
<tr> 
    <th>Patient_id</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th> 
    <th>Gender</th> 
    <th>Date of Birth</th> 
    <th></th> 
</tr> 
</thead> 
<tbody>
    <?php while ($row = mysql_fetch_array($query)) {
                
             ?>
<tr> 
    <td><?php echo $row['patient_id'] ?></td> 
    <td><?php echo $row['first_name'] ?></td> 
    <td><?php echo $row['last_name'] ?></td> 
    <td><?php echo $row['last_name'] ?></td> 
    <td><?php echo $row['gender'] ?></td>
    <td><?php echo $row['date_of_birth'] ?></td> 
    <td>
        <a href="#s" id="<?php echo $row['id'] ?>" class="moreinfo btn btn-primary btn-xs" title="View More Details"><i class="fa fa-info"></i> Info</a>
        <a href="#a" id="<?php echo $row['id'] ?>" class="deletepat text-danger btn btn-danger btn-xs" title="Delete Patient"><i class="fa fa-trash-o"></i> </a>
    </td>  
</tr> 

<?php } ?>
</tbody> 

<tfoot> 
<tr> 
    <th>Patient_id</th>
     <th>Middle Name</th>
    <th>Last Name</th> 
    <th>Gender</th> 
    <th>Date of Birth</th> 
    <th></th> 
</tr> 
</tfoot> 
</table> 

        <?php
    }
    
    if($_GET['page'] == "list_Location"){
        ?>
<h4>Filter Option</h4>
<div class="row" style="padding-bottom: 5px">
    <div class="col-md-2"><?php echo form::generalDropdown("","Select Level") ?></div>
    <div class="col-md-2"><?php echo form::generalDropdown("","Ascending Order") ?></div>
</div>
<div class="row" style="padding-bottom: 5px">
    <div class="col-md-2"><?php echo form::generalDropdown("","Specify Region") ?></div>
    <div class="col-md-2"><?php echo form::generalDropdown("","Specify District") ?></div>
    <div class="col-md-2"><?php echo form::generalDropdown("","Specify Ward") ?></div>
    <div class="col-md-2"><?php echo form::generalDropdown("","Specify Village") ?></div>
</div>
<div class="row">
   
    <div class="col-md-offset-4 btn btn-primary">Submit</div>
</div>

<h3>Filter Result</h3>
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
        <?php
    }

    if($_GET['page'] == "list_Occupation"){
        ?>
<h4>Filter Option</h4>
<div class="row" style="padding-bottom: 5px">
    <div class="col-md-5">Record(s) Found :2</div>
</div>

<h4>Result Details</h4>
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
        <?php
    }

    if($_GET['page'] == "list_Report"){
        ?>
<h4>Filter Option</h4>
<div class="row" style="padding-bottom: 5px">
    <div class="col-md-5">Record(s) Found :2</div>
</div>

<h4>Result Details</h4>
<table id="myTable" class="tablesorter"> 
<thead> 
<tr> 
    <th>#No</th>
    <th>Report Name</th> 
     
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
        <?php
    }

    if($_GET['page'] == "View_report"){
        ?>
<h4>Report Specific Filters</h4>
<div class="container">
    <div class="col-md-2"><?php echo form::regionalDropWithDefault(); ?></div>
    <div class="col-md-2"><?php echo form::districtDropdown("all"); ?></div>
    <div class="col-md-2"><?php echo form::genderDropdown(""); ?></div>
    <div class="col-md-2"><?php echo form::generalDropdown("","Age Range",array("All Ages","Write Age","2","3","4","5","6","7","8","9","10")); ?></div>
</div>
<div class="container">
    
    <div class="col-md-4">Select Range 
        From: <input type="text" id="from" name="from" class="form-control"/>
        
    </div>
    <div class="col-md-4">to:  <input type="text" id="to" name="to" class="form-control" placeholder="start date"/></div>
</div>

<div class="btn btn-info btn-sm tog" style="margin: 10px" id="toggleadv">Advanced Filters</div>
<div class="container" id="advfilters">
<div class="container">
    <div class="col-md-3">
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
    <div class="col-md-2">
        <?php 
      $query1 = mysql_query("SELECT * FROM site_of_tumor");
      $arr1 = array();
      while ($row = mysql_fetch_array($query1)) {
          $arr1["{$row['id']}"] = $row['value'];
      }
     // $arr = array("Death certificate only","Histology of metastasis","Clinical only ","Cytology / Haematology","Specific tumour markers","Histology of primary","Clinical investigations","Unknown");
      echo form::generalDropdown("Topography", "Topography", $arr1, ""); 
      ?>
    </div>
    <div class="col-md-2">
        <?php echo form::generalDropdown("","Morphology",array("All Ages","Write Age","2","3","4","5","6","7","8","9","10")); ?>
    </div>
    <div class="col-md-3"><?php echo form::generalDropdown("","Behevior",array("All Ages","Write Age","2","3","4","5","6","7","8","9","10")); ?></div>
</div>
<div class="container" style="padding-top: 10px">
    <div class="col-md-2"><?php 
      $query = mysql_query("SELECT * FROM stages");
      $arr = array();
      while ($row = mysql_fetch_array($query)) {
          $arr["{$row['code']}"] = $row['stage'];
      }
      echo form::generalDropdown("ICD_10", "Stage", $arr, ""); 
      ?></div>
    <div class="col-md-2"><?php echo form::generalDropdown("","Treatment",array("All","Surgery","Radiotherapy","Chemotherapy","Hormone therapy","Other")); ?></div>
    <div class="col-md-3"><?php echo form::generalDropdown("","Death Cause",array("All","This cancer","Other cause")); ?></div>
    <div class="col-md-3"><?php echo form::generalDropdown("","Age Range",array("All Ages","Write Age","2","3","4","5","6","7","8","9","10")); ?></div>
</div>

</div>
<div class="container" style="padding-top: 15px">
    <div class="col-md-2"></div>
    <div class="col-md-2"><button type="button" class="btn btn-info">View</button></div>
    <div class="col-md-2"></div>
    <div class="col-md-5">
        <p>Export</p>
        <button type="button" class="btn btn-default btn-xs">XLS</button>
        <button type="button" class="btn btn-default btn-xs">PDF</button>
        <button type="button" class="btn btn-default btn-xs">DOC</button>
    </div>
    
</div>


<div id="container" style="width:90%; height:400px;">afdsaf</div>
        <?php
    }
}
?>
