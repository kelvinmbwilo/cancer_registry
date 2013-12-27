<?php
include_once '../includes/connection.php';
include '../Statistics.php';
include '../class/form.php';
if(isset($_GET['page'])){
    $timerange33 = date("j, M Y",  strtotime($_POST['from']))." to  " .date("j, M Y",  strtotime($_POST['to']));
    $region = ($_POST['reg'] == "Region")?"":$_POST['reg']." Region ";
    $district = ($_POST['dist'] == "District")?"":" - " .$_POST['dist']. " District ";
    $gender = ($_POST['gend'] == "All Sex")?"":$_POST['gend'];
     if($_GET['page'] == "table"){
         if($_POST['age'] == "All Ages"){
              ?>
<h3>Cancer <?php echo $gender ?> Patient Registration <?php echo $region ?> <?php echo $district ?> From <?php echo $timerange33 ?></h3>
<table class="table table-bordered">
    <tr>
        <?php echo ($_POST['gend'] == "All Sex")?'<th colspan="3">Registrations</th><th colspan="3">Death</th>':'<th>Registrations</th><th>Death</th>'; ?>
    </tr>
    <tr>
        <?php echo ($_POST['gend'] == "All Sex")?'<th>Male</th><th>Female</th><th>Total</th><th>Male</th><th>Female</th><th>Total</th>':'';?>
    </tr>
    <tr>
        <?php if($_POST['gend'] == "All Sex"){
            ?>
        <td><?php echo countColumn("patient", "WHERE gender ='Male'".  timeCondition().  districtRegioncond())?></td>
        <td><?php echo countColumn("patient", "WHERE gender ='Female'".  timeCondition().  districtRegioncond())?></td>
        <td><?php echo countColumn("patient", "WHERE id !=''".  timeCondition(). districtRegioncond())?></td>
       <?php }  else { ?>
            <td><?php echo countColumn("patient", "WHERE gender ='{$_POST['gend']}'".  timeCondition().  districtRegioncond())?></td>
        <?php } ?>
        
        <?php if($_POST['gend'] == "All Sex"){
            ?>
            <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Male'", "patient_id").")".  timeDeathCondition().  districtRegionDeathcond()) ?></td>
        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Female'", "patient_id").")".  timeDeathCondition().  districtRegionDeathcond()) ?></td>
        <td><?php echo countColumn("folow_up", "WHERE status='Dead'".  timeDeathCondition().  districtRegionDeathcond()) ?></td>
        <?php }  else { ?>
            <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='{$_POST['gend']}'", "patient_id").")".  timeDeathCondition().  districtRegionDeathcond()) ?></td>
       <?php } ?>
    </tr>
</table>

<?php
         }else{
             if((maxAge("")%$_POST['age']) == 0){
                $limit = maxAge ("");
            } else{
                $limit = (maxAge("")-(maxAge("")%$_POST['age']))+$_POST['age'];
            }
            //making a loop for values
            $k = 0;
            $range = $_POST['age'];
            $yeardate = date("Y")+1;
            $yaerdate1 = $yeardate."-01-01";
            ?>
                <div class="row-fluid"><strong>Cancer <?php echo $gender ?> Patient Registration <?php echo $region ?> <?php echo $district ?>  From <?php echo $timerange33 ?></strong></div>
                <table class="table table-bordered">
                    <tr>
                        <?php echo ($_POST['gend'] == "All Sex")?'<th rowspan=\'2\'>Age</th><th colspan="3">Registrations</th><th colspan="3">Death</th>':'<th>Age</th><th>Registrations</th><th>Death</th>'; ?>
                    </tr>
                    <tr>
                        <?php echo ($_POST['gend'] == "All Sex")?'<th>Male</th><th>Female</th><th>Total</th><th>Male</th><th>Female</th><th>Total</th>':'';?>
                    </tr>
                    <?php
            for($i=$range;$i<=$limit;$i+=$range){
                //start year
                $time = $k*365*24*3600;
                $today = date("Y-m-d");
                $timerange = strtotime($today) - $time;
                $start  = (date("Y",$timerange)+1)."-01-01";
                //end year
                $time1 = $i*365*24*3600;
                $timerange1 = strtotime($today) - $time1;
                $end = date("Y",$timerange1)."-01-01";
                
                //generating a condition to use for age
                $condition = " AND date_of_birth BETWEEN '{$end}' AND '{$start}' ";
                $condition1 = " AND patient_id IN (".createInArray("patient","WHERE date_of_birth BETWEEN '{$end}' AND '{$start}'", "patient_id").") ";
               
                ?>
                  <tr>
                    <?php echo "<td>$k - $i</td>"; ?>
                    <?php if($_POST['gend'] == "All Sex"){
                        ?>
                    <td><?php echo countColumn("patient", "WHERE gender ='Male'".  timeCondition().  districtRegioncond().$condition)?></td>
                    <td><?php echo countColumn("patient", "WHERE gender ='Female'".  timeCondition().  districtRegioncond().$condition)?></td>
                    <td><?php echo countColumn("patient", "WHERE id !=''".  timeCondition(). districtRegioncond().$condition)?></td>
                   <?php }  else { ?>
                        <td><?php echo countColumn("patient", "WHERE gender ='{$_POST['gend']}'".  timeCondition().  districtRegioncond().$condition)?></td>
                    <?php } ?>

                    <?php if($_POST['gend'] == "All Sex"){
                        ?>
                        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Male'", "patient_id").")".  timeDeathCondition().  districtRegionDeathcond().$condition1 ) ?></td>
                    <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Female'", "patient_id").")".  timeDeathCondition().  districtRegionDeathcond().$condition1) ?></td>
                    <td><?php echo countColumn("folow_up", "WHERE status='Dead'".  timeDeathCondition().  districtRegionDeathcond().$condition1) ?></td>
                    <?php }  else { ?>
                        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='{$_POST['gend']}'", "patient_id").")".  timeDeathCondition().  districtRegionDeathcond().$condition1) ?></td>
                   <?php } ?>
                </tr>
                <?php    
                
                $k=$i;
            }
            echo "</table>";
        
         }
     }
     
     if($_GET['page'] == "bar"){
         if($_POST['age'] == "All Ages"){
             if ($_POST['gend'] == "All Sex"){
              $series = "name: 'Female',";
              $series .= "data: [". countColumn("patient", "WHERE  gender ='Female'".  timeCondition().  districtRegioncond()).", ". countColumn("folow_up", "WHERE status='Dead' ".genderCondition("Female") .  timeDeathCondition().  districtRegionDeathcond())."]";
              $series .= "}, {";
              $series .= "name: 'Male',";
              $series .= "data: [". countColumn("patient", "WHERE  gender ='Male'" .  timeCondition().  districtRegioncond()).", ". countColumn("folow_up", "WHERE status='Dead' ".genderCondition("Male") .  timeDeathCondition().  districtRegionDeathcond())."]";
              $series .= "}, {";
              $series .= "name: 'Total',";
              $series .= "data: [". countColumn("patient", "WHERE id !='' ".  timeCondition().  districtRegioncond()).", ". countColumn("folow_up", "WHERE status='Dead' " .  timeDeathCondition().  districtRegionDeathcond())."]";
              
               }else{
                 $series = "name: '{$_POST['gend']}',";
                 $series .= "data: [". countColumn("patient", "WHERE  gender ='{$_POST['gend']}'".  timeCondition().  districtRegioncond()).", ". countColumn("folow_up", "WHERE status='Dead' ".genderCondition("Female") .  timeDeathCondition().  districtRegionDeathcond())."]";
                
               }
              ?>
                 <script>
                 $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Total <?php echo $gender ?> Patient Registration <?php echo $region ?> <?php echo $district ?>  From <?php echo $timerange33 ?>'
            },
            xAxis: {
                categories: ['Registrations', 'Death'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Patient',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Patients'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: 
            [{
                <?php echo $series ?>
            }]
        });
                 </script>
<div id="container" style="width:90%; height:400px;"></div>
<?php
         }else{
             //setting the limits
              if((maxAge("")%$_POST['age']) == 0){
                $limit = maxAge ("");
            } else{
                $limit = (maxAge("")-(maxAge("")%$_POST['age']))+$_POST['age'];
            }
            //making a loop for values
            $k = 0;
            $range = $_POST['age'];
            $yeardate = date("Y")+1;
            $yaerdate1 = $yeardate."-01-01";
            
            //creating title
            $titles = "[";
            $data = array();
            for($i=$range;$i<=$limit;$i+=$range){
                 //start year
                $time = $k*365*24*3600;
                $today = date("Y-m-d");
                $timerange = strtotime($today) - $time;
                $start  = (date("Y",$timerange)+1)."-01-01";
                //end year
                $time1 = $i*365*24*3600;
                $timerange1 = strtotime($today) - $time1;
                $end = date("Y",$timerange1)."-01-01";
                
                //generating a condition to use for age
                $condition = " AND date_of_birth BETWEEN '{$end}' AND '{$start}' ";
                $condition1 = " AND patient_id IN (".createInArray("patient","WHERE date_of_birth BETWEEN '{$end}' AND '{$start}'", "patient_id").") ";
                $titles .= ($i == $limit)?"'".$k ." - ". $i."'":"'".$k ." - ". $i."',";
                $data["female"] .= ($i == $limit)? countColumn("patient", "WHERE  gender ='Female'".$condition.  timeCondition().  districtRegioncond()):countColumn("patient", "WHERE  gender ='Female'".$condition.  timeCondition().  districtRegioncond()).",";
                $data["male"] .= ($i == $limit)? countColumn("patient", "WHERE  gender ='Male'".$condition.  timeCondition().  districtRegioncond()):countColumn("patient", "WHERE  gender ='Male'".$condition.  timeCondition().  districtRegioncond()).",";
                $data["total"] .= ($i == $limit)? countColumn("patient", "WHERE  id !=''".$condition.  timeCondition().  districtRegioncond()): countColumn("patient", "WHERE  id !=''".$condition.  timeCondition().  districtRegioncond()).",";
                $data["genda"] .= ($i == $limit)? countColumn("patient", "WHERE  gender ='{$_POST['gend']}'".$condition.  timeCondition().  districtRegioncond()):countColumn("patient", "WHERE  gender ='{$_POST['gend']}'".$condition.  timeCondition().  districtRegioncond()).",";
                
                $data["female1"] .= ($i == $limit)? countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition("Female") .  timeDeathCondition().  districtRegionDeathcond()): countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition("Female") .  timeDeathCondition().  districtRegionDeathcond()).",";
                $data["male1"] .= ($i == $limit)? countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition("Male") .  timeDeathCondition().  districtRegionDeathcond()): countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition("Male") .  timeDeathCondition().  districtRegionDeathcond()).",";
                $data["total1"] .= ($i == $limit)?  countColumn("folow_up", "WHERE status='Dead' " .$condition1  .  timeDeathCondition().  districtRegionDeathcond()):  countColumn("folow_up", "WHERE status='Dead' " .$condition1 .  timeDeathCondition().  districtRegionDeathcond()).",";
                $data["genda1"] .= ($i == $limit)?  countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition($_POST['gend']) .  timeDeathCondition().  districtRegionDeathcond()): countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition($_POST['gend']) .  timeDeathCondition().  districtRegionDeathcond()).",";
                
                $k=$i;
                
            }
            $titles .= "]";
            //creating series
             if ($_POST['gend'] == "All Sex"){
              $series = "name: 'Female',";
              $series .= "data: [".$data["female"] ."]";
              $series .= "}, {";
              $series .= "name: 'Male',";
              $series .= "data: [".$data["male"]."]";
              $series .= "}, {";
              $series .= "name: 'Total',";
              $series .= "data: [".$data["total"]."]";
              
              $series1 = "name: 'Female',";
              $series1 .= "data: [".$data["female1"] ."]";
              $series1 .= "}, {";
              $series1 .= "name: 'Male',";
              $series1 .= "data: [".$data["male1"]."]";
              $series1 .= "}, {";
              $series1 .= "name: 'Total',";
              $series1 .= "data: [".$data["total1"]."]";
              
               }else{
                 $series = "name: '{$_POST['gend']}',";
                 $series .= "data: [".$data["genda"]."]";
                 $series1 = "name: '{$_POST['gend']}',";
                 $series1 .= "data: [".$data["genda1"]."]";
                
               }
            
            ?>
                 <script>
                 $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Cancer <?php echo $gender ?> Patient Registration <?php echo $region ?> <?php echo $district ?>  From <?php echo $timerange33 ?>'
            },
            xAxis: {
                categories: <?php echo $titles ?>,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Patient',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Patients'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: 
            [{
                <?php echo $series ?>
            }]
        });
                 </script>
