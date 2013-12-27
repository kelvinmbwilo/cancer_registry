<?php
include_once '../includes/connection.php';
include '../Statistics.php';
include '../class/form.php';
if(isset($_GET['page'])){
     if($_GET['page'] == "total_table"){
         if($_POST['reg'] == "Region" && $_POST['dist'] =="District" ){
        ?>
<h3>Cancer <?php echo $_POST['gend'] ?> Patient Registration</h3>
<table class="table table-bordered">
    <tr>
        <th></th><th>Registrations</th><th>Death</th>
    </tr>
    <tr>
        <td></td>
        <td><?php echo countColumn("patient", "WHERE gender ='{$_POST['gend']}'")?></td>
        
        <td><?php echo countColumn("folow_up", "WHERE status='Dead' ".  genderCondition($_POST['gend'])) ?></td>
    </tr>
</table>

<?php
         }
         if($_POST['reg'] == "Region" && $_POST['dist'] !="District" ){
        ?>
<h3>Cancer <?php echo $_POST['gend'] ?>  Patient Registration In <?php echo $_POST['dist'] ?> District</h3>
<table class="table table-bordered">
    <tr>
        <th></th><th>Registrations</th><th>Death</th>
    </tr>
    <tr>
        <td><?php echo $_POST['dist']?></td>
        <td><?php echo countColumn("patient", "WHERE gender ='{$_POST['gend']}' AND district = '{$_POST['dist']}'")?></td>
        
        <td><?php echo countColumn("folow_up", "WHERE status='Dead'".  genderCondition($_POST['gend']).  districtCondition()) ?></td>
    </tr>
</table>

<?php
         } 
         if($_POST['reg'] != "Region" && $_POST['dist'] =="District" ){
        ?>
<h3>Cancer <?php echo $_POST['gend'] ?> Patient Registration In <?php echo $_POST['reg'] ?> Region</h3>
<table class="table table-bordered">
    <tr>
        <th>Region</th><th>Registrations</th><th>Death</th>
    </tr>
    <tr>
        <td><?php echo $_POST['reg']?></td>
        <td><?php echo countColumn("patient", "WHERE gender ='{$_POST['gend']}' AND region = '{$_POST['reg']}'")?></td>
        
        <td><?php echo countColumn("folow_up", "WHERE status='Dead' ".  genderCondition($_POST['gend']). regionalCondition()) ?></td>
        
    </tr>
</table>

<?php
         } if($_POST['reg'] != "Region" && $_POST['dist'] !="District" ){
            ?>
<h3>Cancer <?php echo $_POST['gend'] ?> Patient Registration In <?php echo $_POST['dist']." - ". $_POST['reg'];?></h3>
<table class="table table-bordered">
    <tr>
        <th></th><th>Registrations</th><th>Death</th>
    </tr>
    <tr>
        <td><?php echo $_POST['dist']?></td>
        <td><?php echo countColumn("patient", "WHERE gender ='{$_POST['gend']}' AND district = '{$_POST['dist']}'")?></td>
        
        <td><?php echo countColumn("folow_up", "WHERE status='Dead' ".  genderCondition($_POST['gend']).  districtCondition()) ?></td>
    </tr>
</table>

<?php 
         }
    }
    
    if($_GET['page'] == "total_bar"){
         if($_POST['reg'] == "Region" && $_POST['dist'] =="District" ){
        ?>
                 <script>
                 $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Total <?php echo $_POST['gend'] ?> Patient Registred'
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
            series: [{
                name: '<?php echo $_POST['gend'] ?>',
                data: [<?php echo countColumn("patient", "WHERE gender ='{$_POST['gend']}'") ?>, <?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='{$_POST['gend']}'", "patient_id").")") ?>]
            }]
        });
                 </script>
<div id="container" style="width:90%; height:400px;"></div>
<?php
         }
         if($_POST['reg'] == "Region" && $_POST['dist'] !="District" ){
        ?>
                 <script>
                 $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Total <?php echo $_POST['gend'] ?> Patient Registred in <?php echo $_POST['dist'] ?>'
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
            series: [{
                name: '<?php echo $_POST['gend'] ?>',
                data: [<?php echo countColumn("patient", "WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}'") ?>, <?php echo countColumn("folow_up", "WHERE status='Dead' ".genderCondition($_POST['gend']) .districtCondition()); ?>]
            }]
        });
                 </script>
<div id="container" style="width:90%; height:400px;"></div>
<?php
         } 
         if($_POST['reg'] != "Region" && $_POST['dist'] =="District" ){
       ?>
                 <script>
                 $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Total <?php echo $_POST['gend'] ?> Patient Registred in <?php echo $_POST['reg'] ?>'
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
            series: [{
                name: '<?php echo $_POST['gend'] ?>',
                data: [<?php echo countColumn("patient", "WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}'") ?>, <?php echo countColumn("folow_up", "WHERE status='Dead' ".genderCondition($_POST['gend']) .regionalCondition()); ?>]
            }]
        });
                 </script>
