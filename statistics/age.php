<?php
include_once '../includes/connection.php';
include '../Statistics.php';
include '../class/form.php';
if(isset($_GET['page'])){
    $region = ($_POST['reg'] == "Region")?"":$_POST['reg']." Region ";
    $district = ($_POST['dist'] == "District")?"":" - " .$_POST['dist']. " District ";
    $gender = ($_POST['gend'] == "All Sex")?"":$_POST['gend'];
     if($_GET['page'] == "table"){
         if($_POST['age'] == "All Ages"){
              ?>
<h3>Cancer <?php echo $gender ?> Patient Registration <?php echo $region ?> <?php echo $district ?></h3>
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
        <td><?php echo countColumn("patient", "WHERE gender ='Male'".  districtRegioncond())?></td>
        <td><?php echo countColumn("patient", "WHERE gender ='Female'".  districtRegioncond())?></td>
        <td><?php echo countColumn("patient", "WHERE id !=''". districtRegioncond())?></td>
       <?php }  else { ?>
            <td><?php echo countColumn("patient", "WHERE gender ='{$_POST['gend']}'".  districtRegioncond())?></td>
        <?php } ?>
        
        <?php if($_POST['gend'] == "All Sex"){
            ?>
            <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Male'", "patient_id").")".  districtRegionDeathcond()) ?></td>
        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Female'", "patient_id").")".  districtRegionDeathcond()) ?></td>
        <td><?php echo countColumn("folow_up", "WHERE status='Dead'".  districtRegionDeathcond()) ?></td>
        <?php }  else { ?>
            <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='{$_POST['gend']}'", "patient_id").")".  districtRegionDeathcond()) ?></td>
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
                <div class="row-fluid"><strong>Cancer <?php echo $gender ?> Patient Registration <?php echo $region ?> <?php echo $district ?></strong></div>
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
                    <td><?php echo countColumn("patient", "WHERE gender ='Male'".  districtRegioncond().$condition)?></td>
                    <td><?php echo countColumn("patient", "WHERE gender ='Female'".  districtRegioncond().$condition)?></td>
                    <td><?php echo countColumn("patient", "WHERE id !=''". districtRegioncond().$condition)?></td>
                   <?php }  else { ?>
                        <td><?php echo countColumn("patient", "WHERE gender ='{$_POST['gend']}'".  districtRegioncond().$condition)?></td>
                    <?php } ?>

                    <?php if($_POST['gend'] == "All Sex"){
                        ?>
                        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Male'", "patient_id").")".  districtRegionDeathcond().$condition1 ) ?></td>
                    <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Female'", "patient_id").")".  districtRegionDeathcond().$condition1) ?></td>
                    <td><?php echo countColumn("folow_up", "WHERE status='Dead'".  districtRegionDeathcond().$condition1) ?></td>
                    <?php }  else { ?>
                        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='{$_POST['gend']}'", "patient_id").")".  districtRegionDeathcond().$condition1) ?></td>
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
              $series .= "data: [". countColumn("patient", "WHERE  gender ='Female'".  districtRegioncond()).", ". countColumn("folow_up", "WHERE status='Dead' ".genderCondition("Female") .  districtRegionDeathcond())."]";
              $series .= "}, {";
              $series .= "name: 'Male',";
              $series .= "data: [". countColumn("patient", "WHERE  gender ='Male'" .  districtRegioncond()).", ". countColumn("folow_up", "WHERE status='Dead' ".genderCondition("Male") .  districtRegionDeathcond())."]";
              $series .= "}, {";
              $series .= "name: 'Total',";
              $series .= "data: [". countColumn("patient", "WHERE id !='' ".  districtRegioncond()).", ". countColumn("folow_up", "WHERE status='Dead' " .  districtRegionDeathcond())."]";
              
               }else{
                 $series = "name: '{$_POST['gend']}',";
                 $series .= "data: [". countColumn("patient", "WHERE  gender ='{$_POST['gend']}'".  districtRegioncond()).", ". countColumn("folow_up", "WHERE status='Dead' ".genderCondition("Female") .  districtRegionDeathcond())."]";
                
               }
              ?>
                 <script>
                 $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Total <?php echo $gender ?> Patient Registration <?php echo $region ?> <?php echo $district ?>'
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
                $data["female"] .= ($i == $limit)? countColumn("patient", "WHERE  gender ='Female'".$condition.  districtRegioncond()):countColumn("patient", "WHERE  gender ='Female'".$condition.  districtRegioncond()).",";
                $data["male"] .= ($i == $limit)? countColumn("patient", "WHERE  gender ='Male'".$condition.  districtRegioncond()):countColumn("patient", "WHERE  gender ='Male'".$condition.  districtRegioncond()).",";
                $data["total"] .= ($i == $limit)? countColumn("patient", "WHERE  id !=''".$condition.  districtRegioncond()): countColumn("patient", "WHERE  id !=''".$condition.  districtRegioncond()).",";
                $data["genda"] .= ($i == $limit)? countColumn("patient", "WHERE  gender ='{$_POST['gend']}'".$condition.  districtRegioncond()):countColumn("patient", "WHERE  gender ='{$_POST['gend']}'".$condition.  districtRegioncond()).",";
                
                $data["female1"] .= ($i == $limit)? countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition("Female") .  districtRegionDeathcond()): countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition("Female") .  districtRegionDeathcond()).",";
                $data["male1"] .= ($i == $limit)? countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition("Male") .  districtRegionDeathcond()): countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition("Male") .  districtRegionDeathcond()).",";
                $data["total1"] .= ($i == $limit)?  countColumn("folow_up", "WHERE status='Dead' " .$condition1  .  districtRegionDeathcond()):  countColumn("folow_up", "WHERE status='Dead' " .$condition1 .  districtRegionDeathcond()).",";
                $data["genda1"] .= ($i == $limit)?  countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition($_POST['gend']) .  districtRegionDeathcond()): countColumn("folow_up", "WHERE status='Dead' " .$condition1 .genderCondition($_POST['gend']) .  districtRegionDeathcond()).",";
                
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
                text: 'Cancer <?php echo $gender ?> Patient Registration <?php echo $region ?> <?php echo $district ?>'
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
                text: 'Cancer <?php echo $gender ?> Patient Death <?php echo $region ?> <?php echo $district ?>'
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
                text: 'Cancer Patient Registration <?php echo $region ?> <?php echo $district ?>'
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
                    ['Female',<?php echo countColumn("patient", "WHERE gender ='Female'".  districtRegioncond()) ?>],
                    ['Male',  <?php echo countColumn("patient", "WHERE  gender ='Male'".  districtRegioncond()) ?>]
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
                text: 'Cancer Patient Death <?php echo $region ?> <?php echo $district ?>'
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
                    ['Female', <?php echo countColumn("folow_up", "WHERE status='Dead' ".  genderCondition("Female") . districtRegionDeathcond()) ?>],
                    ['Male',   <?php echo countColumn("folow_up", "WHERE status='Dead' ".  genderCondition("Male"). districtRegionDeathcond()) ?>]
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
                $data["total"] .= ($i == $limit)? "['".$k ." - ". $i."',".countColumn("patient", "WHERE  id !=''".$condition.  districtRegioncond())."]":"['".$k ." - ". $i."',".countColumn("patient", "WHERE  id !=''".$condition.  districtRegioncond())."],";
                
               $data["total1"] .= ($i == $limit)? "['".$k ." - ". $i."',". countColumn("folow_up", "WHERE status='Dead' " .$condition1  .  districtRegionDeathcond())."]": "['".$k ." - ". $i."',". countColumn("folow_up", "WHERE status='Dead' " .$condition1 .  districtRegionDeathcond())."],";
                
                $k=$i;
               
            }
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
                text: 'Cancer Patient Registration <?php echo $region ?> <?php echo $district ?> '
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
                text: 'Cancer Patient Death <?php echo $region ?> <?php echo $district ?> '
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
                text: 'Cancer Patient Registration <?php echo $region ?> <?php echo $district ?> Aged <?php echo $k." - ". $i ?>'
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
                    ['Female',<?php echo countColumn("patient", "WHERE gender ='Female'".$condition.  districtRegioncond()) ?>],
                    ['Male',  <?php echo countColumn("patient", "WHERE  gender ='Male'".$condition.  districtRegioncond()) ?>]
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
                text: 'Cancer Patient Death <?php echo $region ?> <?php echo $district ?>  Aged <?php echo $k." - ". $i ?>'
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
                    ['Female', <?php echo countColumn("folow_up", "WHERE status='Dead' ".$condition1.  genderCondition("Female") . districtRegionDeathcond()) ?>],
                    ['Male',   <?php echo countColumn("folow_up", "WHERE status='Dead' ".$condition1.  genderCondition("Male"). districtRegionDeathcond()) ?>]
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
         if($_POST['age'] == "All Ages"){
             $year = date("Y");
         $jan =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-01-01")."' AND '".strtotime("{$year}-02-01")."'");
         $feb =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-02-01")."' AND '".strtotime("{$year}-03-01")."'");
         $mar =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-03-01")."' AND '".strtotime("{$year}-04-01")."'");
         $apr =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-04-01")."' AND '".strtotime("{$year}-05-01")."'");
         $may =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-05-01")."' AND '".strtotime("{$year}-06-01")."'");
         $jun =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-06-01")."' AND '".strtotime("{$year}-07-01")."'");
         $jul =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-07-01")."' AND '".strtotime("{$year}-08-01")."'");
         $aug =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-08-01")."' AND '".strtotime("{$year}-09-01")."'");
         $sep =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-09-01")."' AND '".strtotime("{$year}-10-01")."'");
         $oct =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-10-01")."' AND '".strtotime("{$year}-11-01")."'");
         $nov =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-11-01")."' AND '".strtotime("{$year}-12-01")."'");
         $dec =countColumn("patient","WHERE  id !='' ". districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-12-01")."' AND '".strtotime("{$year}-12-31")."'");
         
         $jan1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-01-01' AND '{$year}-02-01'".  districtRegionGenderdeath());
         $feb1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-02-01' AND '{$year}-03-01'".  districtRegionGenderdeath());
         $mar1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-03-01' AND '{$year}-04-01'".  districtRegionGenderdeath());
         $apr1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-04-01' AND '{$year}-05-01'".  districtRegionGenderdeath());
         $may1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-05-01' AND '{$year}-06-01'".  districtRegionGenderdeath());
         $jun1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-06-01' AND '{$year}-07-01'".  districtRegionGenderdeath());
         $jul1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-07-01' AND '{$year}-08-01'".  districtRegionGenderdeath());
         $aug1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-08-01' AND '{$year}-09-01'".  districtRegionGenderdeath());
         $sep1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-09-01' AND '{$year}-10-01'".  districtRegionGenderdeath());
         $oct1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-10-01' AND '{$year}-11-01'".  districtRegionGenderdeath());
         $nov1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-11-01' AND '{$year}-12-01'".  districtRegionGenderdeath());
         $dec1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-12-01' AND '{$year}-12-31'".  districtRegionGenderdeath());
        ?>
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            title: {
                text: 'Cancer <?php echo $gender ?> Patient Registration Year <?php echo date("Y")?> <?php echo $region ?> <?php echo $district ?>',
                x: -20 //center
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Number Of Patient'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'patient'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Registration',
                data: [<?php echo "$jan,$feb,$mar,$apr,$may,$jun,$jul,$aug,$sep,$oct,$nov,$dec" ?>]
            }, {
                name: 'Death',
                data: [<?php echo "$jan1,$feb1,$mar1,$apr1,$may1,$jun1,$jul1,$aug1,$sep1,$oct1,$nov1,$dec1" ?>]
            }]
        });
    });
    

		</script>
                 <div id="container" style="width:90%; height:400px;"></div>