<div id="container" style="width:90%; height: 450px" ></div>
<?php
        ?>
                 <script>
                 $('#container1').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Cancer <?php echo $gender ?> Patient Death <?php echo $region ?> <?php echo $district ?>  From <?php echo $timerange33 ?>'
            },
            xAxis: {
                categories: <?php echo $titles ?>,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Patient',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Patients'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: 
            [{
                <?php echo $series1 ?>
            }]
        });
                 </script>
<div id="container1" style="width:90%; height: 450px;margin-top: 10px" ></div>
<?php
         }
     }
    
     if($_GET['page'] == "pie"){
         if($_POST['age'] == "All Ages"){
               ?>
<script type="text/javascript">
$(function () {
    var chart;
    
    $(document).ready(function () {
    	
    	// Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Cancer Patient Registration <?php echo $region ?> <?php echo $district ?>  From <?php echo $timerange33 ?>'
            },
            
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Patient Registration <?php echo $region ?> <?php echo $district ?> ',
                data: [
                    ['Female',<?php echo countColumn("patient", "WHERE gender ='Female'".  timeCondition().  districtRegioncond()) ?>],
                    ['Male',  <?php echo countColumn("patient", "WHERE  gender ='Male'".  timeCondition().  districtRegioncond()) ?>]
                ]
            }]
        });
    });
    
    $('#container1').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Cancer Patient Death <?php echo $region ?> <?php echo $district ?>  From <?php echo $timerange33 ?>'
            },
            
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Patient Death <?php echo $region ?> <?php echo $district ?>',
                data: [
                    ['Female', <?php echo countColumn("folow_up", "WHERE status='Dead' ".  genderCondition("Female") .  timeDeathCondition(). districtRegionDeathcond()) ?>],
                    ['Male',   <?php echo countColumn("folow_up", "WHERE status='Dead' ".  genderCondition("Male").  timeDeathCondition(). districtRegionDeathcond()) ?>]
                ]
            }]
        });
});
		</script>