<div id="container" style="width:90%; height:400px;"></div>
<?php
         } if($_POST['reg'] != "Region" && $_POST['dist'] !="District" ){
            ?>
                 <script>
                 $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Total <?php echo $_POST['gend'] ?> Patient Registred in <?php echo $_POST['dist'] ?>'
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
            series: [{
                name: '<?php echo $_POST['gend'] ?>',
                data: [<?php echo countColumn("patient", "WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}'") ?>, <?php echo countColumn("folow_up", "WHERE status='Dead' ".genderCondition($_POST['gend']) .districtCondition()); ?>]
            }]
        });
                 </script>
<div id="container" style="width:90%; height:400px;"></div>
<?php
         }
    }

     if($_GET['page'] == "total_line"){
         if($_POST['reg'] == "Region" && $_POST['dist'] =="District" ){
        $year = date("Y");
         $jan =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-01-01")."' AND '".strtotime("{$year}-02-01")."'");
         $feb =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-02-01")."' AND '".strtotime("{$year}-03-01")."'");
         $mar =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-03-01")."' AND '".strtotime("{$year}-04-01")."'");
         $apr =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-04-01")."' AND '".strtotime("{$year}-05-01")."'");
         $may =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-05-01")."' AND '".strtotime("{$year}-06-01")."'");
         $jun =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-06-01")."' AND '".strtotime("{$year}-07-01")."'");
         $jul =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-07-01")."' AND '".strtotime("{$year}-08-01")."'");
         $aug =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-08-01")."' AND '".strtotime("{$year}-09-01")."'");
         $sep =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-09-01")."' AND '".strtotime("{$year}-10-01")."'");
         $oct =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-10-01")."' AND '".strtotime("{$year}-11-01")."'");
         $nov =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-11-01")."' AND '".strtotime("{$year}-12-01")."'");
         $dec =countColumn("patient","WHERE  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-12-01")."' AND '".strtotime("{$year}-12-31")."'");
         
         $jan1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-01-01' AND '{$year}-02-01'".  genderCondition($_POST['gend']));
         $feb1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-02-01' AND '{$year}-03-01'".  genderCondition($_POST['gend']));
         $mar1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-03-01' AND '{$year}-04-01'".  genderCondition($_POST['gend']));
         $apr1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-04-01' AND '{$year}-05-01'".  genderCondition($_POST['gend']));
         $may1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-05-01' AND '{$year}-06-01'".  genderCondition($_POST['gend']));
         $jun1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-06-01' AND '{$year}-07-01'".  genderCondition($_POST['gend']));
         $jul1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-07-01' AND '{$year}-08-01'".  genderCondition($_POST['gend']));
         $aug1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-08-01' AND '{$year}-09-01'".  genderCondition($_POST['gend']));
         $sep1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-09-01' AND '{$year}-10-01'".  genderCondition($_POST['gend']));
         $oct1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-10-01' AND '{$year}-11-01'".  genderCondition($_POST['gend']));
         $nov1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-11-01' AND '{$year}-12-01'".  genderCondition($_POST['gend']));
         $dec1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-12-01' AND '{$year}-12-31'".  genderCondition($_POST['gend']));
        ?>
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            title: {
                text: 'Cancer <?php echo $_POST['gend'] ?> Patient Registration Year <?php echo date("Y")?>',
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
         }
        
         if($_POST['reg'] == "Region" && $_POST['dist'] !="District" ){
         $year = date("Y");
         $jan =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-01-01")."' AND '".strtotime("{$year}-02-01")."'");
         $feb =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-02-01")."' AND '".strtotime("{$year}-03-01")."'");
         $mar =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-03-01")."' AND '".strtotime("{$year}-04-01")."'");
         $apr =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-04-01")."' AND '".strtotime("{$year}-05-01")."'");
         $may =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-05-01")."' AND '".strtotime("{$year}-06-01")."'");
         $jun =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-06-01")."' AND '".strtotime("{$year}-07-01")."'");
         $jul =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-07-01")."' AND '".strtotime("{$year}-08-01")."'");
         $aug =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-08-01")."' AND '".strtotime("{$year}-09-01")."'");
         $sep =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-09-01")."' AND '".strtotime("{$year}-10-01")."'");
         $oct =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-10-01")."' AND '".strtotime("{$year}-11-01")."'");
         $nov =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-11-01")."' AND '".strtotime("{$year}-12-01")."'");
         $dec =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-12-01")."' AND '".strtotime("{$year}-12-31")."'");
         
         $jan1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-01-01' AND '{$year}-02-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $feb1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-02-01' AND '{$year}-03-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $mar1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-03-01' AND '{$year}-04-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $apr1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-04-01' AND '{$year}-05-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $may1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-05-01' AND '{$year}-06-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $jun1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-06-01' AND '{$year}-07-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $jul1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-07-01' AND '{$year}-08-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $aug1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-08-01' AND '{$year}-09-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $sep1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-09-01' AND '{$year}-10-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $oct1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-10-01' AND '{$year}-11-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $nov1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-11-01' AND '{$year}-12-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $dec1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-12-01' AND '{$year}-12-31'". districtCondition().  genderCondition($_POST['gend']));
        ?>
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            title: {
                text: '<?php echo $_POST['dist'] ?> Cancer <?php echo $_POST['gend'] ?> Patient Registration Year <?php echo date("Y")?>',
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
         } 
         
         if($_POST['reg'] != "Region" && $_POST['dist'] =="District" ){
         $year = date("Y");
         $jan =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-01-01")."' AND '".strtotime("{$year}-02-01")."'");
         $feb =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-02-01")."' AND '".strtotime("{$year}-03-01")."'");
         $mar =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-03-01")."' AND '".strtotime("{$year}-04-01")."'");
         $apr =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-04-01")."' AND '".strtotime("{$year}-05-01")."'");
         $may =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-05-01")."' AND '".strtotime("{$year}-06-01")."'");
         $jun =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-06-01")."' AND '".strtotime("{$year}-07-01")."'");
         $jul =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-07-01")."' AND '".strtotime("{$year}-08-01")."'");
         $aug =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-08-01")."' AND '".strtotime("{$year}-09-01")."'");
         $sep =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-09-01")."' AND '".strtotime("{$year}-10-01")."'");
         $oct =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-10-01")."' AND '".strtotime("{$year}-11-01")."'");
         $nov =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-11-01")."' AND '".strtotime("{$year}-12-01")."'");
         $dec =countColumn("patient","WHERE region = '{$_POST['reg']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-12-01")."' AND '".strtotime("{$year}-12-31")."'");
         
         $jan1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-01-01' AND '{$year}-02-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
         $feb1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-02-01' AND '{$year}-03-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
         $mar1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-03-01' AND '{$year}-04-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
         $apr1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-04-01' AND '{$year}-05-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
         $may1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-05-01' AND '{$year}-06-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
         $jun1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-06-01' AND '{$year}-07-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
         $jul1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-07-01' AND '{$year}-08-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
         $aug1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-08-01' AND '{$year}-09-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
         $sep1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-09-01' AND '{$year}-10-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
         $oct1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-10-01' AND '{$year}-11-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
         $nov1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-11-01' AND '{$year}-12-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
         $dec1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-12-01' AND '{$year}-12-31' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")".  genderCondition($_POST['gend']));
        ?>
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            title: {
                text: '<?php echo $_POST['reg'] ?> Cancer <?php echo $_POST['gend'] ?>  Patient Registration Year <?php echo date("Y")?>',
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
         } 
         
         if($_POST['reg'] != "Region" && $_POST['dist'] !="District" ){
         $year = date("Y");
         $jan =countColumn("patient","WHERE  district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-01-01")."' AND '".strtotime("{$year}-02-01")."'");
         $feb =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-02-01")."' AND '".strtotime("{$year}-03-01")."'");
         $mar =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-03-01")."' AND '".strtotime("{$year}-04-01")."'");
         $apr =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-04-01")."' AND '".strtotime("{$year}-05-01")."'");
         $may =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-05-01")."' AND '".strtotime("{$year}-06-01")."'");
         $jun =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-06-01")."' AND '".strtotime("{$year}-07-01")."'");
         $jul =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-07-01")."' AND '".strtotime("{$year}-08-01")."'");
         $aug =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-08-01")."' AND '".strtotime("{$year}-09-01")."'");
         $sep =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-09-01")."' AND '".strtotime("{$year}-10-01")."'");
         $oct =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-10-01")."' AND '".strtotime("{$year}-11-01")."'");
         $nov =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-11-01")."' AND '".strtotime("{$year}-12-01")."'");
         $dec =countColumn("patient","WHERE district = '{$_POST['dist']}' AND  gender ='{$_POST['gend']}' AND  patient_status BETWEEN '".strtotime("{$year}-12-01")."' AND '".strtotime("{$year}-12-31")."'");
         
         $jan1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-01-01' AND '{$year}-02-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $feb1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-02-01' AND '{$year}-03-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $mar1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-03-01' AND '{$year}-04-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $apr1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-04-01' AND '{$year}-05-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $may1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-05-01' AND '{$year}-06-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $jun1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-06-01' AND '{$year}-07-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $jul1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-07-01' AND '{$year}-08-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $aug1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-08-01' AND '{$year}-09-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $sep1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-09-01' AND '{$year}-10-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $oct1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-10-01' AND '{$year}-11-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $nov1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-11-01' AND '{$year}-12-01' ".  districtCondition().  genderCondition($_POST['gend']));
         $dec1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-12-01' AND '{$year}-12-31'". districtCondition().  genderCondition($_POST['gend']));
        ?>
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            title: {
                text: '<?php echo $_POST['dist'] ?> Cancer <?php echo $_POST['gend'] ?> Patient Registration Year <?php echo date("Y")?>',
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
         } 
    }

    if($_GET['page'] == "total_pie"){
     echo "no pie chat for this case";
    }
}
?>