<?php
         }  else {
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
                
                //preparing data for the chat
                 $year = date("Y");
         $jan =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-01-01")."' AND '".strtotime("{$year}-02-01")."'");
         $feb =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-02-01")."' AND '".strtotime("{$year}-03-01")."'");
         $mar =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-03-01")."' AND '".strtotime("{$year}-04-01")."'");
         $apr =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-04-01")."' AND '".strtotime("{$year}-05-01")."'");
         $may =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-05-01")."' AND '".strtotime("{$year}-06-01")."'");
         $jun =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-06-01")."' AND '".strtotime("{$year}-07-01")."'");
         $jul =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-07-01")."' AND '".strtotime("{$year}-08-01")."'");
         $aug =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-08-01")."' AND '".strtotime("{$year}-09-01")."'");
         $sep =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-09-01")."' AND '".strtotime("{$year}-10-01")."'");
         $oct =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-10-01")."' AND '".strtotime("{$year}-11-01")."'");
         $nov =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-11-01")."' AND '".strtotime("{$year}-12-01")."'");
         $dec =countColumn("patient","WHERE  id !='' ".$condition. districtRegionGender()." AND  patient_status BETWEEN '".strtotime("{$year}-12-01")."' AND '".strtotime("{$year}-12-31")."'");
         
         $jan1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-01-01' AND '{$year}-02-01'".  districtRegionGenderdeath().$condition1);
         $feb1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-02-01' AND '{$year}-03-01'".  districtRegionGenderdeath().$condition1);
         $mar1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-03-01' AND '{$year}-04-01'".  districtRegionGenderdeath().$condition1);
         $apr1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-04-01' AND '{$year}-05-01'".  districtRegionGenderdeath().$condition1);
         $may1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-05-01' AND '{$year}-06-01'".  districtRegionGenderdeath().$condition1);
         $jun1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-06-01' AND '{$year}-07-01'".  districtRegionGenderdeath().$condition1);
         $jul1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-07-01' AND '{$year}-08-01'".  districtRegionGenderdeath().$condition1);
         $aug1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-08-01' AND '{$year}-09-01'".  districtRegionGenderdeath().$condition1);
         $sep1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-09-01' AND '{$year}-10-01'".  districtRegionGenderdeath().$condition1);
         $oct1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-10-01' AND '{$year}-11-01'".  districtRegionGenderdeath().$condition1);
         $nov1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-11-01' AND '{$year}-12-01'".  districtRegionGenderdeath().$condition1);
         $dec1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-12-01' AND '{$year}-12-31'".  districtRegionGenderdeath().$condition1);
        ?>
<script type="text/javascript">
$(function () {
        $('#container<?php echo $k ?>').highcharts({
            title: {
                text: 'Cancer <?php echo $gender ?> Patient Registration Year <?php echo date("Y")?> <?php echo $region ?> <?php echo $district ?> Aged <?php echo $k ." - ". $i?>',
                x: -20 //center
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Number Of Patient'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'patient'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Registration',
                data: [<?php echo "$jan,$feb,$mar,$apr,$may,$jun,$jul,$aug,$sep,$oct,$nov,$dec" ?>]
            }, {
                name: 'Death',
                data: [<?php echo "$jan1,$feb1,$mar1,$apr1,$may1,$jun1,$jul1,$aug1,$sep1,$oct1,$nov1,$dec1" ?>]
            }]
        });
    });
    

		</script>
                 <div id="container<?php echo $k ?>" style="width:90%; height:400px; margin-top: 10px"></div>
                 
<?php
 $k=$i;
            }
         }
     }
}
?>