<div id="container" style="width:45%; height:400px;" class="pull-left"></div>
<div id="container1" style="width:45%; height:400px;" class="pull-right"></div>
<?php
         }else{
             
              //setting the limits
              if((maxAge("")%$_POST['age']) == 0){
                $limit = maxAge ("");
            } else{
                $limit = (maxAge("")-(maxAge("")%$_POST['age']))+$_POST['age'];
            }
            //making a loop for values
            $k = 0;
            $range = $_POST['age'];
            $yeardate = date("Y")+1;
            $yaerdate1 = $yeardate."-01-01";
            
            //creating title
            $data = array();
            for($i=$range;$i<=$limit;$i+=$range){
                 //start year
                $time = $k*365*24*3600;
                $today = date("Y-m-d");
                $timerange = strtotime($today) - $time;
                $start  = (date("Y",$timerange)+1)."-01-01";
                //end year
                $time1 = $i*365*24*3600;
                $timerange1 = strtotime($today) - $time1;
                $end = date("Y",$timerange1)."-01-01";
                
                //generating a condition to use for age
                $condition = " AND date_of_birth BETWEEN '{$end}' AND '{$start}' ";
                $condition1 = " AND patient_id IN (".createInArray("patient","WHERE date_of_birth BETWEEN '{$end}' AND '{$start}'", "patient_id").") ";
               
                $titles .= ($i == $limit)?"'".$k ." - ". $i."'":"'".$k ." - ". $i."',";
                $data["total"] .= ($i == $limit)? "['".$k ." - ". $i."',".countColumn("patient", "WHERE  id !=''".$condition.  timeCondition().  districtRegioncond())."]":"['".$k ." - ". $i."',".countColumn("patient", "WHERE  id !=''".$condition.  timeCondition().  districtRegioncond())."],";
                
               $data["total1"] .= ($i == $limit)? "['".$k ." - ". $i."',". countColumn("folow_up", "WHERE status='Dead' " .$condition1  .  timeDeathCondition().  districtRegionDeathcond())."]": "['".$k ." - ". $i."',". countColumn("folow_up", "WHERE status='Dead' " .$condition1 .  timeDeathCondition().  districtRegionDeathcond())."],";
                
                $k=$i;
               
            }
            echo $data['total1'];
             ?>
<script type="text/javascript">
$(function () {
    var chart;
    
    $(document).ready(function () {
    	
    	// Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Cancer Patient Registration <?php echo $region ?> <?php echo $district ?>  From <?php echo $timerange33 ?>'
            },
            
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Patient Registration <?php echo $region ?> <?php echo $district ?> ',
                data: [
                    <?php echo $data['total'] ?>
                ]
            }]
        });
    });
    
    $('#container1').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Cancer Patient Death <?php echo $region ?> <?php echo $district ?>  From <?php echo $timerange33 ?>'
            },
            
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Patient Death <?php echo $region ?> <?php echo $district ?>',
                data: [
                     <?php echo $data['total1'] ?>
                ]
            }]
        });
});
		</script>
