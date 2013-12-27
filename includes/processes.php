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
<table id="myTable" class="display tablesorter table table-bordered col-md-11"> 
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
        <a href="#s" id="<?php echo $row['id'] ?>" class="moreinfo btn btn-primary btn-xs" title="View More Details" style="margin-right: 5px"><i class="fa fa-info"></i> Info</a>
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
    <div class="col-md-2" id="districtarea"><?php echo form::districtDropdown("all"); ?></div>
    <?php //form::districdropscript(); ?>
    <div class="col-md-2"><?php echo form::generalDropdown("sex","Sex",array("All Sex","Female","Male")); ?></div>
    <div class="col-md-2"><?php echo form::generalDropdown("age","Age Range",array("All Ages","Write Age","2","3","4","5","6","7","8","9","10")); ?></div>
</div>
<div class="container">
    
    <div class="col-md-4">Select Range 
        From: <input type="text" id="from" name="from" class="form-control" placeholder="Starting Date"/>
        
    </div>
    <div class="col-md-4">to:  <input type="text" id="to" name="to" class="form-control" placeholder="End Date"/></div>
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
      echo form::generalDropdown2("Basis_Diagnosis", "Basis Of Diagnosis", $arr, ""); 
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
      echo form::generalDropdown2("Topography", "Topography", $arr1, ""); 
      ?>
    </div>
    <div class="col-md-2">
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
<div class="container" style="padding-top: 10px">
    <div class="col-md-2"><?php 
      $query = mysql_query("SELECT * FROM stages");
      $arr = array();
      while ($row = mysql_fetch_array($query)) {
          $arr["{$row['code']}"] = $row['stage'];
      }
      echo form::generalDropdown2("Stage", "Stage", $arr, ""); 
      ?></div>
    <div class="col-md-2"><?php echo form::generalDropdown2("Treatment","Treatment",array("All","Surgery","Radiotherapy","Chemotherapy","Hormone therapy","Other")); ?></div>
    <div class="col-md-3" id="behaviorarea"><?php echo form::generalDropdown1("Behevior","Behevior",array()); ?></div>
    <script>
    $(document).ready(function(){
       
     })
    </script>
</div>

</div>
<div class="container" style="padding-top: 15px">
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    
    <div class="col-md-5">
<!--        <p>Export</p>
        <button type="button" class="btn btn-default btn-xs">XLS</button>
        <button type="button" class="btn btn-default btn-xs">PDF</button>
        <button type="button" class="btn btn-default btn-xs">DOC</button>-->
    </div>
    <div class="col-md-2 btn btn-info btn-sm" id="savereport" ><i class="fa fa-save-o"></i> Save Report</div>
    <div class="col-md-1"  ></div>
</div>
<div class="container" style="padding-top: 15px" id="savereportform">
    <div class="col-md-2"></div>
    
    
    <div class="col-md-4">
<!--        <p>Export</p>
        <button type="button" class="btn btn-default btn-xs">XLS</button>
        <button type="button" class="btn btn-default btn-xs">PDF</button>
        <button type="button" class="btn btn-default btn-xs">DOC</button>-->
    </div>
    <div class="col-md-4" >
    <input type="text" class="form-control" id="reporttitle" placeholder="Report Title">
    </div>
  
    <div class="col-md-1 btn btn-info btn-sm" id="savereport1" >Save</div>
    <div class="col-md-1" id="dumb"></div>
</div>

<div class="container" id="chatmenus" style="padding: 10px">
    <div class="col-md-2 btn btn-default" id="tablechat">Table</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-default" id="linechat">Line Chart</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-default" id="barchat">Bar Chart</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-default" id="piechat">Pie Chat</div>
</div>
<div class="container" id="statdata">
   
</div>

        <?php
    }
    
    if($_GET['page'] == "savedreport"){
        ?>
        <div class="container" style="padding-top: 10px">
    <div class="col-md-6"><?php 
      $query = mysql_query("SELECT * FROM reports");
      $arr = array();
      while ($row = mysql_fetch_array($query)) {
          $arr["{$row['id']}"] = $row['name'];
      }
      echo form::generalDropdown("Reports", "Select Report", $arr, ""); 
      ?></div>
    
    <script>
    $(document).ready(function(){
        $("#chatmenus").hide();
       $("#Reports").change(function(){
          $("#chatmenus").show("slow");
          $("#reportarea").load("includes/processes.php?page=procsavedreport",{title:$(this).val()},function(data){
            
             
          });
        });
     });
    </script>
</div>
<div class="container" id="chatmenus" style="padding: 10px">
    <div class="col-md-2 btn btn-default" id="tablechat">Table</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-default" id="linechat">Line Chart</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-default" id="barchat">Bar Chart</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-default" id="piechat">Pie Chat</div>
</div>
<div class="container" style="padding-top: 10px" id="reportarea">
    
</div>
<?php
    }
    
    if($_GET['page'] == "procsavedreport"){
        $query = mysql_query("SELECT * FROM reports WHERE name = '{$_POST['title']}'");
        $data = "";
        while ($row = mysql_fetch_array($query)) {
            $data .="{reg:'{$row['region']}',";
            $data .="dist:'{$row['district']}',";
            $data .="gend:'{$row['sex']}',";
            $data .="age:'{$row['age']}',";
            $data .="from:'{$row['fromm']}',";
            $data .="to:'{$row['too']}',";
            $data .="diagno:'{$row['basis']}',";
            $data .="topo:'{$row['topograph']}',";
            $data .="morpho:'{$row['morphology']}',";
            $data .="stage:'{$row['stage']}',";
            $data .="treat:'{$row['treat']}',";
            $data .="behav:'{$row['behavior']}'}";
?>
<script>
    $("#tablechat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#reportarea").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                     $("#reportarea").load("statistics/more.php?page=table",<?php echo $data ?>,function(){

                 });
                });

                $("#barchat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#reportarea").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                    $("#reportarea").load("statistics/more.php?page=bar",<?php echo $data ?>,function(){

                 });
                });

                $("#piechat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#reportarea").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                    $("#reportarea").load("statistics/more.php?page=pie",<?php echo $data ?>,function(){

                 });
                });

                $("#linechat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#reportarea").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                     $("#reportarea").load("statistics/more.php?page=line",<?php echo $data ?>,function(){

                 });
                });
            //trigger table chat by default
            $("#tablechat").trigger("click");
    
    </script>
<?php
                 
        }
    }
}
?>
