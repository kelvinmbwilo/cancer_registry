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
<table id="myTable" class="display tablesorter"> 
<thead> 
<tr> 
    <th>Patient_id</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th> 
    <th>Gender</th> 
    <th>Date of Birth</th> 
    <th>Country</th> 
    <th>Region</th> 
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
    <td><a href="#" id="<?php echo $row['id'] ?>" class="moreinfo">Info</a></td> 
    <td><?php echo $row['region'] ?></td>  
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
    <th>Country</th> 
    <th>Region</th>  
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
    <div class="col-md-2"><?php echo form::generalDropdown("","Select Region"); ?></div>
    <div class="col-md-2"><?php echo form::generalDropdown("","Select District"); ?></div>
    <div class="col-md-2"><?php echo form::generalDropdown("","Select Ward"); ?></div>
    <div class="col-md-2"><?php echo form::generalDropdown("","Select Village"); ?></div>
</div>
<div class="container">
    <div class="col-md-3">Report Type<?php echo form::generalDropdown("","Quick View"); ?></div>
    <div class="col-md-3">Select Range 
        From: <input type="text" id="from" name="from" class="form-control"/>
        
    </div>
    <div class="col-md-3">to:  <input type="text" id="to" name="to" class="form-control"/></div>
</div>

<h4>Choose Indicators</h4>
<div class="container">
    <div class="col-md-2"><input type="checkbox" />All</div>
    <div class="col-md-2"><input type="checkbox" />Transfers</div>
    <div class="col-md-3"><input type="checkbox" />Total Submissions</div>
    <div class="col-md-3"><input type="checkbox" />Total Referrals Given</div>
</div>
<div class="container">
    <div class="col-md-2"><input type="checkbox" />Registration</div>
    <div class="col-md-2"><input type="checkbox" />Deaths</div>
    <div class="col-md-3"><input type="checkbox" />Total Submissions By Name</div>
    <div class="col-md-3"><input type="checkbox" />Total Referrals Confirmed</div>
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
        <?php
    }
}
?>