<div id="container" style="width:45%; height:400px; margin-top: 10px" class="pull-left"></div>
<div id="container1" style="width:45%; height:400px; margin-top: 10px" class="pull-right"></div>
<?php
             if((maxAge("")%$_POST['age']) == 0){
                $limit = maxAge ("");
            } else{
                $limit = (maxAge("")-(maxAge("")%$_POST['age']))+$_POST['age'];
            }
            //making a loop for values
            $k = 0;
            $range = $_POST['age'];
            $yeardate = date("Y")+1;
            $yaerdate1 = $yeardate."-01-01";
            for($i=$range;$i<=$limit;$i+=$range){
                //start year
                $time = $k*365*24*3600;
                $today = date("Y-m-d");
                $timerange = strtotime($today) - $time;
                $start  = (date("Y",$timerange)+1)."-01-01";
                //end year
                $time1 = $i*365*24*3600;
                $timerange1 = strtotime($today) - $time1;
                $end = date("Y",$timerange1)."-01-01";
                
                //generating a condition to use for age
                $condition = " AND date_of_birth BETWEEN '{$end}' AND '{$start}' ";
                $condition1 = " AND patient_id IN (".createInArray("patient","WHERE date_of_birth BETWEEN '{$end}' AND '{$start}'", "patient_id").") ";
               
                   ?>
<script type="text/javascript">
$(function () {
    var chart;
    
    $(document).ready(function () {
    	
    	// Build the chart
        $('#containe<?php echo $i ?>').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Cancer Patient Registration <?php echo $region ?> <?php echo $district ?> Aged <?php echo $k." - ". $i ?>  From <?php echo $timerange33 ?>'
            },
            
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Patient Registration <?php echo $region ?> <?php echo $district ?> ',
                data: [
                    ['Female',<?php echo countColumn("patient", "WHERE gender ='Female'".$condition.  timeCondition().  districtRegioncond()) ?>],
                    ['Male',  <?php echo countColumn("patient", "WHERE  gender ='Male'".$condition.  timeCondition().  districtRegioncond()) ?>]
                ]
            }]
        });
    });
    
    $('#containe<?php echo $i."1" ?>').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Cancer Patient Death <?php echo $region ?> <?php echo $district ?>  Aged <?php echo $k." - ". $i ?>  From <?php echo $timerange33 ?>'
            },
            
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Patient Death <?php echo $region ?> <?php echo $district ?>',
                data: [
                    ['Female', <?php echo countColumn("folow_up", "WHERE status='Dead' ".$condition1.  genderCondition("Female") .  timeDeathCondition(). districtRegionDeathcond()) ?>],
                    ['Male',   <?php echo countColumn("folow_up", "WHERE status='Dead' ".$condition1.  genderCondition("Male").  timeDeathCondition(). districtRegionDeathcond()) ?>]
                ]
            }]
        });
});
		</script>
<div id="containe<?php echo $i ?>" style="width:45%; height:400px; margin-top: 10px" class="pull-left"></div>
<div id="containe<?php echo $i."1" ?>" style="width:45%; height:400px; margin-top: 10px" class="pull-right"></div>
<?php
                
                $k=$i;
            }
        
         }
     }
     
     if($_GET['page'] == "line"){
         echo "Line Chat is not Available for This Case";
     }
}
?>
